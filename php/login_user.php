<?php
error_reporting(0);

if (!isset($_POST)) {
    $response = array('status' => 'failed', 'data' => null);
    sendJsonResponse($response);
    die();
}

include_once("dbconnect.php");

$email = $_POST['email'];
$password = sha1($_POST['pass']);
$sqllogin = "SELECT * FROM tbl_users WHERE user_email = '$email' AND user_pass = '$password'";
$result = $conn->query($sqllogin);

if($result->num_rows>0){
    while ($row = $result->fetch_assoc()){
        $userlist['id'] = $row['user_id'];
        $userlist['email'] = $row['user_email'];
        $userlist['name'] = $row['user_name'];
        $userlist['phone'] = $row['user_phone'];
        $userlist['address'] = $row['user_address'];
        $userlist['regdate'] = $row['user_dateReg'];
        
        $response = array('status' => 'success', 'data' => $userlist);
        sendJsonResponse($response);
    }
}
    else{
    $response = array('status' => 'failed', 'data' => null);
    sendJsonResponse($response);
}
$conn->close();

function sendJsonResponse($sentArray)
{
    header('Content-Type: application/json');
    echo json_encode($sentArray);
}

?>