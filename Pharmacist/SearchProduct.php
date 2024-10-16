<?php
include("../Assets/Connection/Connection.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Search Product Page</title>
    <link rel="stylesheet" href="../Assets/Templates/Search/bootstrap.min.css">
    <style>
        .custom-alert-box {
            z-index: 1;
            width: 20%;
            height: 10%;
            position: fixed;
            bottom: 0;
            right: 0;
            left: auto;
        }

        .success {
            color: #3c763d;
            background-color: #dff0d8;
            border-color: #d6e9c6;
            display: none;
        }

        .failure {
            color: #a94442;
            background-color: #f2dede;
            border-color: #ebccd1;
            display: none;
        }

        .warning {
            color: #8a6d3b;
            background-color: #fcf8e3;
            border-color: #faebcc;
            display: none;
        }
        .Scroll{
            overflow-y: scroll;
            height: 550px;
        }
        .ScrollLeft{
            overflow-y: scroll;
            height: 670px;
        }
        .MainC{
            height: 620px !important; 
        }
    </style>
</head>

<body onload="productCheck()">
    <input type="hidden" name="txt_id" id="txt_id" value="<?php echo $_GET['uid'] ?>">
    <div class="custom-alert-box">
        <div class="alert-box success">Successful Added to Cart !!!</div>
        <div class="alert-box failure">Failed to Add Cart !!!</div>
        <div class="alert-box warning">Already Added to Cart !!!</div>
    </div>
    <!-- <div class="sidebar pe-30 pb-30">
    <nav class="navbar bg-light navbar-light"> -->
    <div class="container-fluid ">
        <div class="row  " >
            <div class="col-lg-3 ScrollLeft">
                <hr>
                <h5>Filter Product</h5>
                <hr>


                <br />
                <h6 class="text-info"> Select Category</h6>
                <ul class="list-group">
                    <?php
                    $selCat = "SELECT * from tbl_category";
                    $result = $con->query($selCat);
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onclick="changeSub(),productCheck()" class="form-check-input product_check" value="<?php echo $row["category_id"]; ?>" id="category"><?php echo $row["category_name"]; ?>
                                </label>
                            </div>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
                <br />
                <h6 class="text-info"> Select Sub Category</h6>
                <ul class="list-group" id="subcat">

                </ul>
                <br />

            </div>
            <div class="col-lg-9 " >
                <hr>
                <!-- <div align="right"> -->
                <!-- <a href="ViewCart.php?uid=<?php echo $_GET['uid'] ?>" class="btn btn-warning">Add Cart</a> -->
                <!-- <div align="left"> -->
                    <div class="row justify-content-between mx-2">
                <h5 class="text-left" id="textChange">All Products</h5>
                <a href="ViewCart.php?uid=<?php echo $_GET['uid'] ?>" class="btn btn-warning">Add Cart</a>
                    </div>
                <div align="right" class="MainC">
                <hr>
                <div class="text-center">
                    <img src="../Assets/Templates/Search/loader.gif" id='loder' width="200" style="display: none" />
                </div>
                <input type="hidden" name="getId" id="getId" value="<?php echo $_GET['uid'] ?>" />
                <div class="row Scroll" id="result">

                </div>


            </div>

        </div>
    </div>
    <script src="../Assets/Templates/Search/jquery.min.js"></script>
    <script src="../Assets/Templates/Search/bootstrap.min.js"></script>
    <script src="../Assets/Templates/Search/popper.min.js"></script>
    <script>
        function changeqty() {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxCart.php?action=Update&id=" + this.alt + "&qty=" + this.value
            });
            updateQuantity(this);

        }

        function changeSub() {
            var cat = get_filter_text('category');
            if (cat.length !== 0) {
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxSearchSubCat.php?data=" + cat,
                    success: function(response) {
                        $("#subcat").html(response);
                    }
                });

            } else {
                $("#subcat").html("");
            }


        }

        // function addCartAdd(id) {
        //     let qty = document.getElementById('qtyMain').innerHTML
        //     qty++;


        //     let uid = document.getElementById('getId').value;
        //     $.ajax({
        //         url: "../Assets/AjaxPages/AjaxAddMedicine.php?id=" + id + "&uid=" + uid+"&qty="+ qty,
        //         success: function(response) {
        //             console.log(response);
        //             document.getElementById('qtyMain').innerHTML = response

        //             // if (response.trim() === "Added to Cart") {
        //             //     $("div.success").fadeIn(300).delay(1500).fadeOut(400);
        //             // } else if (response.trim() === "Already Added to Cart") {
        //             //     $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
        //             // } else {
        //             //     $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
        //             // }
        //         }
        //     });
        // }

        // function addCartSub(id) {
        //     let qty = document.getElementById('qtyMain').innerHTML
        //     qty--;

        //     if(qty !== 0){
        //         let uid = document.getElementById('getId').value;
        //     $.ajax({
        //         url: "../Assets/AjaxPages/AjaxAddMedicine.php?id=" + id + "&uid=" + uid+"&qty="+ qty,
        //         success: function(response) {
        //             console.log(response);
        //             document.getElementById('qtyMain').innerHTML = response

        //             // if (response.trim() === "Added to Cart") {
        //             //     $("div.success").fadeIn(300).delay(1500).fadeOut(400);
        //             // } else if (response.trim() === "Already Added to Cart") {
        //             //     $("div.warning").fadeIn(300).delay(1500).fadeOut(400);
        //             // } else {
        //             //     $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
        //             // }
        //         }
        //     });
        //     }

        // }

        function addCartAdd(id) {
            let qtyElement = document.getElementById('qtyMain_' + id);
            let qty = parseInt(qtyElement.innerHTML); // Get the current quantity

            qty++; // Increment quantity
            console.log("Quantity:" + qty);

            let uid = document.getElementById('getId').value;
            $.ajax({
                url: "../Assets/AjaxPages/AjaxAddMedicine.php?id=" + id + "&uid=" + uid + "&qty=" + qty,
                success: function(response) {
                    console.log(response);
                    qtyElement.innerHTML = response; // Update the quantity display
                    updateCartQuantity(id, qty)
                }
            });
        }


        function addCartSub(id) {
            let qtyElement = document.getElementById('qtyMain_' + id);

            let qty = parseInt(qtyElement.innerHTML); // Get the current quantity
            qty--; // Decrement quantity

            if (qty >= 0) { // Ensure that quantity doesn't go below 1
                let uid = document.getElementById('getId').value;
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxAddMedicine.php?id=" + id + "&uid=" + uid + "&qty=" + qty,
                    success: function(response) {
                        console.log(response);
                        qtyElement.innerHTML = response; // Update the quantity display
                        updateCartQuantity(id, qty)
                    }
                });
            } else if (qty == 0) {
                let uid = document.getElementById('getId').value;
                $.ajax({
                    url: "../Assets/AjaxPages/AjaxAddMedicine.php?id=" + id + "&uid=" + uid + "&qty=" + qty + "&action='REMOVE'",
                    success: function(response) {
                        console.log(response);
                        qtyElement.innerHTML = response; // Update the quantity display
                        updateCartQuantity(id, qty)
                    }
                });
            }
        }



        function productCheck() {
            $("#loder").show();
            var uid = document.getElementById('txt_id').value;
            var action = 'data';
            var category = get_filter_text('category');
            var subcategory = get_filter_text('subcategory');
            //var brand = get_filter_text('brand');
            //var type = get_filter_text('type');
            // var sid = document.getElementById('sid').value;


            $.ajax({
                url: "../Assets/AjaxPages/AjaxSearch.php?action=" + action + "&category=" + category + "&subcategory=" + subcategory + "&uid=" + uid,
                success: function(response) {

                    $("#result").html(response);
                    $("#loder").hide();
                    $("#textChange").text("Filtered Products");
                }
            });


        }



        function get_filter_text(text_id) {
            var filterData = [];

            $('#' + text_id + ':checked').each(function() {
                filterData.push($(this).val());
            });
            return filterData;
        }



        // Update Cart Quantity
        function updateCartQuantity(id, qty) {
            // Update the quantity input field

            console.log("Quantity " + qty);



            $.ajax({
                url: "../Assets/AjaxPages/AjaxCart.php?action=Update&id=" + id + "&qty=" + qty,
                success: function(response) {
                    console.log(response);
                    // recalculateCart();  // Call recalculateCart to update totals
                }
            });
        }
    </script>


</body>

</html>