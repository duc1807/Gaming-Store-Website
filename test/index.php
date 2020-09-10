<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style.css?version=8">

	<title>Gaming Home</title>


</head>

<header>
<ul class="ul">
	<li class="dropdown"><a href="index.php" class="but">Home</a></li>
	<li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Game</a>
    	<div class="dropdown-content">
    		<?php
    		$qry2 = "SELECT * FROM game";
    		$rst2 = querySQL($qry2);
    		while ($row = mysqli_fetch_array($rst2)) { ?>
    			<a href="game_detail.php?GameID=<?= $row['game_id']?>"><?= $row['game_name']?>
    			</a>
    		<?php } ?>
    	</div>
	</li>
	<li class="dropdown">
		<a href="accessories.php" class="but">Accessories</a>
	</li>
	<li class="dropdown">
		<a href="#lienhe.php" class="but">Contact</a>
	</li>
</ul>

<div class="dropdown">
		<button type="button" class="but" id="loginbut" onclick="openform();">Login</a>
</div>

<div class="form_popup" id="form">
  <form action="" method="POST">
  <button type="button" id="cancel" onclick="closeform();">X</button>
    <h1 style="color: white; margin-left: 20px; font-family: Arial, Helvetica, sans-serif;">Login</h1>

    <label style="color: white; margin-left: 20px; font-family: Arial, Helvetica, sans-serif;" for="email"><b>Email: </b></label><BR><BR>
    <input style="width: 200px; height: 30px; margin-left: 20px; border-radius: 4px; padding: 8px 12px;" type="text" placeholder="Enter Username" name="username" required><BR><BR>

    <label style="color: white; margin-left: 20px; font-family: Arial, Helvetica, sans-serif;" for="psw"><b>Password: </b></label><BR><BR>
    <input type="password" style="width: 200px; height: 30px; margin-left: 20px; border-radius: 4px; padding: 8px 12px;" placeholder="Enter Password" name="password" required><BR><BR>

    <button style="font-size: 17px; padding: 8px; box-shadow: none; border-radius: 70px; width: 150px; margin-left: 50px" type="submit" id="login">Login</button><BR><BR>
    
  </form>
</div>