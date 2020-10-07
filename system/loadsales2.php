<?php
include('dbcon/config.php');
$q=$_REQUEST["q"]; $hint="";
$sql=mysql_query("select * from info where barco like '%$q%'  or formatid like '%$q%' or item like '%$q%' or unit like '%$q%'
or date like '%$q%' or user like '%$q%' or cust like '%$q%' or type like '%$q%' limit 30");
$row=mysql_fetch_array($sql); 
/* $hint=$n['st_no'].'<br>'.$n['stname'].'<br>'.$n['father'].'<br>'.$n['year']; 
echo  $hint; */
 ?>

    <style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
-->
    </style>
    
 <center>
    <table style="width:100%; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
    <tr align="center" >
      <td nowrap style="width:14%;"><strong>الفاتورة</strong></td>
      <td nowrap style="width:15%;"><strong>الصنــف</strong></td>
      <td nowrap style="width:15%;"><strong>الوحدة</strong></td>
      <td nowrap style="width:8%;"><strong>الكمية</strong></td>
      <td nowrap style="width:8%;"><strong>السعر</strong></td>
      <td nowrap style="width:8%;"><strong>الإجمالي</strong></td>
      <td nowrap style="width:8%;"><strong>الدفع</strong></td>
      <td nowrap style="width:8%;"><strong>الحالة</strong></td>
      <td nowrap style="width:15%;"><strong>التاريخ</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
      <td nowrap><?php echo $row['formatid'];?></td>
      <td nowrap><?php echo $row['item'];?></td>
      <td><?php echo $row['unit'];?></td>
      <td><?php echo $row['qunt'];?></td>
      <td><?php echo $row['price'];?></td>
      <td><?php echo $row['qunt']*$row['price'];?></td>
      <td><?php echo $row['type'];?></td>
      <td><?php echo $row['pros'];?></td>
      <td nowrap><?php echo $row['dateitem'];?></td>
   </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr>
</table>
