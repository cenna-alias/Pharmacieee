<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
if (isset($_POST["btn_submit"])) {
  $name = $_POST["txt_name"];
  $email = $_POST["txt_email"];
  $password = $_POST["txt_pw"];
  $address = $_POST["txt_address"];
  $contact = $_POST["txt_contact"];

  $photo = $_FILES["file_photo"]["name"];
  $temp = $_FILES["file_photo"]["tmp_name"];
  move_uploaded_file($temp, "../Assets/Files/Pharmacist/" . $photo);

  $proof = $_FILES["file_proof"]["name"];
  $temp = $_FILES["file_proof"]["tmp_name"];
  move_uploaded_file($temp, "../Assets/Files/Pharmacist/" . $proof);

  $insQry = "insert into tbl_pharmacist(pharmacist_name,pharmacist_email,pharmacist_password,pharmacist_address,pharmacist_contact,pharmacist_photo,
	pharmacist_proof)values('" . $name . "','" . $email . "','" . $password . "','" . $address . "','" . $contact . "','" . $photo . "','" . $proof . "')";

  if ($con->query($insQry)) {
  }
}
if (isset($_GET["did"])) {
  $did = $_GET["did"];
  $delQry = "Delete from tbl_pharmacist where pharmacist_id=" . $did;
  if ($con->query($delQry)) {
?>
    <script>
      window.location = "Pharmacist.php";
    </script>
<?php
  }
}
if (isset($_GET["eid"])) {
  $eid = $_GET["eid"];
  $selQryOne = "Select * from tbl_pharmacist where pharmacist_id=" . $eid;
  $resultOne = $con->query($selQryOne);
  $dataOne = $resultOne->fetch_assoc();
  $name = $dataOne["pharmacist_name"];
  $email = $dataOne["pharmacist_email"];
  $password = $dataOne["pharmacist_password"];
  $address = $dataOne["pharmacist_address"];
  $contact = $dataOne["pharmacist_contact"];
  $photo = $dataOne["pharmacist_photo"];
  $proof = $dataOne["pharmacist_proof"];
  $aid = $dataOne["pharmacist_id"];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Pharmacist Page</title>
</head>
<body>
    <div class="container mt-5">
        <!-- Form Section -->
        <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
            <div class="card">
                <div class="card-header text-center">
                    <h4>Pharmacist Form</h4>
                </div>
                <div class="card-body">
                    <!-- Name Input -->
                    <div class="form-group">
                        <label for="txt_name">Name</label>
                        <input required type="text" class="form-control" name="txt_name" id="txt_name"
                            title="Name Allows Only Alphabets,Spaces and First Letter Must Be Capital Letter"
                            pattern="^[A-Z]+[a-zA-Z ]*$" />
                    </div>

                    <!-- Email Input -->
                    <div class="form-group">
                        <label for="txt_email">Email</label>
                        <input required type="email" class="form-control" name="txt_email" id="txt_email" />
                    </div>

                    <!-- Password Input -->
                    <div class="form-group">
                        <label for="txt_pw">Password</label>
                        <input required type="password" class="form-control" name="txt_pw" id="txt_pw"
                            pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                    </div>

                    <!-- Address Input -->
                    <div class="form-group">
                        <label for="txt_address">Address</label>
                        <input required type="text" class="form-control" name="txt_address" id="txt_address" />
                    </div>

                    <!-- Contact Input -->
                    <div class="form-group">
                        <label for="txt_contact">Contact</label>
                        <input required type="text" class="form-control" name="txt_contact" id="txt_contact"
                            pattern="[7-9]{1}[0-9]{9}" title="Phone number must start with 7-9 and contain 10 digits" />
                    </div>

                    <!-- Photo Input -->
                    <div class="form-group m-2">
                        <label for="file_photo">Photo</label>
                        <input required type="file" class="form-control-file" name="file_photo" id="file_photo" />
                    </div>

                    <!-- Proof Input -->
                    <div class="form-group m-2">
                        <label for="file_proof">Proof</label>
                        <input required type="file" class="form-control-file" name="file_proof" id="file_proof" />
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="form-group text-center m-3">
                        <button type="submit" class="btn btn-success" name="btn_submit" id="btn_submit">Submit</button>
                        <button type="submit" class="btn btn-secondary" name="btn_cancel" id="btn_cancel">Cancel</button>
                    </div>
                </div>
            </div>
        </form>

        <!-- Table Section -->
        <div class="mt-3">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr align="center">
                        <th scope="col">Sno</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Proof</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $SelQry = "Select * from tbl_pharmacist";
                    $result = $con->query($SelQry);
                    $i = 0;
                    while ($data = $result->fetch_assoc()) {
                        $i++;
                    ?>
                        <tr align="center">
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data["pharmacist_name"]; ?></td>
                            <td><?php echo $data["pharmacist_email"]; ?></td>
                            <td><?php echo $data["pharmacist_address"]; ?></td>
                            <td><?php echo $data["pharmacist_contact"]; ?></td>
                            <td><img src="../Assets/Files/Pharmacist/<?php echo $data["pharmacist_photo"]; ?>" width="75" height="75"></td>
                            <td><img src="../Assets/Files/Pharmacist/<?php echo $data["pharmacist_proof"]; ?>" width="75" height="75"></td>
                            <td>
                                <a href="Pharmacist.php?did=<?php echo $data["pharmacist_id"]; ?>" class="btn btn-danger btn-sm">Delete</a>
                                <a href="Pharmacist.php?eid=<?php echo $data["pharmacist_id"]; ?>" class="btn btn-warning btn-sm m-2">Edit</a>
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