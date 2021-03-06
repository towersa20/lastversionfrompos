<?php
/*  header ('Content-Type: text/html; charset=UTF-8');
  echo '<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />';
  $str = iconv('cp1256', 'utf-8', $str);*/
include_once("../database/constants.php");
include_once("user.php");
include_once("DBOperation.php");
include_once("manage.php");
//----------------products---------------------

if (isset($_POST["manageProduct"])) {
	$m = new Manage();
	$result = $m->manageRecordWithPagination("products",$_POST["pageno"]);
	$rows = $result["rows"];
	$pagination = $result["pagination"];
	if (count($rows) > 0) {
		$n = (($_POST["pageno"] - 1) * 5)+1;
		foreach ($rows as $row) {
			?>
				<tr>
			        <td><?php echo $n; ?></td>
			        <td><?php echo $row["product_name"]; ?></td>
			        <td><?php echo $row["category_name"]; ?></td>
			        <td><?php echo $row["brand_name"]; ?></td>
			        <td><?php echo $row["product_price"]; ?></td>
			        <td><?php echo $row["product_stock"]; ?></td>
			        <td><?php echo $row["added_date"]; ?></td>
			        <td><a href="#" class="btn btn-success btn-sm">Active</a></td>
			        <td>
			        	<a href="#" did="<?php echo $row['pid']; ?>" class="btn btn-danger btn-sm del_product">Delete</a>
			        	<a href="#" eid="<?php echo $row['pid']; ?>" data-toggle="modal" data-target="#form_products" class="btn btn-info btn-sm edit_product">Edit</a>
			        </td>
			      </tr>
			<?php
			$n++;
		}
		?>
			<tr><td colspan="5"><?php echo $pagination; ?></td></tr>
		<?php
		exit();
	}
}

//Delete 
if (isset($_POST["deleteProduct"])) {
	$m = new Manage();
	$result = $m->deleteRecord("products","pid",$_POST["id"]);
	echo $result;
}

//Update Product
if (isset($_POST["updateProduct"])) {
	$m = new Manage();
	$result = $m->getSingleRecord("products","pid",$_POST["id"]);
	echo json_encode($result);
	exit();
}

//Update Record after getting data
if (isset($_POST["update_product"])) {
	$m = new Manage();
	$id = $_POST["pid"];
	$name = $_POST["update_product"];
	$cat = $_POST["select_cat"];
	$brand = $_POST["select_brand"];
	$price = $_POST["product_price"];
	$qty = $_POST["product_qty"];
	$date = $_POST["added_date"];
	$result = $m->update_record("products",["pid"=>$id],["cid"=>$cat,"bid"=>$brand,"product_name"=>$name,"unit"=>$unit,"product_price"=>$price,"product_stock"=>$qty,"added_date"=>$date]);
	echo $result;
}

//-------------------------Order Processing--------------

if (isset($_POST["getNewOrderItem"])) {
	$obj = new DBOperation();
	$rows = $obj->getAllRecord("products");
	?>
	<tr>
		    <td><b class="number">1</b></td>
		    <td>
		        
				<?php
$dbs=mysql_connect("localhost","root","");
mysql_select_db("infos",$dbs);
				$sql=mysql_query("select * from products ");
					$rows=mysql_fetch_array($sql);?>

				<input type="text" title="Barcode here" autofocus name="pid[]"  class="form-control pid" required id="search" placeholder="باركود" list="searchrxt" autocomplete="off">
	<datalist id="searchrxt">
        <?php do {?>
		            	
		            		<option value="<?php echo $rows['pid']; ?>"><?php echo $rows["pid"]; ?></option>
							<?php
		            	}while($rows=mysql_fetch_array($sql));
		            ?>
</datalist>
		    </td>
		    <td><input name="product_name[]" title="إسم الصنف" type="text"   class="form-control pro_name" ></td>
		    <td><input name="unit[]" type="text"  readonly="" class="form-control unit" ></td>
		    <td><input name="qty[]" type="number" min="1"  class="form-control qty" ></td>
		    <td><input name="price[]" type="number" readonly="on" min="1"   class="form-control price" >
		    </span>
		    <span><input name="pro_name[]" type="hidden" class="form-control form-control-sm pro_name"></td>		   
		    <td><span class="amt">0</span> ريال </td>
		    <td><span class="amts">0</span> ريال </td>
		    <td><span class="brima">0</span> ريال </td>
		    <input name="sum1[]" type="hidden"  id="sum1"  class="form-control sum1" required><input name="sum2[]" type="hidden"  id="sum2"  class="form-control sum2" required>
			<input name="sum3[]" type="hidden"  id="sum3"  class="form-control sum3" required>
			<input name="year[]" type="hidden"  id="sum3"  value="20<?php echo date('y');?>" class="form-control" required></td>
	</tr>
	<?php
	exit();
}


//Get price and qty of one item
if (isset($_POST["getPriceAndQty"])) {
	$m = new Manage();
	$result = $m->getSingleRecord("products","pid",$_POST["id"]);
	echo json_encode($result);
	exit();
}

if (isset($_POST["order_date"]) AND isset($_POST["cust_name"])) {
	
	$orderdate = $_POST["order_date"];
	$cust_name = $_POST["cust_name"];

	//Now getting array from order_form
	$ar_tqty = $_POST["tqty"];
	$ar_qty = $_POST["qty"];
	$ar_price = $_POST["price"];
	$ar_pro_name = $_POST["pro_name"];

	$sub_total = $_POST["sub_total"];
	$gst = $_POST["gst"];
	$discount = $_POST["discount"];
	$net_total = $_POST["net_total"];
	$paid = $_POST["paid"];
	$due = $_POST["due"];
	$payment_type = $_POST["payment_type"];

	$m = new Manage();
	echo $result = $m->storeCustomerOrderInvoice($orderdate,$cust_name,$ar_tqty,$ar_qty,$ar_price,$ar_pro_name,$sub_total,$gst,$discount,$net_total,$paid,$due,$payment_type);

}
?>