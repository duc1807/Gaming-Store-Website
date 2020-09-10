<?php
require_once 'adminheader.php';

$qry = "SELECT * FROM accessories";
$result = querySQL($qry);
if(isset($_POST['add']))
{
	$type = $_POST['type'];
	$qry3 = "SELECT * FROM accessories WHERE accessories_type = '$type'";
	$rst3 = querySQL($qry3);
	if ($rst3->num_rows == 0) {
			$qry = "INSERT accessories(accessories_type)
			VALUES ('$type')";
			$res = querySQL($qry);
	 		?>
				<script>
					alert("Add new accessories type successfully");
					window.location.href = "manage_type.php";
				</script>
	<?php }   else
	{ ?>
		<script>
			alert("This type has already existed!");
			window.location.href = "manage_type.php";
		</script>
<?php } }
?>

<center>

	<form style="width: fit-content; margin-top: 60px;" required 
action="" method="POST">
<fieldset>
    <legend>Add accessories type</legend>
    Type name: <input required="" type="text" name="type" maxlength="15"><BR><BR>
    <input type="submit" value="Add" name="add">
</fieldset>
</form>

<table class="tbl" border="1">
	<tr>
		<th>ID</th>
		<th>Type</th>
		<th>Option</th>
	</tr>
		<?php 
		while($row = mysqli_fetch_array($result)) {
		?>
		<tr>
			<td><?php echo $row[0]; ?></td>
			<td><?php echo $row['accessories_type']; ?></td>
			<td> 
				<form class="option" action="update_at.php" method="POST">
					<input type="hidden" name="id" value="<?= $row[0] ?>">
					<input type="submit" value="Update">
			    </form>
				<form class="option" action="delete_at.php" method="POST"
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
		var del = confirm("Do you want to delete this accessories type?");
		if (del)
			return true;
		else
			return false;
	}
</script>