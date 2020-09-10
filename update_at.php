<?php
require_once 'restricted.php';

require_once 'adminheader.php';
$id = $_POST['id'];
$qry= "SELECT * FROM accessories WHERE accessories_id = '$id'";
$result = querySQL($qry);
$row = mysqli_fetch_array($result);
$type = $row['accessories_type'];

if(isset($_POST['update']))
{
    $type = $_POST['type'];
    $qry3 = "SELECT * FROM accessories WHERE accessories_type = '$type'";
    $rst3 = querySQL($qry3);
    if ($rst3->num_rows == 0) {
            $query2 = "UPDATE accessories SET accessories_type = '$type'
                             WHERE accessories_id = '$id'";
            $result2 = querySQL($query2);
            ?>
            <script>
                alert("Successfully");
                window.location.href = "manage_type.php";
            </script>
            <?php }  else { ?>
                <script>
                alert("This type has already existed!");
                window.location.href= "manage_type.php";
                </script> 
            <?php } }  ?>


<center>
<form action="" method="POST" class="update_form">
    <fieldset>
        <legend> Update Accessories Type </legend>
        Accessories Type: <input value="<?= $type?>" type="text" required maxlength="15" size="20" name="type"><BR>
        <input type="hidden" name="id" value="<?= $id?>">
        <input type="submit" value="Update" name="update"><BR>
    </fieldset>
</form>
</center>