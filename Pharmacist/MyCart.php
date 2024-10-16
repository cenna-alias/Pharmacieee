<?php
session_start();
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"
    />
    <style>
        /* Flexbox layout for products */
        .product {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
        }
        
        .product-image img {
            width: 100px;
        }

        .product-details {
            flex-grow: 2; /* Adjusts to take more space */
        }

        .product-price, .product-quantity, .product-removal, .product-line-price {
            flex-basis: 10%; /* Adjusts widths */
            text-align: center;
        }

        .product-removal {
            flex-basis: 9%;
        }

        .remove-product {
            border: 0;
            padding: 4px 8px;
            background-color: #c66;
            color: #fff;
            font-size: 12px;
            border-radius: 3px;
            cursor: pointer;
        }
        .remove-product:hover {
            background-color: #a44;
        }

        .totals-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
        }

        .totals-value {
            text-align: right;
            width: auto;
        }

        .checkout {
            display: block;
            width: 100%;
            text-align: center;
            padding: 10px;
            background-color: #6b6;
            color: white;
            font-size: 16px;
            /* border-radius: 5px; */
            border: none;
            cursor: pointer;
        }

        .checkout:hover {
            background-color: #494;
        }

        .shopping-cart {
            margin-top: 50px;
            padding: 0 15px;
        }

        /* Responsive Design */
        @media screen and (max-width: 650px) {
            .shopping-cart {
                margin: 0;
                padding-top: 20px;
            }

            .column-labels {
                display: none;
            }

            .product {
                flex-direction: column;
                align-items: flex-start;
            }

            .product-image {
                float: right;
                width: auto;
            }
            .product-image img {
                margin: 0 0 10px 10px;
            }

            .product-details, .product-price, .product-quantity, .product-removal, .product-line-price {
                width: 100%;
                text-align: center;
                margin-bottom: 10px;
            }

            .product-quantity select {
                margin-left: 10px;
            }
        }

        @media screen and (max-width: 350px) {
            .totals .totals-item label {
                width: 60%;
            }
            .totals .totals-item .totals-value {
                width: 40%;
            }
        }

        /* Toggle switch */
        .switch2 {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 32px;
            border-radius: 27px;
            background-color: #bdc3c7;
            cursor: pointer;
            transition: all .3s;
        }

        .switch2 input {
            display: none;
        }

        .switch2 input:checked + div {
            left: calc(100% - 40px);
        }

        .switch2 div {
            position: absolute;
            width: 40px;
            height: 40px;
            border-radius: 25px;
            background-color: white;
            top: -4px;
            left: 0px;
            box-shadow: 0px 0px 0.5px 0.5px rgb(170,170,170);
            transition: all .2s;
        }

        .switch2-checked {
            background-color: #2ecc71;
        }
    </style>
</head>
<?php
if (isset($_POST["btn_checkout"])) {
    $amt = $_POST["carttotalamt"];
    
    $selC = "select * from tbl_booking where user_id='" . $_SESSION["uid"] . "'and booking_status='0'";
    $rs = $Conn->query($selC);
    $row = $rs->fetch_assoc();
    $_SESSION["bid"] = $row["booking_id"];
    
    $upQry1 = "update tbl_booking set booking_date=curdate(),booking_amount='" . $amt . "',booking_status='1' where user_id='" . $_SESSION["uid"] . "'";
    $Conn->query($upQry1);
    
    $upQry1 = "update tbl_cart set cart_status='1' where booking_id='" . $row["booking_id"] . "'";
    if ($Conn->query($upQry1)) {
        if (isset($_POST["cb_checkout"])) {
            ?>
            <script>
                window.location = "Payment.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                window.location = "MyBooking.php";
            </script>
            <?php
        }
    }
}
?>
<body onload="recalculateCart()" style="padding:0px">
<?php
ob_start();
include("Head.php");
?>
<br><br><br><br><br>
<div style="padding: 20px; text-align:center">
    <h1>Cart</h1>
    <br><br>
    <!-- <div class="column-labels"> -->
        <label class="product-price" style="width: 5%; text-align:center">Image</label>
        <label class="product-price" style="width: 16%; text-align:center">Details</label>    
        <label class="product-price" style="width: 10%; text-align:center">Price</label>
        <label class="product-price" style="width: 100%; text-align:center">Qty</label>
        <label class="product-price" style="width: 10%; text-align:center">Remove</label>
        <label class="product-price" style="width: 16%; text-align:center">Total</label>
    </div>
    <form method="post">
        <div class="shopping-cart">            
            <?php
            $sel = "select * from tbl_booking b inner join tbl_cart c on c.booking_id=b.booking_id where b.user_id='" . $_SESSION["uid"] . "' and booking_status='0' and cart_status=0";
            $res = $Conn->query($sel);
            while ($row = $res->fetch_assoc()) {
                $selPr = "select * from tbl_product where product_id='" . $row["product_id"] . "'";
                $respr = $Conn->query($selPr);
                if ($rowpr = $respr->fetch_assoc()) {
                    $selstock = "select sum(stock_quantity) as stock from tbl_stock where product_id='" . $rowpr["product_id"] . "'";
                    $selstock1 = "select sum(cart_quantity) as quantity from tbl_cart where product_id='" . $rowpr["product_id"] . "' and cart_status > '0'";
                    $chk = $Conn->query($selstock1)->fetch_assoc();
                    $resst = $Conn->query($selstock);
                    if ($rowst = $resst->fetch_assoc()) {
            ?>
            <div class="product">
                <div class="product-image" >
                <div align="center">
                    <img src="../Assets/Files/Photo/<?php echo $rowpr["product_photo"] ?>" />
                </div>
                <div class="product-details">
                    <div class="product-title"><?php echo $rowpr["product_name"] ?></div>
                    <p class="product-description"><?php echo $rowpr["product_details"] ?></p>
                </div>
                <div class="product-price"><?php echo $rowpr["product_price"] ?></div>
                <div class="product-quantity">
                    <select id="<?php echo $row["cart_id"] ?>" style="width:90px">
                        <?php
                        for ($k = 1; $k <= ($rowst["stock"] - $chk["quantity"]); $k++) {
                        ?>
                            <option <?php if ($row["cart_quantity"] == $k) { echo "selected"; } ?> value="<?php echo $k ?>"><?php echo $k ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="product-removal">
                    <button class="remove-product" value="<?php echo $row["cart_id"] ?>">Remove</button>
                </div>
                <div class="product-line-price">
                    <?php
                    $pr = $rowpr["product_price"];
                    $qty = $row["cart_quantity"];
                    $tot = (int) $pr * (int) $qty;
                    echo $tot;
                    ?>
                </div>
            </div>
            <?php
                    }
                }
            }
            ?>
        </div>
        <br>
        <div class="totals">
            <div class="totals-item">
                <label>Grand Total</label>
                <div class="totals-value" id="cart-total">0</div>
            </div>
        </div>
        <input type="hidden" name="carttotalamt" id="carttotalamt" />
        <button type="submit" name="btn_checkout" class="checkout">Checkout</button>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    function recalculateCart() {
        // Recalculate cart total and update the UI
        let cartTotal = 0;
        $(".product-line-price").each(function() {
            cartTotal += parseFloat($(this).text());
        });
        $("#cart-total").text(cartTotal.toFixed(2));
        $("#carttotalamt").val(cartTotal);
    }
    
    $(document).ready(function() {
        // Update cart quantity via AJAX
        $("select").change(function() {
            let cartId = $(this).attr("id");
            let quantity = $(this).val();
            $.ajax({
                url: "../Assets/AjaxPages/AjaxCart.php",
                method: "POST",
                data: {
                    cartid: cartId,
                    qty: quantity
                },
                success: function() {
                    recalculateCart();
                }
            });
        });

        // Remove product via AJAX
        $(".remove-product").click(function(e) {
            e.preventDefault();
            let cartId = $(this).val();
            $.ajax({
                url: "../Assets/AjaxPages/AjaxCart.php",
                method: "POST",
                data: {
                    cartid: cartId
                },
                success: function() {
                    location.reload();
                }
            });
        });
    });
</script>
</body>
</html>
