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
				 Add materials
			</button>
			<hr class="my-4">
			<form action="selectedmaterials.php" style="width:50%;" >
				<input class="form-control mr-sm-2" type="text" name="keywords" placeholder="Search" aria-label="Search" value="<?=safeGet('keywords')?>" style="margin: 20px;">
				<select class="custom-select" id="inputGroupSelect01" name="category" style="margin: 20px;">
		    	<option selected>Choose category</option>
		    	<option value="toysparts">toys parts</option>
		    	<option value="Accessoriesparts">Accessories parts</option>
		    	<option value="tools">tools</option>
					<option value="machines">machines</option>
					<option value="knitwearparts">knitwear parts</option>
					<option value="cloth">cloth</option>
					<option value="wood">wood</option>
					<option value="metal">metal</option>
		  	</select>
				<button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
        <hr class="my-4">
			</form>
			<h1 class="display-4">select materials' category</h1>
      <div class="row no-gutters">
        <div class="col-6 col-sm-2" style="margin: 20px;">
            <button type="button" name="button" class="btn btn-info select" id="toys">toys' parts</button>
            <br></br>
            <img src="./images/car.png" class="card-img-top" >
        </div>
        <div class="col-6 col-sm-2" style="margin: 20px;">
            <button type="button" name="button" class="btn btn-info select" id="Accessories">Accessories parts</button>
            <br></br>
            <img src="./images/necklace.png" class="card-img-top" >
        </div>
        <div class="col-6 col-sm-2" style="margin: 20px;">
            <button type="button" name="button" class="btn btn-info select" id="tools">tools</button>
            <br></br>
            <img src="./images/tools.png" class="card-img-top" >
        </div>
				<div class="col-6 col-sm-2" style="margin: 20px;">
            <button type="button" name="button" class="btn btn-info select" id="machines">machines</button>
            <br></br>
            <img src="./images/drill.png" class="card-img-top" >
        </div>
				<div class="col-6 col-sm-2" style="margin: 20px;">
            <button type="button" name="button" class="btn btn-info select" id="knitwearparts">knitwear parts</button>
            <br></br>
            <img src="./images/ball-of-wool.png" class="card-img-top" >
        </div>
				<div class="col-6 col-sm-2" style="margin: 20px;">
            <button type="button" name="button" class="btn btn-info select" id="cloth">cloth</button>
            <br></br>
            <img src="./images/wrapping.png" class="card-img-top" >
        </div>
				<div class="col-6 col-sm-2" style="margin: 20px;">
            <button type="button" name="button" class="btn btn-info select" id="wood">wood</button>
            <br></br>
            <img src="./images/log.png" class="card-img-top" >
        </div>
				<div class="col-6 col-sm-2" style="margin: 20px;">
            <button type="button" name="button" class="btn btn-info select" id="metal">metal</button>
            <br></br>
            <img src="./images/metal.png" class="card-img-top" >
        </div>

      </div>
    </center>

<?php include_once('./components/tail.php') ?>
<script type="text/javascript">
$(document).ready(function() {
  $('.select').click(function(event) {
    window.location.href = "selectedmaterials.php?category="+$(this).attr('id');
  });
	$('.add').click(function(event) {
    window.location.href = "addmaterial.php";
  });
});
</script>
