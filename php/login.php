<?php
session_start();
include 'connection.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, HEAD, OPTIONS, POST, PUT');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, x-client-key, x-client-token, x-client-secret, Authorization');

$username = $_POST['username'];
$password = $_POST['password'];
	
if (isset($username) && isset($password)) {
    $username = mysqli_real_escape_string($dbconn, htmlspecialchars($username));
    $password = mysqli_real_escape_string($dbconn, htmlspecialchars($password));
    $password = md5($password);
    $sql = "SELECT *
            FROM tbl_customers
            WHERE username = '".$username."' 
            AND password = '".$password."'";

    $result = mysqli_query($dbconn, $sql);
    $row = mysqli_num_rows($result);
    $user = mysqli_fetch_assoc($result);
    
    if ($row > 0) {
        $msg['statusCode'] = 200;
        $msg['data'] = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $msg['msg'] = 'Successfully login';
        $_SESSION['userID'] = $user['customerID'];
    } else {
        $msg['statusCode'] = 401;
        $msg['data'] = null;
        $msg['msg'] = 'Invalid credentials';
    }
} else {
    $msg['statusCode'] = 400;
    $msg['data'] = null;
    $msg['msg'] = 'Username and password is required.';
}

echo json_encode($msg);

?>