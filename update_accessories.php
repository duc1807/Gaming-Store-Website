
<?php
require_once 'restricted.php';
require_once 'adminheader.php';
$id = $_POST['id'];
$qry= "SELECT * FROM item WHERE item_id = '$id'";
$result = querySQL($qry);
$row = mysqli_fetch_array($result);
    $name = $row['item_name'];
    $price = $row['item_price'];
    $image = $row['item_image'];

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = "";

    if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {	
        $temp_name = $_FILES['image']['tmp_name'];
        $img_name = $_FILES['image']['name'];
        $parts = explode(".", $img_name);
        $lastIndex = count($parts) - 1;
        $extension = $parts[$lastIndex];
        $image = $name . "." . $extension;
        $img_url = $_SERVER['DOCUMENT_ROOT'] . "/shoponline/shopimage/";
        $destination = $img_url . $image;
        move_uploaded_file($temp_name, $destination);
        }
    else{ 
            $image = $row['item_image'];
    }

$query2 = "UPDATE item SET item_name = '$name', item_price= '$price', item_image = '$image' WHERE item_id = '$id'";
$result2 = querySQL($query2);
if($result2) { ?>
<script>
    alert("Successfully");
    window.location.href = "manage_accessories.php?AccessoriesID=<?= $row['item_type']?>";
</script>
<?php } else { ?>
<script>
    alert("Failed");
    window.location.href= "manage_accessories.php";
</script> <?php } }  ?>


<center>
<form action="" method="POST" class="update_form" enctype="multipart/form-data">
    <fieldset>
        <legend> Update Accessories </legend>
        Accessories name : <input value="<?= $name?>" type="text" required maxlength="30" size="35" name="name"><BR><BR>
        Price : <input value="<?= $price?>" type="number" required name="price"> VND<BR><BR>
        Image : <BR> <img  width="170" height="150" src = 'shopimage\<?= $row['item_image']?>'> <BR><BR>
        <input type="file" name="image"> <BR><BR>   
        <input type="hidden" name="id" value="<?= $id?>">
        <input type="submit" value="Update" name="update"><BR>
    </fieldset>
</form>
</center>




