<?php
	include('conn.php');
	$id=$_GET['id'];
	mysqli_query($conn,"delete from events where id='$id'");
	if ($_SESSION['type'] == "01") {
		header("location:addmeet.php");
	} else {
		header("location:useraddmeet.php");
	}

?>