<script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
       <script type="text/javascript" src="js/order.js"></script>
           <script src="js/payment.js"></script> 

<form name="form1" method="post" action="form2.php" enctype="multipart/form-data">
    <table style="width:100%;" class="table table-bordered table-hover">
        <tr>
    <td style="width:20%;">
    <select name="cust_name" class="selectpicker" data-live-search="true" data-style="btn-primary">
    <?php
    include('dbcon/dbcon.php');
		$brim=mysql_query("select * from customer limit 30");
		$resa=mysql_fetch_array($brim);?>
    <option value="0"> Supplier</option>
    <?php 
    do
     {
     ?>

<option value="<?php echo $resa['name'];?>" ><?php echo $resa['name'];?></option>

<?php } while($resa=mysql_fetch_array($brim));?>

</select>
</td>

<input type="hidden" id="order_date" name="order_date"  class="form-control" value="<?php echo date("Y-d-m"); ?>">
<td style="width:20%;"><input name="CODE" required  class="form-control" type="text" size="12" id="CODE" value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>"  /></td>
<td style="width:20%;"><input name="datefrom"  class="form-control" type="date" size="12" value="20<?php echo date('y-m-d');?>" required  /></td>
<td style="width:20%;">
<select name="stores" class="selectpicker" data-live-search="true" data-style="btn-primary">
  <?php include('dbcon/dbcon.php');
	$brim=mysql_query("select * from store limit 5");
	$resa=mysql_fetch_array($brim);?>
  <?php do { ?>
  <option value="<?php echo $resa['name'];?>" ><?php echo $resa['name'];?></option>
  <?php } while($resa=mysql_fetch_array($brim));?>
</td>
<td style="width:20%;">
<select name="pay" class="selectpicker" data-live-search="true" data-style="btn-primary">
<option value="نقدا">Cash</option>
<option value="شبكة">Visa</option>
<option value="أجل">Dept</option>


 
</td>
</tr>
	 </table>


<table style="width:100%;" align="center" class="table table-bordered table-hover flipInX">
  <tr>
  <td colspan="10"><strong>Buy a variety of items</strong> <i class="fa fa-shopping-basket"></i> </td>
  </tr>
  
<tr align="center">
<td style="width:3%;"> <strong>No.</strong></td>
<td style="width:14%;"><strong>Barcode</strong></td>
<td style="width:15%;"><strong>Product</strong></td>
<td style="width:12%;"><strong>Unit</strong></td>
<td style="width:8%;"><strong>Quntity</strong></td>
<td style="width:8%;" title="سعر الشراء قبل الضريبة للوحده الواحده"><strong title="سعر الشراء قبل الضريبة للوحده الواحده">Purchases </strong></td>
<td style="width:8%;"><strong> Sales</strong></td>
</tr>

<tbody id="invoice_share">
<?php // الId  لاستدعاء دالة نافذة المشتريات?>
   
<table dir="ltr" style="width:100%;" class="table table-borderd table-hover">
<td style="width:14%;"><a href="add_product.php"><button id="" type="button" style="width:100%; font-family: 'Droid Arabic Kufi'; background-color:red;" class="btn btn"> Active <i class="fab fa-accusoft"></i></button></a></td>
     <td style="width:14%;"><a href="add_itemsearch.php"><button id="" type="button" style="width:100%; font-family: 'Droid Arabic Kufi'; background-color: #000;" class="btn btn"> Search <i class="fa fa-search"></i></button></a></td>
        <td style="width:14%;"><button name="ok1" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> Sales <i class="fa fa-qrcode"></i> </button></td>
     <td></td>
     <td></td>
     <td></td>
        <td style="width:13%;"><button id="remove" type="button" style="width:100%; font-family: 'Droid Arabic Kufi'; background-color:#eb4034;" class="btn "> Remove  <i class="fa fa-times"></i></button></td>
	    <td style="width:13%;"><script>
shortcut.add("F10",function() {
	 document.getElementById("add").click();
},{
	'type':'keydown',
	'propagate':true,
	'target':document
});</script>
<script>
shortcut.add("F9",function() {
	 document.getElementById("remove").click();
},{
	'type':'keydown',
	'propagate':true,
	'target':document
});</script><button id="add" type="button" style="width:100%; font-family: 'Droid Arabic Kufi'; background-color: #0da841;" class="btn btn">  Pluse <i class="fa fa-plus"></i> </button></td>
</table>