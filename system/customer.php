<?php include("header.php");?>
<form name="form1" method="post" action="customer.php" enctype="multipart/form-data">
  <table style="width:100%; font-size:14px; font-family: 'Droid Arabic Kufi'; " align="center" class="table table-bordered table-hover">
    <tr>
      <td colspan="8">تسجيــل بيانات العملاء <i  class="fa fa-user"></i></td>
    </tr>
    <tr>
      <td>العميـل</td>
      <td colspan="7"><input type="text"  name="a" class="form-control"  autocomplete="off"></td>
    </tr>
    <tr>
      <td>الهاتـف</td>
      <td><input type="number" min="0500000000"  name="b" class="form-control"  autocomplete="off"></td>
      <td>النـــــــوع</td>
      <td><input type="text" name="c"  class="form-control"  autocomplete="off"></td>
      <td>البنك</td>
      <td style="width:18%; "><select class="selectpicker" data-live-search="true" data-style="btn-primary" name="d" class="form-control" >
	  <?php include('dbcon/dbcon.php');
	  $sq=mysql_query("select * from bank");
	  $ro=mysql_fetch_array($sq);?>
	  <option></option>
	  <?php do { ?>
	  <option value="<?php echo $ro['name'];?>"><?php echo $ro['name'];?></option>
	  <?php } while($ro=mysql_fetch_array($sq));?>
	  </select></td>
      <td nowrap>رقم الحساب</td>
      <td><input type="text" name="e"  class="form-control"  autocomplete="off"></td>
    </tr>
</table>
  <table style="width:100%; font-family: 'Droid Arabic Kufi'; " align="center" class="table table-borderd table-hover animated flipInX">
    <tr>
      <td style="width:15%;">&nbsp;</td>
      <td style="width:15%;">&nbsp;</td>
      <td style="width:15%;"><button type="submit" name="ok" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> تسجيــل <i class="fa fa-user"></i></button></td>
      <td style="width:15%;"><a href="vcustom.php"><button type="button" class="btn btn-warning "  style="width: 100%; font-family: 'Droid Arabic Kufi';"> البحـث <i class="fa fa-search"></i></button></a></td>
      <td style="width:15%;"><a href="repperson.php"><button type="button" class="btn btn-info"  style="width: 100%; font-family: 'Droid Arabic Kufi';"> التقارير <i class="mdi mdi-finance"></i></button></a></td>
      <td style="width:15%;"><a href="crecord.php"><button type="button" class="btn btn-success "  style="width: 100%; font-family: 'Droid Arabic Kufi';"> رجوع <i class="fa fa-undo"></i></button></a></td>
    </tr>
  </table>
</form>
  <table style="width:100%; font-size:14px; " align="center" class="table table-bordered table-hover">
<?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select * from person order by prid desc limit 3");
$row=mysql_fetch_array($sql);
?>
<tr align="center">
<td nowrap style="width:20%; ">إسم العميل</td>
<td nowrap style="width:15%; ">رقم الهاتف</td>
<td nowrap style="width:15%; ">نوع العميل</td>
<td nowrap style="width:15%; ">البنك </td>
<td nowrap style="width:10%; ">رقم الحساب </td>
<td colspan="2" nowrap style="width:25%; ">التحكم</td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['name'];?></td>
<td nowrap><?php echo $row['phone'];?></td>
<td nowrap><?php echo $row['type'];?></td>
<td nowrap><?php echo $row['bank'];?></td>
<td nowrap><?php echo $row['acount'];?></td>
<td align="center"><a href="delete.php?&&prid=<?php echo $row['prid'];?>" onClick="return confirm('هل تريد حذف <?php echo $row['name'];?>');">
        <button class="btn btn-danger" style="width:100%; font-family: 'Droid Arabic Kufi';"> حذف <i class="fa fa-times"></i></button></a></td>
<td align="center"><a href="upcustm.php?&&prid=<?php echo $row['prid'];?>">
        <button class="btn btn-primary" style="width:100%; width: 100%; font-family: 'Droid Arabic Kufi';"> تعديل <i class="fa fa-edit"></i></button></a></td>
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
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];
$e=$_POST['e'];
$user=mysql_query("insert into person values('null','$a','$b','$c','$d','$e',now())");
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
echo "<meta http-equiv='refresh' content='0;url=customer.php'>";
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
         <a href="customer.php" type="button" class="btn btn-Primary waves-effect" style="width: 50%; font-family: 'Droid Arabic Kufi';" data-dismiss="">موافـق <i class=" fas fa-user-shield "></i></a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->