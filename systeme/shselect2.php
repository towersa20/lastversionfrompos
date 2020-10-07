<?php
// استدعاء ملف التصميم
include('header.php');?>
 <div class="app-content content container-fluid">




<!-- فورم عرض التقرير الدوري للمشتريات!-->

<form name="form1" method="post" action="share2.php">
    <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="5">View the periodic procurement report <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td style="width:13%;">From Date</td>
      <td style="width:28%;"><input type="date"  value="20<?php echo date('y-m-d');?>" name="date1" class="form-control big-shadow " required autocomplete="off"></td>
      <td style="width:13%;">To Date</td>
      <td style="width:28%;"><input type="date"  value="20<?php echo date('y-m-d');?>" name="date2" class="form-control big-shadow " required autocomplete="off"></td>
    <td style="width:18%; "><button type="submit" name="ok1" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> View <i class="fab fa-accusoft"></i></button></td> </tr>
  </table>
</form>
<br>


<!--   فورم عرض تقرير مشتريات Supplierين!-->

<form name="form1" method="post" action="share2.php">
    <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="7">View the procurement report from Supplier <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td style="width:8%;">Supplier</td>
      <td style="width:28%;"> <select name="cust" class="selectpicker" data-live-search="true" data-style="btn-primary">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select * from customer");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
            </select></td>
      <td style="width:10%;">From Date</td>
      <td><input type="date"   value="20<?php echo date('y-m-d');?>" name="date1" class="form-control big-shadow " required autocomplete="off"></td>
      <td style="width:10%;">To Date</td>
      <td><input type="date"   value="20<?php echo date('y-m-d');?>" name="date2" class="form-control big-shadow " required autocomplete="off"></td></td>
<td style="width:18%; "><button type="submit" name="ok2" class="btn btn-primary" style="width: 100%;  font-family: 'Droid Arabic Kufi';"> View <i class="fab fa-accusoft"></i></button></td>    </tr>
  </table>
</form>
<Br>

<br>


<!-- فورم عرض متشريات صنف!-->

<form name="form1" method="post" action="share2.php">
    <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="7">Displaying the purchases report of one type  <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td style="width:8%;">product</td>
      <td><select  name="item" class="selectpicker" data-live-search="true" data-style="btn-primary">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select distinct name from share");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
            </select></td>

      <td style="width:8%;">From Date</td>
      <td><input type="date" style="" value="20<?php echo date('y-m-d');?>" name="date1" class="form-control big-shadow " required autocomplete="off"></td>
      <td style="width:8%;">To Date</td>
      <td><input type="date" style="" value="20<?php echo date('y-m-d');?>" name="date2" class="form-control big-shadow " required autocomplete="off"></td>
<td style="width:18%; "><button type="submit" name="ok3" class="btn btn-primary" style="width: 100%;  font-family: 'Droid Arabic Kufi';"> View <i class="fab fa-accusoft"></i></button></td>    </tr>
  </table>
</form>
<Br>
<br>






<!-- فورم عرض مشتريات صنف من مورد!-->

<form name="form1" method="post" action="share2.php">
    <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="8">View the purchasing report from item to resource  <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
	<td style="width:8%;">Supplier</td>
      <td colspan="6"><select class="selectpicker" data-live-search="true" data-style="btn-primary" name="cust"  >
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select * from customer");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
            </select></td>

<td style="width:18%; " colspan="2" rowspan="3"><button type="submit" name="ok4" class="btn btn-primary" style="width: 100%; height:120px; font-family: 'Droid Arabic Kufi';"> View <i class="fab fa-accusoft"></i></button></td></tr>
    <tr>
      <td style="width:8%;">product</td>
      <td><input type="text" name="item"  class="form-control big-shadow " required id="search" placeholder="اختر product" list="searchrxt" autocomplete="off">
	<datalist id="searchrxt">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select distinct name from share");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
   
      <td style="width:8%;">From Date</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date1" class="form-control big-shadow " required autocomplete="off"></td>
      <td style="width:8%;">To Date</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date2" class="form-control big-shadow " required autocomplete="off"></td>
    </tr>
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
<Br>
<Br>
<Br>
<Br>
<Br>
<Br>
<Br>
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
