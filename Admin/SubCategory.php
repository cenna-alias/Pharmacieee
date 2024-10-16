<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
$subcategory="";
$aid=0;
if(isset($_POST["btn_submit"]))
{
    $category=$_POST["txt_category"];
	$subcategory=$_POST["txt_sub"];
	$insQry="insert into tbl_subcategory(subcategory_name,category_id)values('".$subcategory."','".$category."')";
	if($con->query($insQry))
	{
		
	}


}

if(isset($_GET["did"]))
{
	$did=$_GET["did"];
	$delQry="Delete from tbl_subcategory where subcategory_id=".$did;
	if($con->query($delQry))
	{
		?>
        <script>
		window.location="Subcategory.php";
		</script>
        <?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SubCategory Page</title>
</head>

<body>
    <div class="container mt-5">
        <!-- Form Section -->
        <form id="form1" name="form1" method="post" action="">
            <div class="card">
                <div class="card-header text-center">
                    <h4>SubCategory Form</h4>
                </div>
                <div class="card-body">
                    <!-- Category Selection -->
                    <div class="form-group">
                        <label for="txt_category">Category</label>
                        <select name="txt_category" id="txt_category" class="form-control">
                            <option> ----Select---- </option>
                            <?php 
                              $SelQry1="select * from tbl_category";
                              $ResultOne=$con->query($SelQry1);
                              while($data=$ResultOne->fetch_assoc())
                              {
                            ?>
                                <option value="<?php echo $data["category_id"]?>">
                                    <?php echo $data["category_name"]?>
                                </option>
                            <?php
                              }
                            ?>
                        </select>
                    </div>

                    <!-- SubCategory Input -->
                    <div class="form-group">
                        <label for="txt_sub">SubCategory</label>
                        <input required type="text" class="form-control" name="txt_sub" id="txt_sub" />
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="form-group text-center m-3">
                        <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Submit</button>
                        <button type="submit" class="btn btn-secondary" name="btn_cancel" id="btn_cancel">Cancel</button>
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
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $SelQry = "Select * from tbl_subcategory s inner join tbl_category c on s.category_id=c.category_id";
                    $result = $con->query($SelQry);
                    $i = 0;
                    while($data = $result->fetch_assoc()) {
                        $i++;
                    ?>
                        <tr align="center">
                            <td><?php echo $i;?></td>
                            <td><?php echo $data["category_name"];?></td>
                            <td><?php echo $data["subcategory_name"];?></td>
                            <td>
                                <a href="Subcategory.php?did=<?php echo $data["subcategory_id"];?>" class="btn btn-danger btn-sm">Delete</a>
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
</html>
<?php
include("Foot.php");
?>