<?php
include("../Connection/Connection.php");
?>
<?php                           
						   $selSubCat = "SELECT * from tbl_subcategory where category_id IN(".$_GET['data'].")";
                           $resultsc = $con->query($selSubCat);
                            while ($rowsc=$resultsc->fetch_assoc()) {
                        ?>
                         <li class="list-group-item">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" onchange="productCheck()" class="form-check-input product_check" value="<?php echo $rowsc["subcategory_id"]; ?>" id="subcategory"><?php echo $rowsc["subcategory_name"]; ?>
                                </label>
                            </div>
                        </li> 
                        <?php
                             }
                        ?>