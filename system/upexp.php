<?php include('header.php');?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>تعديل</title>

</head>
<?php
if(isset($_POST["ok"]))
{
include("dbcon/config.php");
$up=mysql_query("update exp set name='$_POST[a]' where xid='$_GET[xid]'");
if($up)
{
  echo "<script type='text/javascript'>
  $(document).ready(function(){
  $('#centralModalSuccess').modal('show');
  });
  </script>";}
else
{
echo "<script> alert ('لم يتم تعديل المصروف');</script>";
echo "<meta http-equiv='refresh' content='0;url=exp.php'>";

}}

else
{
include("dbcon/config.php");
$d=mysql_query("select*from exp where xid='$_GET[xid]'");
$row=mysql_fetch_array($d);
?>


 <div class="app-content content container-fluid">
<br>
     <form name="form1" method="post" action="" enctype="multipart/form-data">
  <table style="width:100%; " align="center" class="table table-bordered table-hover animated " >
   <tr>
      <td colspan="6" class=""><strong>تعديــل أسم المصروف</strong> <i class="fa ft-layers"></i></td>
    </tr>
    <tr>
      <td nowrap style="width:8%; ">إسم المصروف</td>
      <td colspan="3"><input type="text" name="a" value="<?php echo $row['name'];?>"  class="form-control" required autocomplete="off">      </td>
    </tr>
	</table>
	  <table style="width:100%; " align="center" class="table table-borderd table-hover animated flipInX" >
    <tr>
      <td colspan="2" style="width:70%;">&nbsp;</td>
      <td style="width:15%;"><button  type="submit" name="ok" class="btn btn-primary" style="width:100%; font-family: 'Droid Arabic Kufi';"> تعديل <i class="fa fa-check"></i></button></td>
      <td style="width:15%;"><a href="index.php"><button type="button" class="btn btn-danger" style="width:100%; font-family: 'Droid Arabic Kufi';"> النظام <i class="fa fa-home"></i></button></a></td>
    </tr> 
  </table>
  </form></div>
<?php
}?> 
<br>
<br>
<br>


<BR>
<br>



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