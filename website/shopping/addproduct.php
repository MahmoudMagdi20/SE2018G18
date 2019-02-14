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
?>
	<form action="saveproduct.php" method="post">
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
	    	<option value="Decorations">Decorations</option>
	    	<option value="Accessories">Accessories</option>
	    	<option value="Children clothing">Children clothing</option>
				<option value="menclothing">men clothing</option>
				<option value="womenclothing">women clothing</option>
	  	</select>
		</div>
		<br/>
		<div><input type="submit" value="Add"></div>
	</form>
<?php include_once('./components/tail.php') ?>
