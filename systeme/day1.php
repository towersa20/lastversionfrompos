<?php
// استدعاء ملف التنسيق
include('header.php');?>

<table class="table table-bordered" style="background-color: #eff5fc; font-size: 25px;">
<tr>
  <td colspan="6">today's report </td>
</tr>
  <!--اضافة ال صف الذي سيتم فيه عرض اجمالي ضريبة المبيعات والمشتريات-->
<tr>
  <td colspan="2">sales tax</td>
     <td style="color:red;"><?php include("dbcon/dbcon.php");
        $time=date('Y-m-d');
        $sql=mysql_query("SELECT sum(price*qty) from sales where date ='$time'  and tell ='1' ");
        $row=mysql_fetch_array($sql);
          $sumtax=$row['sum(price*qty)']*$tax/100;
          echo round($sumtax, 2);?> </td>
  <td colspan="2">Purchase tax</td>
  <td style="color:red;"><?php include("dbcon/dbcon.php");
        $time=date('Y-m-d');
        $sql=mysql_query("SELECT sum(price * qunt) FROM `share` WHERE date  ='$time'   ");
        $row=mysql_fetch_array($sql);
          $sumshare=$row['sum(price * qunt)']*$tax/100;
          echo round($sumshare, 2);?> </td>
</tr>

</TR>
<Tr>

    <Td>Sales</Td>

    <td style="color:green;"><?php include("dbcon/dbcon.php");
        $time=date('Y-m-d');
        $sql=mysql_query("SELECT sum(price*qty) as sum from sales where date='$time' and tell ='1' ");
        $row=mysql_fetch_array($sql);
          $costs=$row['sum'];
          echo $sumsal=round($costs, 2);?> </td>
    <td>Purchase</td>

    <td style="color:red;"><?php include('dbcon/dbcon.php');
  // عرض صافي سعر البيع شامل الضريبة
	$sql=mysql_query("select sum(qunt*price) from share where date ='$time'");
	$row=mysql_fetch_array($sql);
	echo $xxx2=$row['sum(qunt*price)'];
  ?></td>
  


  <td>Total</td>
  <td style="color:red;"><strong><?php echo  round($sumsal-$xxx2, 2);?></strong></td>
</tr>


<tr>
    <td colspan="6"><a href="prints.php"><button style="font-size:22px; height: 66px; background-color: orangered; " class="btn  form-control" >Print <i class="fa fa-print"></i></button></td>
</tr>

</table>
        <!-- نهاية صفحة التقرير -->

        <br>

<table class="table table-bordered">
  <tr>
    <td colspan="8">
    Sales returns report    </td>
  </tr>
  <tr>
  <td style="width: 12%;">Bills ID</td>
  <td style="width: 12%;">Barcode</td>
    <td style="width: 25%;">Product</td>
    <td style="width: 7%;">Quantity</td>
    <td style="width: 7%;">Price</td>
    <td style="width: 7%;">Total</td>
    <td style="width: 7%;">Status</td>
    <td style="width: 15%;">Date</td>
  </tr>

  <?php

//ملف الاتصال بقاعدة البيانات
include("dbcon/dbcon.php");
//كود عرض تقرير المستخدم
$time=date('Y-m-d');
$sql=mysql_query("select * from sales where date='$time' and tell='0'");
$row=mysql_fetch_array($sql);?>
<?php do { ?>
<tr>
  <td><?php echo $row['invoice'];?></td>
  <td><?php echo $row['product'];?></td>
  <td><?php echo $row['name'];?></td>
  <td><?php echo $q1=$row['qty'];?></td>
  <td><?php  $q2=$row['price']; $q2 = sprintf("%01.2f", $q2);  echo $q2;  ?></td>
  <td><?php  $xxx=$q1*$q2*$tax/100+$q1*$q2; $xxx = sprintf("%01.2f", $xxx);  echo $xxx;  ?></td>
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
        $costs = sprintf("%01.2f", $costs);  echo $costs;  ?> 
  </Td>
</tr>
