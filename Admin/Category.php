<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
$category = "";
$aid = 0;
if (isset($_POST["btn_category"])) {
	$category = $_POST["txt_category"];
	$aid = $_POST["txt_aid"];
	if ($aid == 0) {
		$insQry = "insert into tbl_category(category_name)values('" . $category . "')";
		if ($con->query($insQry)) {
		}
	} else {
		$upQry = "update tbl_category set category_name='" . $category . "' where category_id=" . $aid;
		if ($con->query($upQry)) {
			$aid = 0;
?>
			<script>
				window.location = "Category.php";
			</script>
		<?php
		}
	}
}
if (isset($_GET["did"])) {
	$did = $_GET["did"];
	$delQry = "Delete from tbl_category where category_id=" . $did;
	if ($con->query($delQry)) {
		?>
		<script>
			window.location = "Category.php";
		</script>
<?php
	}
}
if (isset($_GET["eid"])) {
	$eid = $_GET["eid"];
	$selQryOne = "Select * from tbl_category where category_id=" . $eid;
	$resultOne = $con->query($selQryOne);
	$dataOne = $resultOne->fetch_assoc();
	$category = $dataOne["category_name"];
	$aid = $dataOne["category_id"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title> Add Category</title>
</head>

<body>
    <div class="container mt-5">
        <!-- Form Section -->
        <form id="form1" name="form1" method="post" action="">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Category Form</h4>
                </div>
                <div class="card-body">
                    <!-- Category Input -->
                    <div class="form-group">
                        <label for="txt_category">Category</label>
                        <input required type="text" class="form-control" value="<?php echo $category; ?>" name="txt_category" id="txt_category" />
                    </div>
                    <input type="hidden" name="txt_aid" value="<?php echo $aid; ?>" />

                    <!-- Submit and Cancel Buttons -->
                    <div class="form-group text-center m-3">
                        <button type="submit" class="btn btn-success" name="btn_category" id="btn_category">Submit</button>
                        <button type="submit" class="btn btn-secondary" name="btn_cancel" id="btn_cancel">Cancel</button>
                    </div>
                </div>
            </div>
        </form>

        <!-- Table Section -->
        <div class="mt-5">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr align="center">
                        <th scope="col">Sno</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $SelQry = "Select * from tbl_category";
                    $result = $con->query($SelQry);
                    $i = 0;
                    while ($data = $result->fetch_assoc()) {
                        $i++;
                    ?>
                        <tr align="center">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data["category_name"]; ?></td>
                            <td>
                                <a href="Category.php?did=<?php echo $data["category_id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                                <a href="Category.php?eid=<?php echo $data["category_id"]; ?>" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>


</html>
<?php
include("Foot.php");
?>