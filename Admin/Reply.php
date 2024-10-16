<?php
include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_reply"]))
{
    $reply=$_POST["txt_reply"];
	$insQry="update  tbl_complaint set complaint_reply ='".$reply."' where complaint_id = ".$_GET['did'];
	if($con->query($insQry))
	{
		echo "updated";
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reply Page</title>
</head>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <form id="form1" name="form1" method="post" action="">
        <div class="mb-3">
            <label for="txt_reply" class="form-label">Reply</label>
            <input type="text" class="form-control" id="txt_reply" name="txt_reply" required>
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary me-2" id="btn_reply" name="btn_reply">Submit</button>
            <button type="reset" class="btn btn-secondary" id="btn_cancel" name="btn_cancel">Cancel</button>
        </div>
    </form>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

</html>