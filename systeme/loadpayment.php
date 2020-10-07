<?php
include('dbcon/dbcon.php');
$q=$_REQUEST["q"]; $hint="";
$sql=mysql_query("select * from payment where cust like '%$q%' or item like '%$q%' or date like '%$q%' or unit like '%$q%' or codes like '%$q%' limit 30");
$row=mysql_fetch_array($sql); 
/* $hint=$n['st_no'].'<br>'.$n['stname'].'<br>'.$n['father'].'<br>'.$n['year']; 
echo  $hint; */
 ?>

    
 <center>
     <table style="width:100%; " align="center" class="table table-bordered table-hover animated flipInX">

     <tr align="center">
<td style="width:15%;">Bills</td>
<td style="width:15%;">Customer</td>
<td style="width:12%;">Required</td>
<td style="width:10%;">amount required</td>
<td style="width:10%;">Remaining amount</td>
<td style="width:10%;" colspan="2">Control</td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['codes'];?></td>
<td nowrap><?php echo $row['cust'];?></td>
<td nowrap><?php echo $row['total'];?></td>
<td nowrap><?php echo $row['pay'];?></td>
<td nowrap><?php echo $row['ex'];?></td>
<td align="center"><a href="delete.php?&&pxid2=<?php echo $row['pxid'];?>" onClick="return confirm('Do you want Delete');">
<button class="btn btn-danger" style="width: 100px; font-family: 'Droid Arabic Kufi';"> Delete <i class="fa fa-times"></i></button></a></td>
<td align="center"><a href="upcpay.php?&&pxid=<?php echo $row['pxid'];?>"><button class="btn btn-primary" style="width: 100px; font-family: 'Droid Arabic Kufi';"> Edit <i class="fa fa-edit"></i></button></a></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
</table>
