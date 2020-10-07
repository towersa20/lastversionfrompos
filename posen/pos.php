<script src="js/shortcut.js"></script>

<form action="print5.php" method="post" enctype="multipart/form-data">
<table style="width:100%;" class="table table-bordered table-hover">
    <tr>
        <td style="width:9%;">  <strong>Customer</strong>  <i class="fa fa-shopping-basket"></i></td>
        <td style="width:24%;"><input type="text" name="cust_name" style="border:0px;" class="form-control big-shadow "  id="search" placeholder="Search For Customer" list="searchrxxt" autocomplete="off">
	<datalist id="searchrxxt">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select * from person");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
        <input type="hidden" id="order_date" name="order_date" readonly style="border: 0px;" class="form-control big-shadow" value="<?php echo date("Y-d-m"); ?>">
        <td style="width:8%;" ><strong>Bill ID</strong></td>
        <td style="width:15%;"><?php echo $_SESSION['SESS_MEMBER_ID']; ?><input name="CODE" class="form-control big-shadow" type="hidden" size="12" id="CODE" value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>" style="border:0px;" /></td>
		<td style="width:7%;"><strong>Date</strong></td> 
		<td style="width:15%;" nowrap><?php echo date('Y-m-d H:i:s A');?></td>
		<td style="width:7%;"><strong>User</strong></td> 
		<td style="width:15%;"><?php echo $_SESSION['uname'];?></td> </tr>
	 </table>
	
<style>
h1,
h2,
h3,{
font-family: 'Droid Arabic Kufi' !important;
}
.my-custom-scrollbar {
position: absolute;
height: 590px;
width: 85%;
overflow: auto;
font-size: 13px;

align:right;
}
.table-wrapper-scroll-y {
display: block;
}
</style>

<div class="table-wrapper-scroll-y my-custom-scrollbar">
<table style="width:100%;" align="right" class="table table-bordered table-hover table-striped mb-0">

		                              <tr>
		                                <td style="text-align:center; width:5%;">Bill ID</td>
		                                <td style="text-align:center; width:20%;">Barcode</td>
		                                <td style="text-align:center; width:15%;">Item</td>
		                                <td style="text-align:center; width:10%;">Unit</td>
		                                <td style="text-align:center; width:10%;">Quntity</td>
		                                <td style="text-align:center; width:10%;">Price </td>
		                                <td style="text-align:center; width:10%;">Total</td>
		                                <td style="text-align:center; width:10%;">Vat </td>
		                                <td style="text-align:center; width:10%;">Total  + VAT</td>
		                              </tr>
		                            
		                            <tbody id="invoice_item" >
		<!--<tr>
		    <td><b id="number">1</b></td>
		    <td>
		        <select name="pid[]" class="form-control big-shadow form-control big-shadow-sm" required>
		            <option>Washing Machine</option>
		        </select>
		    </td>
		    <td><input name="qty[]" type="number" class="form-control big-shadow form-control big-shadow-sm" required></td>
		    <td><input name="tqty[]"  type="text" class="form-control big-shadow form-control big-shadow-sm"></td>   
		    <td><input name="price[]" type="number" class="form-control big-shadow form-control big-shadow-sm" readonly></td>
		    <td><input name="xmx[]" type="number" class="form-control big-shadow form-control big-shadow-sm" readonly></td>
		    <td>ريال.1540</td>
		</tr>-->
		                            </tbody>
                                </table>
								</div>  			</div>  			</div>  			</div>     
                                <table style="width:14%;" align="left" class="table table-bordered table-hover">
    <tr>
        <td><button name="ok2" autofocus onclick="pop();"  class="btn btn-raised gradient-purple-bliss white shadow-z-1-hover" style="width: 100%; height:50px;"> Save <i class="fa fa-qrcode"></i> </button></td>
    </tr>

	<tr>
         <td><a href="index.php"><button type="button" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hovere" style="width: 100%; height:50px;"> New <i class="ft-pie-chart"></i> </button></a></td>
        
	</tr>
	<tr>
         <td><a href="../Systeme/index.php"><button type="button" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hovere" style="width: 100%; height:50px;"> Home <i class="fa fa-home"></i> </button></a></td>
        
	</tr>
	<tr>
         <td><a href="login-exec.php" target="_blank"><button type="button" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hovere" style="width: 100%; height:50px;"> Hold  <i class="fa fa-pause-circle"></i> </button></a></td>
        
	</tr>
	<tr>
         <td><a href="logout.php"><button type="button" class="btn btn-raised gradient-purple-bliss white shadow-z-1-hovere" style="width: 100%; height:50px;"> Exit <i class="fa fa-user"></i> </button></a></td>
        
    </tr>
  
</table>
<div class="footer fixed-bottom" style="top: 690px;">
<table style="width:95%;" align="center" class="table table-bordered table-hover  btn-raised gradient-purple-bliss white shadow-z-1-hover">
  <tr>
  <td style="width:5%;">Price</td>
  <td style="width:10%;"><input type="number" autocomplete="off" step="0.01" readonly name="sub_total" class="form-control big-shadow" style="border: 0px;" id="sub_total" required/>
		<input type="hidden" autocomplete="off" name="discount" class="form-control big-shadow" style="border: 0px;" id="discount" required/></td>
  <td style="width:5%;">Tax</td>
  <td style="width:10%;"><input type="number" step="0.01" autocomplete="off" readonly name="su_total" class="form-control big-shadow" style="border: 0px;" id="su_total" required/>
		<input type="hidden" autocomplete="off" name="discount" class="form-control big-shadow" style="border: 0px;" id="discount" required/></td>
  <td style="width:5%;">Total</td>
  <td  style="width:10%;"><input type="number" step="0.01" autocomplete="off" readonly name="eu_total" class="form-control big-shadow" style="border: 0px;" id="eu_total" required/>
		<input type="hidden" autocomplete="off" step="0.01" name="discount" class="form-control big-shadow" style="border: 0px;" id="discount" required/></td>
  
  <td  style="width:5%;">Bayment</td>
  <td  style="width:10%;"><input type="hidden" name="year" value="20<?php echo date('y-m-d');?>"><select name="payment_type" class="form-control big-shadow" style="border: 0px; height: 35px; 
	 background-color:#CC3399; color:#FFFF00;" id="payment_type"  required>
	 <option ></option>
            <option value="1" style="background-color:#00CCFF; color:#FF0000;">Cash</option>
            <option value="2" style="background-color:#00CCFF; color:#FF0000;">Visa</option>
            <option value="3" style="background-color:#00CCFF; color:#FF0000;">Dept</option>
            </select></td>
			 
  <td  style="width:5%;">Discount </td>
  <td  style="width:10%;"><input type="number" step="00.01" min="0" autocomplete="off" name="paid" class="form-control big-shadow" style="border: 0px;" id="paid" ></td>
  <td  style="width:5%;"> remaining amount of</td>
  <td  style="width:10%;"><input type="number" step="00.01" autocomplete="off" Min="eu_total" readonly name="due" class="form-control big-shadow" style="border: 0px;" id="due" required/></td>
  
   </tr>
  
   </table>




<table style="width:100%;" class="table table-borderd table-hover">
        <td style="width:8%;"><script>
shortcut.add("Enter",function() {
	 document.getElementById("add").click();
},{
	'type':'keydown',
	'propagate':true,
	'target':document
});</script>

<script>
shortcut.add("ENTER",function() {
	 document.getElementById("POS").click();
},{
	'type':'keydown',
	'propagate':true,
	'target':document
});</script>

<script>
shortcut.add("DELETE",function() {
	 document.getElementById("remove").click();
},{
	'type':'keydown',
	'propagate':true,
	'target':document
});</script><button id="add" style="width:1%;" type="button" class="btn btn-raised gradient-pomegranate white"></i> </button></td>
        <td style="width:8%;"><button id="remove" type="button" style="width:1%;" class="btn btn-raised gradient-pomegranate white"></i></button></td>
		<td></td>
        <td style="width:15%;"></td>
     </table></form>
</div>