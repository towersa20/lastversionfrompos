<?php include('header.php');?>



<center>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">


<!-- بداية ترويسة التقرير !-->

<table dir="rtl" style="width:99%;"  border="1" align="center" class="table table-bordered table-hover">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center"><?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>Daily Alert Reports</strong></td>
            <td align="center"> Product Item  </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<!-- نهاية ترويسة التقرير !-->



<!-- بداية جدول عرض التقرير اليومي لمشتريات صنف !-->


<?php include('dbcon/dbcon.php');
//كود عرض التقرير اليومي لصنف
$date = new DateTime('now');
$date->modify('+2 month'); // or you can use '-90 day' for deduct
$date = $date->format('Y-m-d h:i:s');
 $date;

 // كود عرض البيانات بناء علي شرط بينات التاريخ
$sql=mysql_query("select * from storing  where  enddate > '$date'");
$row=mysql_fetch_array($sql);?>




<table style="width:99%;" border="1" bordercolor="#CCCCCC"   align="center" class="table table-bordered table-hover"  dir="rtl">

    <tr align="center">
      <td nowrap style="width:8%;"><strong>Barcode</strong></td>
      <td nowrap style="width:12%;"><strong>Product</strong></td>
      <td nowrap style="width:7%;"><strong>Unit</strong></td>
      <td nowrap style="width:7%;"><strong>Quantity</strong></td>
      <td nowrap style="width:7%;"><strong>Purchase</strong></td>
      <td nowrap style="width:7%;"><strong>expiry</strong></td>
    </tr>
      <?php
      
      // بداية حلقة التكرار
      do { ?>

    <tr>	
      <td nowrap><?php echo $row['barco'];?></td>
      <td><?php echo $row['name'];?></td>
      <td nowrap><?php echo $row['unit'];?></td>
      <td><?php echo $row['qunt'];?></td>
      <td><?php echo $row['price'];?></td>
	  <td nowrap><?php echo $row['date'];?></td>
   </tr>
     <?php
  // نهاية حلقة التكرار
  } while ($row=mysql_fetch_array($sql));?>
		<tr>
	<td><strong>Total</strong></td>
	<td></td>
	<td></td>
	<td><?php include('dbcon/dbcon.php');
  // عرض عدد العمليات
	$sql=mysql_query("select count(sid) from storing  where enddate > '$date'");
	$row=mysql_fetch_array($sql);
	echo $row['count(sid)'];
	?></td>
	<td><?php include('dbcon/dbcon.php');
    // عرض سعر الشراء
	$sql=mysql_query("select sum(price) from storing where  enddate  > '$date'");
	$row=mysql_fetch_array($sql);
	echo $row['sum(price)'];
	?></td>
	<td></td>
	</tr>
  </table>
  