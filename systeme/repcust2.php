<?php include('header.php');?>
 <div class="app-content content container-fluid">
<br>

<form name="form1" method="post" action="costcust.php">
  <table style="width:100%; " align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="3">View the suppliers' payment report for the day <i class="fa fa ft-layers"></i></td>
    </tr>
    <tr>
      <td style="width:8%;">Day</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date" class="form-control  " required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok1" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> View <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>
</form>
<br>
<form name="form1" method="post" action="costcust.php">
  <table style="width:100%; " align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="6">Displaying a supplier's dues payment report <i class="fa fa ft-layers"></i></td>
    </tr>
    <tr>
      <td style="width:8%;">Supplier</td>
      <td colspan="4"><input type="text"  name="name" class="form-control  " required id="search" placeholder="اختر Supplier" list="searchrt" autocomplete="off">
	<datalist id="searchrt">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select * from customer");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
      <td style="width:15%; "><button type="submit" name="ok2" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> View <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>
</form>


<br>
<form name="form1" method="post" action="costcust.php">
  <table style="width:100%; " align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="5">View the payment report for a resource in a day <i class="fa fa ft-layers"></i></td>
    </tr>
    <tr>
      <td style="width:8%;">Supplier</td>
      <td><input type="text" name="name"  class="form-control  " required id="search" placeholder="اختر Supplier" list="searchrxt" autocomplete="off">
	<datalist id="searchrxt">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select * from customer");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
      <td style="width:8%;">Day</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date" class="form-control  " required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok3" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> View <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>
</form>
<Br>
<form name="form1" method="post" action="costcust.php">
  <!--<table style="width:100%; " align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="7">عرض تقرير المشتريات من لصنف لمورد <i class="fa fa ft-layers"></i></td>
    </tr>
    <tr>
	<td style="width:8%;">Supplier</td>
      <td><input type="text" name="name"  class="form-control  " required id="search" placeholder="اختر Supplier" list="searchrt" autocomplete="off">
	<datalist id="searchrt">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select * from customer");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
      <td style="width:8%;">الصنف</td>
      <td><input type="text" name="item"  class="form-control  " required id="search" placeholder="اختر الصنف" list="searchrxtx" autocomplete="off">
	<datalist id="searchrxtx">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select * from item");
		$ress=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $ress['name'];?>" ><?php echo $ress['name'];?></option>
            <?php } while($ress=mysql_fetch_array($brima));?>
</datalist></td>
      <td style="width:8%;">Day</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date" class="form-control  " required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok4" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> View <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>-->
</form>
<Br>
<Br>

<table  class="table table-borderd table-hover">
<tr>
<td colspan="4" style="width:55%;"></td>
      <td style="width:15%;"><a href="custompayment.php"><button type="button" class="btn btn"  style="width: 100%;font-family: 'Droid Arabic Kufi'; background-color: red;"> Make a payment <i class="fa fa-search"></i></button></a></td>
      <td style="width:15%;"><a href="vpayment.php"><button type="button" class="btn btn"  style="width: 100%;font-family: 'Droid Arabic Kufi'; background-color: green;"> Payment record <i class="fab fa-accusoft"></i></button></a></td>
      <td style="width:15%;"><a href="record.php"><button type="button" class="btn btn"  style="width: 100%;font-family: 'Droid Arabic Kufi';  background-color: orange;"> Back <i class="fa fa-undo"></i></button></a></td>
</tr></table><Br>
<Br>
</body>
</html>
