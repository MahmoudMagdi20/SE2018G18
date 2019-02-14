<?php
	include_once('./controllers/common.php');
	include_once('./components/head.php');
	include_once('./models/tutorial.php');
	Database::connect('shopping', 'root', '');
?>
<center>
  <button>
    <a href="addtutorial.php"> add video</a>
 </button>
 <form action="selectedmaterials.php" style="width:50%;" >
	 <input class="form-control mr-sm-2" type="text" name="keywords" placeholder="Search" aria-label="Search" value="<?=safeGet('keywords')?>" style="margin: 20px;">
	 <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
	 <hr class="my-4">
 </form>
</center>
<?php
$tutorials = Tutorial::all(safeGet('keywords'));
foreach ($tutorials as $tutorial) {
?>
<center>
  <br></br>
  <div class="dim" class="embed-responsive embed-responsive-16by9" style="width:50%;">
    <iframe class="embed-responsive-item"  src="<?=$tutorial->video?>" width="100%"frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <p style="text-align:center;"><?=$tutorial->name?></p>
  </div>
</center>
<?php } ?>
<?php include_once('./components/tail.php') ?>
