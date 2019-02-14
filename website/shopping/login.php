<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Make & Trade</title>
  <link rel="stylesheet" type="text/css" href="./style/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css" integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA" crossorigin="anonymous">
  <link rel="icon" href="./images/cart.png">
</head>
<body>
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4">Make & Trade</h1>
      <p class="lead">Make & Trade is an online market for handmade crafts. In Make & Trade users can sell their handmade products , share their experience by uploading tutorials for other users to see or even buy material needed to make their products.</p>
      <p class="lead">We aim to help youth earn thir living buy making simple handmade crafts, by providing them with materials from our supplier and tutorials to guide them.</p>
      <hr class="my-4">
      <div class="header">
      	<h2>Login</h2>
      </div>

      <form method="post" action="login.php">
      	<?php include('errors.php'); ?>
      	<div class="input-group">
      		<label>Username</label>
      		<input type="text" name="username" >
      	</div>
      	<div class="input-group">
      		<label>Password</label>
      		<input type="password" name="password">
      	</div>
      	<div class="input-group">
      		<button type="submit" class="btn" name="login_user">Login</button>
      	</div>
      	<p>
      		Not yet a member? <a href="register.php">Sign up</a>
      	</p>
      </form>

    </div>
  </div>


</body>
</html>
