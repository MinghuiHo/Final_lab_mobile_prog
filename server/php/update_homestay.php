<?php

	if (!isset($_POST)) {
        $response = array('status' => 'failed', 'data' => null);
        sendJsonResponse($response);
        die();
	}

	include_once("dbconnect.php");
	$userid = $_POST['userid'];
	$homestayid = $_POST['homestayid'];
    $hsname= ucwords(addslashes($_POST['hsname']));
	$hsdesc= ucfirst(addslashes($_POST['hsdesc']));
	$hsprice= $_POST['hsprice'];
    
    $sqlupdate = "UPDATE `tbl_products` SET `product_name`='$hsname',`product_desc`='$hsdesc',`product_price`='$hsprice' WHERE `product_id` = '$homestayid' AND `user_id` = '$userid'";
	
    try {
		if ($conn->query($sqlupdate) === TRUE) {
			$response = array('status' => 'success', 'data' => null);
			sendJsonResponse($response);
		} else {
			$response = array('status' => 'failed', 'data' => null);
			sendJsonResponse($response);
		}
	} catch(Exception $e) {
		$response = array('status' => 'failed', 'data' => null);
		sendJsonResponse($response);
	}
	$conn->close();
	
	function sendJsonResponse($sentArray) {
        header('Content-Type= application/json');
        echo json_encode($sentArray);
	}

?>