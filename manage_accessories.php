<?php
require_once 'adminheader.php';
require_once 'restricted.php';
?> <center><img width="500" height="300" style="margin-top: -10px" src="image/system.jpg"></center> <?php

if (isset($_GET['AccessoriesID'])) {
$AccessoriesID = $_GET['AccessoriesID'];
$sql = "SELECT * FROM item WHERE item_type = '$AccessoriesID'";
$rst = querySQL($sql); ?>
<center>

<form style="width: fit-content; margin-top: 60px;" required 
action="" method="POST" enctype="multipart/form-data">
<fieldset>
	<?php 
	$sql1="SELECT * FROM accessories WHERE accessories_id = '$AccessoriesID'";
	$rst1= querySQL($sql1);
	while($row= mysqli_fetch_array($rst1)) { ?>
    <legend>Add <?= $row['1']?></legend>
<?php } ?>
    Product name: <input tpye="text" name="name" maxlength="30"><BR><BR>
    Price: <input type="text" name="price"> VND<BR><BR>
    Image: <BR><input type="file" required name="image"><BR><BR>
    <input type="submit" value="Add" name="add">
</fieldset>
</form>

	
<table class="tbl" border="1">
	<tr>
		<th>ID</th>
		<th>Type</th>
		<th>Name</th>
		<th>Price</th>
		<th>Image</th>	
		<th>Option</th>
	</tr>
		<?php 
		while($row = mysqli_fetch_array($rst)) {
		?>
		<tr>
			<td><?php echo $row[0]; ?></td>
			<td><?php echo $row[1]; ?></td>
			<td><?php echo $row[2]; ?></td>
			<td><?= $row[3]?> VND</td>
			<td>
				<img src='shopimage/<?= $row['item_image'] ?>' width="120" height="100">
			 </td>
			<td> 
				<form class="option" action="update_accessories.php" method="POST">
					<input type="hidden" name="id" value="<?= $row['item_id'] ?>">
					<input type="submit" value="Update">
			    </form>
				<form class="option" action="delete_accessories.php" method="POST"
				 onsubmit="return confirmDelete();">
					<input type="hidden" name="id" value="<?= $row[0] ?>">
					<input type="submit" value="Delete">
			    </form>
			</td>
		</tr>
		<?php } ?>
</table>
</center>

<?php
if(isset($_POST['add']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = "";
    //code upload & xử lý ảnh
    if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {	
        //khai báo biến dùng để lưu file ảnh vào đường dẫn tạm thời
        $temp_name = $_FILES['image']['tmp_name'];
        //khai báo biến dùng để lưu tên của ảnh
        $img_name = $_FILES['image']['name'];
        //tách tên file ảnh dựa vào dấu chấm
        $parts = explode(".", $img_name);
        //tìm index cuối cùng
        $lastIndex = count($parts) - 1;
        //lấy ra extension (đuôi) file ảnh
        $extension = $parts[$lastIndex];
        //thiết lập tên mới cho ảnh
        $image = $name . "." . $extension;
        //thiết lập địa chỉ file ảnh cần di chuyển đến
        $img_url = $_SERVER['DOCUMENT_ROOT'] . "/shoponline/shopimage/";
        $destination = $img_url . $image;
        //di chuyển file ảnh từ đường dẫn tạm thời đến địa chỉ đã thiết lập
        move_uploaded_file($temp_name, $destination);
}
$sql3 = "SELECT * FROM accessories WHERE accessories_id = '$AccessoriesID'";
$rst3 = querySQL($sql3);
$sql = "INSERT item(item_type, item_name, item_price, item_image)
        VALUES ('$AccessoriesID', '$name', '$price', '$image')";
$run  = querySQL($sql);
if($run) { ?>
    <script>
        alert("Successful");
        window.location.href = "manage_accessories.php?AccessoriesID=<?= $AccessoriesID ?>";
    </script> 
    <?php } } ?>

<script>
	function confirmDelete() {
		var del = confirm("Do you want to delete this product?");
		if (del)
			return true;
		else
			return false;
	}
</script>


<?php } ?>