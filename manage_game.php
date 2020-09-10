<?php
require_once 'adminheader.php';
require_once 'restricted.php';


$sql = "SELECT * FROM game";
$result = querySQL($sql);
?>

<center>

<table class="tbl" border="1">
	<tr>
		<th>ID</th>
		<th>Game</th>
		<th>Description</th>
		<th>Price</th>
		<th>Image</th>
		<th>Video code</th>
		<th>Option</th>
	</tr>
		<?php 
		while($row = mysqli_fetch_array($result)) {
		?>
		<tr>
			<td><?php echo $row[0]; ?></td>
			<td><?php echo $row[1]; ?></td>
			<td><?= $row[2] ?></td>
			<td><?= $row[3] ?> VND</td>
			<td> 
			<img src='shopimage\<?= $row['game_image'] ?>' width="200" height="100">
			 </td>
			 <td style="text-align: center;"><iframe id="vid1" width="200" height="100" src="https://www.youtube.com/embed/<?= $row['game_link']?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><BR>
			 	<?= $row[5]?></td>
			<td> 
				<form class="option" action="update_game.php" method="POST">
					<input type="hidden" name="id" value="<?= $row[0] ?>">
					<input type="submit" value="Update">
			    </form>
				<form class="option" action="delete_game.php" method="POST"
				 onsubmit="return confirmDelete();">
					<input type="hidden" name="id" value="<?= $row[0] ?>">
					<input type="submit" value="Delete">
			    </form>
			</td>
		</tr>
		<?php } ?>
</table>
</center>

<script>
	function confirmDelete() {
		var del = confirm("Do you want to delete this game?");
		if (del)
			return true;
		else
			return false;
	}
</script>

