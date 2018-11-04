<?php
	header('Content-Type: application/json; charset=utf-8');
	include_once("../models/student.php");
	Database::connect('epiz_22945152_school', 'epiz_22945152', 'olnNi41HTgYctuS');
	$student = new Student($_GET['id']);
	$student->delete();
	echo json_encode(['status'=>1]);
?>
