<?php
include("../Connection/Connection.php");
session_start();
$selqry = "select * from tbl_order where user_id='" . $_GET["uid"] . "' and order_status='0'";
$result = $con->query($selqry);
$qty = $_GET["qty"];
if ($result->num_rows > 0) {

	if ($row = $result->fetch_assoc()) {
		$bid = $row["order_id"];



		$selqry = "select * from tbl_singleorder where order_id='" . $bid . "' and product_id='" . $_GET["id"] . "' and singleorder_status='0'";
		$result = $con->query($selqry);

		if ($result->num_rows > 0) {
			
			$dataR=$result->fetch_assoc();
			$soid=$dataR['singleorder_id'];
			$qty = $_GET["qty"];
			if($qty==0){
				$rm="delete from tbl_singleorder where singleorder_id=".$soid;
				if($con->query($rm)){
					echo 0;
				}
			}
			else{
			$upQry = "update tbl_singleorder set singleorder_qty = '" . $qty . "' where singleorder_id='" . $soid . "'";
			$con->query($upQry);

			$sqlQry = "select singleorder_qty from tbl_singleorder where singleorder_id='" . $soid . "'";
			$resultghfgh = $con->query($sqlQry);
			$row2b = $resultghfgh->fetch_assoc();
			echo $row2b['singleorder_qty'];
			}
		} else {
			$selqry1 = "select * from tbl_order where user_id='" . $_GET["uid"] . "' and order_status='0'";
			$result1 = $con->query($selqry1);
			if ($result1->num_rows > 0) {
				$selqry = "select MAX(order_id) as id from tbl_order";
				$res = $con->query($selqry);
				if ($row = $res->fetch_assoc()) {
					$insQry1 = "insert into tbl_singleorder(product_id,order_id,singleorder_qty)values('" . $_GET["id"] . "','" . $row["id"] . "', '".$qty."')";
					if ($con->query($insQry1)) {
						
						echo $qty;
					} else {
						echo "Failed";
					}
				}
			} else {
				$insqry = "insert into tbl_order(user_id,pharmacist_id,order_datetime) value('" . $_GET['uid'] . "','" . $_SESSION['pid'] . "',now())";
				if ($con->query($insqry)) {
					$selqry = "select MAX(order_id) as id from tbl_order";
					$res = $con->query($selqry);
					if ($row = $res->fetch_assoc()) {
						$insQry1 = "insert into tbl_singleorder(product_id,order_id,singleorder_qty)values('" . $_GET["id"] . "','" . $row["id"] . "','".$qty."')";
						if ($con->query($insQry1)) {
							echo $qty;
						} else {
							echo "Failed";
						}
					}
				}
			}
		}
	}
} else {
	$insqry = "insert into tbl_order(user_id,pharmacist_id,order_datetime) value('" . $_GET['uid'] . "','" . $_SESSION['pid'] . "',now())";
	if ($con->query($insqry)) {
		$selqry = "select MAX(order_id) as id from tbl_order";
		$res = $con->query($selqry);
		if ($row = $res->fetch_assoc()) {
			$bid=$row['id'];
			$insqry1 = "insert into tbl_singleorder(product_id,order_id,singleorder_qty)values('" . $_GET['id'] . "','" . $row["id"] . "','".$qty."')";
			if ($con->query($insqry1)) {
				echo 0;
			} else {
				echo "Failed";
			}
		}
	}
}
