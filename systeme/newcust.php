<?php include("header.php");?>

<!--///////////////////////////////////New Form////////////////////////////-->
<form name="form1" method="post" action="newcust.php" enctype="multipart/form-data">

<table style="width:100%; font-size:14px; font-family: 'Droid Arabic Kufi'; " align="center" class="table table-bordered table-hover">
<tr>
<td colspan="10">سداد مستحقات الموردين <i  class="fa fa-user"></i></td>
</tr>


<tr>

<td>المورد</td>

<td colspan="3">
      <select name="a" class="selectpicker" data-live-search="true" data-style="btn-primary">
    <?php
    include('dbcon/dbcon.php');
    $brim=mysql_query("select * from customer limit 30");
    $resa=mysql_fetch_array($brim);?>
    <option value="0"> أختر المورد</option>
    <?php 
    do
     {
     ?>
<option value="<?php echo $resa['name'];?>" ><?php echo $resa['name'];?></option>
<?php } while($resa=mysql_fetch_array($brim));?>
</select>
</td>

<td nowrap style="width: 7%;"> المبلغ المطلوب </td>

<td colspan="3">
     <input type="text" name="b"  class="form-control big-shadow " required id="search" placeholder="المبلغ المطلوب" autocomplete="off">
</td>
   
</tr>


<tr> 

<td nowrap style="width: 7%;"> المبلغ المدفوع </td>

<td colspan="3">
     <input type="text" name="c"  class="form-control big-shadow " required id="search" placeholder="المبلغ المدفوع" autocomplete="off">
</td>

<td nowrap style="width: 7%;"> المبلغ المتبقي </td>

<td colspan="3">
     <input type="text" name="d"  class="form-control big-shadow " required id="search" placeholder="المبلغ المتبقي" autocomplete="off">
</td>

</tr>


<tr> 

<td nowrap style="width: 7%;"> رقم الفاتورة </td>

<td colspan="3">
     <input type="text" name="e"  class="form-control big-shadow " required id="search" placeholder="رقم الفاتورة" autocomplete="off">
</td>

<td nowrap style="width: 7%;"> التاريخ </td>

<td><input name="f"  class="form-control" type="date" size="12" value="20<?php echo date('y-m-d');?>" required  />
</td>

</tr>

</table>
  <table style="width:100%; font-family: 'Droid Arabic Kufi'; " align="center" class="table table-borderd table-hover animated flipInX">
    <tr>
      <td style="width:50%;">&nbsp;</td>
      <td style="width:10%;">&nbsp;</td>

      <td style="width:15%;"><a href="record.php"><button type="button" class="btn btn-danger" style="width:100%; font-family: 'Droid Arabic Kufi';"> الموردين <i class="fa fa-home"></i></button></a></td>

      <td style="width:15%;"><button type="submit" name="ok" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> سداد <i class="fa fa-user"></i></button></td>

       
       </tr>
  </table>
</form>

<!------------------------------------------------------------------>

  
</body>
</html>
<?php 
include('dbcon/dbcon.php');
if(isset($_POST['ok']))
{
$a=$_POST['a']; //اسم المورد
$b=$_POST['b']; // المبلغ المطلوب
$c=$_POST['c']; // المبلغ المدفوع
$d=$_POST['d']; // المبلغ المتبقي
$e=$_POST['e']; // رقم الفاتورة
$f=$_POST['f']; // التاريخ

//insert
//$user=mysql_query("insert into payment values('null','$a','$b','$c','$d','$e','0','$g',now(),now(),'$n','$x')");

//update

//get data from database
// variable to check 
$check = true ;
$q = mysql_query("SELECT * FROM `payment`");
while ($n = mysql_fetch_array($q)) {
  if($e == $n['codes'])
  {// فاتورة موجودة اذا تحديث البيانات
    $check = false;
  }else
  { // فاتورة غير موجودة اذا اضافة 

  }
}

if($check == true){
  //new data
    $user=mysql_query("INSERT INTO `payment` (`pxid`, `cust`, `item`, `unit`, `qunt`, `price`, `total`, `pay`, `ex`, `date`, `datetime`, `costst`, `codes`) VALUES (NULL, '$a', '', '', '', '', '$b', '$c', '$d', '$f', '', '', '$e');");
  }else{
    // update data
  $user=mysql_query("UPDATE `payment` SET `cust` = '$a', `total` = '$b', `pay` = '$c' , `date` = '$f' , `ex` = '$d'   WHERE `payment`.`codes` = '$e'");
  }


if($user)
{
		
  echo "<script type='text/javascript'>
  $(document).ready(function(){
  $('#centralModalSuccess').modal('show');
  });
  </script>";
  
}
else
{
echo "<script> alert('لم يتم تسجيل العميــل');</script>";
echo "<meta http-equiv='refresh' content='0;url=newcust.php'>";
}
}
?>





 <!-- Central Modal Medium Success -->
 <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-success" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <p class="heading lead">نظام المبيعات</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
           <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
           <p>تم تسجيل البيانات بنجاح</p>
         </div>
       </div>

       <!--Footer-->
       <div class="modal-footer justify-content-center">
         <a href="newcust.php" type="button" class="btn btn-Primary waves-effect" style="width: 50%; font-family: 'Droid Arabic Kufi';" data-dismiss="">موافـق <i class=" fas fa-user-shield "></i></a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->