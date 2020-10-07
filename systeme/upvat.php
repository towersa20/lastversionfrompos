<?php include('header.php');?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>تعديل</title>

<?php
if(isset($_POST["ok"]))
{
include("dbcon/dbcon.php");
$up=mysql_query("update vat set vname='$_POST[a]',tax='$_POST[b]' where vid='$_GET[vatid]'");
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
echo "<script> alert ('لم يتم تعديل الضريبة');</script>";
echo "<meta http-equiv='refresh' content='0;url=vat.php'>";

}}

else
{
include("dbcon/dbcon.php");
$d=mysql_query("select*from vat where vid='$_GET[vatid]'");
$row=mysql_fetch_array($d);
?>

 <div class="app-content content container-fluid">
<br>
<form name="form1" method="post" action="" enctype="multipart/form-data">
	  <table style="width:100%; " align="center" class="table table-bordered table-hover animated " >

    <tr>
      <td colspan="6" class="">Edit Tax <i class="fab fa-accusoft"></i> </td>
    </tr>
    <tr>
      <td nowrap style="width:8%; ">Name</td>
      <td colspan="3"><input type="text" name="a" value="<?php echo $row['vname'];?>" class="form-control" required autocomplete="off">      </td>
      <td nowrap style="width:8%; ">Percent</td>
      <td style="width:18%;"><input type="number" name="b" step="0.1" value="<?php echo $row['tax'];?>"  class="form-control" required autocomplete="off">      </td>
    </tr>
	</table>
	  <table style="width:100%; " align="center" class="table table-borderd table-hover animated flipInX" >
    <tr>
      <td colspan="2" style="width:70%;">&nbsp;</td>
      <td style="width:15%;"><button  type="submit" name="ok" class="btn btn btn-primary" style="width:100%;font-family: 'Droid Arabic Kufi';"> Edit <i class="fa fa-check"></i></button></td>
      <td style="width:15%;"><a href="index.php"><button type="button" class="btn btn-info" style="width:100%;font-family: 'Droid Arabic Kufi';"> Home <i class="fa fa-home"></i></button></a></td>
    </tr>
  </table>
</form></div>
</body>
</html>
<?php
}?> 
<br>
<br>
<br>
<br>





 <!-- Central Modal Medium Success -->
 <div class="modal fade" id="centralModalSuccess" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-success" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <H5 class="heading lead" style="font-family: 'Droid Arabic Kufi';">POS</H5>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
           <i style="width: 10px;" class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
           <p>Data Has been successfully  Saved</p>
         </div>
       </div>

       <!--Footer-->
       <div align="left" class="modal-footer justify-content-center">
         <a href="vat.php" type="button" class="btn btn-Primary waves-effect" style="width: 50%; font-family: 'Droid Arabic Kufi';" data-dismiss="">OK <i class=" fas fa-user-shield "></i></a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->