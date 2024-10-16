<option>-----Select-----</option>
<?php
include("../Connection/Connection.php");
$selQry="Select * from tbl_subcategory where category_id=".$_GET['did'];
$resultOne=$con->query($selQry);
while($data=$resultOne->fetch_assoc())
{
	?>
	<option value="<?php echo $data["subcategory_id"]?>">
            <?php echo $data["subcategory_name"]?>
	</option>
    <?php
}
?>