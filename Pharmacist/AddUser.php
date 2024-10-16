<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_submit"]))
{
	$name=$_POST["txt_name"];
	$mob=$_POST["txt_mob"];

	$selQryCheck = "select * from tbl_user where user_mob = '$mob'";
	$resCheck = $con -> query($selQryCheck);
	if($dataCheck = $resCheck -> fetch_assoc())
	{
		?>
		<script>
			window.location="SearchProduct.php?uid=<?php echo $dataCheck['user_id'] ?>"
		</script>
		<?php
	}
	else{
		$insQry="insert into tbl_user(user_name,user_mob)values('".$name."','".$mob."')";
	
		if($con->query($insQry))
		{
			$last_id = $con->insert_id;
      ?>
		<script>
			window.location="SearchProduct.php?uid=<?php echo $last_id ?>"
		</script>
		<?php

		}
	}

	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add User Page</title>
</head>

<body>
<div class="container mt-5">
    <form id="form1" name="form1" method="post" action="">
        <div class="mb-3 row">
            <label for="txt_name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input required type="text" class="form-control" name="txt_name" id="txt_name" placeholder="Enter your name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="txt_mob" class="col-sm-2 col-form-label">Mobile No.</label>
            <div class="col-sm-10">
                <input required type="text" class="form-control" name="txt_mob" id="txt_mob" placeholder="Enter your mobile number">
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary" name="btn_submit" id="btn_submit">Submit</button>
        </div>
    </form>

    <div class="mt-5">
        <h3 class="text-center">User List</h3>
        <table class="table table-bordered table-hover mt-3">
            <thead class="table-dark">
                <tr class="text-center">
                    <th scope="col">Sno</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile Number</th>
                    <!-- <th scope="col">Action</th> -->
                </tr>
            </thead>
            <tbody>
            <?php
            $SelQry = "Select * from tbl_user";
            $result = $con->query($SelQry);
            $i = 0;
            while($data = $result->fetch_assoc()) {
                $i++;
            ?>
                <tr class="text-center">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data["user_name"]; ?></td>
                    <td><?php echo $data["user_mob"]; ?></td>
                    <!-- Uncomment to add actions
                    <td>
                        <a href="AddUser.php?did=<?php //echo $data['user_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        <a href="AddUser.php?eid=<?php //echo $data['user_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    </td>
                    -->
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
include("Foot.php");
?>