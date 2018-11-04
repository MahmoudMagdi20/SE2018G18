<?php
	include_once("../controllers/common.php");
	include_once("../models/grade.php");
	Database::connect('epiz_22945152_school', 'epiz_22945152', 'olnNi41HTgYctuS');
	$id = safeGet("id", 0);
	if($id==0) {
		Grade::add(safeGet("student_id"),safeGet("course_id"),safeGet("degree"),safeGet("examine_at"));
	} else {
		$grade = new Grade($id);
    $grade->student_id = safeGet("student_id");
    $grade->course_id = safeGet("course_id");
    $grade->degree = safeGet("degree");
    $grade->examine_at = safeGet("examine_at");
    $grade->save();
	}
	header('Location: ../grades.php');
?>
