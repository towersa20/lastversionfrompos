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
$up=mysql_query("update custpayment set name='$_POST[a]',date='$_POST[b]',amount='$_POST[c]',
pay='$_POST[d]',last='$_POST[e]' where id='$_GET[cid]'");
if($up)
{

echo "<script> alert ('تم تعديل بيانات المورد');</script>";
echo "<meta http-equiv='refresh' content='0;url=endcust.php'>";
}
else
{
echo "<script> alert ('لم يتم تعديل المورد');</script>";
echo "<meta http-equiv='refresh' content='0;url=endcust.php'>";

}}

else
{
include("dbcon/config.php");
$d=mysql_query("select*from custpayment where id='$_GET[cid]'");
$row=mysql_fetch_array($d);
?>

 <div class="app-content content container-fluid">
<form name="form1" method="post" action="" enctype="multipart/form-data">
<table class="table table-bordered">
<tr>
<td colspan="6"> Modify customer payments information</td>
</tr>
<tr>
<td style="width: 10%;">Customer</td>
<td colspan="3">
<input type="text" name="a"  class="form-control" value="<?php echo $row['name']; ?>" ></td>


<td>Date</td>
<td>
<input type="date" name="b" value="<?php echo date('Y-m-d'); ?>" class="form-control">
</td>

</tr>


<tr>

<td>Indebtedness</td>
<td>
    <input type="text" name="c" value="<?php echo $row['amount']; ?>" class="form-control">
</td>
<td>Payments</td>
<td><input type="number" class="form-control" value="<?php echo $row['pay']; ?>"  name="d"></td>
<td>remaining amount</td>
<td><input type="number" class="form-control" value="<?php echo $row['last']; ?>" name="e"></td>
</tr>

</table>

<table class="table table-bordered">

<tr>

<td style="width: 70%;"></td>
<td>
    <button class="btn btn-primary" type="submit" style="width:100%; width: 100%; font-family: 'Droid Arabic Kufi';" name="ok"> Save <i class="fa fa-edit"></i></button>
</td>
<td><a href="index.php">
    <button class="btn btn-primary" style="width:100%; width: 100%; font-family: 'Droid Arabic Kufi';" name="ok"> Home <i class="fa fa-home"></i></button>

    </a></td>
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

