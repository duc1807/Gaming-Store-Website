<!-- 

$email = $_POST['email'];
$password = $_POST['password'];
$check = "SELECT * FROM user WHERE uername = '$email' AND passsword = '$password'";
$result = querySQL($check);
$row = mysqli_fetch_array($result);
if(is_array($row))
{
	header("Location: index.php");
} -->
<?php
require_once 'functions.php'; 

/* session_start();

if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password = md5($password); 
$qry = "SELECT * FROM user WHERE user_name = '$username' AND password = '$password'";
$result = querySQL($qry);
$row = mysqli_fetch_array($result);
if (is_array($row)) {  
$_SESSION['username'] = $username; 
} else { ?>
   <script type="text/javascript">
   	  alert("Can not log in, please recheck your usernam/password!");
   	  window.location.href = ""
   </script>
<?php } } 
//check nếu người dùng đã login thì sẽ direct thẳng vào trang home
if (isset($_SESSION['username'])) {
   header("Location: admin.php");
}
?>
 */
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/style.css?version=2">

	<title>Gaming Home</title>


</head>
<body>
<header>
<ul class="ul">
	<li class="dropdown"><a href="#home.php" class="but">Home</a></li>
	<li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">Game</a>
    	<div class="dropdown-content">
      		<a href="pubg.php">Player Unknown's Battlegrounds</a>
      		<a href="add_student.php">Counter-Strike: Global Offensive</a>
      		<a href="add_student.php">ARK: Survival Evolved</a>
      		<a href="add_student.php">Grand Theft Auto V</a>
    	</div>
	</li>
	<li class="dropdown">
		<a href="phukien.php" class="but">Accessories</a>
	</li>
	<li class="dropdown">
		<a href="#lienhe.php" class="but">Contact</a>
	</li>
	<li class="dropdown">
		<a href="#lienhe.php" id="intro">SHOP GAME UY TÍN SỐ 1 HÀ NỘI - HOTLINE : 098.888.8888</a>
	</li>

	<li class="dropdown">
		<button type="button" class="but" id="login" onclick="openform();">Login</a>
	</li>
</ul>


<div class="form_popup" id="form">
  <form action="index.php" method="POST">
  <button type="button" id="cancel" onclick="closeform();">X</button>
    <h1 style="color: white; margin-left: 20px; font-family: Arial, Helvetica, sans-serif;">Login</h1>

    <label style="color: white; margin-left: 20px; font-family: Arial, Helvetica, sans-serif;" for="email"><b>Email: </b></label><BR><BR>
    <input style="width: 200px; height: 30px; margin-left: 20px; border-radius: 4px; padding: 8px 12px;" type="text" placeholder="Enter Username" name="username" required><BR><BR>

    <label style="color: white; margin-left: 20px; font-family: Arial, Helvetica, sans-serif;" for="psw"><b>Password: </b></label><BR><BR>
    <input style="width: 200px; height: 30px; margin-left: 20px; border-radius: 4px; padding: 8px 12px;" placeholder="Enter Password" name="password" required><BR><BR>

    <button style="font-size: 17px; padding: 8px; box-shadow: none; border-radius: 70px; width: 150px; margin-left: 50px" type="submit" id="login">Login</button><BR><BR>
    
  </form>
</div>
</header>
<!-- <a href="https://store.steampowered.com/app/578080/PLAYERUNKNOWNS_BATTLEGROUNDS/" title="PUBG Home Page"><img style="float: right;" src="image/loader.gif"></a>  -->


	<!-- <iframe id="vid1" width="600" height="350" src="https://www.youtube.com/embed/hfjazBN0DwA" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
	<img id="backgroundimg" src="image/back2.jpg">
<div>
	<img class = "img" width="300" height="180" src="image/pu.jpg">
	<img class = "img" width="300" height="180" src="image/ark.jpg">
	<img class = "img1" width="300" height="180" src="image/cs.jpg">
	<img class = "img1" width="300" height="180" src="image/gta.jpg">
</div>




		


</body>
</html>