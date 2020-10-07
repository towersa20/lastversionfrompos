<?php include('header.php');?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>تعديل</title>

</head>
<?php
if(isset($_POST["ok"]))
{
include("dbcon/dbcon.php");
$up=mysql_query("update store set name='$_POST[a]' where sid='$_GET[sid]'");
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
echo "<script> alert ('Not Done');</script>";
echo "<meta http-equiv='refresh' content='0;url=store.php'>";

}}

else
{
include("dbcon/dbcon.php");
$d=mysql_query("select*from store where sid='$_GET[sid]'");
$row=mysql_fetch_array($d);
?>
 <div class="app-content content container-fluid">
<br>

<form name="form1" method="post" action="" enctype="multipart/form-data">
  <table style="width:100%; " align="center" class="table table-bordered table-hover">
    <tr>
      <td colspan="6">Edit Store <i class="fa fa-th-large"></i> </td>
    </tr>
    <tr>
      <td style="width:9%;">store</td>
      <td colspan="5"><input type="text" name="a" class="form-control" value="<?php echo $row['name'];?>" required autocomplete="off"></td>
    </tr>
  </table>
	  <table style="width:100%; " align="center" class="table table-borderd table-hover animated flipInX" >
    <tr>
      <td colspan="2" style="width:70%;">&nbsp;</td>
      <td style="width:15%;"><button  type="submit" name="ok" class="btn btn-primary" style="width:100%; font-family: 'Droid Arabic Kufi';"> Save <i class="fa fa-check"></i></button></td>
      <td style="width:15%;"><a href="index.php"><button type="button" class="btn btn-primary" style="width:100%; font-family: 'Droid Arabic Kufi';"> Home <i class="fa fa-home"></i></button></a></td>
    </tr>
  </table>
</form>
</div>
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
         <strong class="heading lead">Edit Store</strong>

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
         <a href="store.php" type="button" class="btn btn-Primary waves-effect" style="width: 50%; font-family: 'Droid Arabic Kufi';" data-dismiss="">ok <i class=" fas fa-user-shield "></i></a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->