<?php
ini_set('default_charset','UTF-8');
header('Content-Type: text/html; charset=UTF-8');
mb_internal_encoding('UTF-8'); 
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
	$unit = $_POST["unit"];
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
include('../dbcon/dbcons.php');

$query = 'SELECT * FROM `products`';

$result1 = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query);

$options = '';
while ($row2 = mysqli_fetch_array($result2)) {
    $options = $options . "<option>$row2[1]</option>";
}

?>



				<input type="text" name="pid[]" autofocus title="barcode" placeholder="barcode" class="form-control big-shadow pid" autofocus required id="search" placeholder="باركود" list="searchrxt" autocomplete="off">
	<datalist id="searchrxt">
	<?php while ($row1 = mysqli_fetch_array($result1)):; ?>
        <option value="<?php echo $row1[1]; ?>"><?php echo $row1[2]; ?>        </option>
    <?php endwhile; ?>
      </select>  
</datalist>
		    </td>
		    <td><input name="product_name[]" title="Product" type="text"   class="form-control big-shadow pro_name" required></td>
		    <td><input name="unit[]" type="text"  title="Unit type"  class="form-control big-shadow unit" required></td>
		    <td><input name="qty[]" title="الكمية الكلية للصنف الواحد" type="text" min="1"  class="form-control big-shadow qty" required></td>
		    <td><input name="price[]"  readonly="off"  title="سعر الشراء قبل الضريبة للوحده الواحده" type="text"   class="form-control big-shadow price" ></td>
		    <td><input name="pays[]" title="سعر البيع" type="text" required    class="form-control big-shadow" ></td>
		    <td title="إجمالي ضريبة القيمة"><span class="amts" >0</span> ريال </td>
		    <td title="الإجمالي قبل الضريبة"><span class="amt">0</span> ريال </td>
            <td title="الإجمالي بعد الضريبة"><span class="brima">0</span> ريال </td> 
</span>
		    <input name="pro_name[]" type="hidden" class="form-control form-control-sm pro_name">
			<input name="sum1[]" type="hidden"  id="sum1" style="border:0px;" class="form-control big-shadow sum1" required>
			<input name="sum2[]" type="hidden"  id="sum2" style="border:0px;" class="form-control big-shadow sum2" required>
			<input name="sum3[]" type="hidden"  id="sum3" style="border:0px;" class="form-control big-shadow sum3" required>
			<input name="date[]"  title="تاريخ التاريخ" type="hidden"  value="20<?php echo date('y-m-d');?>"  class="form-control big-shadow" ></td>
	<span></tr>
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
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
