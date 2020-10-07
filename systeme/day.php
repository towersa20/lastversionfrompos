<?php
//استدعاء القالب الخاص بالتصميم
include('header.php');?>


<?php

//ملف الاتصال بقاعدة البيانات
include("dbcon/dbcon.php");

//كود عرض تقرير المستخدم
$time=date('Y-m-d');
$sql=mysql_query("select sum(qty),invoice,name,category ,product,price,discount,transaction_id,user,datetime from sales where date='$time' and   tell ='1' GROUP BY NAME");
$row=mysql_fetch_array($sql);?>

<table class="table table-bordered" style="background-color: #eff5fc; ">
<Tr>
    <td colspan="11">Record of users' sales</td>
</Tr>
<tr align="center">
<td>ID</td>
<td>Barcode</td>
<td>Product</td>
<td>Unit</td>
<td>Quantity</td>
<td>Sales</td>
<td> Purchase</td>
<td>Tax </td>
<td>Amount</td>
<td>Users</td>
<td>Time</td>
</tr>

<?php $i=0; do {
    $i=$i+1; ?>
<tr>
<td><?php echo $i;?></td>
<td><?php echo $row['invoice'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['category'];?></td>
<td><?php echo $row['sum(qty)'];?></td>
<td><?php echo $row['price'];?></td>
<td><?php echo $row['discount'];?> </td>
<td><?php echo $row['sum(qty)']*$row['price']*$tax/100;?></td>
<td><?php echo $row['sum(qty)']*$row['price'];?></td>
<td><?php echo $row['user'];?></td>
<td><?php echo $row['datetime'];?></td>
</tr>
<?php }while($row=mysql_fetch_array($sql));?>
<tr>
    <Td>Total</Td>
    <td></td>
      <td></td>
  
    <td></td>
    <td><?php /* include("dbcon/dbcon.php");
    $time=date('Y-m-d');
    $sql=mysql_query("select sum(qty) from sales where date='$time'  and  tell ='1'");
    $row=mysql_fetch_array($sql);
      $costs=$row['sum(qty)'];
     echo round($costs, 2)*/?> </td>
  
  
  <td><?php /*  include("dbcon/dbcon.php");
    $time=date('Y-m-d');
    $sql=mysql_query("select sum(price) from sales where date='$time'  and  tell ='1'");
    $row=mysql_fetch_array($sql);
      $costs=$row['sum(price)'];
     echo round($costs, 2)*/?> </td>
     
     
       
  <td><?php /* include("dbcon/dbcon.php");
    $time=date('Y-m-d');
    $sql=mysql_query("select sum(discount) from sales where date='$time'  and  tell ='1'");
    $row=mysql_fetch_array($sql);
      $costs=$row['sum(discount)'];
     echo round($costs, 2)*/?> </td>
     
     
     
     <td><?php include("dbcon/dbcon.php");
    $time=date('Y-m-d');
    $sql=mysql_query("select sum(price*qty) from sales where date='$time'  and  tell ='1'");
    $row=mysql_fetch_array($sql);
      $costs=$row['sum(price*qty)']*$tax/100;
     echo round($costs, 2)?> </td>
     
     
     
     <td><?php include("dbcon/dbcon.php");
    $time=date('Y-m-d');
    $sql=mysql_query("select sum(price*qty) from sales where date='$time'  and  tell ='1'");
    $row=mysql_fetch_array($sql);
      $costs=$row['sum(price*qty)'];
     echo round($costs, 2)?> </td>  
    <td></td>
    <td></td>
</tr>

</table>
        <!-- نهاية صفحة التقرير-->
