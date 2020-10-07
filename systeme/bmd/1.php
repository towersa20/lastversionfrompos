<table style="width:100%; " align="center" class="table table-bordered table-hover animated">
<?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select * from products");
$row=mysql_fetch_array($sql);
?>
<tr align="center">
<th>اسم الصنف</th>
<th nowrap style="width:15%; ">سعر الوحده</th>
<th colspan="2" style="width: 20%;">التحكم</th>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['product_name'];?></td>
<td nowrap><?php echo $row['product_price'];?></td>
<td align="center"><a href="delete.php?&&prodid=<?php echo $row['pid'];?>" onClick="return confirm('هل تريد حذف صنف <?php echo $row['product_name'];?>');">
        <button class="btn btn-danger" style="width: 100px;"> حذف <i class="fa fa-trash-o"></i></button></a></td>
<td align="center"><a href="upitem.php?&&prodid=<?php echo $row['pid'];?>">
        <button class="btn btn-success" style="width: 100px;"> تعديل <i class="fa fa-edit"></i></button></a></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
</table>