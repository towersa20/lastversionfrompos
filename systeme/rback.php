<?php include('header.php');?>


<table  dir="ltr" class="table table-bordered">
  <tr>
    <td colspan="8">
    Sales returns report with a date<?php echo $_POST['date'];?>
    </td>
  </tr>
  <tr>
  <td>Bills ID</td>
  <td>Barcode</td>
    <td>Product</td>
    <td>Quntity</td>
    <td>Price</td>
    <td>Total</td>
    <td>Status</td>
    <td>Date</td>
  </tr>

  <?php

//ملف الاتصال بقاعدة البيانات
include("dbcon/dbcon.php");
//كود عرض تقرير المستخدم
$time=$_POST['date'];
$sql=mysql_query("select * from sales where date='$time' and tell='0'");
$row=mysql_fetch_array($sql);?>
<?php do { ?>
<tr>
  <td><?php echo $row['invoice'];?></td>
  <td><?php echo $row['product'];?></td>
  <td><?php echo $row['name'];?></td>
  <td><?php echo $q1=$row['qty'];?></td>
  <td><?php echo $q2=$row['price'];?></td>
  <td><?php echo round($q1*$q2*$tax/100+$q1*$q2,2);?></td>
  <td><?php echo "Refund";?></td>
  <td><?php echo $row['datetime'];?></td>

</tr>

<?php }while($row=mysql_fetch_array($sql));?>

<tr>
  <td>Total</td>
  <td></td>  <td></td>  <td></td>  <td></td>
  <Td>
  <?php include("dbcon/dbcon.php");
        $time=date('Y-m-d');
        $sql=mysql_query("select sum(price*qty) from sales  where date='$time' and tell='0'");
        $row=mysql_fetch_array($sql);
          $costs=$row['sum(price*qty)']*$tax/100+$row['sum(price*qty)'];
         echo round($costs, 2);?> 
  </Td>
</tr>
