<?php
// بداية جلسة الإتصال
 session_start();?>

<html dir="rtl">
  <!-- توجيه الصفحة rtl => right to left direction !-->  
<link rel="stylesheet" type="text/css" href="font/mystyle.css">
<link rel="stylesheet" type="text/css" href="font/font_face.css">
<link rel="stylesheet" type="text/css" href="font/animate.min.css">
<link rel="stylesheet" type="text/css" href="font/animate.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="نظام إدارة مبيعات  من شركة برجي التقني" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- ملف الشعار -->
        <link rel="شعار النظام" href="green-rtl/image/logo.png" src="image/logo.png">
        <link rel="shortcut icon" href="green-rtl/image/logo.png" />
        <!-- مكتبات تصميم وتنسيق الواجهة -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />

        
        <link href="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
        <!--  نهاية مكتبات تصميم وتنسيق الواجهة  -->


                <!-- مكتبات تعريف الخطوط والتاثيرات -->
<link rel="stylesheet" type="text/css" href="print/animate.css">
<link rel="stylesheet" type="text/css" href="print/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="print/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="print/style.css">
<link rel="stylesheet" type="text/css" href="print/theme.css">
<link rel="stylesheet" type="text/css" href="print/li-scroller.css">
<link rel="stylesheet" type="text/css" href="print/animate.css">
<link rel="stylesheet" type="text/css" href="print/animate.css">
<script src="print/bootstrap.min.js"></script>

        <!--نهاية مكتبة تعريف الخطوط -->
      
<div class="col-md-3 col-lg-3 round">
<?php
// استدعاء ملف الاتصال بقاعدة
include("dbcon/dbcon.php");
// كود عرض بيانات المؤسسة في الفاتورة
$sql=mysql_query("select * from systematical limit 1"); $row=mysql_fetch_array($sql);$logo=$row['ar']?>



<table class="table table-bordered" border="1" style="width:20%; font-size:13px;">
    <tr>
        <td colspan="5" align="center"><?php echo $logo;?></td>
    </tr>
    <?php include("dbcon/dbcon.php");
    // كود عرض بيانات الفاتورة
$sql=mysql_query("select sum(qty),invoice,name,category,qty ,product,price,discount,transaction_id from sales where invoice='$_SESSION[SESS_MEMBER_ID]' GROUP BY NAME");
$row=mysql_fetch_array($sql);?>

    <tr>
    <td><strong>الصنف</strong></td>
    <td><strong>الكمية</strong></td>
    <td><strong>السعر</strong></td>
    <td><strong>الضريبة</strong></td>
    <td><strong>الإجمالي</strong></td>
    </tr>
    <?php 
    // حلقة تكرار الاصناف 
    do { ?>
    <tr>

    <td><?php echo $row['name'];?></td>
    <td><?php echo $x1=$row['qty'];?></td>
    <td><?php echo $x2=$row['price'];?></td>
    <td><?php echo $z1=$x1*$x2;?></td>
    <td><?php echo $z1*5/100+$z1;?></td>
    </tr>
    <?php
// كود نهاية حلقة التكرار
 }while($row=mysql_fetch_array($sql));?>
    <tr>
    <td colspan="2"><strong>جملة المبلغ</strong></td>
    <td colspan="3"> 
    <?php include("dbcon/dbcon.php");
    // كود عرض مجموع الفاتورة
$sql=mysql_query("select sum(qty*price) from sales where invoice='$_SESSION[SESS_MEMBER_ID]' GROUP BY NAME");
$row=mysql_fetch_array($sql);
echo $sum=$row['sum(qty*price)'];?>

    <tr>
    <td colspan="2"><strong>شامل الضريبة</strong></td>
    <td colspan="3"><?php // كود حساب اجمالي الفاتورة
     echo $end=$sum*5/100+$sum;?></td>
    </tr>

    <tr>
    <td colspan="2"><strong> المبلغ بالحروف</strong></td>
    <td colspan="3">  <?php 
    // كود مجموع الفاتورة بالحروف العربية
  include('tech/I18N/Arabic.php'); $obj = new I18N_Arabic('Numbers'); print $obj->int2str($end);?></td>
    </tr>

</td>
    </tr>
</table>
</div>
</html>

<script type="text/javascript">
// كود الطباعة
      window.onload = function() { window.print(); }
 </script>
 <?php
if(isset($_GET['print']))
{

    // كود التوجيه الي نافذة المبيعات والطباعة
echo "<script type='text/javascript'>
window.onload = function() { window.print(); }
</script>";
echo "<meta http-equiv='refresh' content='0;url=exe.php'>";
}
else
{
    // كود التوجيه الي نافذة المبيعات 
    echo "<meta http-equiv='refresh' content='0;url=exe.php'>";

}
 ?>