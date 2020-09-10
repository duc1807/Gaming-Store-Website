<?php
require_once 'dbconnect.php';
$connection = new mysqli($hostname,$dbname,$dbport,$username,$password);
if($connection->connect_error)
{
	echo "Failed";
	die($connection->connect_error);
}
