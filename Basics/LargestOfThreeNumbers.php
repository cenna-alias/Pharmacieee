<?php
$result=0;
if(isset($_POST["btn_find"]))
{
	$n1=$_POST["txt_num1"];
	$n2=$_POST["txt_num2"];
	$n3=$_POST["txt_num3"];
	
	$result=max($n1,$n2,$n3);
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
  <table width="347" height="210" border="1">
    <tr>
      <td width="167">Number1</td>
      <td width="168"><label for="txt_num1"></label>
      <input type="text" name="txt_num1" id="txt_num1" /></td>
    </tr>
    <tr>
      <td>Number2</td>
      <td><label for="txt_num2"></label>
      <input type="text" name="txt_num2" id="txt_num2" /></td>
    </tr>
    <tr>
      <td>Number3</td>
      <td><label for="txt_num3"></label>
      <input type="text" name="txt_num3" id="txt_num3" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_find" id="btn_find" value="Find" />
      </div></td>
    </tr>
    <tr>
      <td height="29">Result</td>
      <td><?php echo $result; ?></td>
    </tr>
  </table>
</form>
</body>
</html>