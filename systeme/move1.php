<?php include("header.php");?>

<form name="form1" method="post" action="move1.php" enctype="multipart/form-data">
 <table style="width:100%; " align="center" class="table table-bordered table-hover ">
    <tr>
      <td colspan="8"><strong>شراء صنف جديد</strong> <i class="fa fa-shopping-basket"></i> </td>
    </tr>
    <tr>
        <td>رقم الفاتورة</td>
        <td><input type="text" name="lno" maxlength="20" style="border: 0px;"  required autocomplete="off" class="form-control" title="رقم الفاتورة"></td>
        <td nowrap>إسم المــــورد</td>
        <td colspan="7" ><input type="text"  style="border: 0px;" name="f" class="form-control" required id="search" placeholder="اختر المورد" list="searchrcus" autocomplete="off">
            <datalist id="searchrcus">
                <?php include('dbcon/dbcon.php');
                $brima=mysql_query("select * from customer");
                $res=mysql_fetch_array($brima);?>
                <option></option>
                <?php do { ?>
                    <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
                <?php } while($res=mysql_fetch_array($brima));?>
            </datalist></td>
    </tr>
     <tr>

         <td nowrap>إسم المخــزن</td>
         <td nowrap><select name="g"  style="border: 0px; height: 38px;" class="form-control">
                 <?php include("dbcon/dbcon.php");
                 $sq=mysql_query("select * from store");
                 $ro=mysql_fetch_array($sq);
                 ?>
                 <?php do { ?>
                     <option value="<?php echo $ro['name'];?>" style="color:#FFFFFF; " class="form-control btn-black"><?php echo $ro['name'];?></option>
                 <?php }while($ro=mysql_fetch_array($sq));?>

             </select></td>
        <td nowrap> رقم الباركـود</td>
      <td nowrap><input type="number" style="border: 0px;" min="0" name="a" class="form-control" required autocomplete="off"></td>
      <td nowrap> الصنــــــــــــــف </td>
      <td nowrap colspan="3"><input  style="border: 0px; height: 38px;" type="text" value="" name="b" class="form-control" required id="search" placeholder="اختر الصنــف" list="searchrt" autocomplete="off">
	<datalist id="searchrt">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select * from item");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
    </tr>
    <tr>
        <td nowrap>الكميــــــــــــــة</td>
      <td nowrap><input type="number" min="0"  style="border: 0px;" name="c" class="form-control" required autocomplete="off"></td>
        <td nowrap>سعر الشراء </td>
        <td nowrap><input type="number" min="0"  style="border: 0px;" name="e" class="form-control" required autocomplete="off"></td>
        <td style="width: 6%;" nowrap>سعر البيـــــع </td>
      <td nowrap><input type="number" min="0"  style="border: 0px;" name="d" class="form-control" required autocomplete="off"></td>
      <td nowrap>تاريخ التخزين </td>
      <td nowrap><input type="date" name="i"  style="border: 0px;" value="20<?php echo date('y-m-d');?>" class="form-control" required autocomplete="off"></td>
    </tr>
    <tr>

      <td nowrap>الشهــــــــر</td>
      <td colspan="5" nowrap><select name="j"  style="border: 0px; height: 38px;" class="form-control">
	  <?php include("dbcon/config.php");
	  $sq=mysql_query("select name from month");
	  $ro=mysql_fetch_array($sq);
	  ?>
	  <?php do { ?>
	  <option value="<?php echo $ro['name'];?>" style="color:#FFFFFF; " class="form-control btn-black"><?php echo $ro['name'];?></option>
	  	  <?php }while($ro=mysql_fetch_array($sq));?>

      </select></td>
      <td nowrap>أختر العــــــام</td>
      <td nowrap><input type="number" min="2018"  style="border: 0px;" value="20<?php echo date('y');?>" name="k" class="form-control" required autocomplete="off"></td>
    </tr>
 </table>
    <table style="width:100%; " align="center" class="table table-borderd table-hover ">

    <tr>
        <td style="width: 60%;" nowrap>&nbsp;</td>

         <td style="width: 20%;" align="left"><button type="submit" name="ok" class="btn btn-success" style="width:100%;"> حفــــظ  <i class="fa fa-shopping-basket"></i></button></td>
        <td style="width: 20%;" align="left"><a href="index.php">
                <button type="button" name="ok" class="btn btn-danger" style="width:100%;"> النظام  <i class="fa fa-home"></i></button></a></td>
     </tr>
  </table>
</form>
<?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select * from share order by pid desc limit 1");
$row=mysql_fetch_array($sql);
?>
 <table style="width:98%; " align="center" class="table table-bordered table-hover ">
<tr align="center">
<td style="width:10%; ">باركود</td>
<td style="width:30%; ">الصـنف</td>
<td style="width:10%; ">الكمية</td>
<td style="width:10%; ">الشراء</td>
<td style="width:10%; ">الإجمالي</td>
<td style="width:10%; ">المورد</td>
<td style="width:10%; " colspan="2">التحكم</td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['barco'];?></td>
<td nowrap><?php echo $row['name'];?></td>
<td nowrap><?php echo $x1=$row['qunt'];?></td>
<td nowrap><?php echo $x2=$row['price'];?></td>
<td nowrap><?php echo $x1*$x2;?></td>
    <td nowrap><?php echo $row['cust'];?></td>
<td align="center"><a href="delete.php?&&pid=<?php echo $row['pid'];?>&&p1=<?php echo $row['name'];?>&&p2=<?php echo $row['qunt'];?>"
                      onClick="return confirm('هل تريد حذف <?php echo $row['name'];?>');"><button class="btn btn-danger" style="width: 100px;"> حذف <i class="fa fa-trash-o"></i></button></i></a></td>
<td align="center"><a href="upprush.php?&&pid=<?php echo $row['pid'];?>"><button class="btn btn-success" style="width: 100px;"> تعديل <i class="fa fa-edit"></i></button></a></td>
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
$i=$_POST['i'];
$j=$_POST['j'];
    $k=$_POST['k'];
    $lno=$_POST['lno'];
$sql=mysql_query("insert into share values('null','$a','$b','$c','$e','$d','$f','$g','$i','$j','$k','0','$lno')");
if($sql)
{
echo "<script> alert('تمت عملية اضافة صنف جديد');</script>";

}
else
{

}}
?>


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
$sql=mysql_query("select * from storing where name='$_POST[b]'");
$row=mysql_fetch_array($sql);
if($row['name']==$_POST['b'])
{
$x1=$row['qunt'];
$x2=$_POST['c'];
$x3=$x1+$x2;
$up=mysql_query("update storing set qunt='$x3',price='$d' where name='$_POST[b]'");
echo "<script> alert('تمت عملية اضافة صنف جديد الي صنف موجود');</script>";
echo "<meta http-equiv='refresh' content='0;url=move1.php'>";

}
else
{
$user=mysql_query("insert into storing  values('null','$b','$d','$c','$i','$g')");
echo "<script> alert('تمت عملية تخزين صنف جديد');</script>";
echo "<meta http-equiv='refresh' content='0;url=move1.php'>";
}
}
?>

<?php 
include('dbcon/dbcon.php');
if(isset($_POST['ok']))
{
$a=$_POST['a'];
$c=$_POST['c'];
$e=$_POST['e'];
$f=$_POST['f'];
$d=$_POST['d'];
$user=mysql_query("insert into mstor values('null','$b','$c','$d','$g','$_SESSION[uname]','$i',now())");

}?>



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
$sql=mysql_query("select * from products where product_name='$_POST[b]'");
$row=mysql_fetch_array($sql);
if($row['product_name']==$_POST['b'])
{
$up=mysql_query("update products set product_price='$d' where product_name='$_POST[b]'");
echo "<meta http-equiv='refresh' content='0;url=move1.php'>";

}
else
{
$user=mysql_query("insert into products  values('null','$b','$d','1000000',1)");
echo "<meta http-equiv='refresh' content='0;url=move1.php'>";
}
}
?>
