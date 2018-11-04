<?php
	header('Content-Type: application/json; charset=utf-8');
	include_once("../models/grade.php");
	Database::connect('epiz_22945152_school', 'epiz_22945152', 'olnNi41HTgYctuS');
	$grade = new Grade($_GET['id']);
	$grade->delete();
	echo json_encode(['status'=>1]);
?>
