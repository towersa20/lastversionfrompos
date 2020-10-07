<?php
include('dbcon/config.php');
$q=$_REQUEST["q"]; $hint="";
$sql=mysql_query("select * from share where barco like '%$q%' or formid like '%$q%' or name like '%$q%' or unit like '%$q%'
 or customer or store like '%$q%' or date like '%$q%' limit 30");
$row=mysql_fetch_array($sql); 
/* $hint=$n['st_no'].'<br>'.$n['stname'].'<br>'.$n['father'].'<br>'.$n['year']; 
echo  $hint; */
 ?>

    
 <center>
 <table  align="center" class="table table-bordered table-hover" style="width:100%;font-size:13px;">
<tr align="center">
<td style="width:10%; ">رقم الفاتورة</td>
<td style="width:10%; ">الباركود</td>
<td style="width:30%; ">الصـنف</td>
<td style="width:10%; ">الكمية</td>
<td style="width:10%; ">الشراء</td>
<td style="width:10%; ">الضريبة</td>
<td style="width:10%; ">الإجمالي</td>
<td style="width:10%; ">المورد</td>
<td style="width:10%; " colspan="2">التحكم</td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['formid'];?></td>
<td nowrap><?php echo $row['barco'];?></td>
<td nowrap><?php echo $row['name'];?></td>
<td nowrap><?php echo $row['qunt'];?></td>
<td nowrap><?php echo $row['price'];?></td>
<td nowrap><?php echo $row['price']*$row['qunt']*5/100;?></td>
<td nowrap><?php echo $row['price']*$row['qunt']*5/100+$row['price']*$row['qunt'];?></td>
<td nowrap><?php echo $row['customer'];?></td>
<td align="center"><a href="delete.php?&&pid2=<?php echo $row['pid'];?>" onClick="return confirm('هل تريد حذف صنف <?php echo $row['name'];?>');">

        <button class="btn btn-danger" style="width: 100px;  font-family: 'Droid Arabic Kufi';"> حذف <i class="fa fa-trash"></i></button></a></td>
<td align="center"><a href="upprush.php?&&pid=<?php echo $row['pid'];?>"><button class="btn btn-primary" style="width: 100px;  font-family: 'Droid Arabic Kufi';"> تعديل <i class="fa fa-edit"></i></button></a></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
</table>
