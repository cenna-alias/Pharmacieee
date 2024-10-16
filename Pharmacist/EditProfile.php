<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
session_start();

$pharmacist="select * from tbl_pharmacist where pharmacist_id=".$_SESSION['pid'];
$result=$con->query($pharmacist);
$data=$result->fetch_assoc();



if(isset($_POST["btn_submit"]))
{
  
		$upQry="update tbl_pharmacist set pharmacist_name='".$_POST["txt_name"]."',pharmacist_email='".$_POST["txt_email"]."',pharmacist_address='".$_POST["txt_address"]."',pharmacist_contact='".$_POST["txt_contact"]."' where pharmacist_id='".$_SESSION['pid']."'";
		if($con->query($upQry))
		{
		
			?>
        <script>
		alert("Profile Updated");
		window.location="MyProfile.php";
		</script>
        <?php
        }
	
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Edit Profile Page</title>
</head>
<!-- <body>
<form id="form1" name="form1" method="post" action="">
  <table width="400" border="1" align="center">
    <tr>
      <td width="180"><div align="center">Name</td>
      <td width="190"><label for="txt_name"></label>
      <input required type="text" name="txt_name" id="txt_name"  value="<?php echo $data['pharmacist_name'];?>" 
      title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$"/></td>
    </tr>
    <tr>
      <td><div align="center">Email</td>
      <td><label for="txt_email"></label>
      <input required type="email" name="txt_email" id="txt_email" value="<?php echo $data['pharmacist_email'];?>" /></td>
    </tr>
    <tr>
      <td><div align="center">Address</td>
      <td><label for="txt_address"></label>
      <input required type="text" name="txt_address" id="txt_address" value="<?php echo $data['pharmacist_address'];?>" /></td>
    </tr>
     <tr>
      <td><div align="center">Contact</td>
      <td><label for="txt_contact"></label>
      <input required type="text" name="txt_contact" id="txt_contact" value="<?php echo $data['pharmacist_contact'];?>"
       pattern="[7-9]{1}[0-9]{9}" title="Phone number with 7-9 and remaing 9 digit with 0-9"/></td>
    </tr>
    <tr>
      <td height="54" colspan="2"><div align="center">
        <input required type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input required type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
</form>
</body> -->
<body>
<div class="container mt-5">
    <form id="form1" name="form1" method="post" action="">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Name Field -->
                <div class="mb-3">
                    <label for="txt_name" class="form-label">Name</label>
                    <input required type="text" class="form-control" id="txt_name" name="txt_name"
                        value="<?php echo $data['pharmacist_name']; ?>"
                        title="Name Allows Only Alphabets, Spaces, and First Letter Must Be Capital Letter"
                        pattern="^[A-Z]+[a-zA-Z ]*$"
                        placeholder="Enter your name">
                </div>

                <!-- Email Field -->
                <div class="mb-3">
                    <label for="txt_email" class="form-label">Email</label>
                    <input required type="email" class="form-control" id="txt_email" name="txt_email"
                        value="<?php echo $data['pharmacist_email']; ?>"
                        placeholder="Enter your email">
                </div>

                <!-- Address Field -->
                <div class="mb-3">
                    <label for="txt_address" class="form-label">Address</label>
                    <input required type="text" class="form-control" id="txt_address" name="txt_address"
                        value="<?php echo $data['pharmacist_address']; ?>"
                        placeholder="Enter your address">
                </div>

                <!-- Contact Field -->
                <div class="mb-3">
                    <label for="txt_contact" class="form-label">Contact</label>
                    <input required type="text" class="form-control" id="txt_contact" name="txt_contact"
                        value="<?php echo $data['pharmacist_contact']; ?>"
                        pattern="[7-9]{1}[0-9]{9}" title="Phone number must start with 7-9 and have 10 digits"
                        placeholder="Enter your contact number">
                </div>

                <!-- Submit & Cancel Buttons -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success me-2" id="btn_submit" name="btn_submit">Submit</button>
                    <button type="reset" class="btn btn-secondary" id="btn_cancel" name="btn_cancel">Cancel</button>
                </div>
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