<?php
$username="root";
$server="localhost";
$password="";
$DB="db_pharma";

$con=mysqli_Connect($server,$username,$password,$DB);
if(!$con)
{
	echo "Connection failed";
}
?>