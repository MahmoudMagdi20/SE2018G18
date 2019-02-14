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
		<center>
			<div class="row no-gutters">
		<?php
		$products = Product::all(safeGet('keywords'),"material", $_GET['category']);
		foreach ($products as $product) {
		?>
				<div class="col-6 col-md-4">
					<div class="card" >
						<img src="<?=$product->image?>" class="card-img-top" >
						<div class="card-body">
							<h5 class="card-title"><?=$product->name?></h5>
							<p class="card-text"><?=$product->description?></p>
							<p class="card-text"><?=$product->mobile?></p>
						</div>
						<div class="card-footer">
							<small class="text-muted">price <?=$product->price?> LE</small>
						</div>
					</div>
				</div>

		<?php } ?>
			</div>
		</center>


<?php include_once('./components/tail.php') ?>
