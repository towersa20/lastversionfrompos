<?php
//ملف التصميم
include('header.php');?>

<!-- فورم عرض التقرير السنوي!-->

 <div class="app-content content container-fluid">
<br>

<form name="form1" method="post" action="share3.php">
 <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
 <tr>
 <td colspan="3">عرض تقرير المشتريات السنوي <i class="fab fa-accusoft"></i> </td>
 </tr>
 
 <tr>
 <td style="width:8%;">العــام</td>
 <td><input type="number"  min="2017" value="20<?php echo date('y');?>" name="date" class="form-control big-shadow " required autocomplete="off"></td>
 <td style="width:18%; "><button type="submit" name="ok1" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class="fab fa-accusoft"></i></button></td>    </tr>
 </tr>
 
 </table>
 </form>
 <br>
   <!-- نهاية فورم عرض التقرير السنوي للمشتريات-->





<!-- فورم عرض تقرير مشتريات من المورد!-->

<form name="form1" method="post" action="share3.php">
<table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
<tr>
<td colspan="5">عرض تقرير المشتريات من المورديـــــــن  <i class="fab fa-accusoft"></i></td>

</tr>

<tr>
<td style="width:8%;">المورد</td>
<td><input type="text" name="cust"  class="form-control big-shadow " required id="search" placeholder="اختر المورد" list="searchrt" autocomplete="off">
<datalist id="searchrt">
<?php include('dbcon/dbcon.php');
$brima=mysql_query("select * from customer");
$res=mysql_fetch_array($brima);?>
<option></option>
<?php do { ?>
<option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
<?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>

<td style="width:8%;">العــام</td>
<td><input type="number" min="2017"  value="20<?php echo date('y');?>" name="date" class="form-control big-shadow " required autocomplete="off"></td>
<td style="width:18%; "><button type="submit" name="ok2" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class="fab fa-accusoft"></i></button></td>    </tr>

</tr>
</table>
</form>
<Br>
    <!--نهاية فورم عرض التقرير السنوي للمشتريات من مورد -->

 
 
 
<!-- فورم عرض تقرير مشتريات صنف!-->
<br>
<form name="form1" method="post" action="share3.php">
<table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
<tr>
<td colspan="5">عرض تقرير المشتريـــــــــــــــــات من صنف  <i class="fab fa-accusoft"></i></td>
</tr>

<tr>
<td style="width:8%;">الصنف</td>
<td><select name="name"  class="selectpicker" data-live-search="true" data-style="btn-primary" required id="search">

<?php include('dbcon/dbcon.php');

// كود البحث في سجلات الاصانف
$brima=mysql_query("select distinct name from share");
$res=mysql_fetch_array($brima);?>
<option></option>
<?php do { ?>
<option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
<?php } while($res=mysql_fetch_array($brima));?>
</select></td>

<td style="width:8%;">العــام</td>
<td><input type="number" min="2020"  value="20<?php echo date('y');?>" name="date" class="form-control big-shadow " required autocomplete="off"></td>
<td style="width:18%; "><button type="submit" name="ok3" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class="fab fa-accusoft"></i></button></td>    </tr>
</tr>
</table>
</form>
<Br>
   <!-- نهاية عرض التقرير السنوي للمشتريات  لصنف محدد-->




   <!-- بداية عرض التقرير السنوي لصنف من مورد-->

<br>
<form name="form1" method="post" action="share3.php">
<table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
<tr>
<td colspan="7">عرض تقرير المشتريات من لصنف لمورد  <i class="fab fa-accusoft"></i></td>
</tr>

<tr>
<td style="width:8%;">المورد</td>
<td><input type="text" name="cust"  class="form-control big-shadow " required id="search" placeholder="اختر المورد" list="searchrt" autocomplete="off">
<datalist id="searchrt">
 
 
<?php include('dbcon/dbcon.php');

//كود البحث في سجلات المورديم

$brima=mysql_query("select * from customer");
$res=mysql_fetch_array($brima);?>
<option></option>
<?php do { ?>
<option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
<?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>



<td style="width:8%;">الصنف</td>
<td><select name="item"  class="selectpicker" data-live-search="true" data-style="btn-primary" required id="search">

<?php include('dbcon/dbcon.php');

// كود البحث في سجلات الاصانف
$brima=mysql_query("select  distinct name from share");
$res=mysql_fetch_array($brima);?>
<option></option>
<?php do { ?>
<option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
<?php } while($res=mysql_fetch_array($brima));?>
</select></td>


<td style="width:8%;">العــام</td>
<td><input type="number" min="2020"  value="20<?php echo date('y');?>" name="date" class="form-control big-shadow " required autocomplete="off"></td>
<td style="width:18%; "><button type="submit" name="ok4" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class="fab fa-accusoft"></i></button></td>    </tr>

</tr>
</table>

   <!-- نهاية فورم عرض التقرير السنوي لصنف من مورد-->

</form>
<Br>
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



<!-- فورم نهاية فورمات استعراض التقارير!-->
