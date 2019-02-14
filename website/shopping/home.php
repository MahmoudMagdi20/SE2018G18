<?php
  include_once('./components/head.php');
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
    $name =  $_SESSION['username'];
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>


<div class="mainCard">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="home.php?logout='1'" class="btn btn-danger">logout</a> </p>
    <?php endif ?>
</div>

<h1 class="display-4" style=" text-align: center;" >Why use our website</h1>
<div class="container" style="width:400px;">


<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./images/1.jpg" class="d-block w-100" alt="..." width="100" height="400">
        <div class="carousel-caption d-none d-md-block ">
          <h5 class="dim" >Tutorials</h5>
          <p class="dim">You will learn from people experinced with making handcrafts how to start making your own and what will you need</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./images/2.jpg" class="d-block w-100" alt="..." width="100" height="400">
        <div class="carousel-caption d-none d-md-block " >
          <h5 class="dim">Selling products</h5>
          <p class="dim">Through us you will  easily market your products and contact those who are interested</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./images/3.jpg" class="d-block w-100" alt="..." width="100" height="400">
        <div class="carousel-caption d-none d-md-block " >
          <h5 class="dim">Providing materials</h5>
          <p class="dim">You will be able to find any material you need for your hadncraft in our webiste and it will reach you in no time</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</div>
<?php include_once('./components/tail.php') ?>
