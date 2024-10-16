<?php
include("../Connection/Connection.php");

if (isset($_GET["action"])) {

    $sqlQry = "select * from tbl_product t inner join tbl_subcategory s on s.subcategory_id=t.subcategory_id inner join tbl_category c on c.category_id=s.category_id where true ";
    $row = "SELECT count(*) as count from tbl_product t inner join tbl_subcategory s on s.subcategory_id=t.subcategory_id inner join  tbl_category c on c.category_id=s.category_id where true ";


    if ($_GET["category"] != null) {

        $category = $_GET["category"];

        $sqlQry = $sqlQry . " AND c.category_id IN(" . $category . ")";
        $row = $row . " AND c.category_id IN(" . $category . ")";
    }
    if ($_GET["subcategory"] != null) {

        $subcategory = $_GET["subcategory"];

        $sqlQry = $sqlQry . " AND s.subcategory_id IN(" . $subcategory . ")";
        $row = $row . " AND s.subcategory_id IN(" . $subcategory . ")";
    }


    // echo $sqlQry;
    $resultS = $con->query($sqlQry);
    $resultR = $con->query($row);



    $rowR = $resultR->fetch_assoc();

    if ($rowR["count"] > 0) {
        while ($row1 = $resultS->fetch_assoc()) {
?>



            <div class="col-md-3 mb-2">
                <div class="card-deck">
                    <div class="card border-secondary">
                        <img src="../Assets/Files/Product/<?php echo $row1["product_photo"]; ?>" class="card-img-top" height="250">
                        <div class="card-img-secondary">
                            <h6 class="text-light bg-info text-center rounded p-1"><?php echo $row1["product_name"]; ?></h6>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title text-danger" align="center">
                                Price : <?php echo $row1["product_price"]; ?>/-
                            </h4>
                            <p align="center">
                                <?php echo $row1["category_name"]; ?><br>
                                <?php echo $row1["subcategory_name"]; ?><br>
                            </p>
                            <?php

                            $stock = "select sum(stock_quantity) as stock from tbl_stock where product_id = '" . $row1["product_id"] . "'";
                            $result2 = $con->query($stock);
                            $row2 = $result2->fetch_assoc();


                            $stocka = "select sum(singleorder_qty) as stock from tbl_singleorder where product_id = '" . $row1["product_id"] . "'";
                            $result2a = $con->query($stocka);
                            $row2a = $result2a->fetch_assoc();

                            $stock = $row2["stock"] - $row2a["stock"];
                            if ($stock > 0) {
                            ?>
                                <div style="display:flex;justify-content:space-between;align-items:center">
                                    <a href="javascript:void(0)" onclick="addCartAdd('<?php echo $row1['product_id'] ?>')" style="width:50px;height:50px" class="btn btn-success btn-block">+</a>
                                    <div id="qty">
                                        <?php

                                        $sqlQry = "select * from tbl_singleorder s inner join tbl_order o on o.order_id=s.order_id where product_id = '" . $row1["product_id"] . "' and user_id=".$_GET['uid']." and o.order_status=0";
                                        $resultghfgh = $con->query($sqlQry);
                                        if($row2b = $resultghfgh->fetch_assoc()){
                                            $oQty=$row2b['singleorder_qty'];
                                        }
                                        else{
                                            $oQty=0;
                                        }
                                        ?>
                                        <div id="qtyMain_<?php echo $row1['product_id']; ?>"><?php echo $oQty ?></div>
                                    </div>
                                    <a href="javascript:void(0)" onclick="addCartSub(<?php echo $row1['product_id'] ?>)" style="width:50px;height:50px;margin-top:0" class="btn btn-success btn-block">-</a>
                                </div>
                            <?php
                            } else if ($stock == 0) {
                            ?>
                                <a href="javascript:void(0)" class="btn btn-danger btn-block">Out of Stock</a>
                            <?php
                            } else {
                            ?>
                                <a href="javascript:void(0)" class="btn btn-warning btn-block">Stock Not Found</a>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
<?php
        }
    } else {
        echo "<h4 align='center'>Products Not Found!!!!</h4>";
    }
}
?>