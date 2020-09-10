<?php
require_once 'header.php'; 
?>

<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<title>Phụ kiện - Trung Đức Gaming</title>
	<link rel="stylesheet" type="text/css" href="style/style.css?version=11">
</head>
<body>
<img id="backgroundimg" src="image/back2.jpg">

<div id="container">
  <center>
	<img width="1400" height="250" style="margin-top: 20px;" src="banner/banner.jpg">
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
            <div>
           <li id="sidecontent"><a href="accessories_detail.php?AccessoriesID=<?= $row['accessories_id'] ?>"><?= $row['accessories_type'] ?></a></li></div>
           <?php } ?>
        </ul>
</div>

<div id="accessories_content">
	<?php
      if (isset($_GET['AccessoriesID'])) {
      $AccessoriesID = $_GET['AccessoriesID'];
      $sql1 = "SELECT * FROM item WHERE item_type = '$AccessoriesID'";
      $rst1 = querySQL($sql1);
      $sql2 = "SELECT accessories_type FROM accessories WHERE accessories_id = '$AccessoriesID'";
      $rst2 = querySQL($sql2);
      $aname = mysqli_fetch_array($rst2);
      $accessories_name = $aname[0];
      while ($item = mysqli_fetch_array($rst1)) { ?>
        <div class="accessories_detail">
          <div class="accessories_image">
            <img src='shopimage\<?= $item['item_image']?>' width="200" height="180"> 
            </a>
          </div> <br>
          <div class="accessories_info"> 
            <h1 class="accessories_info"><?= $item['item_name'] ?></h1> 
            <h1 style="font-size: 17px;" class="accessories_info">Price: <?= $item['item_price']?> VND</h1>
             <br>
          </div>     
        </div>
      <?php } } 

      ?>
</div>
  



</div>