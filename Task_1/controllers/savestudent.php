<?php
	include_once("../controllers/common.php");
	include_once("../models/student.php");
	Database::connect('epiz_22945152_school', 'epiz_22945152', 'olnNi41HTgYctuS');
	$id = safeGet("id", 0);
	if($id==0) {
		Student::add(safeGet("name"));
	} else {
		$student = new Student($id);
		$student->name = safeGet("name");
		$student->save();
	}
	header('Location: ../students.php');
?>
