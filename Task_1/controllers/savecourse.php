<?php
	include_once("../controllers/common.php");
	include_once("../models/course.php");
	Database::connect('epiz_22945152_school', 'epiz_22945152', 'olnNi41HTgYctuS');
	$id = safeGet("id", 0);
	if($id==0) {
		Course::add(safeGet("name"),safeGet("max_degree"),safeGet("study_year"));
	} else {
		$course = new Course($id);
		$course->name = safeGet("name");
    $course->max_degree = safeGet("max_degree");
    $course->study_year = safeGet("study_year");
    $course->save();
	}
	header('Location: ../courses.php');
?>
