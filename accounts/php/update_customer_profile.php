<?php
include 'connection.php';

$customerID = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['customerID']));
$lastName = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['lastName']));
$firstName = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['firstName']));
$phone = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['phone']));

$address = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['address']));
$lat = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['lat']));
$lng = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['lng']));

$pic = time() .'_'. $_FILES['image']['name'];
$pic_size = $_FILES['image']['size'];
$pic_type = $_FILES['image']['type'];

$path = '../../assets/user-image/' . $pic;


if($pic_size>10){
	if($pic_size < 1097153){
		if($pic_type == 'image/jpeg' || $pic_type == 'image/jpg' || $pic_type == 'image/png'){
			if (move_uploaded_file($_FILES['image']['tmp_name'], $path)){
				$sql = "UPDATE tbl_users SET firstName = '$firstName', lastName = '$lastName', image = '$pic', phone = '$phone', address = '$address', lat = '$lat', lng = '$lng' WHERE userID = '$customerID' ";
				if(mysqli_query($dbconn, $sql)){
					echo 'success';
				} else {
					echo 'dbfailed';
				}
			} else {
				echo 'imgfailed';
			}
		} else {
			echo 'WT';
		}

	} else {
		echo 'SL';
	}
}
else if ($pic_size<10){
	$sql = "UPDATE tbl_users SET firstName = '$firstName', lastName = '$lastName', phone = '$phone', address = '$address', lat = '$lat', lng = '$lng' WHERE userID = '$customerID' ";
	if(mysqli_query($dbconn, $sql)){
		echo 'success';
	} else {
		echo 'dbfailed';
	}
}

?>