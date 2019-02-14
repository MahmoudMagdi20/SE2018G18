<?php
  include('server.php');
	include_once('./models/product.php');
	Database::connect('shopping', 'root', '');
	Product::add($_POST['name'], $_POST['description'], $_POST['price'], "material", $_POST['image'], $_SESSION['id'],$_POST['category']);
  header('Location: materials.php');
?>
