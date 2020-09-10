<?php
require_once 'restricted.php';


?>
<link rel="stylesheet" type="text/css" href="style/admin.css?version=5">

<center>
<h1>System management</h1>


<ul>
		<li id="li">
			<a class="category" href="manage_game.php">Game</a>
		</li>
		<li id="li">
			<a class="category" href="manage_accessories.php">Accessories</a>
		</li>

</ul>


	
</center>

	<!-- <?php /*
      $sql1 = "SELECT * FROM game";
      $rst1 = querySQL($sql1);
      while ($game = mysqli_fetch_array($rst1)) { ?>
        <div class="game_detail">
          <div class="game_image">
            <a href="game_detail.php?gameID=<?= $game['game_id'] ?>">
            <img src='images\<?= $game['game_image']?>' width="150" height="150"> 
            </a>
          </div> <br>
          <div class="game_info"> 
            <?= $game['game_name'] ?> <br> <br>
          </div>     
        </div>
      <?php } ?>
      </div>
</div> */ ?>

