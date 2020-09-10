<?php
require_once 'header.php'; 
?>

<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<title>Accessories</title>
	<link rel="stylesheet" type="text/css" href="style/style.css?version=18">
</head>



<body>
<img style="background-attachment: fixed;" id="backgroundimg" src="image/back2.jpg">
<div id="container">
  <center>
  <img width="1400" height="250" style="margin-top: 50px;" src="banner/banner.jpg">
</center>
</div>

<div id="sidemenu">
        <h3 style="color: white; margin-left: 20px;">Accessories</h3>
        <ul id="sidecontent">
           <?php
           include_once ('functions.php');
           $sql = "SELECT * FROM accessories";
           $result = querySQL($sql);
           while ($row = mysqli_fetch_array($result)) { ?>
           <li id="sidecontent"><a href="accessories_detail.php?AccessoriesID=<?= $row['accessories_id'] ?>"><?= $row['accessories_type'] ?></a></li>
           <?php } ?>
        </ul>
</div>

<div>
<form action="" method="POST">
<input id="searchac" required type="text" maxlength="30" placeholder="Search something here.." name="search">
<button id="searchbutac" type="submit" name="startsearch">🔎</button>
</form>
</div>

<div id="content">


  <?php
if(isset($_POST['startsearch']))
{
    $keyword = $_POST['search'];
    $qry = "SELECT * FROM item WHERE item_name LIKE '%$keyword%'";
    $result = querySQL($qry);
     ?>
    <h1 style="position: absolute; z-index: 9; color: white; font-size: 23px; margin-top: 110px; margin-left: 100px; font-family: arial;">Search result for "<?= $keyword?>" (<?= $result->num_rows ?> results) </h1>
     <?php

    if($result->num_rows == 0)
    { ?> 
    <script> 
        alert("Accessories not found!"); 
        window.location.href="";
    </script> 
    <?php } else { ?>
        <div id="index-content">
      <?php
      $sql1 = "SELECT * FROM item WHERE item_name LIKE '%$keyword%'";
      $rst1 = querySQL($sql1);
      while ($acc = mysqli_fetch_array($rst1)) { ?>
            <div class="accessories_detail">
          <div class="accessories_image">
            <img src='shopimage\<?= $acc['item_image']?>' width="200" height="180"> 
            </a>
          </div> <br>
          <div class="accessories_info"> 
            <h1 class="accessories_info"><?= $acc['item_name'] ?></h1> 
            <h1 style="font-size: 17px;" class="accessories_info">Price: <?= $acc['item_price']?> VND</h1>
             <br>
          </div>     
        </div>
      <?php } } } else { ?>
        </div>

    <?php
$sql1 = "SELECT * FROM item";
$rst1 = querySQL($sql1);
while ($item = mysqli_fetch_array($rst1)) { ?>
        <div class="accessories_detail">
          <div class="accessories_image">
            <img src='shopimage\<?= $item['item_image']?>' width="200" height="180"> 
            </a>
          </div> <br>
          <div class="accessories_info"> 
            <h1 class="accessories_info"><?= $item['item_name'] ?></h1> 
            <h1 style="font-size: 17px; color: orange" class="accessories_info">Price: <?= $item['item_price']?> VND</h1>
             <br>
          </div>     
        </div>
      <?php } } ?>
</div>


<div id="footer">
<h1 id="foot">COPYRIGHT by FPT Greenwich 2019</h1>
</body>

	
</div>
</html>