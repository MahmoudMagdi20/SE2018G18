<?php
	include_once('./controllers/common.php');
	include_once('./components/head.php');
	include_once('./models/tutorial.php');
	Database::connect('shopping', 'root', '');
  session_start();

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
    $name =  $_SESSION['username'];
  }
?>
	<form action="savetutorial.php" method="post">
    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">name</span>
      </div>
      <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="name">
    </div>
    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">video</span>
      </div>
      <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="video">
    </div>
		<br/>
		<div><input type="submit" value="Add"></div>
	</form>
<?php include_once('./components/tail.php') ?>
