<?php include("header.php");?>

<!-- شاشة بيانات المخزن !-->
 <div class="app-content content container-fluid">
<form name="form1" method="post" action="store.php" enctype="multipart/form-data">
  <table style="width:100%; " align="center" class="table table-bordered table-hover ">
    <tr>
      <td colspan="6">Add New Store <i class="fa fa-th-large"></i></td>
    </tr>
    <tr>
      <td style="width:10%;">Store</td>
      <td colspan="5"><input type="text" placeholder="" name="a" class="form-control" required autocomplete="off"></td>
    </tr>
   
  </table>
  <table style="width:100%; " align="center" class="table table-borderd table-hover" >
    <tr>
      <td colspan="2" style="width:50%;">&nbsp;</td> 
      <td style="width:25%;"><button  type="submit" name="ok" class="btn btn-primary" style="width:100%; font-family: 'Droid Arabic Kufi';"> Save <i class=" fab fa-accusoft "></i></button></td>
      <td style="width:25%;"><a href="index.php"><button type="button" class="btn  btn-primary" style="width:100%; font-family: 'Droid Arabic Kufi';"> Home <i class="fa fa-home"></i></button></a></td>
    </tr>
</table></form>


<!--  عرض بيانات المخزن !-->

  <table style="width:100%; " align="center" class="table table-bordered table-hover">
<?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select * from store");
$row=mysql_fetch_array($sql);
?>
<tr align="center">
<td style="width:70%; ">Store</td>
<td colspan="2" style="width:30%;">Control</td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['name'];?></td>
<td align="center"><a href="delete.php?&&sid=<?php echo $row['sid'];?>" onClick="return confirm('Do you want Delete <?php echo $row['name'];?>');">
        <button class="btn btn-danger" style="width: 100%;font-family: 'Droid Arabic Kufi';" onclick="doConfirm()"> Delete <i class="fa fa-times"></i></button></a></td>
<td align="center"><a href="upstore.php?&&sid=<?php echo $row['sid'];?>">    <button class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> Edit <i class="fa fa-edit"></i></button>
    </a></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
</table>

</body>
</html>
<?php
// ادخال البيانات الي المخزن
include('dbcon/dbcon.php');
if(isset($_POST['ok']))
{
$a=$_POST['a'];
$user=mysql_query("insert into store values('null','$a','$_SESSION[tell]')");
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
echo "<script> alert('لم يتم تسجيل المخزن');</script>";
echo "<meta http-equiv='refresh' content='0;url=store.php'>";
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
         <strong class="heading lead">POS</strong>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
           <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
           <p>Data Has been successfully  Saved</p>
         </div>
       </div>

       <!--Footer-->
       <div class="modal-footer justify-content-center">
         <a href="store.php" type="button" class="btn btn-Primary waves-effect" style="width: 50%; font-family: 'Droid Arabic Kufi';" data-dismiss="">موافـق <i class=" fas fa-user-shield "></i></a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->