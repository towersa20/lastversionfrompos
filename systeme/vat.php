<?php include("header.php");?>
 <div class="app-content content container-fluid">
<br>
<form name="form1" method="post" action="vat.php">
  <table style="width:100%; " align="center" class="table table-bordered table-hover animated " >

    <tr>
      <td colspan="5">Regstration Vat <i class=" fab fa-accusoft "></i> </td>
    </tr>
    <tr>
      <td nowrap style="width:8%;">Tax Name</td>
      <td style="width:60%;"><input type="text"   name="a" class="form-control " required autocomplete="off"></td>
      <td style="width:8%;">Percent</td>
      <td nowrap colspan="2"><input type="number" step="0.1" min="0" max="60" Placeholder="%" name="b" class="form-control  " required autocomplete="off"></td>
    </tr>
 	</table>
  <table style="width:100%; " align="center" class="table table-borderd table-hover  " >
    <tr>
      <td colspan="2" style="width:50%;">&nbsp;</td>
      <td style="width:25%;"><button  type="submit" name="ok" class="btn btn-primary" style="width:100%;font-family: 'Droid Arabic Kufi';"> save <i class="fa fa-check"></i></button></td>
      <td style="width:25%;"><a href="index.php"><button type="button" class="btn btn-primary" style="width:100%;font-family: 'Droid Arabic Kufi';"> home <i class="fa fa-home"></i></button></a></td>
    </tr>
  </table>

</form>
  <table style="width:100%; " align="center" class="table table-bordered table-hover">
<?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select * from vat");
$row=mysql_fetch_array($sql);
?>
<tr align="center">
<td style="width:50%; ">Tax</td>
<td style="width:15%; ">Percent</td>
<td colspan="2">Control</td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['vname'];?></td>
<td nowrap align="center"><?php echo $row['tax'];?> % </td>
<td align="center"><a href="delete.php?&&vatid=<?php echo $row['vid'];?>" onClick="return confirm('Do you want Delete <?php echo $row['vname'];?>');">
        <button class="btn btn-danger" style="width:100%;font-family: 'Droid Arabic Kufi';"> Delete <i class="fa fa-times"></i></button></a></td>
<td align="center"><a href="upvat.php?&&vatid=<?php echo $row['vid'];?>">
        <button class="btn btn-info" style="width:100%;font-family: 'Droid Arabic Kufi';"> Edit <i class="fa fa-edit"></i></button>
    </a></td>
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
$user=mysql_query("insert into vat values('null','$a','$b')");
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
echo "<meta http-equiv='refresh' content='0;url=vat.php'>";
}
}
?>





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
         <a href="vat.php" type="button" class="btn btn-Primary waves-effect" style="width: 50%; font-family: 'Droid Arabic Kufi';" data-dismiss="">موافـق <i class=" fas fa-user-shield "></i></a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->