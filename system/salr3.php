<?php include('header.php');?>
 <div class="app-content content container-fluid">
<br>


<!-- بداية فورم عرض تقرير المبيعات السنوي -->

<form name="form1" method="post" action="sales3.php" >
<table style="width:100%; " align="center" class="table table-bordered table-hover">

<tr>
<td colspan="3">عرض تقرير المبيعــات السنوي <i class="fa fa-qrcode"></i></td>
</tr>

<tr>
<td style="width:8%;">العــام</td>
<td><input type="number" min="2019" style=" " value="20<?php echo date('y');?>" name="year" class="form-control big-shadow" required autocomplete="off"></td>
<td style="width:18%; "><button type="submit" name="ok1" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class=" fab fa-accusoft "></i></button></td>
</tr>

<!-- بداية فورم عرض تقرير المبيعات السنوي -->

</table>
</form>
     <br>
     <br>


<!-- بداية فورم عرض تقرير المبيعات السنوي -->

<form name="form1" method="post" action="sales3.php" >
<table style="width:100%; " align="center" class="table table-bordered table-hover">

<tr>
<td colspan="3">عرض تقرير المبيعــات السنوي <i class="fa fa-qrcode"></i></td>
</tr>

<tr>
<td style="width:8%;">العــام</td>
<td><input type="number" min="2019" style=" " value="20<?php echo date('y');?>" name="year" class="form-control big-shadow" required autocomplete="off"></td>
<td style="width:18%; "><button type="submit" name="ok5" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class=" fab fa-accusoft "></i></button></td>
</tr>

<!-- بداية فورم عرض تقرير المبيعات السنوي -->

</table>
</form>
     <br>
     <br>
     
     <!-- بداية فورم عرض تقرير السنوي لصنف-->

  <form name="form1" method="post" action="sales3.php" >
  <table style="width:100%; " align="center" class="table table-bordered table-hover">
  
  <tr>
  <td colspan="5">عرض تقرير المبيعات السنوي لصنف <i class="fa fa-qrcode"></i></td>
  </tr>
  
  <tr>
  <td style="width:8%;">الصـنف</td>
  <td><input type="text" name="name" style=" " class="form-control big-shadow" required id="search" placeholder="اختر الصنـف" list="searchrt" autocomplete="off">
  
  <datalist id="searchrt">
  <?php include('dbcon/config.php');
		$brima=mysql_query("select * from storing");
		$res=mysql_fetch_array($brima);?>
  <option></option>
  <?php do { ?>
  <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
  <?php } while($res=mysql_fetch_array($brima));?>
  </datalist></td>
  
  
  <td style="width:8%;">العــام</td>
  <td><input type="number" min="2019" style=" " value="20<?php echo date('y');?>" name="year" class="form-control big-shadow" required autocomplete="off"></td>
  
  <td style="width:18%; "><button type="submit" name="ok2" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class=" fab fa-accusoft "></i></button></td>
  </tr>
  </table>
  </form>
  <Br>
  <!-- نهاية فورم عرض التقرير السنوي لصنف -->




  <!-- بداية فورم عرض التقرير السنوي لموظف -->
  <br>
  <form name="form1" method="post" action="sales3.php" >
  <table style="width:100%; " align="center" class="table table-bordered table-hover">
  
  <tr>
  <td colspan="5">عرض تقرير المبيعــــات لموظــــــــف <i class="fa fa-qrcode"></i></td>
  </tr>
  
  
  <tr>
  <td style="width:8%;">الموظــف</td>
  <td><input type="text" name="user"class="form-control big-shadow" required id="search" placeholder="اختر الموظف" list="searchrxt" autocomplete="off">
  <datalist id="searchrxt">
  <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select * from users");
		$res=mysql_fetch_array($brima);?>
  <option></option>
  <?php do { ?>
  <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
  <?php } while($res=mysql_fetch_array($brima));?>
  </datalist></td>
  
  <td style="width:8%;">العــام</td>
  <td><input type="number" min="2017"  value="20<?php echo date('y');?>" name="year" class="form-control big-shadow" required autocomplete="off"></td>
  <td style="width:18%; "><button type="submit" name="ok3" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class=" fab fa-accusoft "></i></button></td>
  </tr>
  </table>
  </form>
  
    <!-- نهاية فورم عرض التقرير السنوي لموظف -->

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
