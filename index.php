
<?php
//require_once 'header.php';
require_once 'functions.php'; 
session_start();
if(isset($_POST['username']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = md5($password);
	$sql = "SELECT * FROM admin WHERE admin_name = '$username' AND admin_password = '$password'";
	$res = querySQL($sql);
	$row = mysqli_fetch_array($res);
	if(is_array($row)){ 
		$_SESSION['username'] = $username;
		} else { ?>
			<script>
			alert("Username or password is incorrect!!!");
			window.location.href="index.php";
		</script> 
		<?php } } 
if(isset($_SESSION['username']))
{
	header("Location: manage_accessories.php");
}


		?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Ha Noi Gaming - An Online Shop for purchasing game account and accessories about games">
	<link rel="stylesheet" type="text/css" href="style/style.css?version=7">

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


<?php
 $qry = "SELECT * FROM game";
if(isset($_POST['startsearch']))
{
	$keyword = $_POST['search'];
	$qry .= " WHERE game_name LIKE '%$keyword%'";
	$result = querySQL($qry);
	?>
	<h1 style="position: absolute; z-index: 9; color: white; font-size: 23px; margin-top: 110px; margin-left: 100px; font-family: arial;">Search result for "<?= $keyword?>" (<?= $result->num_rows ?> results) </h1> 
	<?php
	if($result->num_rows == 0)
	{ ?> 
	<script> 
		alert("Game not found!"); 
		window.location.href="";
	</script> 
	<?php }	else { ?>
		<div id="index-content">
      <?php
      $sql1 = "SELECT * FROM game WHERE game_name LIKE '%$keyword%'";
      $rst1 = querySQL($sql1);
       } } ?>
    </div>
<form action="" method="POST">
<input id="search" required type="text" maxlength="30" placeholder="Search something here.." name="search">
<button id="searchbut" type="submit" name="startsearch">🔎</button>
</form>

</header>
<!-- <a href="https://store.steampowered.com/app/578080/PLAYERUNKNOWNS_BATTLEGROUNDS/" title="PUBG Home Page"><img style="float: right;" src="image/loader.gif"></a>  -->
<body>

	<!-- <iframe id="vid1" width="600" height="350" src="https://www.youtube.com/embed/hfjazBN0DwA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
	<img id="backgroundimg" src="image/back2.jpg">
	<div id="index-content">
      <?php

      $rst1 = querySQL($qry);
      while ($game = mysqli_fetch_array($rst1)) { ?>
        <div class="game_detail">
          <div class="game_image">
            <a href="game_detail.php?GameID=<?= $game['game_id'] ?>">
            <img id="gameimg" src='shopimage\<?= $game['game_image']?>' width="300" height="180"> 
            <h1 id="game_info"> 
            <?= $game['game_name'] ?>
          </h1> 
          </a>
		  </div>

            
          
        </div>
      <?php } ?>
    </div>




		


</body>
</html>