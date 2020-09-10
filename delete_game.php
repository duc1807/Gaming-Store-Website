<?php
require_once 'adminheader.php';
require_once 'restricted.php';

$id = $_POST['id'];
$qry = "DELETE FROM game WHERE game_id = '$id'";
$result = querySQL($qry);
if ($result) { ?>
 <script>
     alert ("Delete game successfully !");
     window.location.href = "manage_game.php";
 </script>
<?php } else { ?> 
  <script>
    alert ("Delete game failed !");
    window.location.href = "manage_game.php";
</script>
<?php } ?>