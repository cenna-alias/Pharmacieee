<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
if(isset($_POST["btn_submit"]))
{
    $title=$_POST["txt_title"];
	$content=$_POST["txt_content"];
	$insQry="insert into tbl_complaint(complaint_title,complaint_content)values('".$title."','".$content."')";
	if($con->query($insQry))
	{
		
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaint Page</title>
</head>
<body>
<div class="container mt-5">
    <!-- Form for submitting complaint -->
    <form id="form1" name="form1" method="post" action="">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Title Input -->
                <div class="mb-3">
                    <label for="txt_title" class="form-label">Title</label>
                    <input required type="text" class="form-control" id="txt_title" name="txt_title" placeholder="Enter complaint title">
                </div>

                <!-- Content Input -->
                <div class="mb-3">
                    <label for="txt_content" class="form-label">Content</label>
                    <input required type="text" class="form-control" id="txt_content" name="txt_content" placeholder="Enter complaint content">
                </div>

                <!-- Submit & Cancel Buttons -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success me-2" id="btn_submit" name="btn_submit">Submit</button>
                    <button type="reset" class="btn btn-secondary" id="btn_cancel" name="btn_cancel">Cancel</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Table for displaying complaints -->
    <div class="mt-5">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th scope="col" class="text-center">Sno</th>
                    <th scope="col" class="text-center">Title</th>
                    <th scope="col" class="text-center">Content</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $SelQry = "Select * from tbl_complaint";
            $result = $con->query($SelQry);
            $i = 0;
            while ($data = $result->fetch_assoc()) {
                $i++;
            ?>
                <tr class="text-center">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $data["complaint_title"]; ?></td>
                    <td><?php echo $data["complaint_content"]; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
include("Foot.php");
?>
