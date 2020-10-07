<?php include("header.php");?>
<?php /* if(date('d-m-y')<=19-01-30)
{
echo "<script> alert('سداد   ');</script>";
echo "<meta http-equiv='refresh' content='0;url=../login.php'>";
}*/?>
<div class="app-content content container-fluid">
<br>
<form name="form1" method="post" action="bank.php">
  <table style="width:100%; font-size:14px; " align="center" class="table table-bordered table-hover " >

    <tr>
      <td colspan="3">Add New Bank <i class=" fab fa-accusoft "></i></td>
    </tr>
    <tr>
      <td style="width:6%;"><strong>Bank</strong></td>
      <td colspan="3"><input type="text"   name="a" class="form-control big-shadow" required autocomplete="off"></td>
    </tr>
    <tr>
	</table>
  <table style="width:100%; " align="center" class="table table-borderd table-hover  " >
    <tr>
      <td colspan="2" style="width:70%;">&nbsp;</td>
      <td style="width:15%;"><button  type="submit" name="ok" class="btn btn-primary" style="width:100%; font-family: 'Droid Arabic Kufi';"> Save <i class="fa fa-check"></i></button></td>
      <td style="width:15%;"><a href="index.php"><button type="button" class="btn btn-warning" style="width:100%; font-family: 'Droid Arabic Kufi';"> Home <i class="fa fa-home"></i></button></a></td>
    </tr>
  </table>
</form>
  <table style="width:100%; font-size:14px;" align="center" class="table table-bordered table-hover  " >
<?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select * from bank");
$row=mysql_fetch_array($sql);
?>
<tr align="center">
<td style="width:90%;"><strong>Bank</strong></td>
<td colspan="2"><strong>Control</strong></td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['name'];?></td>
<td align="center"><a href="delete.php?&&bid=<?php echo $row['bid'];?>" onClick="return confirm('Do you want Delete <?php echo $row['name'];?>');">
        <button class="btn btn-danger" style="width: 100px; font-family: 'Droid Arabic Kufi';"> Delete <i class="fa fa-times"></i></button></a></td>
<td align="center"><a href="upbank.php?&&bid=<?php echo $row['bid'];?>"> <button class="btn btn-primary" style="width: 100px; font-family: 'Droid Arabic Kufi';"> Edit <i class="fa fa-edit"></i></button></a></td>
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
$user=mysql_query("insert into bank values('null','$a')");
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
echo "<script> alert('لم يتم التسجيل');</script>";
echo "<meta http-equiv='refresh' content='0;url=bank.php'>";
}
}
?>





 <!-- كود عرض الكارد -->
 <div class="modal fade" id="centralModalSuccess"  data-backdrop="static" data-keyboard="false"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-success" role="document">
     <!--عنوان الكارد-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <p class="heading lead">POS</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--محتوي الكارد-->
       <div class="modal-body">
         <div class="text-center">
           <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
           <p>Data Has been successfully  Saved</p>
         </div>
       </div>

       <!--زيل الكارد-->
       <div class="modal-footer justify-content-center">
         <a href="bank.php" type="button" class="btn btn-Primary waves-effect" style="width: 50%; font-family: 'Droid Arabic Kufi';" data-dismiss="">موافـق <i class=" fas fa-user-shield "></i></a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->