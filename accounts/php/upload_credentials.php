<?php
	include 'connection.php';
	session_start();

	$userID = $_SESSION['userID'];

	$pic = time() .'_'. $_FILES['image']['name'];
	$pic_size = $_FILES['image']['size'];
	$pic_type = $_FILES['image']['type'];

	$pic2 = time() .'_'. $_FILES['image2']['name'];
	$pic_size2 = $_FILES['image2']['size'];
	$pic_type2 = $_FILES['image2']['type'];

	$path = '../../assets/credentials/' . $pic;
	$path2 = '../../assets/credentials/' . $pic2;

if($pic_size>10 && $pic_size2>10){
	if($pic_size < 3097153 && $pic_size2<3097152){
		if(($pic_type == 'image/jpeg' || $pic_type == 'image/jpg' || $pic_type == 'image/png') && ($pic_type2 == 'image/jpeg' || $pic_type2 == 'image/jpg' || $pic_type2 == 'image/png')){
			if (move_uploaded_file($_FILES['image']['tmp_name'], $path)){
				if (move_uploaded_file($_FILES['image2']['tmp_name'], $path2)){
						$sql = "INSERT INTO tbl_credentials (`userID`, `front`, `back`) VALUES ('$userID','$pic', '$pic2')";
						if(mysqli_query($dbconn, $sql)){
							echo 'success';
						} else {
							echo 'dbfailed';
						}
				} else {
					echo 'imgfailed';
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
else if ($pic_size<10 && $pic_size2<10){
	echo 'done';
}

?>