<?php
session_start();
if(!(isset($_SESSION['pid']) && !empty($_SESSION['pid']))) {
    header("location:../index.php");
}
?>