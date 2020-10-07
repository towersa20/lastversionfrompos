<?php include('header.php');?>




<table style="width:100%; font-size:14px;" align="center" class="table  table-bordered table-hover">
<?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select * from custpayment order by datetime asc ");
$row=mysql_fetch_array($sql);
?>
<tr align="center">
<td nowrap style="width:5%; ">ID</td>
<td nowrap style="width:25%; ">Customer</td>
<td nowrap style="width:15%; ">Date</td>
<td nowrap style="width:15%; ">Required</td>
<td nowrap style="width:10%; ">paid up</td>
<td nowrap style="width:15%; ">remaining amount</td>
</tr>
<?php  $i=0; do { $i=$i+1; ?>
<tr>
<td nowrap><?php echo $i;?></td>
<td nowrap><?php echo $row['name'];?></td>
<td nowrap><?php echo $row['date'];?></td>
<td nowrap><?php echo $row['amount'];?></td>
<td nowrap><?php echo $row['pay'];?></td>
<td nowrap><?php echo $row['last'];?></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
<tr>
    <td></td>
    <td></td>
    <td></td>
    <td><?php include('dbcon/config.php');
 // كود عرض اجمالي المبيعات * الكمية 
	$sql=mysql_query("select sum(amount) from custpayment ");
	$row=mysql_fetch_array($sql);
	echo $sum=$row['sum(amount)'];?></td>
    <td><?php include('dbcon/config.php');
 // كود عرض اجمالي المبيعات * الكمية 
	$sql=mysql_query("select sum(pay) from custpayment ");
	$row=mysql_fetch_array($sql);
	echo $sum=$row['sum(pay)'];?></td><td><?php include('dbcon/config.php');
 // كود عرض اجمالي المبيعات * الكمية 
	$sql=mysql_query("select sum(last) from custpayment ");
	$row=mysql_fetch_array($sql);
	echo $sum=$row['sum(last)'];?></td>
  
</tr>
</table

