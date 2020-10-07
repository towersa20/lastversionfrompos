<?php include("header.php");?>
<form name="form1" method="post" action="cust.php" enctype="multipart/form-data">
    <table style="width:100%; font-size:14px;"  align="center" class="table table-bordered table-hover"  dir="rtl">
    <tr>
      <td colspan="8"><strong>  Register a new Customer <i class="fa fa-user"></i></strong></td>
    </tr>
    <tr>
      <td style="width: 10%;">Customer  </td>
        <td colspan="3"><input type="text"  name="a" class="form-control"  autocomplete="off"></td>
        <td  style="width: 9%;">Phone </td>
        <td><input type="number"  name="b" class="form-control"  autocomplete="off"></td>
    </tr>
    <tr>
        <td>Commercial number </td>
        <td><input type="text" name="c"  class="form-control"  autocomplete="off"></td>
      <td style="width: 9%;">Commercial number </td>
        <td><input type="number" min="1111"  max="99999999999999" name="d" class="form-control"  autocomplete="off"></td>
        <td>Bank</td>
        <td><select name="e" class="selectpicker" data-live-search="true" data-style="btn-primary" style="border: 0px; height: 38px;" >
                <?php include('dbcon/dbcon.php');
                $sq=mysql_query("select * from bank");
                $ro=mysql_fetch_array($sq);?>
                <?php do { ?>
                    <option value="<?php echo $ro['name'];?>"><?php echo $ro['name'];?></option>
                <?php } while($ro=mysql_fetch_array($sq));?></select>
        </td>
    </tr><tr>
        <td>Address</td>
        <td colspan="3"><input type="text"  name="f" class="form-control" data-style="btn-primary"  autocomplete="off"></td>
    
      <td> Product</td>
      <td ><select  name="g" class="selectpicker" data-live-search="true" data-style="btn-primary"  >
	  <?php include("dbcon/dbcon.php");
	  $sql=mysql_query("select * from storing limit 10");
	  $row=mysql_fetch_array($sql);
	  ?>
	  <?php do { ?>
	  <option value="<?php echo $row['name'];?>"  class="form-control"><?php echo $row['name'];?></option>
	  	  <?php }while($row=mysql_fetch_array($sql));?>

      </select></td>
    </tr>
    </table>
    <table style="width:100%;"  align="center" class="table table-borderd table-hover"  dir="rtl">
    <tr>
        <td colspan="6" style="width: 70%;"></td>

      <td><button type="submit" name="ok" class="btn btn-primary" style="width: 180px;font-family: 'Droid Arabic Kufi';"> Save <i class="fa fa-check"></i></button></td>
      <td><a href="record.php"><button type="button" class="btn btn-primary" style="width: 180px; font-family: 'Droid Arabic Kufi';"> Home <i class="fa fa-home"></i></button></a></td></tr>
  </table>
</form>
  <table style="width:100%; font-size:14px;" align="center" class="table  table-bordered table-hover">
<?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select * from customer ");
$row=mysql_fetch_array($sql);
?>
<tr align="center">
<td nowrap style="width:25%; ">Customer</td>
<td nowrap style="width:15%; ">Phone</td>
<td nowrap style="width:15%; ">Commercial number</td>
<td nowrap style="width:10%; ">Account Number</td>
<td nowrap style="width:15%; ">Bank</td>
<td colspan="2" nowrap style="width:20%;">Control</td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['name'];?></td>
<td nowrap><?php echo $row['tell1'];?></td>
<td nowrap><?php echo $row['cno'];?></td>
<td nowrap><?php echo $row['acno'];?></td>
<td nowrap><?php echo $row['bank'];?></td>
<td align="center"><a href="delete.php?&&cid=<?php echo $row['cid'];?>" onClick="return confirm('Do you want Delete <?php echo $row['name'];?>');">
        <button class="btn btn-primary" style="width: 100px; font-family: 'Droid Arabic Kufi';"> Delete <i class="fa fa-times"></i></button></a></td>
<td align="center"><a href="upcust.php?&&cid=<?php echo $row['cid'];?>">
        <button class="btn btn-primary" style="width: 100px; font-family: 'Droid Arabic Kufi';"> Edit <i class="fa fa-edit"></i></button></a></td>
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
$f=$_POST['f'];
$g=$_POST['g'];
$user=mysql_query("insert into customer values('null','$a','$b','$c','$d','$e','$f','$g',now())");
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
echo "<script> alert('لم يتم تسجيل المورد');</script>";
echo "<meta http-equiv='refresh' content='0;url=cust.php'>";
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
         <H5 class="heading lead">POS</H5>

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
         <a href="cust.php" type="button" class="btn btn-Primary waves-effect" style="width: 50%; font-family: 'Droid Arabic Kufi';" data-dismiss="">ok <i class=" fas fa-user-shield "></i></a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->