<?php
include('dbcon/dbcon.php');
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
    <table style="width:90%; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
    <tr>
      <td colspan="10"><span class="style1"><strong>إستعلام عن المرتبات</strong></span></td>
      </tr>
    <tr align="center">
      <td nowrap style="width:65%;"><strong>الموظف</strong></td>
      <td nowrap style="width:10%;"><strong>الصافي</strong></td>
      <td nowrap style="width:15%;"><strong>التاريخ</strong></td>
      <td nowrap colspan="2"><strong>التحكم</strong></td>
    </tr>
		  <?php do { ?>

    <tr>	
      <td nowrap><?php echo $row['name'];?><?php  $x1=$row['sal1'];?></td>
      <td nowrap><?php  $x2=$row['haf'];?><?php  $x3=$row['badil'];?>
      <?php  $x4=$row['dis'];?><?php  $x5=$row['insu'];?><?php echo $x1+$x2+$x3-$x4-$x5;?></td>
      <td nowrap><?php echo $row['date'];?></td>
 <td align="center"><a href="delete.php?&&salid=<?php echo $row['salid'];?>" onClick="return confirm('هل تريد حذف <?php echo $row['name'];?>');"><i class='icon-trash2 bg-red.bg-darken-1 font-large-2 float-xs-right'></i></a></td>
<td align="center"><a href="upsal.php?&&salid=<?php echo $row['salid'];?>"><i class='icon-edit2 teal font-large-2 float-xs-right'></i></a></td>
   </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
  </table>
