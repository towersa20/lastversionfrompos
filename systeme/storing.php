<?php
// ملف التصميم
include('header.php');?>
<div class="app-content content container-fluid">
<!-- نموذج اضافة البيانات بجدول Store -->
<form name="form1" method="post" action="storing.php">
<table class="table table-bordered table-hover" style="font-size: 14px;">
    <tr>
      <td colspan="8">Store an item in the warehouse   <i class="fab fa-accusoft"></i> </td>
    </tr>
	    <tr>
		<td>Barcode</td>
		<td><input type="text" name="barco" autofocus autocomplete="off" class="form-control big-shadow" required ></td>
      <td nowrap style="width: 7%;"> Product </td>
      <td colspan="3"><select name="a" class="selectpicker" data-live-search="true" data-style="btn-primary">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select DISTINCT(name) from share");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
            </select></td>
<td>الوحده</td>
<td><select name="unit" class="selectpicker" data-live-search="true" data-style="btn-primary">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select * from unitz");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
            </select></td>
    </tr>
      <tr>
	    <td style="width:8%;">Quntity  </td>
      <td style="width:17%;"><input type="number" name="c" min="1"  class="form-control big-shadow" required autocomplete="off"></td>
	    <td style="width:8%;">Price</td>
      <td style="width:17%;"><input  type="text" name="cx" min="0.000"   step="0.00" class="form-control big-shadow" required autocomplete="off"></td>
    
      <td style="width: 8%;" nowrap>Date </td>
      <td style="width:17%;"><input type="date"   value="20<?php echo date('y-m-d');?>" name="e" class="form-control big-shadow  " required autocomplete="off"></td>

      <td style="width: 8%;" nowrap>Store</td>
      <td  style="width:17%;"><select  name="f"  class="selectpicker" data-live-search="true" data-style="btn-primary">
	  <?php include("dbcon/dbcon.php"); $sq=mysql_query("select * from store"); $ro=mysql_fetch_array($sq);
	  ?>
	  <?php do { ?>
	  <option value="<?php echo $ro['name'];?>"><?php echo $ro['name'];?></option>
	  	  <?php }while($ro=mysql_fetch_array($sq));?>

      </select></td>
    </tr>
  </table>


<table style="width:100%; " align="center" class="table table-borderd table-hover">
    <tr>
      <td style="width:25%">&nbsp;</td>
      <td style="width:20%">&nbsp;</td>
      <td style="width:18%"><button type="submit" name="ok" class="btn btn-success" style="width: 100%; font-family: 'Droid Arabic Kufi';"> Save  <i class="fa fa-th-large"></i></button></td>
      <td style="width:18%"><a href="index.php"><button type="button" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> Home <i class="fa fa-home"></i></button></a></td>
      <td style="width:18%"><a href="store.php"><button type="button" class="btn btn-danger" style="width: 100%; font-family: 'Droid Arabic Kufi';"> New Store <i class="fa fa-th-large"></i></button></a></td>
    </tr>
  </table>
</form>
<!-- نهاية فورم الفاتورة -->


<!-- جدول عرض بيانات Store -->
<table style="width:100%; font-size:14px;"  align="center" class="table table-bordered table-hover">
<?php
// كود العرض
include('dbcon/dbcon.php');
$sql=mysql_query("select * from storing  order by sid desc limit 20");
$row=mysql_fetch_array($sql);
?>

<tr align="center">
<td style="width:12%;">Barcode</td>
<td style="width:18%;"> Product</td>
<td style="width:10%;">Unit</td>
<td style="width:10%;">Quntity</td>
<td style="width:10%;"> Sales</td>
<td colspan="3" style="width:14%;">Control</td>
</tr>


<?php do {
  ?>

<tr <?php
// اضافة لون للنص حسب Quntity المتبقية بStore
if($row['qunt']<10 ) 
{
  echo "style='color:#e60000';"; 
}
elseif($row['qunt']<100 )
{
  echo "style='color:#ff6600';"; 
}
elseif($row['qunt']<1000)
{
  echo "style='color:#0000b3';"; 
}
elseif($row['qunt']<10000 )
{
  echo "style='color:#009900';"; 
}
else
{
  // نهاية إضافة لون للنص
}?>>
<td nowrap><?php echo $row['barco'];?></td>
<td nowrap><?php echo $row['name'];?></td>
<td nowrap><?php echo $row['unit'];?></td>
<td nowrap><?php echo $row['qunt'];?></td>
<td nowrap><?php echo $row['price'];?></td>
<td align="center"><a href="delete.php?&&xsid=<?php echo $row['sid'];?>" onClick="return confirm('Do you want Delete <?php echo $row['name'];?>');"><button class="btn btn-danger" style="width: 100px; font-family: 'Droid Arabic Kufi';"> Delete <i class="fa fa-trash"></i></button></a></td>
<td align="center"><a href="upstoring.php?&&xsid=<?php echo $row['sid'];?>"><button class="btn btn-primary" style="width:100px;font-family: 'Droid Arabic Kufi';"> Edit <i class="fa fa-edit"></i></button></a></td>
<td align="center"><a href="storeview.php?&&barco=<?php echo $row['barco'];?>&&info=<?php echo $row['name'];?>"><button class="btn btn-warning" style="width: 100px;font-family: 'Droid Arabic Kufi';"> Details <i class="fas fa-clipboard-list"></i></button></a></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
</table>
  <!-- نهاية جدول عرض اليبانات -->

</body>
</html>
<?php

// كود تسجيل بيانات Store
include('dbcon/dbcon.php');
if(isset($_POST['ok']))
{
$a=$_POST['a'];
$c=$_POST['c'];
$e=$_POST['e'];
$f=$_POST['f'];
$cx=$_POST['cx'];
$barco=$_POST['barco'];
$unit=$_POST['unit'];
// البحث في سجل المخزم
$sql=mysql_query("select * from storing where barco='$_POST[barco]' and  tell ='$_SESSION[tell]'");
$row=mysql_fetch_array($sql);
if($row['name']==$_POST['a'])
{

$x1=$row['qunt'];
$x2=$_POST['c'];
$x3=$x1+$x2;

// كود التحديث الكميات الجديده الي الموجودة
$up=mysql_query("update storing set qunt='$x3',price='$cx' where barco='$_POST[barco]' and  tell ='$_SESSION[tell]'");
echo "<script type='text/javascript'>
$(document).ready(function(){
$('#centralModalSuccess').modal('show');
});
</script>";}
else
{
  
  // كود اضافة كمية جديدة الي كمية موجودة بStore
$user=mysql_query("insert into storing  values('null','$barco','$a','$unit','$cx','$c','$e',now(),'$f','$_SESSION[tell]')");
echo "<script type='text/javascript'>
$(document).ready(function(){
$('#centralModalSuccess').modal('show');
});
</script>";}
}
?>
<?php

// تسجيل البيانات بجدول حركة Store
include('dbcon/dbcon.php');
if(isset($_POST['ok']))
{
$a=$_POST['a'];
$c=$_POST['c'];
$cx=$_POST['cx'];
$e=$_POST['e'];
$f=$_POST['f'];
$barco=$_POST['barco'];
$unit=$_POST['unit'];
// اضافة بيانات حركة Store
$user=mysql_query("insert into mstor values('null','$barco','$a','$unit','$c','$cx','$f','$_SESSION[uname]','$e',now(),'$_SESSION[tell]')");
}?>



<?php
// كود تحديث بيانات Price بجدول الاصناف
include('dbcon/dbcon.php');
if(isset($_POST['ok']))
{
  // تعريف المتغيرات
$a=$_POST['a'];
$cx=$_POST['cx'];
$sql=mysql_query("select * from products where pid='$_POST[barco]'");
$row=mysql_fetch_array($sql);
if($row['product_name']==$_POST['a'])
{
  // تحديث قيمة Product في الاصناف
$up=mysql_query("update products set product_price='$cx' where pid='$_POST[a]'");
echo "<script type='text/javascript'>
$(document).ready(function(){
$('#centralModalSuccess').modal('show');
});
</script>";
}
else
{
  //إضافة بيانات جديده في حاله لايوجد بيانات من نفس Product
$user=mysql_query("insert into products  values('null','$_POST[barco]','$a','$_POST[unit]','$cx','1000000',1,'$_SESSION[tell]')");
echo "<script type='text/javascript'>
$(document).ready(function(){
$('#centralModalSuccess').modal('show');
});
</script>";}
}
?>

<!-- رسالة نتائج الحفظ -->
<div class="modal fade" id="centralModalSuccess" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-success" role="document">
    <!--Content-->
<div class="modal-content">
       <!--عنوان الرسالة-->
       <div class="modal-header">
         <p class="heading lead">POS</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--محتوي الرسالة-->
       <div class="modal-body">
         <div class="text-center">
           <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
           <p>Data Has been successfully  Saved</p>
         </div>
       </div>

       <!--نهاية الرسالة-->
       <div class="modal-footer justify-content-center">
         <a href="storing.php" type="button" class="btn btn-Primary waves-effect" style="width: 50%; font-family: 'Droid Arabic Kufi';" data-dismiss="">موافـق <i class=" fas fa-user-shield "></i></a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>