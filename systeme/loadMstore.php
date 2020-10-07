<?php

// كود العرض من جدول حركة Store
include('dbcon/dbcon.php');
$q=$_REQUEST["q"]; $hint="";
$sql=mysql_query("select * from mstor where barco like '%$q%' or unit like '%$q%' or name like '%$q%' or qunt like '%$q%' or price like '%$q%'
 or datetime like '%$q%' or store like '%$q%'
order by barco desc limit 30");
$row=mysql_fetch_array($sql); 
/* $hint=$n['st_no'].'<br>'.$n['stname'].'<br>'.$n['father'].'<br>'.$n['year']; 
echo  $hint; */
 ?>

<center>
 
 <!-- جدول عرض بيانات حركة Store!-->

    <table style="width:100%;" border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
      <td colspan="10"><span></span> <i class="fa fa-th-large"></i></td>
<tr align="center">
<td style="width:8%; ">Barcode</td>
<td style="width:20%; "> Product</td>
<td style="width:10%; ">Unit</td>
<td style="width:10%; ">Quntity</td>
<td style="width:10%; ">Price</td>
<td style="width:10%; ">Store</td>
<td style="width:10%; ">Date</td>
<td style="width:10%; ">User</td>
</tr>
		  <?php do { ?>

    <tr>
<td nowrap><?php echo $row['barco'];?></td>
<td nowrap><?php echo $row['name'];?></td>
<td nowrap><?php echo $row['unit'];?></td>
<td nowrap><?php echo $row['qunt'];?></td>
<td nowrap><?php echo $row['price'];?></td>
<td nowrap><?php echo $row['store'];?></td>
<td nowrap><?php echo $row['datetime'];?></td>
<td nowrap><?php echo $row['user'];?></td>
   </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
  </table>
<!-- نهاية عرض جدول حركة بيانات Store!-->
