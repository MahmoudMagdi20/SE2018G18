<?php
	header('Content-Type: application/json; charset=utf-8');
	include_once("../models/course.php");
	Database::connect('epiz_22945152_school', 'epiz_22945152', 'olnNi41HTgYctuS');
	$course = new Course($_GET['id']);
	$course->delete();
	echo json_encode(['status'=>1]);
?>