<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();

 $message="";


if(isset($_POST["btn_submit"]))
{
  	$current=$_POST["txt_currentpw"];
	$newpwd=$_POST["txt_newpw"];
	$confirmpwd=$_POST["txt_repnewpw"];
	
	
  	$selPharmacist="select * from tbl_pharmacist where pharmacist_password='".$current."' and pharmacist_id='".$_SESSION['pid']."'";
	$resPharmacist=$con->query($selPharmacist);
	if($data=$resPharmacist->fetch_assoc())
	{	
		if($newpwd==$confirmpwd)
		{
		
				$upQry="update tbl_pharmacist set pharmacist_password='".$_POST["txt_newpw"]."' where pharmacist_id='".$_SESSION['pid']."'";
				if($con->query($upQry))
					{
						$message="Password Updated...";
					}
		}
		else
		{
				
					$message="Password not matching..";
		}
		
	}
	else
	{
			
			$message="incorrect password..";
	}
}


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password Page</title>
</head>
<!-- <body>
<form id="form1" name="form1" method="post" action="">
  <table width="402" border="1" align="center">
    <tr>
      <td width="186"><div align="center">Current Password</td>
      <td width="200"><label for="txt_currentpw"></label>
      <input required type="password" name="txt_currentpw" id="txt_currentpw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
      title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"/></td>
    </tr>
    <tr>
      <td><div align="center">New Password</td>
      <td><label for="txt_newpw"></label>
      <input required type="password" name="txt_newpw" id="txt_newpw" /></td>
    </tr>
    <tr>
      <td><div align="center">Confirm Password</td>
      <td><label for="txt_repnewpw"></label>
      <input required type="password" name="txt_repnewpw" id="txt_repnewpw" /></td>
    </tr>
    <tr>
      <td height="54" colspan="2"><div align="center">
        <input required type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input required type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
  <p><div align="center"><?php echo $message?></p>
</form>
</body> -->
<body>
<div class="container mt-5">
    <form id="form1" name="form1" method="post" action="">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Current Password Field -->
                <div class="mb-3">
                    <label for="txt_currentpw" class="form-label">Current Password</label>
                    <input required type="password" class="form-control" id="txt_currentpw" name="txt_currentpw"
                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                        title="Must contain at least one number, one uppercase and lowercase letter, and at least 8 or more characters"
                        placeholder="Enter your current password">
                </div>

                <!-- New Password Field -->
                <div class="mb-3">
                    <label for="txt_newpw" class="form-label">New Password</label>
                    <input required type="password" class="form-control" id="txt_newpw" name="txt_newpw"
                        placeholder="Enter your new password">
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-3">
                    <label for="txt_repnewpw" class="form-label">Confirm Password</label>
                    <input required type="password" class="form-control" id="txt_repnewpw" name="txt_repnewpw"
                        placeholder="Confirm your new password">
                </div>

                <!-- Submit & Cancel Buttons -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success me-2" id="btn_submit" name="btn_submit">Submit</button>
                    <button type="reset" class="btn btn-secondary" id="btn_cancel" name="btn_cancel">Cancel</button>
                </div>
            </div>
        </div>

        <!-- Display Message if Any -->
        <div class="row justify-content-center mt-3">
            <div class="col-md-6 text-center">
                <p><?php echo $message; ?></p>
            </div>
        </div>
    </form>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
include("Foot.php");
?>