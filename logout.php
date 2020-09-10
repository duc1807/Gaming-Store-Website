<?php
session_start();
$_SESSION = array();
unset($_SESSION);
session_destroy();
header("Location: index.php");
exit;
?>