<?php
// استدعاء ملف التنسيق
include('header.php');?>

<table class="table table-bordered" style="background-color: #eff5fc; font-size: 25px;">
<tr>
  <td colspan="6">تقرير اليوم </td>
</tr>
  <!--اضافة ال صف الذي سيتم فيه عرض اجمالي ضريبة المبيعات والمشتريات-->
<tr>
  <td colspan="2">ضريبة المبيعات</td>
     <td style="color:red;"><?php include("dbcon/dbcon.php");
        $time=date('Y-m-d');
        $sql=mysql_query("SELECT sum(price*qty) from sales where date ='$time'  and tell ='1' ");
        $row=mysql_fetch_array($sql);
          $sumtax=$row['sum(price*qty)']*$tax/100;
          echo round($sumtax, 2);?> </td>
  <td colspan="2">ضريبة المشتريات</td>
  <td style="color:red;"><?php include("dbcon/dbcon.php");
        $time=date('Y-m-d');
        $sql=mysql_query("SELECT sum(price * qunt) FROM `share` WHERE date  ='$time'   ");
        $row=mysql_fetch_array($sql);
          $sumshare=$row['sum(price * qunt)']*$tax/100;
          echo round($sumshare, 2);?> </td>
</tr>

</TR>
<Tr>

    <Td>المبيعات</Td>

    <td style="color:green;"><?php include("dbcon/dbcon.php");
        $time=date('Y-m-d');
        $sql=mysql_query("SELECT sum(price*qty) as sum from sales where date='$time' and tell ='1' ");
        $row=mysql_fetch_array($sql);
          $costs=$row['sum'];
          echo $sumsal=round($costs, 2);?> </td>
    <td>المشتريات</td>

    <td style="color:red;"><?php include('dbcon/dbcon.php');
  // عرض صافي سعر البيع شامل الضريبة
	$sql=mysql_query("select sum(qunt*price) from share where date ='$time'");
	$row=mysql_fetch_array($sql);
	echo $xxx2=$row['sum(qunt*price)'];
  ?></td>
  


  <td>الصافي</td>
  <td style="color:red;"><strong><?php echo  round($sumsal-$xxx2, 2);?></strong></td>
</tr>


<tr>
    <td colspan="6"><a href="prints.php"><button style="font-size:22px; height: 66px; background-color: orangered; " class="btn  form-control" >طباعة <i class="fa fa-print"></i></button></td>
</tr>

</table>
        <!-- نهاية صفحة التقرير -->

        <br>

<table class="table table-bordered">
  <tr>
    <td colspan="8">
      تقرير مرتجعات المبيعات
    </td>
  </tr>
  <tr>
  <td  style="width: 15px;">رقم الفاتورة</td>
  <td  style="width:20px;">رقم الباركود</td>
    <td  style="width:28%;">اسم الصنف</td>
    <td style="width:8%;">الكمية</td>
    <td style="width:8%;">السعر</td>
    <td style="width:8%;">الإجمالي</td>
    <td style="width:8%;">الحالة</td>
    <td style="width:17%;">التاريخ</td>
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
  <td><?php echo $q2=$row['price'];?></td>
  <td><?php echo $q1*$q2*$tax/100+$q1*$q2;?></td>
  <td><?php echo "مرتجعات";?></td>
  <td><?php echo $row['datetime'];?></td>

</tr>

<?php }while($row=mysql_fetch_array($sql));?>

<tr>
  <td>الاجمالي</td>
 <td></td>  <td></td> 

  <td>
  <?php include("dbcon/dbcon.php");
        $time=date('Y-m-d');
        $sql=mysql_query("select count(qty) from sales  where date='$time' and tell='0'");
        $row=mysql_fetch_array($sql);
        echo  $costs=$row['count(qty)'];
         // echo round($costs, 2);?> 
  </td>
  <td></td> 
  <Td>
  <?php include("dbcon/dbcon.php");
        $time=date('Y-m-d');
        $sql=mysql_query("select sum(price*qty) from sales  where date='$time' and tell='0'");
        $row=mysql_fetch_array($sql);
        echo  $costs=$row['sum(price*qty)']*$tax/100+$row['sum(price*qty)'];
         // echo round($costs, 2);?> 
  </Td>
</tr>
