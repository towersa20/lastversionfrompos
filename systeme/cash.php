<?php 
// كود استدعاء ملف التصميم
include('header.php');?>
<form name="form1" method="post" action="report_custpay.php">
    <table style="width:100%; font-size:14px;" align="center" class="table table-bordered table-hover">
    <tr>
      <td colspan="7">View sales report <i class="fa ft-layers"</td>
    </tr>
    <tr>
      <td style="width:8%;">الدفع</td>
      <td><select name="cash" class="selectpicker" data-live-search="true" data-style="btn-primary" id="payment_type" required>
            <option value="1" >CASH</option>
            <option value="2">VISA</option>
            <option value="3" >DEPT</option>
            </select>
      <td style="width:8%;">From date</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date1" class="form-control" required autocomplete="off"></td>
      <td style="width:8%;">to date</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date2" class="form-control" required autocomplete="off"></td>
	<datalist id="searchrt">
            <?php include('dbcon/config.php');
		$brima=mysql_query("select * from person");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option    value="<?php echo $res['prid'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
<td style="width:15%; "><button type="submit" name="ok1" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> view <i class="ft-pie-chart"></i></button></td>    </tr>
  </table>
</form>

<br>
<form name="form1" method="post" action="report_custpay.php">
    <table style="width:100%; font-size: 14px;" align="center" border="1" class="table table-bordered table-hover">
    <tr>
      <td colspan="7">View sales report <i class="fa ft-layers"></i></td>
    </tr>
    <tr>
	<td style="width:8%;">Customer</td>
      <td colspan="6"><input type="text" name="person"  class="form-control" required id="search" placeholder="" list="searchrxt" autocomplete="off">
	<datalist id="searchrxt">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select * from person");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
</tr>
<tr>
      <td style="width:8%;">الدفع</td>
      <td><select name="cash"  class="selectpicker" data-live-search="true" data-style="btn-primary" id="payment_type" required>
            <option value="نقدا" >CASH</option>
            <option value="شبكة" >VISA</option>
            <option value="أجل" >DEPT</option>
            </select>
      <td style="width:8%;">From date</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date1" class="form-control" required autocomplete="off"></td>
      <td style="width:8%;">To date</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date2" class="form-control" required autocomplete="off"></td>
	<datalist id="searchrt">
            <?php include('dbcon/config.php');
		$brima=mysql_query("select * from customer");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option    value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
<td style="width:15%; "><button type="submit" name="ok2" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> view <i class="ft-pie-chart"></i></button></td>    </tr>
  </table>
</form>
<Br>

<table  class="table table-borderd table-hover">
<tr>
<td colspan="4" style="width:40%;"></td>
      <td style="width:20%;"><a href="vperson.php"><button type="button" class="btn btn-primary"  style="width: 100%; font-family: 'Droid Arabic Kufi';"> Payments search <i class="fa fa-search"></i></button></a></td>
      <td style="width:20%;"><a href="custom_search.php"><button type="button" class="btn btn-primary"  style="width: 100%; font-family: 'Droid Arabic Kufi';">  purchases <i class="fas fa-shopping-cart"></i></button></a></td>
      <td style="width:20%;"><a href="crecord.php"><button type="button" class="btn btn-primary"  style="width: 100%; font-family: 'Droid Arabic Kufi';"> GOBack <i class="fa fa-undo"></i></button></a></td>
</tr></table>