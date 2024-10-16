<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
$pharmacist="select * from tbl_pharmacist where pharmacist_id=".$_SESSION['pid'];
$result=$con->query($pharmacist);
$data=$result->fetch_assoc();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Profile Page</title>
</head>
<!-- <body>
<form id="form1" name="form1" method="post" action="">
  <table width="346" border="1" align="center">
    <tr>
    <td colspan="2" align="center">
     <img src="../Assets/Files/Pharmacist/<?php echo $data["pharmacist_photo"];?>" width="75" height="75>"
    </td>
    </tr>
    <tr>
      <td width="681"><div align="center">Name</td>
      <td width="373"><?php echo $data['pharmacist_name'];?> </td>
    </tr>
    <tr>
      <td><div align="center">Email</td>
      <td><?php echo $data['pharmacist_email'];?></td>
    </tr>
     <tr>
      <td><div align="center">Address</td>
      <td><?php echo $data['pharmacist_address'];?></td>
    </tr>
     <tr>
      <td><div align="center">Contact</td>
      <td><?php echo $data['pharmacist_contact'];?></td>
    </tr>
    <tr>
    		<td height="54" colspan="2" align="center">
            <a href="EditProfile.php">EditProfile</a>/<a href="ChangePassword.php">ChangePassword</a>
            </td>
    </tr>
  </table>
</form>
</body> -->
<body>
<div class="container mt-5">
    <form id="form1" name="form1" method="post" action="">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <img src="../Assets/Files/Pharmacist/<?php echo $data['pharmacist_photo']; ?>" class="rounded-circle mb-3" width="75" height="75" alt="Pharmacist Photo">
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row" class="text-center">Name</th>
                            <td><?php echo $data['pharmacist_name']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">Email</th>
                            <td><?php echo $data['pharmacist_email']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">Address</th>
                            <td><?php echo $data['pharmacist_address']; ?></td>
                        </tr>
                        <tr>
                            <th scope="row" class="text-center">Contact</th>
                            <td><?php echo $data['pharmacist_contact']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <a href="EditProfile.php" class="btn btn-primary me-2">Edit Profile</a>
                <a href="ChangePassword.php" class="btn btn-warning">Change Password</a>
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