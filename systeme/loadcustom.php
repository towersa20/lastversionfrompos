<?php
include('dbcon/dbcon.php');
$q=$_REQUEST["q"]; $hint="";
$sql=mysql_query("select * from person where prid like '%$q%' or name like '%$q%' or phone like '%$q%' or type like '%$q%' or acount like '%$q%' limit 30");
$row=mysql_fetch_array($sql); 
/* $hint=$n['st_no'].'<br>'.$n['stname'].'<br>'.$n['father'].'<br>'.$n['year']; 
echo  $hint; */
 ?>

 <center>
  <table align="center" class="table table-bordered table-hover" style="width:100%; font-size: 13px;">
<tr align="center">
<td nowrap style="width:25%; ">Customer</td>
<td nowrap style="width:10%; ">Phone</td>
<td nowrap style="width:10%; ">Account Number</td>
<td nowrap style="width:15%; ">Bank</td>
<td nowrap style="width:10%; ">Type</td>
<td nowrap style="width:15%; ">Date</td>
<td nowrap style="width:15%; " colspan="2">Control</td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['name'];?></td>
<td nowrap><?php echo $row['phone'];?></td>
<td nowrap><?php echo $row['acount'];?></td>
<td nowrap><?php echo $row['bank'];?></td>
<td nowrap><?php echo $row['type'];?></td>
<td nowrap><?php echo $row['date'];?></td>
<td align="center"><a href="delete.php?&&prid=<?php echo $row['prid'];?>" onClick="return confirm('Do you want Delete <?php echo $row['name'];?>');">
        <button class="btn btn-danger" style="width: 100px; font-family: 'Droid Arabic Kufi';"> Delete <i class="fa fa-times"></i></button></a></td>
<td align="center"><a href="upcustms.php?&&prid=<?php echo $row['prid'];?>">
        <button class="btn btn-primary" style="width: 100px; font-family: 'Droid Arabic Kufi';"> Edit <i class="fa fa-edit"></i></button></a></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
</table>

