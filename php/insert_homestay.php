<?php

error_reporting(0);
	if (!isset($_POST['registerhomestay'])) {
    $response = array('status' => 'failed', 'data' => null);
    sendJsonResponse($response);
    die();
	}
	include_once("dbconnect.php");
	$userid = $_POST['userid'];
 	$hsname= ucwords(addslashes($_POST['hsname']));
	$hsdesc= ucfirst(addslashes($_POST['hsdesc']));
	$hsprice= $_POST['hsprice'];
	$state= addslashes($_POST['state']);
    $local= addslashes($_POST['local']);
    $lat= $_POST['lat'];
    $lon= $_POST['log'];
    $base64Image= $_POST["image"];

	$sqlinsert = "INSERT INTO `tbl_products`(`user_id`, `product_name`, `product_desc`, `product_price`, `product_state`, `product_local`, `product_lat`, `product_log`) VALUES ('$userid','$hsname','$hsdesc','$hsprice','$state','$local','$lat','$lon')";

	try {
		if ($conn->query($sqlinsert) === TRUE) {
			$decoded_string = base64_decode($base64Image);
			$filename = mysqli_insert_id($conn);
			$path = '../assets/roomimages/'.$filename.'.png';
			file_put_contents($path, $decoded_string);
			$response = array('status' => 'success', 'data' => null);
			sendJsonResponse($response);
		}
		else{
			$response = array('status' => 'failed', 'data' => null);
			sendJsonResponse($response);
		}
	}
	catch(Exception $e) {
		$response = array('status' => 'failed', 'data' => null);
		sendJsonResponse($response);
	}
	$conn->close();
	
	function sendJsonResponse($sentArray)
	{
    header('Content-Type= application/json');
    echo json_encode($sentArray);
	}
?>