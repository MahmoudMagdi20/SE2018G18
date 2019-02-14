<?php
  include('server.php');
	include_once('./models/tutorial.php');
	Database::connect('shopping', 'root', '');
	Tutorial::add($_POST['name'], $_POST['video']);
  header('Location: tutorials.php');
?>
