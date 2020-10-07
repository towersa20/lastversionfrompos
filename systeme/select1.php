<?php // ملف التصميم
include('header.php');?>
<div class="app-content content container-fluid">
<br>



<!-- فورم تحديد تاريخ عرض تقرير المخزن!-->

<form name="form1" method="post" action="rstore1.php">
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="3">عرض تقرير المخزن اليومــي <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td style="width:9%;">حــــدد اليوم</td>
      <td><input type="date" style="height:38px;" value="20<?php echo date('y-m-d');?>" name="date" class="form-control big-shadow" required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok1" class="btn btn-primary" style="width: 100%;  font-family: 'Droid Arabic Kufi';"> عــرض <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>
</form>

<!-- نهاية فورم عرض تقرير يوم من المخزن!-->




<!-- فورم تحديد خيارات عرض تقرير اليوم لمخزن!-->

<br>
<form name="form1" method="post" action="rstore1.php">
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="5">عرض تقرير المخزن اليومــي <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td style="width:9%;">حدد المخـزن</td>
      <td><select style="height:36px;" name="store" class="selectpicker" data-live-search="true" data-style="btn-primary" required>
	  <?php include("dbcon/dbcon.php");
	  $sq=mysql_query("select * from store");
	  $ro=mysql_fetch_array($sq);
	  ?>
	  <?php do { ?>
	  <option value="<?php echo $ro['name'];?>"><?php echo $ro['name'];?></option>
	  	  <?php }while($ro=mysql_fetch_array($sq));?>

      </select></td>
      <td style="width:8%;">حدد اليوم</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date" class="form-control big-shadow " required autocomplete="off"></td>
        <td style="width:15%; "><button type="submit" name="ok2" class="btn btn-primary" style="width: 100%;  font-family: 'Droid Arabic Kufi';"> عــرض <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>
</form>

<!-- نهاية فورم تحديد خيارات عرض التقرير!-->






<!-- فورم عرض التقرير اليوم لصنف بالمخزن!-->

<Br>
<form name="form1" method="post" action="rstore1.php">
  <table style="width:100%; " align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="7">عرض التقرير اليومي لصنف بالمخزن <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td style="width:9%;">حدد المخـزن</td>
      <td style="width:18%;"><select name="store" class="selectpicker" data-live-search="true" data-style="btn-primary" required>
      <datalist id="searchrxt">

	  <?php include("dbcon/dbcon.php");
	  $sq=mysql_query("select * from store");
	  $ro=mysql_fetch_array($sq);
	  ?>
	  <?php do { ?>
	  <option value="<?php echo $ro['name'];?>"><?php echo $ro['name'];?></option>
	  	  <?php }while($ro=mysql_fetch_array($sq));?>

      </select></td>
      <td style="width:11%;">حدد الصنـف</td>
      <td><select name="item"  class="selectpicker" data-live-search="true" data-style="btn-primary" required>
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select Distinct name from storing");
		$res=mysql_fetch_array($brima);?>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
               
            </select></td>
      <td style="width:8%;">حدد اليوم</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date" class="form-control big-shadow " required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok3" class="btn btn-primary" style="width: 100%;  font-family: 'Droid Arabic Kufi';"> عــرض <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>
</form>
</body>
</html>
<!-- نهاية فورم استخراج التقارير!-->
