<?php
$result=0;
if(isset($_POST["btn_find"]))
{
	$num=$_POST["txt_number"];
	if ($num % 2 == 0)
	 {
         $result="Even";
     } 
	else
	 {
         $result="Odd";
     }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="347" border="1">
    <tr>
      <td width="165">Number</td>
      <td width="166"><label for="txt_number"></label>
      <input type="text" name="txt_number" id="txt_number" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_find" id="btn_find" value="Find" />
      </div></td>
    </tr>
    <tr>
      <td>Result</td>
      <td><?php echo $result; ?></td>
    </tr>
  </table>
</form>
</body>
</html>