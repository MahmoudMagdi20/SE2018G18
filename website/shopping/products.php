<?php
	include_once('./controllers/common.php');
	include_once('./components/head.php');
	include_once('./models/product.php');
  include('server.php');
	Database::connect('shopping', 'root', '');


  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
  }
?>
    <center>
      <button class="btn btn-secondary btn-lg add">
				 Add products
			</button>
      <hr class="my-4">
      <form action="selectedproducts.php" style="width:50%;" >
				<input class="form-control mr-sm-2" type="text" name="keywords" placeholder="Search" aria-label="Search" value="<?=safeGet('keywords')?>" style="margin: 20px;">
        <select class="custom-select" id="inputGroupSelect01" name="category" style="margin: 20px;">
  	    	<option selected>Choose...</option>
  	    	<option value="Decorations">Decorations</option>
  	    	<option value="Accessories">Accessories</option>
  	    	<option value="Children clothing">Children clothing</option>
  				<option value="menclothing">men clothing</option>
  				<option value="womenclothing">women clothing</option>
  	  	</select>
				<button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
        <hr class="my-4">
			</form>
      <h1 class="display-4">select products' category</h1>
      <div class="row no-gutters">
        <div class="col-6 col-sm-2" style="margin: 20px;">
            <button type="button" name="button" class="btn btn-info select" id="Decorations">Decorations</button>
            <br></br>
            <img src="./images/flowers.png" class="card-img-top" >
        </div>
        <div class="col-6 col-sm-2" style="margin: 20px;">
            <button type="button" name="button" class="btn btn-info select" id="Accessories">Accessories</button>
            <br></br>
            <img src="./images/necklace.png" class="card-img-top" >
        </div>
        <div class="col-6 col-sm-2" style="margin: 20px;">
            <button type="button" name="button" class="btn btn-info select" id="Children">Children's clothing</button>
            <br></br>
            <img src="./images/child.png" class="card-img-top" >
        </div>
        <div class="col-6 col-sm-2" style="margin: 20px;">
            <button type="button" name="button" class="btn btn-info select" id="menclothing">men clothing</button>
            <br></br>
            <img src="./images/business-suit.png" class="card-img-top" >
        </div>
        <div class="col-6 col-sm-2" style="margin: 20px;">
            <button type="button" name="button" class="btn btn-info select" id="womenclothing">women clothing</button>
            <br></br>
            <img src="./images/dress.png" class="card-img-top" >
        </div>
        <div class="col-6 col-sm-2" style="margin: 20px;">
            <button type="button" name="button" class="btn btn-info select" id="knitwear">knitwear</button>
            <br></br>
            <img src="./images/ball-of-wool.png" class="card-img-top" >
        </div>
        <div class="col-6 col-sm-2" style="margin: 20px;">
            <button type="button" name="button" class="btn btn-info select" id="toys">toys' parts</button>
            <br></br>
            <img src="./images/car.png" class="card-img-top" >
        </div>
      </div>
    </center>

<?php include_once('./components/tail.php') ?>
<script type="text/javascript">
$(document).ready(function() {
  $('.select').click(function(event) {
    window.location.href = "selectedproducts.php?category="+$(this).attr('id');
  });
  $('.add').click(function(event) {
    window.location.href = "addproduct.php";
  });
});
</script>
