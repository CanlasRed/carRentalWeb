<?php
include 'connection.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: application/json");

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['password'];

$check = getExistingAccount($dbconn, $username);
	
if($check == 200){
    $msg['statusCode'] = 400;
    $msg['data'] = null;
    $msg['msg'] = 'The email is already in use';
} else {
    if (isset($firstName)
        && isset($lastName)
        && isset($phone)
        && isset($username) 
        && isset($password)) {
        $firstName = mysqli_real_escape_string($dbconn, htmlspecialchars(ucwords($firstName)));
        $lastName = mysqli_real_escape_string($dbconn, htmlspecialchars(ucwords($lastName)));
        $username = mysqli_real_escape_string($dbconn, htmlspecialchars(strtolower($username)));
        $password = mysqli_real_escape_string($dbconn, htmlspecialchars($password));
        $password = md5($password);
        $sql = "INSERT INTO tbl_customers
                    SET firstName = '".$firstName."',
                    lastName = '".$lastName."',
                    phone = '".$phone."',
                    username = '".$username."',
                    password = '".$password."'";

        $result = mysqli_query($dbconn, $sql);
        $id = mysqli_insert_id($dbconn);
        
        if ($id > 0) {
            $msg['statusCode'] = 200;
            $msg['data'] = getAccountByID($dbconn, $id);
            $msg['msg'] = 'Account successfully created.';

        } else {
            $msg['statusCode'] = 500;
            $msg['data'] = null;
            $msg['msg'] = 'Failed to create an account. ' . mysqli_error($conn);
        }
    } else {
        $msg['statusCode'] = 200;
        $msg['data'] = null;
        $msg['msg'] = 'First name, Last name, Phone, Username, and Password is required.';
    }
}

echo json_encode($msg);

function getAccountByID($conn, $id) {
    include 'connection.php';
    session_start();
    $sql = "SELECT
                customerID,
                firstName,
                lastName,
                phone,
                username,
                createdAt
            FROM tbl_customers
            WHERE customerID = '".$id."'";

    $result = mysqli_query($dbconn, $sql);
    $row = mysqli_fetch_assoc($result);
    $_SESSION['userID'] = $row['customerID'];
    
    return $row;
}

function getExistingAccount($conn, $username){
    include 'connection.php';
    $sql = "SELECT * FROM tbl_customers WHERE username = '".$username."'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($result);
    if($row > 0){
        return 200;
    } else {
        return 500;
    }
}

?>