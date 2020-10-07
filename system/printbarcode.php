<?php include("header.php");



include("dbcon/dbcon.php");
$d=mysql_query("select*from share where pid='$_GET[pid]'");
$row=mysql_fetch_array($d);

// نهاية الكود
?>








<div class="container">
<table class="table table-bordered" style="width: 100%;">
  	<form class="form-horizontal" method="post" action="barcode.php" target="_blank">
      <tr>
        <td colspan="4">طباعة باركود الأصنــــاف</td>
      </tr>
  	<tr>
      <td style="width: 10%;">الصنف</td>
      <td>
        <input autocomplete="OFF" type="text" class="form-control" value="<?php echo $row['name'];?>" id="product" name="product" required="">
</td>

      <td  style="width: 10%;">الباركود</td>
      <td>
        <input autocomplete="OFF" type="text" class="form-control" id="product_id"  value="<?php echo $row['barco'];?>"  name="product_id" required="">
</td>
</tr>
    <tr>
      <td  style="width: 10%;">السعر</td>
      <td>          
        <input autocomplete="OFF" type="text" value="<?php echo $row['price'];?>" class="form-control" id="rate"  name="rate" required="">
</td>

      <td  style="width: 10%;">عدد النسخ</td>
      <td>          
        <input autocomplete="OFF" type="print_qty" class="form-control" id="print_qty"  name="print_qty" required="">
</td>
</tr>

    <tr>        
      <td align="left"  colspan="4">
      <button type="submit" class="btn btn-primary" style="width: 14%; font-family: 'Droid Arabic Kufi';"> انشاء <i class="fa fa-user"></i></button>      </td>
</tr>
  </form>
  </div>
</div>

</body>
</html>
<?php 
include('dbcon/dbcon.php');
if(isset($_POST['ok']))
{
$a=$_POST['a'];
$b=$_POST['b'];

$sql = mysql_query("select * from uservat where username='$_POST[a]' && pass='$_POST[b]'  ");
    $row = mysql_fetch_array($sql);

 ;
if($row["pass"] )
{

    // تخزين رقم الفاتورة في جلسة إتصال
                  $_SESSION['key'] = 1;
    // التوجيه الي شاشة المبيعات
        ///  header("location: vat.php?invoice=".$_SESSION['key'] );
            

    echo "<meta http-equiv='refresh' content='0;url=vat.php?invoice=a'>";
  

}
else
{
echo "<script> alert('كلمه المرور خطاء');</script>";

echo "<meta http-equiv='refresh' content='0;url=loginvat.php'>";
}
}
?>





