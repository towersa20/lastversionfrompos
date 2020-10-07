<?php
include('dbcon/dbcon.php');
$q=$_REQUEST["q"]; $hint="";
$sql=mysql_query("select * from info where  cust like '%$q%' or
 unit like '%$q%' or type like '%$q%' or formatid like '%$q%' or
  date like '%$q%' or user like '%$q%'  or item like '%$q%' limit 30");
$row=mysql_fetch_array($sql); 
/* $hint=$n['st_no'].'<br>'.$n['stname'].'<br>'.$n['father'].'<br>'.$n['year']; 
echo  $hint; */
 ?>


    
 <center>
     <table style="width:100%; " align="center" class="table table-bordered table-hover ">

     <tr align="center">
<td style="width:12%; ">التاريخ</td>
<td style="width:12%; ">الفاتورة</td>
<td style="width:10%; ">العميل</td>
<td style="width:10%; ">الصنف</td>
<td style="width:10%; ">الوحدة</td>
<td style="width:10%; ">السعر</td>
<td style="width:10%; ">الكمية</td>
<td style="width:10%; ">الإجمالي</td>
<td style="width:10%; ">الحالة</td>
<td style="width:10%; ">السداد</td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['dateitem'];?></td>
<td nowrap><?php echo $x0=$row['formatid'];?></td>
<td nowrap><?php echo $x1=$row['cust'];?></td>
<td nowrap><?php echo $row['item'];?></td>
<td nowrap><?php echo $row['unit'];?></td>
<td nowrap><?php echo $row['price'];?></td>
<td nowrap><?php echo $row['qunt'];?></td>
<td nowrap><?php echo round($row['price']*$row['qunt']*15/100+$row['price']*$row['qunt'],2);?></td>
<td nowrap><?php echo $row['pros'];?></td>
<td nowrap><a href="end.php?x1=<?php echo $row['cust'];?>&&x2=<?php echo $row['id'];?>&&x3=<?php echo round($row['price']*$row['qunt']*15/100+$row['price']*$row['qunt'],2);?>"><button class="btn btn-danger" style="width: 180px;"> سداد </button></a></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
<tr>
    <td colspan="2">الإجمالي المطلوب + 15 % الضريبة</td>

    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>
    <td style="background-color: silver;"><?php include('dbcon/config.php');
 // كود عرض اجمالي المبيعات * الكمية شامل الصريبة
	$sql=mysql_query("select sum(price*qunt) from info where  cust like '%$q%' or
    unit like '%$q%' or type like '%$q%' or formatid like '%$q%' or
     date like '%$q%' or user like '%$q%'  or item like '%$q%' limit 30");
	$row=mysql_fetch_array($sql);
  echo $x2=$row['sum(price*qunt)']*15/100+$row['sum(price*qunt)'];?></td>
      </tr>
      
    </td>
</tr>
     </table>
