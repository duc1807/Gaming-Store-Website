<script>
function openform() {
  document.getElementById("form").style.display = "block";
}

function closeform() {
  document.getElementById("form").style.display = "none";
}
</script>

<?php
require_once('dbconnect.php');
$connection = new mysqli($hostname,$username,$password,$dbname,$dbport);
if($connection->connect_error)
{
	echo "Failed";
	die($connection->connect_error);
}

 //sql query 
function querySQL($qry)
{
	global $connection;
	$result = $connection->query($qry);
	if(!$result)
	{
		die($connection->error);
	}
	return $result;
}

