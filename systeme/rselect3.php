<?php include('header.php');?>
<br>

<form name="form1" method="post" action="store3.php">
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="3">عرض التقارير العام السنوي للتخزين <i class=" fab fa-accusoft "></i></td>
    </tr>
    <tr>
      <td style="width:8%;">أختر العام</td>
      <td><input type="number" min="2018" value="20<?php echo date('y');?>" name="year" class="form-control big-shadow " required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok1" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> View <i class=" fab fa-accusoft "></i></button></td>
    </tr>
  </table>
</form>
<br>
<form name="form1" method="post" action="store3.php">
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="5">عرض تقرير المخـــــــزن السنــــــــــــــوي <i class=" fab fa-accusoft "></i></td>
    </tr>
    <tr>
      <td style="width:8%;" nowrap="">أختر المخزن</td>
      <td style="width:55%;"><select  name="store"  style="border: 0px; height: 38px;"  class="form-control big-shadow">
	  <?php include("dbcon/dbcon.php");
	  $sq=mysql_query("select * from store");
	  $ro=mysql_fetch_array($sq);
	  ?>
	  <?php do { ?>
	  <option value="<?php echo $ro['name'];?>" style="color:#FFFFFF; " class="form-control big-shadow btn-black"><?php echo $ro['name'];?></option>
	  	  <?php }while($ro=mysql_fetch_array($sq));?>

      </select></td>
      <td style="width:8%;">أختر العام</td>
      <td><input type="number" min="2018"   value="20<?php echo date('y');?>" name="year" class="form-control big-shadow " required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok2" class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> View <i class=" fab fa-accusoft "></i></button></td>
    </tr>
  </table>
</form>
<Br>
<form name="form1" method="post"  action="store3.php">
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="7">عرض التقرير السنوي لصنف بالمخزن <i class=" fab fa-accusoft "></i></td>
    </tr>
    <tr>
      <td style="width:8%;" nowrap="">أختر المخزن</td>
      <td><select  name="store"  style="border: 0px; height: 38px;"  class="form-control big-shadow">
	  <?php include("dbcon/dbcon.php");
	  $sq=mysql_query("select * from store");
	  $ro=mysql_fetch_array($sq);
	  ?>
	  <?php do { ?>
	  <option value="<?php echo $ro['name'];?>" style="color:#FFFFFF; " class="form-control big-shadow btn-black"><?php echo $ro['name'];?></option>
	  	  <?php }while($ro=mysql_fetch_array($sq));?>

      </select></td>
      <td style="width:8%;" nowrap="">أختر الصنف</td>
      <td><input type="text" name="item"   class="form-control big-shadow " required id="search" placeholder="اختر الصنــف" list="searchrt" autocomplete="off">
	<datalist id="searchrt">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select DISTINCT  name from storing ");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
      <td style="width:8%;">أختر العام</td>
      <td><input type="number" min="2018"   value="20<?php echo date('y');?>" name="year" class="form-control big-shadow " required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok3" class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> View <i class=" fab fa-accusoft "></i></button></td>
    </tr>
  </table>
</form>
</body>
</html>
