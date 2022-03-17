<?php
	include 'connection.php';
	$sql = "SELECT * FROM tbl_rental WHERE status = 'pending' AND ownerID = 1";
	$result = mysqli_query($dbconn, $sql);
	$pendings = mysqli_num_rows($result);
?>