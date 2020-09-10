<?php
require_once 'adminheader.php';
require_once 'restricted.php';

$id = $_POST['id'];

$qry1 = "SELECT * FROM item WHERE item_type = '$id'";
$rst1 = querySQL($qry1);
if ($rst1->num_rows == 0) {
	$qry = "DELETE FROM accessories WHERE accessories_id = '$id'";
	$result = querySQL($qry);
 ?>
 <script>
     alert ("Delete accessories type successfully !");
     window.location.href = "manage_type.php";
 </script>
<?php } else { ?> 
  <script>
    alert ("Delete accessories type failed (There still some products are existing in this accessories type)!");
    window.location.href = "manage_type.php";
</script>
<?php } ?>