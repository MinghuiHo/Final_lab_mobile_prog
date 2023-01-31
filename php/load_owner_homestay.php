<?php
	error_reporting(0);
	if (!isset($_GET['userid'])) {
    $response = array('status' => 'disconnect', 'data' => null);
    sendJsonResponse($response);
    die();
	}
	$userid = $_GET['userid'];
	include_once("dbconnect.php");
	$sqlloadhomestay = "SELECT * FROM tbl_products WHERE user_id = '$userid'";
	$result = $conn->query($sqlloadhomestay);
	if ($result->num_rows > 0) {
		$homestaysarray["homestays"] = array();
		while ($row = $result->fetch_assoc()) {
			$hslist = array();
			$hslist['product_id'] = $row['product_id'];
			$hslist['user_id'] = $row['user_id'];
			$hslist['product_name'] = $row['product_name'];
			$hslist['product_desc'] = $row['product_desc'];
			$hslist['product_price'] = $row['product_price'];
			$hslist['product_state'] = $row['hproduct_state'];
			$hslist['product_local'] = $row['hproduct_local'];
			$hslist['product_lat'] = $row['product_lat'];
			$hslist['product_log'] = $row['product_log'];
			$hslist['product_date'] = $row['product_date'];
			array_push($homestaysarray["homestays"],$hslist);
		}
		$response = array('status' => 'success', 'data' => $homestaysarray);
    sendJsonResponse($response);
		}else{
		$response = array('status' => 'failed', 'data' => null);
    sendJsonResponse($response);
	}
	
	function sendJsonResponse($sentArray)
	{
    header('Content-Type: application/json');
    echo json_encode($sentArray);
	}