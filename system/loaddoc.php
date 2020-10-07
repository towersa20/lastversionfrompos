<?php
include('dbcon/dbcon.php');
$q=$_REQUEST["q"]; $hint="";
$sql=mysql_query("select * from doc where recive like '%$q%' or chg like '%$q%' or date like '%$q%' or type like '%$q%' or fromid like '%$q%' limit 30");
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
    <table style="width:100%;" border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
      <td colspan="10"><span>نتـائـج البحـــث في السندات</span> <i class="fa fa-th-large"></i></td>
    <tr align="center">
    <td nowrap style="width:15%; "><strong>التاريخ</strong></td>
    <td nowrap style="width:10%; "><strong>رقم السند</strong></td>
	<td nowrap style="width:20%; "><strong>المستلم</strong></td>
	<td nowrap style="width:20%; "><strong>الجهة</strong></td>
	<td nowrap style="width:10%; "><strong>المبلغ</strong></td>
    <td nowrap style="width:10%; "><strong>السند</strong></td>
      <td nowrap colspan="2"><strong>التحكم</strong></td>
    </tr>
		  <?php do { ?>

    <tr>
    <td nowrap><?php echo $row['datetime'];?></td>
    <td nowrap><?php echo $row['fromid'];?></td>
    <td nowrap><?php echo $row['recive'];?></td>
    <td nowrap><?php echo $row['chg'];?></td>
    <td nowrap><?php echo $row['cost'];?></td>
    <td nowrap><?php echo $row['type'];?></td>
 <td align="center"><a href="delete.php?&&did=<?php echo $row['did'];?>" onClick="return confirm('هل تريد حذف <?php echo $row['name'];?>');">
         <button class="btn btn-raised gradient-pomegranate white" style="width: 100px;"> حذف <i class="fa fa-trash-o"></i></button></a></td>
<td align="center"><a href="updoc.php?&&did=<?php echo $row['did'];?>"><button class="btn btn-raised gradient-pomegranate white" style="width: 100px;"> تعديل <i class="fa fa-edit"></i></button></a></td>
   </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
  </table>
