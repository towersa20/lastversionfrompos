<?php

// كود العرض من جدول حركة المخزن
include('dbcon/dbcon.php');
$q=$_REQUEST["q"]; $hint="";
$sql=mysql_query("select * from mstor where barco like '%$q%' or unit like '%$q%' or name like '%$q%' or qunt like '%$q%' or price like '%$q%'
 or datetime like '%$q%' or store like '%$q%'
order by barco desc limit 30");
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
 
 <!-- جدول عرض بيانات حركة المخزن!-->

    <table style="width:100%;" border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
      <td colspan="10"><span>نتـائـج البحـــث في حركة المخزن</span> <i class="fa fa-th-large"></i></td>
<tr align="center">
<td style="width:8%; ">الباركود</td>
<td style="width:20%; ">إسم الصــنف</td>
<td style="width:10%; ">الوحده</td>
<td style="width:10%; ">الكمية</td>
<td style="width:10%; ">السعر</td>
<td style="width:10%; ">المخزن</td>
<td style="width:10%; ">التاريخ</td>
<td style="width:10%; ">التخزين</td>
<td style="width:10%; ">المستخدم</td>
</tr>
		  <?php do { ?>

    <tr>
<td nowrap><?php echo $row['barco'];?></td>
<td nowrap><?php echo $row['name'];?></td>
<td nowrap><?php echo $row['unit'];?></td>
<td nowrap><?php echo $row['qunt'];?></td>
<td nowrap><?php echo $row['price'];?></td>
<td nowrap><?php echo $row['store'];?></td>
<td nowrap><?php echo $row['date'];?></td>
<td nowrap><?php echo $row['datetime'];?></td>
<td nowrap><?php echo $row['user'];?></td>
   </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
  </table>
<!-- نهاية عرض جدول حركة بيانات المخزن!-->
