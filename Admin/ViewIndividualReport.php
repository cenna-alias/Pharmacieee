<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>View Customer Report</title>
</head>

<body>

    <div class="container mt-5">

        <div >

            <?php
            $SelQry = "Select * from tbl_order where user_id = " . $_GET['did'];
            $result = $con->query($SelQry);
            $i = 0;
            while ($data = $result->fetch_assoc()) {
                $i++;
            ?>
            <br>
            <br>
            <br>
                <div class="card" style="margin: 20px;">

                    <div class="row font-weight-bold text-center bg-dark text-white py-2">
                        <div class="col-1">Sno</div>
                        <div class="col-3">Name</div>
                        <div class="col-3">Quantity</div>
                        <div class="col-5">Time</div>
                    </div>

                    <?php
                    $SelQryCart = "Select * from tbl_singleorder s inner join tbl_product p on s.product_id= p.product_id where s.order_id = ".$data['order_id'];
                    $resultcart = $con->query($SelQryCart);
                    $i = 0;
                    while ($dataCart = $resultcart->fetch_assoc()) {
                        $i++;
                    ?>
                        <div class="row text-center py-2 <?php echo ($i % 2 == 0) ? 'bg-light' : ''; ?>">
                            <div class="col-1"><?php echo $i; ?></div>
                            <div class="col-3"><?php echo $dataCart["product_name"]; ?></div>
                            <div class="col-3"><?php echo $dataCart["singleorder_qty"]; ?></div>
                            <div class="col-5"><?php echo $data["order_datetime"]; ?></div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <?php

            }
                ?>
                </div>
        </div>

</body>

</html>
<?php
include("Foot.php");
?>