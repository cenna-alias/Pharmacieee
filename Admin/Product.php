<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
if (isset($_POST["btn_submit"])) {
  $name = $_POST["txt_name"];
  $photo = $_FILES["file_photo"]["name"];
  $price = $_POST["txt_price"];
  $temp = $_FILES["file_photo"]["tmp_name"];
  move_uploaded_file($temp, "../Assets/Files/Product/" . $photo);
  $insQry = "insert into tbl_product(product_name,product_price,product_photo,subcategory_id)values('" . $name . "','" . $price . "','" . $photo . "','" . $_POST["txt_sub"] . "')";
  if ($con->query($insQry)) {
  }
}
if (isset($_GET["did"])) {
  $did = $_GET["did"];
  $delQry = "Delete from tbl_product where product_id=" . $did;
  if ($con->query($delQry)) {
?>
    <script>
      window.location = "Product.php";
    </script>
<?php
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title> Add Product</title>
</head>

<body>
    <div class="container mt-5">
        <!-- Form Section -->
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Product Form</h4>
                </div>
                <div class="card-body">
                    <!-- Name Input -->
                    <div class="form-group">
                        <label for="txt_name">Name</label>
                        <input required type="text" class="form-control" name="txt_name" id="txt_name" />
                    </div>

                    <!-- Price Input -->
                    <div class="form-group">
                        <label for="txt_price">Price</label>
                        <input required type="text" class="form-control" name="txt_price" id="txt_price" />
                    </div>

                    <!-- Photo Input -->
                    <div class="form-group m-2">
                        <label for="file_photo">Photo</label>
                        <input required type="file" class="form-control-file" name="file_photo" id="file_photo" />
                    </div>

                    <!-- Category Selection -->
                    <div class="form-group">
                        <label for="txt_category">Category</label>
                        <select name="txt_category" id="txt_category" class="form-control" onChange="getSub(this.value)">
                            <option> ----Select---- </option>
                            <?php
                            $SelQry1 = "select * from tbl_category";
                            $ResultOne = $con->query($SelQry1);
                            while ($data = $ResultOne->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $data["category_id"] ?>">
                                    <?php echo $data["category_name"] ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <!-- SubCategory Selection -->
                    <div class="form-group">
                        <label for="txt_sub">SubCategory</label>
                        <select name="txt_sub" id="txt_sub" class="form-control">
                            <option> ----Select---- </option>
                        </select>
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="form-group text-center m-3">
                        <button type="submit" class="btn btn-success " name="btn_submit" id="btn_submit">Submit</button>
                        <button type="submit" class="btn btn-secondary " name="btn_cancel" id="btn_cancel">Cancel</button>
                    </div>
                </div>
            </div>
        </form>

        <!-- Table Section -->
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
                                <a href="Product.php?did=<?php echo $data["product_id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                                <a href="Stock.php?did=<?php echo $data["product_id"]; ?>" class="btn btn-warning btn-sm">Add Stock</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getSub(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxSubCategory.php?did=" + did,
      success: function(result) {

        $("#txt_sub").html(result);
      }
    });
  }
</script>

</html>
<?php
include("Foot.php");
?>