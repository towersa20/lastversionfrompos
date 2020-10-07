<?php session_start();?>
<link href="font/animate.min.css"  rel="stylesheet" type="text/css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/app.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/custom-rtl.css">
    <!-- END APEX CSS-->
<script>
// دالة تنسيق الطباعة
function printDiv() 
{
  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><title>تقرير المبيعات</title><body border="3" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
 //newWin.window.close();
  setTimeout(function(){newWin.close();},1);
}
//نهاية دالة تنسيق الطباعة

</script>
  <body style="font-family: 'Droid Arabic Kufi', serif;" data-open="click" data-menu="vertical-menu">
  <!-- بداية عرض التقرير الاول -->
<?php if(isset($_POST['ok2']))
{ ?>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">

<center>
  
    <!-- بداية ترويسة التقرير -->

<table style="width:95%; font-size: 18px;" border="1" align="center" class="table table-bordered table-hover ">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);
    ?>
    <?php do {  $tell=$query['phone'];?><tr>
        <td align="center" style="width:25%;" ><strong>مؤسسة اطايب دنيا للتجارة <br> أطايب للبلاستيك
    <BR>  س . ت <?php echo $query['lino'];?></strong></td>
        <td align="center" style="width:50%;" ><?php echo '<img src="../System/file/' .$query['imge']. '"width="80" height="70"> '; ?><BR>
     <strong> الرقم الضريبي <?php echo $query['taxno'];?> VAT No.</strong></td>
        <td align="center" style="width:25%;" ><strong>Atheeb Duniya Tradin Est.<br>Atheeb for Plastic <br>
      C.R <?php echo $query['lino'];?>  </strong></td>
        </tr>


    <?php } while ($query=mysql_fetch_array($link));?>
</table>


<table class="table table-bordered"  border="1" bordercolor="blue" align="center" dir="rtl"  style="width:95%;border-radius:1.7em;  font-size: 18px; background-color: wheat; ">
<tr>
  <td style="width: 25%;"><strong> رقم الفاتورة <?php echo $_POST['CODE'];?></strong></td>
  <td style="width: 25%;"> <strong>التاريخ - Date : <?php echo date('Y-m-d');?></strong></td>
  
  <td style="width: 25%;"><strong>نوع الفاتورة  :  <?php if($_POST['payment_type']==1)
  {
    echo "نقداً";
  }
  elseif($_POST['payment_type']==2)
  {
    echo "شبكة";
  }
  elseif($_POST['payment_type']==3)
  {
    echo "أجل";
  }
  ?></strong></td>
  <td style="width: 25%;"><strong>إسم العميل  <?php echo $_POST['cust_name'];?></strong></td>
</tr>
<TR>
  <TD colspan="4" align="CENTER"><strong>الأسعار شاملـة ضريبة القيمة المضافة 15%</strong></TD>
</TR>
</table>


<table class="table table-bordered" bordercolor="blue" align="center" border="1" dir="rtl"  style="width:95%; font-size: 13px;">
  <tr align="center" style="background-color: pink;color:blue;">
  <td><strong>رقم الصنف<br> Item No.</strong></td>
  <td><strong> البيــــــــــــــــان<br> Description</strong></td>
  <td><strong>الكمية<br> Qty</strong></td>
  <td><strong>الوحدة<br> Unit</strong></td>
  <td><strong>سعر الوحدة<br> Unit Price</strong></td>
  <td><strong>الضريبة<br> Total+tax</strong></td>
  <td><strong>الإجمالي<br> Total</strong></td>

  </tr>
  <?php
	  include('dbcon/dbcon.php');
	  $pid=$_POST['pid'];
	   if($pid!= NULL){
{
for($i = 0; $i <count($pid); $i++)
{?> 
  <tr algin="right">
  <?php include('dbcon/dbcon.php');
 $inx=$_POST['pid'][$i];
$sqlx=mysql_query("select*from storing where barco='$inx'");
$rowx=mysql_fetch_array($sqlx);
 $tot=$rowx['qunt']-$_POST['qty'][$i];
$update=mysql_query("update storing set qunt='$tot'  where barco='$inx'");
?>
    
  <td algin="right" style="width:10%;"><?php  echo $infodate=$_POST['pid'][$i];?></td>
  <td algin="right" style="width:38%;"><?php echo $_POST['product_name'][$i];?></td>
  <td algin="right" style="width:9%;"><?php echo $xx1=$_POST['qty'][$i];?></td>
  <td algin="right" style="width:9%;"><?php echo $_POST['unit'][$i];?></td>
  <td algin="right" style="width:11%;"><?php  $xx2=$_POST['tell'][$i]; $xx2= sprintf("%01.2f", $xx2);  echo $xx2;?></td>
  <td algin="right" style="width:11%;"><?php  $add=$xx1*$xx2*15/100; $add= sprintf("%01.2f", $add);  echo $add;?></td>
  <td algin="right" style="width:12%;"><?php  $sumx4=$xx1*$xx2; $sumx4= sprintf("%01.2f", $sumx4);  echo $sumx4;?></td>
  </tr>
  <?php }}}?>
</table>
<style>
div.a {
  position: relative;
  width: 100%;
}

</style>
<div class="a" style="top:150px;">
<table class="table table-bordered" bordercolor="blue" align="center" border="1" dir="rtl"  style="width:95%; font-size: 15px;">
  <tr style="color:blue;" align="center">
  <td style="width: 77%;" colspan="5"></td>
  <td style="width: 15%;">الإجمالي </td>
  <td  style="background-color: pink; width: 15%;" ><?php  $ab1=$_POST['sub_total'];  $ab1= sprintf("%01.2f", $ab1);  echo $ab1;?></td>
  </tr>
  <tr style="color:blue;"  align="center">
  <td colspan="5"></td>
  <td>الخصم </td>
  <td  style="background-color: pink;" ><?php echo $sumx3=$_POST['paid']; $sumx3= sprintf("%01.2f", $sumx3);  echo $sumx3;?></td>
  </tr>
  <tr style="color:blue;"  align="center">
  <td colspan="5"></td>
  <td>قيمة مضافة </td>
  <td  style="background-color: pink;" ><?php  $sumx2=$ab2=$_POST['su_total']; $sumx2= sprintf("%01.2f", $sumx2);  echo $sumx2; ?></td>
  </tr>
  <tr  style="color:blue;"  align="center">
  <td style="background-color: pink;" colspan="5"></td>
  <td style="background-color: pink;" >الصافي </td>
  <td style="background-color: pink;" ><?php $sumx1=$ab1-$_POST['paid']; $sumx1= sprintf("%01.2f", $sumx1);  echo $sumx1;?></td>
  </tr>

</table>
<br>

<table class="table table-bordered" bordercolor="blue" align="center" border="1" dir="rtl"  style="width:95%; font-size: 15px;">
<td style="width:8%;">المستلم</td>
<td style="width:42%;"></td>
<td style="width:8%;">المستخدم</td>
<td style="width:42%;"><?php echo $_SESSION['uname'];?></td>
</table>
<table class="table table-bordered" bordercolor="blue" align="center" border="1" dir="rtl"  style="width:95%; font-size: 15px;">

<tr>
  <td align="center"  style="width:50%;">أطايب للبلاستيك</td>
  <td align="center"  style="width:50%;">هاتف <?php echo $tell;?></td>

</tr>
<tr>
  <td colspan="2" align="center">الخالدية : شارع الأمير محمد بن سعود بن فيصل</td>

  </tr>
</table>
</div>
<Br>


<?php 
if(isset($_POST['ok2'])){
include("dbcon/dbcon.php"); 
$pid=$_POST['pid'];
$code=$_POST['CODE'];
$sum1=$_POST['sum1'];
$sum2=$_POST['sum2'];
$pro_name=$_POST['pro_name'];
$qty=$_POST['qty'];
$tell=$_POST['tell'];
$payment_type=$_POST['payment_type'];
$discount=$_POST['discount'];
$cust_name=$_POST['cust_name'];


if($pro_name!= NULL){
{
for($i = 0; $i <count($pro_name); $i++)
{
$add=mysql_query("insert into sales values('','$code','".$_POST['pid'][$i]."','".$_POST['qty'][$i]."','".$_POST['product_name'][$i]."','".$_POST['tell'][$i]."'
,'0','".$_POST['unit'][$i]."',now(),now(),'$_POST[payment_type]','$_SESSION[uname]','15','1')");
//new
}
if($add)
{
//echo "<meta http-equiv='refresh' content='0;url=login-exec.php'>";
}}}}?>



<script type="text/VBScript" language="VBScript">
        Sub Print()
               OLECMDID_PRINT = 6
               OLECMDEXECOPT_DONTPROMPTUSER = 2
               OLECMDEXECOPT_PROMPTUSER = 1
               call WB.ExecWB(OLECMDID_PRINT, OLECMDEXECOPT_DONTPROMPTUSER,1)
        End Sub
        document.write "<object ID='WB' WIDTH=0 HEIGHT=0 CLASSID='CLSID:8856F961-340A-11D0-A96B-00C04FD705A2'></object>"
</script>

<script type="text/javascript">
   setTimeout(function() { 
        window.print();
        self.close();
        window.location = 'mpos.php';

   }, 1000);
</script>


    
<?php } ?>