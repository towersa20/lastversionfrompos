<?php include('header.php');?>
 <div class="app-content content container-fluid">

<form name="form1" method="post" action="form3.php">
  <table style="width:100%; font-size:13px;" align="center" class="table table-bordered table-hover animated " >
    <tr>
      <td colspan="6"><strong>إضـــافة مصروفات جديد</strong> <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td style="width:6%;">المصروفات</td>
	  <td colspan="5"><input type="text" name="a" class="form-control " required id="search" placeholder="اختر المصروف-" list="searchrt" autocomplete="off">
	<datalist id="searchrt">
            <?php include('dbcon/config.php');
		$brima=mysql_query("select * from exp");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td></tr>      <tr>
      <td>المبلــــــــغ</td>
          <td><input type="number" min="0" name="b" class="form-control " required autocomplete="off"></td>
          <td>التاريــــــــخ</td>
          <td><input type="date" name="c" readonly="" class="form-control " value="20<?php echo date('y-m-d');?>" required autocomplete="off"></td>
          <td>المستخـــــدم</td>
          <td><input type="text" readonly="" name="d" class="form-control " value="<?php echo $_SESSION['uname'];?>" required autocomplete="off"></td>
          <input type="hidden" name="f" value="20<?php echo date('y');?>">  </tr>
    <tr>
      <td>البيـــــــــان</td>
<input type="hidden" name="year" value="20<?php echo date('y');?>">
      <td colspan="5"><textarea name="e" class="form-control " rows="3" required autocomplete="off"></textarea></td>
    </tr></table>
   
   
   	  <table style="width:100%; font-size:13px;" align="center" class="table table-borderd table-hover" >
    <tr>
      <td colspan="2" style="width:70%;">&nbsp;</td>
      <td style="width:15%;"><button  type="submit" name="ok1" class="btn btn-primary" style="width:100%;"> حفظ <i class="fa fa-check"></i></button></td>
      <td style="width:15%;"><a href="index.php"><button type="button" class="btn btn-primary" style="width:100%;"> النظام <i class="fa fa-home"></i></button></a></td>
    </tr>
  </table>
</form>
  <?php
include('dbcon/config.php');
$sql=mysql_query("select * from expn order by exid desc limit 4");
$row=mysql_fetch_array($sql); ;?>
     <table style="width:100%; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
    <tr align="center">
      <td nowrap style="width:10%;"><strong>التسلسل</strong></td>
      <td nowrap style="width:50%;"><strong>المصروفات</strong></td>
      <td nowrap style="width:15%;"><strong>المبلغ</strong></td>
      <td nowrap style="width:10%;"><strong>التاريخ</strong></td>
      <td nowrap colspan="2"><strong>التحكم</strong></td>
    </tr>
		  <?php do { ?>

    <tr>
      <td><?php echo $row['exid'];?></td>
      <td><?php echo $row['etype'];?></td>
      <td nowrap><?php echo $row['cost'];?></td>
      <td nowrap><?php echo $row['datetime'];?></td>
 <td align="center"><a href="delete.php?&&exid=<?php echo $row['exid'];?>" onClick="return confirm('هل تريد حذف <?php echo $row['etype'];?>');">
         <button class="btn btn-danger" style="width: 100px;"> حذف <i class="fa fa-trash-o"></i></button></a></td>
<td align="center"><a href="upexpn.php?&&exid=<?php echo $row['exid'];?>"><button class="btn btn-primary" style="width: 100px;"> تعديل <i class="fa fa-edit"></i></button></a></td>
   </tr>
	<?php } while ($row=mysql_fetch_array($sql));?>
	<tr align="center">
	<td><strong>الإجمالي</strong></td>
	<td><?php
include('dbcon/config.php');
$sql=mysql_query("select count(exid) from expn order by exid desc limit 2");
$row=mysql_fetch_array($sql); 
echo $row['count(exid)'];?>
</td>

	<td nowrap><?php
include('dbcon/config.php');
$sql=mysql_query("select sum(cost)from expn order by exid desc limit 2");
$row=mysql_fetch_array($sql); 
echo $row['sum(cost)'];?>
</td>
	<td></td>
	<td></td>
	<td></td>
	</tr>
  </table>

</body>
</html>
