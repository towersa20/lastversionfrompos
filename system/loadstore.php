<?php

// كود البحث في سحلات المخزن
include('dbcon/dbcon.php');
$q=$_REQUEST["q"]; $hint="";
$sql=mysql_query("select * from storing where name like '%$q%' 
or qunt like '%$q%' or price like '%$q%' 
or date like '%$q%' or store like '%$q%'
or unit like '%$q%' or barco like '%$q%'
or enddate like '%$q%'
 limit 30");
$row=mysql_fetch_array($sql);
// نهاية كود البحث في سجلات المخزن
 ?>


<center>
 
 <!-- جدول عرض نتائج البحث في سجلات المخزن!-->

    <table style="width:100%; font-size: 14px;" border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
      <td colspan="11"><span>نتـائـج البحـــث في المخزن</span> <i class="fa fa-th-large"></i></td>
    <tr align="center">
<td style="width:15%; ">الباركود</td>
<td style="width:30%; ">إسم الصــنف</td>
<td style="width:7%; ">الوحده</td>
<td style="width:7%; ">الكميــــــة</td>
<td style="width:7%; ">الســـعــر</td>
<td nowrap colspan="3"><strong>التحكم</strong></td>
    </tr>
		  <?php do { ?>

    <tr>
<td nowrap><?php echo $row['barco'];?></td>
<td nowrap><?php echo $row['name'];?></td>
<td nowrap><?php echo $row['unit'];?></td>
<td nowrap><?php echo $row['qunt'];?></td>
<td nowrap><?php echo $row['price'];?></td>
 <td align="center"><a href="delete.php?&&xsid2=<?php echo $row['sid'];?>" onClick="return confirm('هل تريد حذف <?php echo $row['name'];?>');">
         <button class="btn btn-danger" style="width: 100%;font-family: 'Droid Arabic Kufi';"> حذف <i class="fa fa-times"></i></button></a></td>
<td align="center"><a href="upstors.php?&&xsid=<?php echo $row['sid'];?>"><button class="btn btn-success" style="width: 100%; font-family: 'Droid Arabic Kufi';"> تعديل <i class="fa fa-edit"></i></button></a></td>
<td align="center"><a href="storeview.php?&&barco=<?php echo $row['barco'];?>&&info=<?php echo $row['name'];?>"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> تفاصيل <i class="fab fa-accusoft"></i></button></a></td>
   </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
  </table>
<!-- فورم نهاية البحث في سجلات المخزن!-->
