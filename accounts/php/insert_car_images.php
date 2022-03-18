<?php
	include 'connection.php';
	session_start();

	$carID = $_POST['carID'];
	$title = mysqli_real_escape_string($dbconn, htmlspecialchars($_POST['title']));
	$pic = time() .'_'. $_FILES['image']['name'];
	$pic_size = $_FILES['image']['size'];
	$pic_type = $_FILES['image']['type'];

	$path = '../../assets/cars/' . $pic;

if($pic_size>10){
	if($pic_size < 3097153){
		if($pic_type == 'image/jpeg' || $pic_type == 'image/jpg' || $pic_type == 'image/png'){
			if (move_uploaded_file($_FILES['image']['tmp_name'], $path)){
				$sql = "INSERT INTO tbl_car_image (`carID`, `title`, `image`) VALUES ('$carID','$title', '$pic')";
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
	echo 'done';
}

	// $sql = "UPDATE tbl_meduse SET
	// 		medicinalUse = '$meduse'
	// 		WHERE meduseID = '$meduseID' AND plantID = '$plantID' ";
	// if(mysqli_query($dbconn, $sql)){
	// 	echo 'success';
	// } else {
	// 	echo 'dbfailed';
	// }

?>