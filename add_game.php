<?php
require_once 'adminheader.php';
require_once 'restricted.php';

if(isset($_POST['add']))
{
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = "";
    $link = $_POST['link'];

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
$sql = "INSERT game(game_name, game_description, game_price, game_image, game_link)
        VALUES ('$name', '$description','$price','$image', '$link')";
$run = querySQL($sql);
if($run) { ?>
    <script>
        alert("Successful");
        window.location.href = "manage_game.php";
    </script> 
    <?php } } ?>

<center>
<form style="width: fit-content; margin-top: 60px;" required 
action="" method="POST" enctype="multipart/form-data">
<fieldset>
    <legend>Add Game</legend>
    Game name: <input tpye="text" name="name" maxlength="50"><BR><BR>
    Description: <input type="text" name="description"><BR><BR>
    Price: <input type="number" name="price"><BR><BR>
    Image: <input type="file" required name="image"><BR><BR>
    Link youtube (For example: https://www.youtube.com/watch?v=<u style="font-weight: bolder;">z74ExMz-cWU</u>) <BR>
    <input type="text" name="link"><BR><BR>
    <input type="submit" value="Add" name="add">
</fieldset>
</form>
</center>