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
$up=mysql_query("update customer set name='$_POST[a]',tell1='$_POST[b]',cno='$_POST[c]',acno='$_POST[d]',bank='$_POST[e]',adres='$_POST[f]',item='$_POST[g]' where cid='$_GET[cid]'");
if($up)
{

echo "<script> alert ('تم تعديل بيانات المورد');</script>";
echo "<meta http-equiv='refresh' content='0;url=cust.php'>";
}
else
{
echo "<script> alert ('لم يتم تعديل المورد');</script>";
echo "<meta http-equiv='refresh' content='0;url=cust.php'>";

}}

else
{
include("dbcon/config.php");
$d=mysql_query("select*from customer where cid='$_GET[cid]'");
$row=mysql_fetch_array($d);
?>

 <div class="app-content content container-fluid">
<form name="form1" method="post" action="" enctype="multipart/form-data">
    <table style="width:100%; font-size:14px;" align="center" class="table table-bordered table-hover">
    <tr>
      <td colspan="8"><strong>تعديـــل مــورد جديد</strong> <i class="fa fa-user"></i></td>
    </tr>
    <tr>
      <td style="width:9%;">اسم المورد </td>
      <td><input type="text"  name="a" value="<?php echo $row['name'];?>" class="form-control  " required autocomplete="off"></td>
      <td style="width:9%;">رقم الهاتف </td>
      <td><input type="number"  value="<?php echo $row['tell1'];?>"  name="b" class="form-control " required autocomplete="off"></td>
      <td style="width:9%;">الرقم التجاري </td>
      <td><input type="text" name="c"  class="form-control " value="<?php echo $row['cno'];?>"  required autocomplete="off"></td>
    </tr>
    <tr>
      <td>رقم الحساب </td>
      <td><input type="number" min="1111"  value="<?php echo $row['acno'];?>"  max="99999999999999" name="d" class="form-control " required autocomplete="off"></td>
      <td> البنـــك</td>
     <td><select name="e" class="selectpicker" data-live-search="true" data-style="btn-primary" required>
	  <?php include('dbcon/config.php');
	  $sq=mysql_query("select * from bank");
	  $ro=mysql_fetch_array($sq);?>
	  <?php do { ?>
	  <option value="<?php echo $ro['name'];?>"><?php echo $ro['name'];?></option>
	  <?php } while($ro=mysql_fetch_array($sq));?></select>
	  </td>
      <td>العنــــوان</td>
      <td><input type="text"  name="f" value="<?php echo $row['adres'];?>"  class="form-control " required autocomplete="off"></td>
    </tr>
    <tr>
      <td colspan="8">سجل الأصنـــاف <i class="fa ft-layers"></i></td>
    </tr>
    <tr>
      <td colspan="8"><select multiple name="g" class="selectpicker" data-live-search="true" data-style="btn-primary">
	  <?php include("dbcon/config.php");
	  $sql=mysql_query("select * from products");
	  $row=mysql_fetch_array($sql);
	  ?>
	  <?php do { ?>
	  <option value="<?php echo $row['product_name'];?>" style="color:#FFFFFF; border:0 " class="form-control  "><?php echo $row['product_name'];?></option>
	  	  <?php }while($row=mysql_fetch_array($sql));?>

      </select></td>
    </tr>
	</table>
    <table style="width:100%;" align="center" class="table table-borderd table-hover">
	<tr>
        <td style="width:15%;">&nbsp;</td>
        <td style="width:15%;">&nbsp;</td>
        <td style="width:15%;">&nbsp;</td>
        <td style="width:15%;">&nbsp;</td>
        <td style="width:15%;"><button type="submit" name="ok" class="btn  btn-primary" style="width: 100%;"> تعديــل <i class="fa fa-check"></i></button></td>
        <td style="width:15%;"><a href="cust.php"><button type="button" class="btn btn-primary" style="width: 100%;"> النظام <i class="fa fa-home"></i></button></a></td>
</tr>  </table>
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

