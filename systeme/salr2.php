<?php include('header.php');?>
<br>

<!-- بداية فورم عرض تقرير المبيعات الدوري -->

  <form name="form1" method="post" action="sales2.php" >
  <table style="width:100%; " align="center" class="table table-bordered table-hover">
  
  <tr>
  <td colspan="5">View the periodic sales report<i class="fa fa-qrcode"></i></td>
  </tr>
  
  <tr>
  <td style="width:8%;">from date</td>
  <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date1" class="form-control big-shadow" required autocomplete="off"></td>
  
  <td style="width:8%;">To date</td>
  <td><input type="date"   value="20<?php echo date('y-m-d');?>" name="date2" class="form-control big-shadow" required autocomplete="off"></td>
  
  <td style="width:15%; "><button type="submit" name="ok1" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> View <i class=" fab fa-accusoft "></i></button></td>
  </tr>
  </table>
  </form>
<!-- نهاية فورم عرض تقرير المبيعات الدوري -->


<br>

<br>

<!-- بداية فورم عرض تقرير المبيعات الدوري -->

  <form name="form1" method="post" action="sales2.php" >
  <table style="width:100%; " align="center" class="table table-bordered table-hover">
  
  <tr>
  <td colspan="5">View the periodic earnings report <i class="fa fa-qrcode"></i></td>
  </tr>
  
  <tr>
  <td style="width:8%;">from date</td>
  <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date1" class="form-control big-shadow" required autocomplete="off"></td>
  
  <td style="width:8%;">To date</td>
  <td><input type="date"   value="20<?php echo date('y-m-d');?>" name="date2" class="form-control big-shadow" required autocomplete="off"></td>
  
  <td style="width:15%; "><button type="submit" name="ok5" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> View <i class=" fab fa-accusoft "></i></button></td>
  </tr>
  </table>
  </form>
<!-- نهاية فورم عرض تقرير المبيعات الدوري -->


<br>




<!-- بداية فورم View the periodic sales report for an item-->

 <form name="form1" method="post" action="sales2.php" >
 <table style="width:100%; " align="center" class="table table-bordered table-hover">
 
 <tr>
 <td colspan="7">View the periodic sales report for an item <i class="fa fa-qrcode"></i></td>
 </tr>
 
 <tr>
 <td style="width:8%;">Product</td>
 <td colspan="4"><input type="text"  name="name" class="form-control big-shadow" required id="search" placeholder="اختر الصنف" list="searchrt" autocomplete="off">
 </tr>
 
 <tr>
 <td style="width:8%;">from date</td>
 <td><input type="date"   value="20<?php echo date('y-m-d');?>" name="date1" class="form-control big-shadow" required autocomplete="off"></td>
 <td style="width:8%;">To date</td>
 <td><input type="date"   value="20<?php echo date('y-m-d');?>" name="date2" class="form-control big-shadow" required autocomplete="off"></td>
	
 <datalist id="searchrt">
 <?php include('dbcon/config.php');
	$brima=mysql_query("select distinct name from share");
	$res=mysql_fetch_array($brima);?>
 <option></option>
 <?php do { ?>
 <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
 <?php } while($res=mysql_fetch_array($brima));?>
 </datalist></td>
 <td style="width:15%; "><button type="submit" name="ok2" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> View <i class=" fab fa-accusoft "></i></button></td>
 </tr>
 </table>
 </form>
 
<!-- نهاية فورم View the periodic sales report for an item-->
 
<Br>

<br>


<!-- بداية فورم عرض تقرير المبيعات الدوري لموظف -->

<form name="form1" method="post" action="sales2.php" >
  <table style="width:100%; " align="center" class="table table-bordered table-hover">
    <tr>
      <td colspan="7">View an employee's sales report<i class="fa fa-qrcode"></i></td>
    </tr>
    <tr>
      <td style="width:8%;">User</td>
      <td colspan="4"><input type="text"   name="user" class="form-control big-shadow" required id="search" placeholder="اختر الموظف" list="searchrxt" autocomplete="off">
	<datalist id="searchrxt">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select * from users");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>    </tr>
    <tr>

      <td style="width:8%;">from date</td>
      <td><input type="date"   value="20<?php echo date('y-m-d');?>" name="date1" class="form-control big-shadow" required autocomplete="off"></td>
      <td style="width:8%;">To date</td>
      <td><input type="date"   value="20<?php echo date('y-m-d');?>" name="date2" class="form-control big-shadow" required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok3" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> View <i class=" fab fa-accusoft "></i></button></td>
    </tr>
  </table>
</form>

<!-- نهاية فورم عرض تقرير المبيعات الدوري لموظف -->

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
