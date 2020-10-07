<?php
include('dbcon/config.php');
$q=$_REQUEST["q"]; $hint="";
$sql=mysql_query("select * from salary where name like '%$q%' or eid like '%$q%' or date like '%$q%' limit 30");
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
    <tr>
      <td colspan="12"><span><strong>نتـائـج البحـــث في مرتب موظف</strong></span></td>
      </tr>
    <tr align="center">
      <td nowrap style="width:5%;"><strong>الرقم</strong></td>
      <td nowrap style="width:18%;"><strong>الموظف</strong></td>
      <td nowrap style="width:7%;"><strong>المرتب</strong></td>
      <td nowrap style="width:7%;"><strong>الحافز</strong></td>
      <td nowrap style="width:7%;"><strong>البدلات</strong></td>
      <td nowrap style="width:7%;"><strong>الخصومات</strong></td>
      <td nowrap style="width:7%;"><strong>التأمين</strong></td>
      <td nowrap style="width:7%;"><strong>الصافي</strong></td>
      <td nowrap style="width:7%;"><strong>الحالة</strong></td>
      <td nowrap style="width:11%;"><strong>التاريخ</strong></td>
      <td nowrap colspan="2"><strong>التحكم</strong></td>
    </tr>
		  <?php do { ?>

    <tr>
      <td><?php echo $row['eid'];?></td>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['sal1'];?></td>
      <td><?php echo $row['haf'];?></td>
      <td><?php echo $row['badil'];?></td>
      <td><?php echo $row['dis'];?></td>
      <td><?php echo $row['insu'];?></td>
      <td><?php echo $row['sal1']+$row['haf']+$row['badil']-$row['dis']-$row['insu'];?></td>
      <td><?php if($row['state']==1)
	  { 
	  echo "صرف";
	  }
	  else
	  {
	  echo "لم يصرف";
	  }?></td>
      <td><?php echo $row['date'];?></td>
<td align="center"><a href="delete.php?&&salid=<?php echo $row['salid'];?>" onClick="return confirm('هل تريد حذف <?php echo $row['name'];?>');">
        <button class="btn btn-danger" style="width: 100px;"> حذف <i class="fa fa-trash-o"></i></button></a></td>
<td align="center"><a href="upsal.php?&&salid=<?php echo $row['salid'];?>"><button class="btn btn-success" style="width: 100px;"> تعديل <i class="fa fa-edit"></i></button></a></td>
   </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr align="center">
	<td><strong>الإجمالي</strong></td>
	<td><?php
include('dbcon/config.php');
$q=$_REQUEST["q"]; $hint="";
$sql=mysql_query("select count(salid)from salary where name like '%$q%' or eid like '%$q%' or date like '%$q%' ");
$row=mysql_fetch_array($sql); 
echo $row['count(salid)'];?>
</td>

	<td nowrap><?php
include('dbcon/config.php');
$q=$_REQUEST["q"]; $hint="";
$sql=mysql_query("select sum(sal1+haf+badil-dis-insu)from salary where name like '%$q%' or eid like '%$q%' or date like '%$q%' ");
$row=mysql_fetch_array($sql); 
echo $row['sum(sal1+haf+badil-dis-insu)'];?>
</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	</tr>
  </table>
