<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="mt-5">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr align="center">
                    <th scope="col">Sno</th>
                    <th scope="col">Category</th>
                    <th scope="col">SubCategory</th>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $SelQry = "Select * from tbl_product p inner join tbl_subcategory s on p.subcategory_id=s.subcategory_id inner join tbl_category c on c.category_id=s.category_id";
                $result = $con->query($SelQry);
                $i = 0;
                while ($data = $result->fetch_assoc()) {
                    $i++;
                ?>
                    <tr align="center">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data["category_name"]; ?></td>
                        <td><?php echo $data["subcategory_name"]; ?></td>
                        <td><?php echo $data["product_name"]; ?></td>
                        <td><?php echo $data["product_price"]; ?></td>
                        <td><img src="../Assets/Files/Product/<?php echo $data["product_photo"]; ?>" width="75" height="75"></td>
                        <td>
                            <?php

                            $stock = "select sum(stock_quantity) as stock from tbl_stock where product_id = '" . $data["product_id"] . "'";
                            $result2 = $con->query($stock);
                            $row2 = $result2->fetch_assoc();


                            $stocka = "select sum(singleorder_qty) as stock from tbl_singleorder where product_id = '" . $data["product_id"] . "'";
                            $result2a = $con->query($stocka);
                            $row2a = $result2a->fetch_assoc();

                            $stock = $row2["stock"] - $row2a["stock"];
                            if ($stock > 0) {
                            echo "Current Stock $stock";
                            } else if ($stock == 0) {
                            echo "Out of Stock";
                            } else {
                           echo "Stock Not Found";
                            }
                            ?>

                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php
include("Foot.php");
?>