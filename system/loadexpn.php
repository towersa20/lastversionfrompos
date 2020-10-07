<?php
include('dbcon/config.php');
$q=$_REQUEST["q"]; $hint="";
$sql=mysql_query("select * from expn where etype like '%$q%' or cost like '%$q%' or date like '%$q%' or year like '%$q%' or user like '%$q%' limit 30");
$row=mysql_fetch_array($sql); 
/* $hint=$n['st_no'].'<br>'.$n['stname'].'<br>'.$n['father'].'<br>'.$n['year']; 
echo  $hint; */
 ?>


 <center>

     <table style="width:100%; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
         <tr>
      <td colspan="10"><span><strong>نتـائـج البحـــث في المنصـرفات</strong></span></td>
      </tr>
    <tr align="center">
      <td nowrap style="width:10%;"><strong>التسلسل</strong></td>
      <td nowrap style="width:50%;"><strong>المصروف</strong></td>
      <td nowrap style="width:10%;"><strong>المبلغ</strong></td>
      <td nowrap style="width:10%;"><strong>التاريخ</strong></td>
      <td nowrap style="width:20%;" colspan="2"><strong>التحكم</strong></td>
    </tr>
		  <?php do { ?>

    <tr>
      <td><?php echo $row['exid'];?></td>
      <td><?php echo $row['etype'];?></td>
      <td nowrap><?php echo $row['cost'];?></td>
      <td nowrap><?php echo $row['datetime'];?></td>
 <td align="center"><a href="delete.php?&&exids=<?php echo $row['exid'];?>" onClick="return confirm('هل تريد حذف <?php echo $row['etype'];?>');">
         <button class="btn btn-danger" style="width:100%; font-family: 'Droid Arabic Kufi';"> حذف <i class="fa fa-trash-o"></i></button></a></td>
<td align="center"><a href="upexpns.php?&&exid=<?php echo $row['exid'];?>"><button class="btn btn-primary" style="width:100%;"> تعديل <i class="fa fa-edit"></i></button></a></td>
   </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr align="center">
	<td><strong>الإجمالي</strong></td>
	<td><?php
include('dbcon/config.php');
$q=$_REQUEST["q"]; $hint="";
$sql=mysql_query("select count(exid)from expn where etype like '%$q%' or cost like '%$q%' or date like '%$q%' or year like '%$q%' or user like '%$q%'");
$row=mysql_fetch_array($sql); 
echo $row['count(exid)'];?>
</td>

	<td nowrap><?php
include('dbcon/config.php');
$q=$_REQUEST["q"]; $hint="";
$sql=mysql_query("select sum(cost)from expn where etype like '%$q%' or cost like '%$q%' or date like '%$q%' or year like '%$q%' or user like '%$q%'");
$row=mysql_fetch_array($sql); 
echo $row['sum(cost)'];?>
</td>
	<td></td>
	<td></td>
	<td></td>
	</tr>
  </table>
