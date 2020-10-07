<?php include("header.php");



include("dbcon/dbcon.php");
$d=mysql_query("select*from share where pid='$_GET[pid]'");
$row=mysql_fetch_array($d);

// نهاية الكود
?>








<div class="container">
  <div style="margin: 10%;">
  	<h2 class="text-center"> BARCODE GENERATOR</h2>
  	<form class="form-horizontal" method="post" action="barcode.php" target="_blank">
  	<div class="form-group">
      <label class="control-label col-sm-2" for="product">Product Name:</label>
      <div class="col-sm-10">
        <input autocomplete="OFF" type="text" class="form-control" value="<?php echo $row['name'];?>" id="product" name="product" required="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="product_id">Barcode:</label>
      <div class="col-sm-10">
        <input autocomplete="OFF" type="text" class="form-control" id="product_id"  value="<?php echo $row['barco'];?>"  name="product_id" required="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="rate">Price</label>
      <div class="col-sm-10">          
        <input autocomplete="OFF" type="text" value="<?php echo $row['price'];?>" class="form-control" id="rate"  name="rate" required="">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="print_qty">NO of Copy</label>
      <div class="col-sm-10">          
        <input autocomplete="OFF" type="print_qty" class="form-control" id="print_qty"  name="print_qty" required="">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> Create <i class="fa fa-user"></i></button>      </div>
    </div>
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





