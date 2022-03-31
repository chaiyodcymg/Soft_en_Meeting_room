<?php

include('conn.php');


$title = $_POST['title'];
$head = $_POST['head'];
$numattend = $_POST['numattend'];
$listname = $_POST['listname'];
$roomid = $_POST['roomid'];
$start = $_POST['start'];
$end = $_POST['end'];
$addequipment = $_POST['addequipment'];
$remark = $_POST['remark'];

$file = $_FILES['meetfile'];
$filename = $_FILES["meetfile"]["name"];
$filTmpename = $_FILES["meetfile"]["tmp_name"];
$fileExt = explode(".", $filename);
$fileAcExt = strtolower(end($fileExt));
$newFilename = time() . "." . $fileAcExt;
$fileDes = 'upload/' . $newFilename;
move_uploaded_file($filTmpename, $fileDes);
$meetfilelocation = $fileDes;



$result = mysqli_query(
	$conn,
	"SELECT *  FROM events  WHERE  roomid='$roomid' AND ('$start' BETWEEN  start AND end  OR '$end' BETWEEN  start AND end 
OR  start BETWEEN  '$start' AND ' $end ' OR  end BETWEEN  '$start' AND '$end' )

UNION  

	SELECT * FROM events  WHERE roomid<>'$roomid' AND ('$start' BETWEEN  start AND end  OR '$end' BETWEEN  start AND end 
OR  start BETWEEN  '$start' AND ' $end ' OR  end BETWEEN  '$start' AND '$end' ) AND head = '$head'"
);


if (mysqli_num_rows($result) > 0) {
	echo "<script>alert('ห้องประชุมนี้ มีการจองในเวลานี้แล้ว')</script>";
	echo "<script>window.open('addmeet.php','_self')</script>";
} else {

	mysqli_query($conn, "insert into events (title, head, numattend, listname, roomid, start, end, addequipment, remark, meetfile) values 
	( '$title','$head','$numattend','$listname','$roomid','$start','$end','$addequipment','$remark','$meetfilelocation')");
	session_start();


	if ($_SESSION['type'] == "01") {
		header("location:addmeet.php");
	} else {
		header("location:useraddmeet.php");
	}
}
// 
