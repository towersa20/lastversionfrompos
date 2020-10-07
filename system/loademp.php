<?php
include('dbcon/dbcon.php');
$q=$_REQUEST["q"]; $hint="";
$sql=mysql_query("select * from emp where name like '%$q%' or eid like '%$q%' or date3 like '%$q%' or tell like '%$q%' or nid like '%$q%' limit 30");
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
      <td colspan="10"><span class="style1"><strong>إستعلام عن موظف <i class="fa fa-search"></i></strong></span></td>
      </tr>
    <tr align="center">
      <td nowrap style="width:30%;"><strong>الموظف</strong></td>
      <td nowrap style="width:10%;"><strong>الهاتف</strong></td>
      <td nowrap style="width:10%;"><strong>الرقم الهويه</strong></td>
      <td nowrap style="width:10%;"><strong>الوظيفة</strong></td>
      <td nowrap style="width:10%;"><strong>الدوام</strong></td>
      <td nowrap style="width:10%;"><strong>التاريخ</strong></td>
      <td nowrap colspan="2"><strong>التحكم</strong></td>
    </tr>
		  <?php do { ?>

    <tr>
	<td nowrap><?php echo $row['name'];?></td>
      <td><?php echo $row['tell'];?></td>
      <td><?php echo $row['nid'];?></td>
      <td><?php echo $row['job'];?></td>
      <td><?php echo $row['work'];?></td>
      <td><?php echo $row['date3'];?></td>
<td align="center"><a href="delete.php?&&eids=<?php echo $row['eid'];?>" onClick="return confirm('هل تريد حذف <?php echo $row['name'];?>');">
        <button class="btn btn-raised gradient-pomegranate white" style="width: 100%;"> حذف <i class="fa fa-trash-o"></i></button></a></td>
<td align="center"><a href="upemps.php?&&eid=<?php echo $row['eid'];?>"><button class="btn btn-raised gradient-pomegranate white" style="width: 100%;"> تعديل <i class="fa fa-edit"></i></button></a></td>
   </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
  </table>
