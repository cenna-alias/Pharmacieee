<?php
session_start();
include("../Connection/Connection.php");
?>
<?php
    if ($_GET["action"]=="Delete") {
        $id = $_GET["id"];
        $delQry = "delete from tbl_singleorder where singleorder_id='" .$id. "'";
        $con->query($delQry);
    }
    if ($_GET["action"]=="Update") {
        $id = $_GET["id"];
        $qty = $_GET["qty"];
        $upQry = "update tbl_singleorder set singleorder_qty = '" .$qty. "' where singleorder_id='" .$id. "'";
        $con->query($upQry);
    }
?>