<?php
include("Head.php");
include("../Assets/Connection/Connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>View Customer</title>
</head>

<body>

    <div class="mt-5">
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr align="center">
                    <th scope="col">Sno</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $SelQry = "Select * from tbl_user";
                $result = $con->query($SelQry);
                $i = 0;
                while ($data = $result->fetch_assoc()) {
                    $i++;
                ?>
                    <tr align="center">
                        <td><?php echo $i; ?></td>
                        <td><?php echo $data["user_name"]; ?></td>
                        <td><?php echo $data["user_mob"]; ?></td>
                        <td>
                            <a href="ViewIndividualReport.php?did=<?php echo $data["user_id"]; ?>" class="btn btn-danger btn-sm">View Report </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php
include("Foot.php");
?>