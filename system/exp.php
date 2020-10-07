<?php include("header.php");?>
 <div class="app-content content container-fluid">
<form name="form1" method="post" action="exp.php">
  <table style="width:100%; " align="center" class="table table-bordered table-hover " >

    <tr>
      <td colspan="4"><strong>تسجيل تصنيفات المصروفات</strong> <i class="fa ft-layers"></i></td>
    </tr>
    <tr>
      <td style="width:8%;">المصروف</td>
      <td colspan="3"><input type="text"  name="a" class="form-control big-shadow" required autocomplete="off"></td>
    </tr>
	</table>
	  <table style="width:100%; " align="center" class="table table-borderd table-hover animated flipInX" >
    <tr>
      <td style="width:15%;">&nbsp;</td>
      <td style="width:15%;">&nbsp;</td>
      <td style="width:15%;">&nbsp;</td>
      <td style="width:15%;">&nbsp;</td>
      <td style="width:10%;">&nbsp;</td>
      <td style="width:15%;"><button  type="submit" name="ok" class="btn btn btn-primary" style="width:100%;font-family: 'Droid Arabic Kufi';"> حــفظ <i class="fa fa-check"></i></button></td>
      <td style="width:15%;"><a href="index.php"><button type="button" class="btn btn-danger" style="width:100%;font-family: 'Droid Arabic Kufi';"> النظام <i class="fa fa-home"></i></button></a></td>
      <td style="width:8%;">&nbsp;</td>
    </tr>
  </table>
</form>
  <table style="width:100%; " align="center" class="table table-bordered table-hover  " >
<?php 
include('dbcon/config.php');
$sql=mysql_query("select * from exp");
$row=mysql_fetch_array($sql);
?>
<tr align="center">
<td style="width:100%; ">إسم المصروف</td>
<td colspan="2">التحكم</td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['name'];?></td>
<td align="center"><a href="delete.php?&&xid=<?php echo $row['xid'];?>" onClick="return confirm('هل تريد حذف <?php echo $row['name'];?>');">
        <button class="btn btn btn-danger" style="width: 100px;font-family: 'Droid Arabic Kufi';"> حذف <i class="fa fa-trash-o"></i></button></a></td>
<td align="center"><a href="upexp.php?&&xid=<?php echo $row['xid'];?>"><button class="btn btn-primary" style="width: 100px;font-family: 'Droid Arabic Kufi';"> تعديل <i class="fa fa-edit"></i></button></a></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
</table>
</body>
</html>
<?php 
include('dbcon/config.php');
if(isset($_POST['ok']))
{
$a=$_POST['a'];
$user=mysql_query("insert into exp values('null','$a')");
if($user)
{
  echo "<script type='text/javascript'>
  $(document).ready(function(){
  $('#centralModalSuccess').modal('show');
  });
  </script>";}
else
{
echo "<script> alert('لم يتم التسجيل');</script>";
echo "<meta http-equiv='refresh' content='0;url=exp.php'>";
}
}
?>




 <!-- Central Modal Medium Success -->
 <div class="modal fade" id="centralModalSuccess"  data-backdrop="static" data-keyboard="false"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
         <a href="exp.php" type="button" class="btn btn-Primary waves-effect" style="width: 50%; font-family: 'Droid Arabic Kufi';" data-dismiss="">موافـق <i class=" fas fa-user-shield "></i></a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->