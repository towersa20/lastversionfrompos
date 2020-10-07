<?php include('header.php');?>
<form name="form" action="endcust.php" method="POST">
<table class="table table-bordered">
<tr>
<td colspan="6"></td>
</tr>
<tr>
<td style="width: 10%;">Customer</td>
<td colspan="3">
<select name="a" class="selectpicker" data-live-search="true" data-style="btn-primary">
    <?php
    include('dbcon/dbcon.php');
		$brim=mysql_query("select * from person");
		$resa=mysql_fetch_array($brim);?>
    <option value="0"> Select Customer</option>
    <?php do{?>
<option value="<?php echo $resa['name'];?>" ><?php echo $resa['name'];?></option>
<?php } while($resa=mysql_fetch_array($brim));?>
</select></td>


<td>Date</td>
<td>
<input type="date" name="b" value="<?php echo date('Y-m-d'); ?>" class="form-control">
</td>

</tr>


<tr>

<td>Indebtedness</td>
<td>
    <input type="text" name="c" value="" class="form-control">
</td>
<td>Payments</td>
<td><input type="number" class="form-control"  name="d"></td>
<td>Remaining amount</td>
<td><input type="number" class="form-control" name="e"></td>
</tr>

</table>

<table class="table table-bordered">

<tr>

<td style="width: 70%;"></td>
<td>
    <button class="btn btn-primary" type="submit" style="width:100%; width: 100%; font-family: 'Droid Arabic Kufi';" name="ok"> Save <i class="fa fa-edit"></i></button>
</td>
<td><a href="index.php">
    <button class="btn btn-primary" style="width:100%; width: 100%; font-family: 'Droid Arabic Kufi';" name="ok"> Back <i class="fa fa-home"></i></button>

    </a></td>
</tr>

</table>


     </form>

     <table style="width:100%; font-size:14px;" align="center" class="table  table-bordered table-hover">
<?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select * from custpayment ");
$row=mysql_fetch_array($sql);
?>
<tr align="center">
<td nowrap style="width:25%; ">Customer</td>
<td nowrap style="width:15%; ">Date</td>
<td nowrap style="width:15%; ">Required</td>
<td nowrap style="width:10%; ">paid up</td>
<td nowrap style="width:15%; ">Type</td>
<td colspan="2" nowrap style="width:20%;">Control</td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['name'];?></td>
<td nowrap><?php echo $row['date'];?></td>
<td nowrap><?php echo $row['amount'];?></td>
<td nowrap><?php echo $row['pay'];?></td>
<td nowrap><?php echo $row['last'];?></td>
<td align="center"><a href="delete.php?&&paymentid=<?php echo $row['id'];?>" onClick="return confirm('Do you want Delete <?php echo $row['name'];?>');">
        <button class="btn btn-primary" style="width: 100px; font-family: 'Droid Arabic Kufi';"> Delete <i class="fa fa-times"></i></button></a></td>
<td align="center"><a href="upcustpay.php?&&cid=<?php echo $row['id'];?>">
        <button class="btn btn-primary" style="width: 100px; font-family: 'Droid Arabic Kufi';"> Edit <i class="fa fa-edit"></i></button></a></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
</table




<!-- Central Modal Medium Success -->
 <div class="modal fade" id="centralModalSuccess" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-success" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <H5 class="heading lead">نظام المبيعات</H5>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
           <i style="width: 10px;" class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
           <p>تم تسجيل البيانات بنجاح</p>
         </div>
       </div>

       <!--Footer-->
       <div align="left" class="modal-footer justify-content-center">
         <a href="endcust.php" type="button" class="btn btn-Primary waves-effect" style="width: 50%; font-family: 'Droid Arabic Kufi';" data-dismiss="">موافـق <i class=" fas fa-user-shield "></i></a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->

 

 <?php 
include('dbcon/dbcon.php');
if(isset($_POST['ok']))
{
$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
$d=$_POST['d'];
$e=$_POST['e'];

$user=mysql_query("insert into custpayment values('','$a','$b','$c','$d','$e',now())");
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
echo "<meta http-equiv='refresh' content='0;url=endcust.php'>";
}
}
?>

