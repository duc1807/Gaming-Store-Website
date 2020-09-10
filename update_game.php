<?php
require_once 'restricted.php';
require_once 'adminheader.php';
$id = $_POST['id'];
$qry= "SELECT * FROM game WHERE game_id = '$id'";
$result = querySQL($qry);
$row = mysqli_fetch_array($result);
    $name = $row['game_name'];
    $description = $row['game_description'];
    $price = $row['game_price'];
    $image = $row['game_image'];
    $link = $row['game_link'];

if(isset($_POST['update']))
{
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = "";
    $link = $_POST['link'];
    //code upload & xử lý ảnh
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
            $image = $row['game_image'];
    }
    $qry3 = "SELECT * FROM game WHERE game_name = '$name'";
    $rst3 = querySQL($qry3);
    if($rst3->num_rows == 0)
    {


        $query2 = "UPDATE game SET game_name = '$name', game_description = '$description',
                 game_price= '$price', game_image = '$image', game_link = '$link'
                 WHERE game_id = '$id'";
$result2 = querySQL($query2);
if($result2) { ?>
<script>
    alert("Successfully");
    window.location.href = "manage_game.php";
</script>
<?php } } 
else { ?>
<script>
    alert("Game name has already existed!");
    window.location.href= "manage_game.php";
</script> <?php } }  ?>


<center>
<form action="" method="POST" class="update_form" enctype="multipart/form-data">
    <fieldset>
        <legend> Update Game </legend>
        Game name : <input value="<?= $name?>" type="text" required maxlength="30" size="35" name="name"><BR><BR>
        Description : <input value="<?= $description?>" type="text" required name="description"><BR><BR>
        Price : <input value="<?= $price?>" type="number" required name="price"> VND<BR><BR>
        Image : <BR> <img  width="400" height="230" src = 'shopimage\<?= $image?>'> <BR><BR>
        <input type="file" name="image"> <BR><BR>
        Video code (For example: https://www.youtube.com/watch?v=<u style="font-weight: bolder;">8nxUmL1iQmo</u><BR><BR>
        <input value="<?= $link?>" type="text" required name="link"><BR><BR>
        <input type="hidden" name="id" value="<?= $id?>">
        <input type="submit" value="Update" name="update"><BR>
    </fieldset>
</form>
</center>