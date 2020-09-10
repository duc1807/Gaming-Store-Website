<?php
require_once 'header.php';

?>
<link rel="stylesheet" type="text/css" href="style/style.css?version=5">
	<img id="backgroundimg" src="image/back2.jpg">

<div id="game_content">
	<?php if(isset($_GET['GameID'])) {
		$GameID = $_GET['GameID'];
		$qry = "SELECT * FROM game WHERE game_id = '$GameID'";
		$rst = querySQL($qry);
		while ($row = mysqli_fetch_array($rst)) { ?>
			<h1 class="game_title"><?= $row['game_name']?></h1>
			<p class="game_des"><?= $row['game_description']?></p>

			<h2 class="game_pr">Price: <?= $row['game_price']?> VND</h2>


			<iframe id="vid1" width="600" height="350" src="https://www.youtube.com/embed/<?= $row['game_link']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
	<?php } } ?>	

</div>