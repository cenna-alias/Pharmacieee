<?php
// include('../Assets/Connection/Connection.php');
session_start();
session_unset();
session_destroy();
header("location:../Index.php");
exit();
?>