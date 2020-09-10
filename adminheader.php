<?php
require_once 'functions.php';
/* require_once 'restricted.php'; */
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <link rel="stylesheet" type="text/css" href="style\admin.css?vesion=11">
  <!--them version=1 de moi lan load thay doi -> code css load nhanh hon-->
  <meta charset="utf-8">
</head>
<body>
<ul>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Game</a>
    <div class="dropdown-content">
      <a href="manage_game.php">Manage Game</a>
      <a href="add_game.php">Add Game</a>
    </div>
  </li>
  <li class="dropdown">
    <a href="manage_type.php" href="javascript:void(0)" class="dropbtn">Accessories</a>
    <div class="dropdown-content">
      <?php
      $qry = "SELECT * FROM accessories";
      $res = querySQL($qry);
      while ($row = mysqli_fetch_array($res)) { ?>
      <a href="manage_accessories.php?AccessoriesID=<?= 
      $row['accessories_id']?>"> <?= $row['accessories_type']?></a> <?php } ?>
    </div>
  </li>
  <li><a href = "logout.php">Logout</a></li>
</ul>
<center>
<h1 id="h1ad">SHOP ONLINE MANAGEMENT</h1>
</center>
</body>
</html>