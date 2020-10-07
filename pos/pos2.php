<script src="js/shortcut.js"></script>
<script>
function disable_f5(e)
{
  if ((e.which || e.keyCode) == 116)
  {
      e.preventDefault();
  }
}

$(document).ready(function(){
    $(document).bind("keydown", disable_f5);    
});
document.addEventListener('contextmenu', event => event.preventDefault());

</script>
<form action="print5.php" method="post" enctype="multipart/form-data">
<table style="width:100%;" class="table table-bordered table-hover">
    <tr>
        <td style="width:9%;">  <strong>المبيعــات</strong>  <i class="fa fa-shopping-basket"></i></td>
        <td style="width:24%;"><input type="text" name="cust_name" style="border:0px;" class="form-control big-shadow "  id="search" placeholder="أختــر العميـل" list="searchrxxt" autocomplete="off">
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
        <td style="width:8%;" ><strong>الفاتــورة</strong></td>
        <td style="width:15%;"><?php echo $_SESSION['SESS_MEMBER_ID']; ?><input name="CODE" class="form-control big-shadow" type="hidden" size="12" id="CODE" value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>" style="border:0px;" /></td>
		<td style="width:7%;"><strong>التاريخ</strong></td> 
		<td style="width:15%;" nowrap><?php echo date('Y-m-d H:i:s A');?></td>
		<td style="width:7%;"><strong>المستخدم</strong></td> 
		<td style="width:15%;"><?php echo $_SESSION['uname'];?></td> </tr>
	 </table>
<table style="width:100%;" class="table table-bordered table-hover">

		                              <tr>
		                                <td style="text-align:center; width:5%;">ترقيم</td>
		                                <td style="text-align:center; width:20%;">باركود</td>
		                                <td style="text-align:center; width:15%;">اسم الصنف</td>
		                                <td style="text-align:center; width:10%;">الوحده</td>
		                                <td style="text-align:center; width:10%;">الكميه</td>
		                                <td style="text-align:center; width:10%;">سعر الوحده </td>
		                                <td style="text-align:center; width:10%;">قبل الضريبة</td>
		                                <td style="text-align:center; width:10%;">ضريبة القيمة </td>
		                                <td style="text-align:center; width:10%;">جملة المبلغ </td>
		                              </tr>
		                            
		                            <tbody id="invoice_item">
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

<table style="width:100%;" class="table table-bordered table-hover">
    <tr>
        <td style="width: 20%;"><button name="ok2" class="btn btn-raised gradient-pomegranate white" style="width: 100%;"> طباعة POS <i class="fa fa-qrcode"></i> </button></td>
		<td style="width: 20%;"><button name="ok1"  type="submit" class="btn big-shadow" style="width: 100%;"> حفظ A4 <i class="fa fa-print"></i> </button></td>
        <td style="width: 20%;"><a href="vsales.php"><button type="button" name="ok3" class="btn btn-raised gradient-pomegranate white" style="width: 100%;"> بحـث <i class="fa fa-search"></i></button></a></td>
        <td style="width: 20%;"><a href="salr2.php"><button type="button" class="btn big-shadow" style="width: 100%;"> التقارير <i class="ft-pie-chart"></i> </button></a></td>
        <td style="width: 20%;"><a href="index.php"><button type="button" class="btn btn-raised gradient-pomegranate white" style="width: 100%;"> الرئيسية <i class="fa fa-home"></i> </button></a></td>

</tr>
</table>

<table style="width:100%;" class="table table-bordered table-hover">
  <tr>
  <td style="width:8%;">الإجمالي</td>
  <td style="width:17%;"><input type="number" autocomplete="off" step="0.01" readonly name="sub_total" class="form-control big-shadow" style="border: 0px;" id="sub_total" required/>
		<input type="hidden" autocomplete="off" name="discount" class="form-control big-shadow" style="border: 0px;" id="discount" required/></td>
  <td style="width:11%;">القيمة المضافة</td>
  <td style="width:17%;"><input type="number" step="0.01" autocomplete="off" readonly name="su_total" class="form-control big-shadow" style="border: 0px;" id="su_total" required/>
		<input type="hidden" autocomplete="off" name="discount" class="form-control big-shadow" style="border: 0px;" id="discount" required/></td>
  <td style="width:18%;">الإجمالي بعد القيمة المضافة</td>
  <td colspan="2"><input type="number" step="0.01" autocomplete="off" readonly name="eu_total" class="form-control big-shadow" style="border: 0px;" id="eu_total" required/>
		<input type="hidden" autocomplete="off" step="0.01" name="discount" class="form-control big-shadow" style="border: 0px;" id="discount" required/></td>
  </tr> 
  <td>الدفـــــــع</td>
  <td><input type="hidden" name="year" value="20<?php echo date('y-m-d');?>"><select name="payment_type" class="form-control big-shadow" style="border: 0px; height: 35px; 
	 background-color:#CC3399; color:#FFFF00;" id="payment_type" required/>
            <option value="نقدا" style="background-color:#00CCFF; color:#FF0000;">نقــــــدا</option>
            <option value="شبكة" style="background-color:#00CCFF; color:#FF0000;">بنــــكـ</option>
            <option value="أجل" style="background-color:#00CCFF; color:#FF0000;">أجـــــل</option>
            </select></td>
  <td>المبلغ المدفـــوع</td>
  <td><input type="number" step="00.01" min="0" autocomplete="off" name="paid" class="form-control big-shadow" style="border: 0px;" id="paid" required></td>
  <td>المبلـــــــغ المتبقـــي للزبـــــــــون</td>
  <td><input type="number" step="00.01" autocomplete="off" Min="eu_total" readonly name="due" class="form-control big-shadow" style="border: 0px;" id="due" required/></td>
   <tr>
   </table>
   
<table style="width:100%;" class="table table-borderd table-hover">
        <td style="width:8%;"><script>
shortcut.add("CTRL",function() {
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
});</script><button id="add" style="width:100%;" class="btn btn-raised gradient-pomegranate white"> صنف جديد <i class="fa fa-plus"></i> </button></td>
        <td style="width:8%;"><button id="remove" style="width:100%;" class="btn btn-raised gradient-pomegranate white"> إزالة صنف <i class="fa fa-remove"></i></button></td>
		<td></td>
        <td style="width:15%;"></td>
        <td style="width:15%;"><a href="vquery.php"><button id="do2" type="button" style="width:100%;" class="btn btn-raised gradient-pomegranate white">إستعلام <i class="fa fa-search"></i></button></a></td>
        <td style="width:15%;"><!--<button id="do3" type="submit" style="width:100%;" class="btn btn-raised gradient-pomegranate white"> مرتجع <i class="fa fa-undo"></i></button>!--></td>
        <td style="width:15%;"><!--<button id="do4" name="do4" type="submit" style="width:100%;" class="btn btn-raised gradient-pomegranate white"> تأخير <i class="fa fa-user-plus"></i></button>!--></td>
</table></form>
