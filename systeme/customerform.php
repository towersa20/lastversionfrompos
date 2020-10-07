<?php include('header.php');?>
 <div class="app-content content container-fluid">
     <form action="form4.php" enctype="multipart/form-data" method="post">
         <table style="width:100%; font-size:12px;" border="1" align="center" class="table table-bordered table-hover">
<tr>
<td colspan="8" >Supplier payment window <i class="fa fa-user"></i></td></tr>
<?php 
$link=mysql_query("select pay from payment  where cust='$_POST[xname]' or codes='$_POST[xname]' and total != pay");
$query=mysql_fetch_array($link);
 $point1=$query['pay'];?>



<?php $qr=mysql_query("select sum(qunt*price) from payment where cust='$_POST[xname]' or codes='$_POST[xname]' and total != pay");
 $vs=mysql_fetch_array($qr); 
  $point2=$vs['sum(qunt*price)'];?>





<?php include('dbcon/dbcon.php');
$sl=mysql_query("select *from payment where cust='$_POST[xname]' or codes='$_POST[xname]'");
$rw=mysql_fetch_array($sl);?>
</tr>
<tr>
<td style="width:9%;">Bills</td>
<td><?php echo $rw['codes'];?></td>
<td style="width:9%;">Supplier</td>
<td><?php echo $rw['cust'];?><input type="hidden" value="<?php echo $rw['cust'];?>" name="cust"></td>
<td style="width:9%;">Tax Number</td>
<td><?php $qr=mysql_query("select * from customer where name='$rw[cust]'"); $vs=mysql_fetch_array($qr); echo $vs['cno'];?><input type="hidden" value="<?php echo $vs['cno'];?>" name="cno"></td>
<td style="width:9%;">Status</td>
<td><?php if($rw['total'] <= $rw['pay'])
{ 
echo "Paid off";
}
else
{
echo "Unpaid"; 
}?></td>
</tr>
<tr>
<td style="width:9%;">bank</td>
<td><?php $qr=mysql_query("select * from customer where name='$rw[cust]'"); $vs=mysql_fetch_array($qr); echo $vs['bank'];?></td>
<td style="width:9%;">account number</td>
<td><?php $qr=mysql_query("select * from customer where name='$rw[cust]'"); $vs=mysql_fetch_array($qr); echo $vs['cno'];?></td>
<td style="width:9%;">Repayment</td>
<td><?php echo $rw['costst'];?></td>
<td style="width:9%;">Required</td>
<td>
 
 
 <?php 
$links=mysql_query("select sum(total),sum(pay) from payment  where cust='$_POST[xname]'  and total != pay");
$querys=mysql_fetch_array($links);
 echo $querys['sum(total)']-$querys['sum(pay)'];?></td>
</tr>
</table>
         <table style="width:100%; font-size:12px;" border="1" align="center" class="table table-bordered table-hover">
<tr><td colspan="7">Bills Details <i class="fa fa-user"></i></td></tr>
         <?php include('dbcon/dbcon.php');
         $sql=mysql_query("select *,pay,codes,item,sum(qunt*price),sum(qunt*price),sum(total),cust,unit from payment where cust='$_POST[xname]' and total != pay GROUP BY codes");
         $row=mysql_fetch_array($sql);
         ?>
         <tr>
             <td>Bills</td>
             <td>Required</td>
             <td>Repaid</td>
             <td>Remaining amount</td>
             <td>price</td>
             <td>Status</td>
         </tr>
         <?php do { ?>
             <tr>
<td><input type="text" name="a[]"   class="form-control " value="<?php echo $row['codes'];?>" required autocomplete="off"></td>
<!--مطلوب-->
<td style="width:18%;"><input  step="000.1" type="text" name="b[]" min="0" class="form-control " value="<?php echo $q1=$row['sum(total)'];?>" required autocomplete="off"></td>
<!--المسدد-->
<td><input type="text" name="c[]"   class="form-control " value="<?php echo $q2=$row['pay'];?>" required autocomplete="off"></td>
<!--المتبقي-->
<td style="width:18%;"><input  step="000.1" type="text" name="d[]" min="0" class="form-control " value="<?php echo $xx=$q1-$q2;?>" required autocomplete="off"></td>
<td><input type="number" step="0.1" name="e[]" max="<?php echo $q1-$q2;?>"  class="form-control " required autocomplete="off"></td>
<td><input type="text" name="g[]"  class="form-control " value="
<?php if($xx<=0)
{
echo "Paid off";
}
else
{
echo "Unpaid";
}?>" required autocomplete="off"></td>
             </tr>
         <?php } while($row=mysql_fetch_array($sql));?>
         </table>
		          <table style="width:100%;font-size:12px;" align="center" class="table table-borderd table-hover">
<tr>
             <td style="width:15%;">&nbsp;</td>
             <td style="width:15%;"><button type="submit" name="ok" class="btn btn-primary" style="width: 100%;  font-family: 'Droid Arabic Kufi';"> Save <i class="fab fa-accusoft"></i></button></td>
             <td style="width:15%;"><a href="custompayment.php"><button type="button" class="btn " style="width: 100%;  font-family: 'Droid Arabic Kufi'; background-color: green;"> New <i class="fa  fas fa-cogs"></i></button></a></td>
             <td style="width:15%;"><a href="vpayment.php"><button type="button" class="btn btn-primary" style="width: 100%;  font-family: 'Droid Arabic Kufi';"> Search <i class="fa fa-search"></i></button></a></td>
             <td style="width:15%;"><a href="repcust2.php"><button type="button" class="btn btn-danger" style="width: 100%;  font-family: 'Droid Arabic Kufi';"> Report <i class="fa mdi mdi-scatter-plot"></i></button></a></td>
             <td style="width:15%;"><a href="record.php"><button type="button" class="btn btn-warning" style="width: 100%;  font-family: 'Droid Arabic Kufi'; background-color: #000;"> HOME <i class="fa fa-undo"></i></button></a></td>
             <td style="width:15%;">&nbsp;</td>
         </tr>
     </table>

     </form>   
	 
	 <?php include('dbcon/dbcon.php');
$sql=mysql_query("select  * from payment where cust='$_POST[xname]' or codes='$_POST[xname]'");
$row=mysql_fetch_array($sql);
?>
 <!-- 
 <table style="width:100%;" align="center" class="table table-bordered table-hover">
<tr>

<td colspan="10">تفاصيل الفاتورة <i class="fa ft-layers"></i></td></tr>
<tr align="center">
<td style="width:20%;"><strong>التاريخ</strong></td>
<td style="width:15%;"><strong>رقم الفاتورة</strong></td>
<td style="width:10%;"><strong>السداد</strong></td>
<td style="width:15%;"><strong>الصنف</strong></td>
<td style="width:7%;"><strong>الوحدة</strong></td>
<td style="width:7%;"><strong>الكمية</strong></td>
<td style="width:7%;"><strong>السعر</strong></td>
<td style="width:7%;"><strong>الإجمالي</strong></td>
<td colspan="2" style="width:15%;"><strong>التحكم</strong></td>
</tr>
<?php do { ?>
<tr>
<td><?php echo $row['datetime'];?></td>
<td><?php echo $row['codes'];?></td>
<td><?php echo $row['costst'];?></td>
<td><?php echo $row['item'];?></td>
<td><?php echo $row['unit'];?></td>
<td><?php echo $row['qunt'];?></td>
<td><?php echo $row['price'];?></td>
<td><?php echo $x2=$row['qunt']*$row['price'];?></td>
<td align="center"><a href="delete.php?&&pxid=<?php echo $row['pxid'];?>&&xname=<?php echo $_POST['xname'];?>" onClick="return confirm('Do you want Delete  <?php echo $row['codes'];?>');">
<button class="btn " style="width: 100px;  font-family: 'Droid Arabic Kufi'; background-color: red;"> حذف <i class="fa fa-times"></i></button></a></td>
            
<td align="center"><a href="uppay.php?&&pxid=<?php echo $row['pxid'];?>">
<button class="btn btn-primary" style="width: 100px;  font-family: 'Droid Arabic Kufi';"> تعديل <i class="fa fa-edit"></i></button></a></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
  <tr>
<td>عدد الأصناف</td>
<td><?php include('dbcon/dbcon.php'); $sql=mysql_query("select count(pxid) from payment where cust='$_POST[xname]' or codes='$_POST[xname]'"); $row=mysql_fetch_array($sql); echo $row['count(pxid)'];?></td>
      <td></td>
      <td></td>
      <td></td>
<td><?php include('dbcon/dbcon.php'); $sql=mysql_query("select sum(qunt) from payment where cust='$_POST[xname]' or codes='$_POST[xname]'"); $row=mysql_fetch_array($sql); echo $row['sum(qunt)'];?></td>
<td><?php include('dbcon/dbcon.php'); $sql=mysql_query("select sum(price) from payment where cust='$_POST[xname]' or codes='$_POST[xname]'"); $row=mysql_fetch_array($sql); echo $row['sum(price)'];?></td>
<td><?php include('dbcon/dbcon.php'); $sql=mysql_query("select sum(qunt*price) from payment where cust='$_POST[xname]' or codes='$_POST[xname]'"); $row=mysql_fetch_array($sql); echo $row['sum(qunt*price)'];?></td>
 <td></td>
 <td></td>
 
  </tr>
</table>-->
