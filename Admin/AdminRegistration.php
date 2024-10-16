<?php
include("../Assets/Connection/Connection.php");
$name = "";
$email = "";
$password = "";
$aid = 0;
if (isset($_POST["btn_submit"])) {
  $name = $_POST["txt_name"];
  $email = $_POST["txt_email"];
  $password = $_POST["txt_pw"];
  $aid = $_POST["txt_aid"];
  if ($aid == 0) {
    $insQry = "insert into tbl_admin(admin_name,admin_email,admin_password)values('" . $name . "','" . $email . "','" . $password . "')";

    if ($con->query($insQry)) {
    }
  } else {
    $upQry = "update tbl_admin set admin_name='" . $name . "',admin_email='" . $email . "',admin_password='" . $password . "' where admin_id=" . $aid;
    if ($con->query($upQry)) {
      $aid = 0;
?>
      <script>
        window.location = "AdminRegistration.php";
      </script>
    <?php
    }
  }
}
if (isset($_GET["did"])) {
  $did = $_GET["did"];
  $delQry = "Delete from tbl_admin where admin_id=" . $did;
  if ($con->query($delQry)) {
    ?>
    <script>
      window.location = "AdminRegistration.php";
    </script>
<?php
  }
}
if (isset($_GET["eid"])) {
  $eid = $_GET["eid"];
  $selQryOne = "Select * from tbl_admin where admin_id=" . $eid;
  $resultOne = $con->query($selQryOne);
  $dataOne = $resultOne->fetch_assoc();
  $name = $dataOne["admin_name"];
  $email = $dataOne["admin_email"];
  $password = $dataOne["admin_password"];
  $aid = $dataOne["admin_id"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Admin Registration Page</title>
</head>

<body>
  <form id="form1" name="form1" method="post" action="">
    <table width="345" border="1">
      <tr>
        <td width="165">
          <div align="center">Name
        </td>
        <td width="168"><label for="txt_name"></label>
          <input required type="text" value="<?php echo $name; ?>" name="txt_name" id="txt_name" title="Name Allows Only Alphabets,Spaces and First Letter      Must Be Capital Letter" pattern="^[A-Z]+[a-zA-Z ]*$" />
          <input type="hidden" name="txt_aid" value="<?php echo $aid; ?>" </td>
      </tr>
      <tr>
        <td>
          <div align="center">Email
        </td>
        <td><label for="txt_email"></label>
          <input required type="email" value="<?php echo $email; ?>" name="txt_email" id="txt_email" />
        </td>
      </tr>
      <tr>
        <td>
          <div align="center">Password
        </td>
        <td><label for="txt_pw"></label>
          <input required type="password" value="<?php echo $password; ?>" name="txt_pw" id="txt_pw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
        </td>
      </tr>
      <tr>
        <td height="54" colspan="2">
          <div align="center">
            <input required type="submit" name="btn_submit" id="btn_submit" value="Submit" />
            <input required type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
          </div>
        </td>
      </tr>
    </table>
    <p>&nbsp;</p>
    <table width="820" border="1">
      <tr>
        <td width="61">
          <div align="center">Sno</div>
        </td>
        <td width="158">
          <div align="center">Name</div>
        </td>
        <td width="274">
          <div align="center">Email</div>
        </td>
        <td width="155">
          <div align="center">Password</div>
        </td>
        <td width="138">
          <div align="center">Action</div>
        </td>
      </tr>
      <?php
      $SelQry = "Select * from tbl_admin";
      $result = $con->query($SelQry);
      $i = 0;
      while ($data = $result->fetch_assoc()) {
        $i++;
      ?>
        <tr align="center">
          <td><?php echo $i; ?></td>
          <td><?php echo $data["admin_name"]; ?></td>
          <td><?php echo $data["admin_email"]; ?></td>
          <td><?php echo $data["admin_password"]; ?></td>
          <td><a href="AdminRegistration.php?did=<?php echo $data["admin_id"]; ?>">Delete</a>
            <a href="AdminRegistration.php?eid=<?php echo $data["admin_id"]; ?>">Edit</a>
          </td>
        </tr>
      <?php
      }
      ?>
    </table>
    <p>&nbsp;</p>
  </form>
</body>

</html>