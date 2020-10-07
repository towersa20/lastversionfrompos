<?php
// استدعاء قاعدة البيانات
session_start();
include("dbcon/dbcon.php");
//عرض بيانات الفاتورة المخزن بشاشة المبيعات
$nx=mysql_query("select * from vat");
$mx=mysql_fetch_array($nx); 
 $tax=$mx['tax'];
//نهاية الكود
?><table border="2" dir="rtl" class="table table-bordered" style="background-color: #eff5fc; font-size: 35px;">
<Tr>
<Td>المبيعات</Td>

    <td ><?php include("dbcon/dbcon.php");
        $time=date('Y-m-d');
        $sql=mysql_query("select sum(price*qty) from sales where date='$time' ");
        $row=mysql_fetch_array($sql);
          $costs=$row['sum(price*qty)']*$tax/100+$row['sum(price*qty)'];
          echo round($costs, 2);?> </td>
</Tr>

<Tr>
<Td>ضريبة المبيعات </Td>

    <td><?php include("dbcon/dbcon.php");
        $time=date('Y-m-d');
        $sql=mysql_query("SELECT sum( (price * qty )* $tax / 100) as 'vats' from sales where date ='$time'  and  tell ='$_SESSION[tell]'");
        $row=mysql_fetch_array($sql);
          $costs=$row['vats']*$tax/100;
          echo round($costs, 2);?> </td>
</Tr>


<tr>    <td>المشتريات</td>

    <td><?php include('dbcon/dbcon.php');
  // عرض صافي سعر البيع شامل الضريبة
	$sql=mysql_query("select sum(qunt*sales) from share where date ='$time'");
	$row=mysql_fetch_array($sql);
	echo $xxx2=$row['sum(qunt*sales)']*$tax/100+$row['sum(qunt*sales)'];
	?></td>
    </Tr>

    <Tr>
<Td>ضريبة المشتريات</Td>

     <td><?php include("dbcon/dbcon.php");
        $time=date('Y-m-d');
        $sql=mysql_query("SELECT sum( (price * qunt ) * $tax  / 100)  as 'a'  FROM `share` WHERE date ='$time'  and  tell ='$_SESSION[tell]'");
        $row=mysql_fetch_array($sql);
          $costs=$row['a'];
          echo round($costs, 2);?> </td>

</Tr>
<tr><td>الصافي</td>
    <td ><strong><?php echo  round($costs-$xxx2, 2);?></strong></td>

</tr>
</table>
        <!-- نهاية صفحة التقرير -->

        <script type="text/javascript">
      window.onload = function() { window.print(); }
 </script>
 <?php
if(isset($_GET['print']))
{

echo "<script type='text/javascript'>
window.onload = function() { window.print(); }
</script>";
echo "<meta http-equiv='refresh' content='0;url=day1.php'>";
}
else
{
   echo "<meta http-equiv='refresh' content='0;url=day1.php'>";

}
 ?>