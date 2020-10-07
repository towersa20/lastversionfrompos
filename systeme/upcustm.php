<?php include('header.php');?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>تعديل</title>

<?php
if(isset($_POST["ok"]))
{
include("dbcon/dbcon.php");
$up=mysql_query("update person set name='$_POST[a]',phone='$_POST[b]',type='$_POST[c]',bank='$_POST[d]',acount='$_POST[e]' where prid='$_GET[prid]'");
if($up)
{
		
  echo "<script type='text/javascript'>
  $(document).ready(function(){
  $('#centralModalSuccess').modal('show');
  });
  </script>";
  
}
else
{
echo "<script> alert ('لم يتم تعديل العميـــل');</script>";
echo "<meta http-equiv='refresh' content='0;url=customer.php'>";

}}

else
{
include("dbcon/dbcon.php");
$d=mysql_query("select*from person where prid='$_GET[prid]'");
$row=mysql_fetch_array($d);
?>
 <div class="app-content content container-fluid">
<form name="form1" method="post" action="" enctype="multipart/form-data">
  <table style="width:100%; font-size: 14px; " align="center" class="table table-bordered table-hover">
    <tr>
      <td colspan="8">Recording customer data <i  class="fa fa-user"></i></td>
    </tr>
    <tr>
      <td>Customer</td>
      <td colspan="7"><input type="text" value="<?php echo $row['name'];?>"  name="a" class="form-control big-shadow" required autocomplete="off"></td>
    </tr>
    <tr>
      <td>Phone</td>
      <td><input type="number" min="0500000000" value="<?php echo $row['phone'];?>"  name="b" class="form-control " required autocomplete="off"></td>
      <td>Type</td>
      <td><input type="text" name="c" value="<?php echo $row['type'];?>"  class="form-control  " required autocomplete="off"></td>
      <td>Bank</td>
      <td style="width:18%; "><select class="selectpicker" data-live-search="true" data-style="btn-primary" name="d"  required>
	  <?php include('dbcon/dbcon.php');
	  $sq=mysql_query("select * from bank");
	  $ro=mysql_fetch_array($sq);?>
	  <option></option>
	  <?php do { ?>
	  <option value="<?php echo $ro['name'];?>"><?php echo $ro['name'];?></option>
	  <?php } while($ro=mysql_fetch_array($sq));?>
	  </select></td>
      <td>Account number</td>
      <td><input type="text" name="e" value="<?php echo $row['acount'];?>"  class="form-control " required autocomplete="off"></td>
    </tr>
</table>
	  <table style="width:100%;" align="center" class="table table-borderd table-hover animated flipInX" >
    <tr>
      <td colspan="2" style="width:70%;">&nbsp;</td>
      <td style="width:15%;"><button  type="submit" name="ok" class="btn btn-primary" style="width:100%; width: 100%; font-family: 'Droid Arabic Kufi';"> Edit <i class="fa fa-check"></i></button></td>
      <td style="width:15%;"><a href="customer.php"><button type="button" class="btn btn-success" style="width:100%; width: 100%; font-family: 'Droid Arabic Kufi';"> Back <i class="fa fa-undo"></i></button></a></td>
    </tr>
  </table></form></div>
</body>
</html>
<?php
}?> 
<br>
<br>
<br>
<br>




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
           <p>تم تعديل البيانات بنجاح</p>
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