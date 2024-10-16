<?php
include("../Assets/Connection/Connection.php");

if(isset($_POST["btn_submit"]))
{
    $expdate=$_POST["txt_expdate"];
	$quantity=$_POST["txt_quantity"];
	$insQry="insert into tbl_stock(stock_expdate,stock_quantity,product_id)values('".$expdate."','".$quantity."','".$_GET['did']."')";
	
	if($con->query($insQry))
	{
		
	}
}

if(isset($_GET["ddid"]))
{
	$did=$_GET["ddid"];
	$delQry="Delete from tbl_stock where stock_id=".$did;
	if($con->query($delQry))
	{
		?>
        <script>
		alert("Deleted");
		window.location="Stock.php?did=<?php echo $_GET['did'] ?>";
		</script>
        <?php
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Stock</title>
<style>

  /* General body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

/* Container styling */
.container {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 800px;
    margin: auto;
}

/* Form input field styling */
.form-control {
    border-radius: 5px;
    padding: 10px;
    font-size: 16px;
}

/* Form label styling */
label {
    font-weight: bold;
    font-size: 16px;
}

/* Button styling */
.btn {
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
}

/* Primary submit button styling */
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
}

/* Secondary cancel button styling */
.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.btn-secondary:hover {
    background-color: #5a6268;
    border-color: #545b62;
}

/* Table styling */
table {
    margin-top: 20px;
    width: 100%;
    border-collapse: collapse;
}

/* Table header */
.table-dark {
    background-color: #343a40;
    color: white;
}

.table-hover tbody tr:hover {
    background-color: #f1f1f1;
}

/* Table row and cell styling */
th, td {
    padding: 12px;
    text-align: center;
    border: 1px solid #dee2e6;
}

/* Table action buttons */
.btn-sm {
    padding: 5px 10px;
    font-size: 14px;
}

/* Footer margin */
.mt-5 {
    margin-top: 3rem;
}

  </style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="353" border="1">
    <tr>
      <td width="167"><div align="center">Exp Date</td>
      <td width="170"><label for="txt_expdate"></label>
      <input required type="date" name="txt_expdate" id="txt_expdate" /></td>
    </tr>
    <tr>
      <td><div align="center">Quantity</td>
      <td><label for="txt_quantity"></label>
      <input required type="text" name="txt_quantity" id="txt_quantity" /></td>
    </tr>
    <tr>
      <td height="50" colspan="2"><div align="center">
        <input required type="submit" name="btn_submit" id="btn_submit" value="Submit" />
        <input required type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" />
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <table width="408" border="1">
    <tr>
      <td width="70"><div align="center">Sno</div></td>
      <td width="184"><div align="center">Expiry Date</div></td>
      <td width="132"><div align="center">Quantity</div></td>
      <td width="132"><div align="center">Action</div></td>
      
      
    </tr>
    <?php
	$SelQry="Select * from tbl_stock where product_id=".$_GET['did'];
	$result=$con->query($SelQry);
	$i=0;
	while($data=$result->fetch_assoc())
	{
		$i++;
		?>
    <tr align="center">
      <td><?php echo $i;?></td>
      <td><?php echo $data["stock_expdate"];?></td>
      <td><?php echo $data["stock_quantity"];?></td>
      <td><a href="Stock.php?ddid=<?php echo $data["stock_id"];?>&did=<?php echo $_GET['did'] ?>">Delete</a>
      
    </tr>
    <?php
	}
	?>
</form>
</body>
</html>