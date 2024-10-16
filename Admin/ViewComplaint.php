<?php
include("../Assets/Connection/Connection.php");
include("Head.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Complaint Page</title>
</head>

<body>
    <div class="container mt-5">
        <!-- Complaint List Table -->
        <div class="card">
            <div class="card-header text-center">
                <h4>Complaints List</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr align="center">
                            <th scope="col">Sno</th>
                            <th scope="col">Title</th>
                            <th scope="col">Content</th>
                            <th scope="col">Action</th>
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
                            <tr align="center">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $data["complaint_title"]; ?></td>
                                <td><?php echo $data["complaint_content"]; ?></td>
                                <td align="center">
                                    <a href="Reply.php?did=<?php echo $data["complaint_id"]; ?>" class="btn btn-primary btn-sm">Reply</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
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
