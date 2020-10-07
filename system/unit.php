<?php include("header.php");?>
 <div class="app-content content container-fluid">
<br>
<form name="form1" method="post" action="unit.php">
  <table style="width:100%; " align="center" class="table table-bordered table-hover animated flipInX">

    <tr>
      <td colspan="3"><strong>تسجيل وحدات القيـاس</strong> <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td style="width:8%;">الوحــــــــدة</td>
      <td colspan="2"><input type="text" name="a" class="form-control" required autocomplete="off"></td>
       </tr>
  </table>
  <table style="width:100%;" align="center" class="table table-borderd table-hover  " >
    <tr>
      <td colspan="2" style="width:50%;">&nbsp;</td>
      <td style="width:25%;"><button  type="submit" name="ok" class="btn btn-primary" style="width:100%;font-family: 'Droid Arabic Kufi';"> حــفظ <i class="fa fa-check"></i></button></td>
      <td style="width:25%;"><a href="index.php"><button type="button" class="btn btn-primary" style="width:100%;font-family: 'Droid Arabic Kufi';"> النظام <i class="fa fa-home"></i></button></a></td>
    </tr>
  </table>
</form>
  <table style="width:100%; " align="center" class="table table-bordered table-hover animated flipInX">
<?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select * from unitz ");
$row=mysql_fetch_array($sql);
?>
<tr align="center">
<td style="width:15%; ">كود الوحدة</td>
<td style="width:50%; ">وحدة القياس</td>
<td colspan="2">التحكم</td>
</tr>
<?php $i=0; do { $i=$i+1; ?>
<tr>
<td nowrap><?php echo $i;?></td>
<td nowrap><?php echo $row['name'];?></td>
<td align="center"><a href="delete.php?&&yid=<?php echo $row['yid'];?>" onClick="return confirm('هل تريد حذف <?php echo $row['name'];?>');">
        <button class="btn btn-danger" style="width: 100%;font-family: 'Droid Arabic Kufi';"> حذف <i class="fa fa-times"></i></button></a></td>
<td align="center"><a href="upunit.php?&&yid=<?php echo $row['yid'];?>"><button class="btn btn-info" style="width: 100%;font-family: 'Droid Arabic Kufi';"> تعديل <i class="fa fa-edit"></i></button></a></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
</table>
</body>
</html>
<?php 
include('dbcon/dbcon.php');
if(isset($_POST['ok']))
{
$a=$_POST['a'];
$user=mysql_query("insert into unitz values('null','$a','0','0')");
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
echo "<script> alert('لم يتم التسجيــل');</script>";
echo "<meta http-equiv='refresh' content='0;url=unit.php'>";
}
}
?>






 <!-- Central Modal Medium Success -->
 <div class="modal fade" id="centralModalSuccess" data-backdrop="static" data-keyboard="false"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
         <a href="unit.php" type="button" class="btn btn-Primary waves-effect" style="width: 50%; font-family: 'Droid Arabic Kufi';" data-dismiss="">موافـق <i class=" fas fa-user-shield "></i></a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->