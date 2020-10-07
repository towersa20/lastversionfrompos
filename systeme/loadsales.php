<?php
include('dbcon/config.php');
$q=$_REQUEST["q"]; $hint="";

$sql=mysql_query("select * from sales_order where transaction_id like '%$q%' or invoice like '%$q%' or product like '%$q%' or name like '%$q%'
or category like '%$q%' or category like '%$q%'  limit 30");
$row=mysql_fetch_array($sql); 
/* $hint=$n['st_no'].'<br>'.$n['stname'].'<br>'.$n['father'].'<br>'.$n['year']; 
echo  $hint; */
$a=$row['transaction_id'];
$b=$row['invoice'];
$c=$row['date'];
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
    <table style="width:100%; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover ">
<tr>
<td style="width:8%">رقم العملية</td>
<td><?php echo $a;?></td>
<td style="width:8%">رقم الفاتورة</td>
<td><?php echo $b;?></td>
<td style="width:8%">التاريخ</td>
<td><?php echo $c;?></td>
<td style="width:8%">الضريبة</td>
<td><?php echo "5%";?></td>
</tr>
</table>
    <table style="width:100%; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover ">
<tr align="center">
<td style="width:8%; ">باركود </td>
<td style="width:12%; ">الصـنف</td>
<td style="width:8%; ">الكمية</td>
<td style="width:8%; ">السعر</td>
<td style="width:8%; "> الضريبه</td>
<td style="width:8%; "> الجمله</td>
<td style="width:35%;" colspan="5">التحكم</td>
</tr>
<?php do { ?>
<tr>
<td nowrap><?php echo $row['product'];?></td>
<td nowrap><?php echo $row['name'];?></td>
<td nowrap><?php  echo $row['qty'];?></td>
<td nowrap><?php  echo $row['price'];?></td>
<td nowrap><?php  echo $add=$row['price']*$row['qty']*$row['vat']/100;?></td>
<td nowrap><?php  echo $row['price']*$row['qty']+$add;?></td>
<td style="width:10%;" align="center"><a href="print.php?&&invoice=<?php echo $row['invoice'];?>">
<button class="btn btn-raised gradient-pomegranate white" style="width: 100%;"> طباعـه <i class="fa ft-file-text"></i></button></a></td>


<td style="width:10%;" align="center"><a href="edit.php?&&invoice=<?php echo $row['invoice'];?>">
<button class="btn big-shadow" style="width: 100%;"> تعديل <i class="fa fa-edit"></i></button></a></td>


<td style="width:10%;" align="center"><a href="redit.php?&&invoice=<?php echo $row['invoice'];?>">
<button class="btn btn-raised gradient-pomegranate white" style="width: 100%;"> مرتجع <i class="fa ft-shopping-cart"></i></button></a></td>


<td style="width:10%;" align="center"><a href="delete.php?&&idxxx=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $row['invoice']; ?>
&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>">
<button class="btn big-shadow" style="width: 100%;"> حذف صنف <i class="fa fa-times"></i></button></a></td>

</tr>
<?php } while($row=mysql_fetch_array($sql));?>
</table>
