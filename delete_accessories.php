<?php
require_once("adminheader.php");
$id= $_POST['id'];


$qry2 = "SELECT * FROM item WHERE item_id = '$id'";

$rst2 = querySQL($qry2);
$row = mysqli_fetch_array($rst2);
$qry = "DELETE FROM item WHERE item_id = '$id'";
$result = querySQL($qry);
if($result) { ?>
    <script>
        alert("Delete successful");
        window.location.href = "manage_accessories.php?AccessoriesID=<?= $row['item_type']?> ";
    </script>
<?php }
else { ?>
    <script>
        alert("Delete unsuccessful");
        window.location.href = "manage_accessories.php";
    </script>
<?php }  ?>
