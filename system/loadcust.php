<?php
include('dbcon/config.php');
$q=$_REQUEST["q"]; $hint="";
$sql=mysql_query("select * from customer where name like '%$q%' or tell1 like '%$q%' or cno like '%$q%' or acno like '%$q%'");
$row=mysql_fetch_array($sql); 
/* $hint=$n['st_no'].'<br>'.$n['stname'].'<br>'.$n['father'].'<br>'.$n['year']; 
echo  $hint; */
 ?>
 <center>
     <table style="width:100%; font-size: 13px; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
<tr align="center">
<td nowrap style="width:25%; ">إسم المورد</td>
<td nowrap style="width:15%; ">رقم الهاتف</td>
<td nowrap style="width:15%; ">رقم الحساب</td>
<td nowrap style="width:20%; ">اسم البنك</td>
<td nowrap style="width:15%; ">الرقم التجاري</td>
<td nowrap style="width:10%; " colspan="2">التحكم</td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['name'];?></td>
<td nowrap><?php echo $row['tell1'];?></td>
<td nowrap><?php echo $row['acno'];?></td>
<td nowrap><?php echo $row['bank'];?></td>
<td nowrap><?php echo $row['cno'];?></td>
<td align="center"><a href="delete.php?&&cids=<?php echo $row['cid'];?>" onClick="return confirm('هل تريد حذف <?php echo $row['name'];?>');">
        <button class="btn btn-primary" style="width: 100px; font-family: 'Droid Arabic Kufi';"> حذف <i class="fa fa-times"></i></button></a></td>
<td align="center"><a href="upcusts.php?&&cid=<?php echo $row['cid'];?>"> <button class="btn btn-primary" style="width: 100px; font-family: 'Droid Arabic Kufi';"> تعديل <i class="fa fa-edit"></i></button></a></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
</table>

