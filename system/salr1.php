<?php include('header.php');?>

<!-- بداية فورم عرض تقرير المبيعات اليومي -->
<div class="app-content content container-fluid">

   <form name="form1" method="post" action="sales1.php" >
   <table style="width:100%; " align="center" class="table table-bordered table-hover">
   
   <tr>
   <td colspan="3">عرض تقرير المبيعـــــــات ليــوم محدد <i class="fa fa-qrcode"></i></td>
   </tr>
   
   
   <tr>
   <td style="width:8%;">اليوم</td>
   <td><input type="date" value="20<?php echo date('y-m-d');?>" style=" " name="date" class="form-control" required autocomplete="off"></td>
   <td style="width:18%; "><button type="submit" name="ok1" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class=" fab fa-accusoft "></i></button></td>
   </tr>
  
   </table>

</form>


<!-- نهاية فورم عرض تقرير المبيعات اليومي -->

<br>


<!-- بداية فورم عرض تقرير المبيعات اليومي -->
<div class="app-content content container-fluid">

   <form name="form1" method="post" action="sales1.php" >
   <table style="width:100%; " align="center" class="table table-bordered table-hover">
   
   <tr>
   <td colspan="3">عرض تقرير الأربـــــــــاح ليــوم محدد <i class="fa fa-qrcode"></i></td>
   </tr>
   
   
   <tr>
   <td style="width:8%;">اليوم</td>
   <td><input type="date" value="20<?php echo date('y-m-d');?>" style=" " name="date" class="form-control big-shadow" required autocomplete="off"></td>
   <input type="hidden" name="sumi">
   <td style="width:18%; "><button type="submit" name="ok5" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class=" fab fa-accusoft "></i></button></td>
   </tr>
  
   </table>

</form>


<!-- نهاية فورم عرض تقرير المبيعات اليومي -->

<br>



<!-- بداية فورم عرض تقرير المبيعات لموظف-->
 <form name="form1" method="post" action="sales1.php" >
 <table style="width:100%; " align="center" class="table table-bordered table-hover">
 
 <tr>
 <td colspan="5">عرض تقرير المبيعات لموظف محدد <i class="fa fa-qrcode"></i></td>
 </tr>
 
 <tr>
 
 <td style="width:10%;"> الموظف</td>
 <td><input type="text" name="user" class="form-control big-shadow" style="" required id="search" placeholder="اختر الموظف" list="searchrt" autocomplete="off">
	<datalist id="searchrt">
 <?php include('dbcon/config.php');
 //كود عرض اسم المستخدم
	$brima=mysql_query("select * from users");
	$res=mysql_fetch_array($brima);?>
 <option></option>
 
 <?php do { ?>
 <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
 <?php } while($res=mysql_fetch_array($brima));?>
 </datalist></td>


 <td style="width:8%;"> اليوم</td>
 <td><input type="date" value="20<?php echo date('y-m-d');?>"  name="date" class="form-control big-shadow" required autocomplete="off"></td>
 <td style="width:18%; "><button type="submit" name="ok2" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class=" fab fa-accusoft "></i></button></td>
 
 </tr>
 </table>
 </form>

<!-- نهاية فورم تقرير المبيعات  لموظف -->







<!-- بداية فورم تقرير المبيعات اليومي لصنف-->
<br>
<form name="form1" method="post" action="sales1.php" >
<table style="width:100%; " align="center" class="table table-bordered table-hover">
<tr>
<td colspan="5">عرض تقرير مبيعـــــــات صنف  <i class="fa fa-qrcode"></i></td>
</tr>

<tr>
<td style="width:10%;"> الصنف</td>
<td><input type="text" name="name" style=""  class="form-control big-shadow" required id="search" placeholder="اختر الصنف" list="searchrxt" autocomplete="off">

<datalist id="searchrxt">
<?php include('dbcon/config.php');
// كود عرض سجل المخزن
$brima=mysql_query("select distinct name from storing");
$res=mysql_fetch_array($brima);?>
<option></option>
<?php do { ?>

<option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
<?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>

<td style="width:8%;">اليوم</td>
<td><input type="date" style=""  value="20<?php echo date('y-m-d');?>" name="date" class="form-control big-shadow" required autocomplete="off"></td>
<td style="width:18%; "><button type="submit" name="ok3" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class=" fab fa-accusoft "></i></button></td>
</tr>

</table>
</form>

<!-- نهاية عرض تقرير المببيعات اليومي لصنف-->





<!-- نهاية عرض تقرير المبيعات اليومي لصنف -->
<br>
<form name="form1" method="post" action="sales1.php" >
<table style="width:100%; " align="center" class="table table-bordered table-hover">
<tr>
<td colspan="7">عرض تقرير فاتورة مبيعــات  <i class="fa fa-qrcode"></i></td>
</tr>

<tr>
<td style="width:10%;"> الفاتورة</td>
<td><input type="text" name="invoice" class="form-control big-shadow" required id="search" placeholder="اختر الفاتورة" list="searchrtc" autocomplete="off">
<datalist id="searchrtc">
<?php include('dbcon/config.php');
// كود البحث برقم الفاتورة
$brima=mysql_query("select distinct (invoice) from sales_order");
$res=mysql_fetch_array($brima);?>
<option></option>
<?php do { ?>
<option value="<?php echo $res['invoice'];?>" ><?php echo $res['invoice'];?></option>
<?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>

<td style="width:18%; "><button type="submit" name="ok4" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class=" fab fa-accusoft "></i></button></td>
</tr>

<!-- نهاية فورم تقرير المبيعات برقم الفاتورة -->
  </table>
</form>
<Br>
<Br>
<Br>
<Br>
<Br>
<Br>
<Br>
<Br>
</body>
</html>


<!-- نهاية فورم عرض التقرير اليومي-->
