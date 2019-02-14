<?php
	include_once('./controllers/common.php');
	include_once('./components/head.php');
	include_once('./models/product.php');
	Database::connect('shopping', 'root', '');
  session_start();

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
    $name =  $_SESSION['username'];
  }
	if (!$_SESSION['is_supplier']) {
    $_SESSION['msg'] = "You must have supplier account to add material";
    header('location: notsupplier.php');
  }
?>
	<form action="savematerial.php" method="post">
    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">name</span>
      </div>
      <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="name">
    </div>
    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">description</span>
      </div>
      <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="description">
    </div>
    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">price</span>
      </div>
      <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="price">
    </div>
    <div class="input-group input-group-sm mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text" id="inputGroup-sizing-sm">image url</span>
      </div>
      <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" name="image">
    </div>
		<div class="input-group mb-3">
	  	<div class="input-group-prepend">
	    	<label class="input-group-text" for="inputGroupSelect01">category</label>
	  	</div>
	  	<select class="custom-select" id="inputGroupSelect01" name="category">
	    	<option selected>Choose...</option>
	    	<option value="toysparts">toys parts</option>
	    	<option value="Accessoriesparts">Accessories parts</option>
	    	<option value="tools">tools</option>
				<option value="machines">machines</option>
				<option value="knitwearparts">knitwear parts</option>
				<option value="cloth">cloth</option>
				<option value="wood">wood</option>
				<option value="metal">metal</option>
	  	</select>
		</div>
		<br/>
		<div><input type="submit" value="Add"></div>
	</form>
<?php include_once('./components/tail.php') ?>
