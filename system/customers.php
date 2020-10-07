<?php include("header.php");?>
<form name="form1" method="post" action="newcust.php" enctype="multipart/form-data">
  <table style="width:100%; font-size:14px; font-family: 'Droid Arabic Kufi'; " align="center" class="table table-bordered table-hover">
    <tr>
      <td colspan="8">تسجيــل بيانات الموردين <i  class="fa fa-user"></i></td>
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
      <td nowrap style="width: 7%;"> الصنف </td>
      <td colspan="3"><select name="b" class="selectpicker" data-live-search="true" data-style="btn-primary">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select DISTINCT(name) from share");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
            </select></td>

<td>الوحده</td>
<td><select name="c" class="selectpicker" data-live-search="true" data-style="btn-primary">
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
    <td>الكميه</td>
      <td><input type="text"  name="d" class="form-control"  autocomplete="off"></td>
      <td>السعر</td>
      <td><input type="text"  name="e" class="form-control"  autocomplete="off"></td>
     <td>المدفوع</td>
      <td><input type="text" name="g"  class="form-control"  autocomplete="off"></td>
      <td>الطريقه</td>
      <td style="width:18%; ">
      <select name="n" class="selectpicker" data-live-search="true" data-style="btn-primary">
<option value="نقدا">نقدا</option>
<option value="شبكة">شبكة</option>
<option value="أجل">أجل</option>

</td>
<td>الفاتورة</td>
      <td><input type="text"  name="x" class="form-control"  autocomplete="off"></td>

</tr>
     </tr>
</table>
  <table style="width:100%; font-family: 'Droid Arabic Kufi'; " align="center" class="table table-borderd table-hover animated flipInX">
    <tr>
      <td style="width:60%;">&nbsp;</td>
      <td style="width:25%;">&nbsp;</td>
      <td style="width:15%;"><button type="submit" name="ok" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> تسجيــل <i class="fa fa-user"></i></button></td>
       </tr>
  </table>
</form>
  
</body>
</html>
<?php 
include('dbcon/dbcon.php');
if(isset($_POST['ok']))
{
$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];
$e=$_POST['e'];
$g=$_POST['g'];
$n=$_POST['n'];
$x=$_POST['x'];

$user=mysql_query("insert into payment values('null','$a','$b','$c','$d','$e','0','$g',now(),now(),'$n','$x')");
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