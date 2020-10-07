<?php
//ملف التصميم
include('header.php');?>

 <div class="app-content content container-fluid">
<br>
<!-- فورم حركة المخزن الدورية!-->

<form name="form1" method="post" action="selectmove2.php">
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="5">عرض تقرير حركة المخزن الدوريه <i class="fab fa-accusoft"></i> </td>
    </tr>
    <tr>
      <td style="width:8%;">من تاريخ</td>
      <td><input type="date" value="20<?php echo date('y-m-d');?>" name="date1" class="form-control" required autocomplete="off"></td>
      <td style="width:8%;">الي تاريخ</td>
      <td><input type="date" value="20<?php echo date('y-m-d');?>" name="date2" class="form-control" required autocomplete="off"></td>
          <td style="width:15%;"><button type="submit" name="ok1" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class="fab fa-accusoft"></i></button></td>
 </tr>
  </table>
</form>
<br>




<!-- فورم حركة المخزن الدورية لمخزن!-->

<form name="form1" method="post" action="selectmove2.php">
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="7">عرض تقرير المخزن الدوري لحركة المخزن <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td style="width:8%;">المخـزن</td>
      <td><select  style="height:38px;" name="store"  class="selectpicker" data-live-search="true" data-style="btn-primary" required>
	  <?php include("dbcon/dbcon.php");
	  $sq=mysql_query("select * from store");
	  $ro=mysql_fetch_array($sq);
	  ?>
	  <?php do { ?>
	  <option value="<?php echo $ro['name'];?>"><?php echo $ro['name'];?></option>
	  	  <?php }while($ro=mysql_fetch_array($sq));?>

      </select></td>
      <td style="width:8%;">من تاريخ</td>
      <td><input type="date" value="20<?php echo date('y-m-d');?>" name="date1" class="form-control" required autocomplete="off"></td>
      <td style="width:8%;">الي تاريخ</td>
      <td><input type="date" value="20<?php echo date('y-m-d');?>" name="date2" class="form-control" required autocomplete="off"></td> 
      <td style="width:15%; "><button type="submit" name="ok2" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class="fab fa-accusoft"></i></button></td>

    </tr>
  </table>
</form>
<Br>
 
 
 <!-- فورم حركة المخزن لصنف!-->

<form name="form1" method="post" action="selectmove2.php">
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="7">عرض التقرير اليومي لي حركة الصنف بالمخزن  <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td style="width:8%;">المخـزن</td>
      <td colspan="6"><select  style="height: 38px;"  name="store"  class="selectpicker" data-live-search="true" data-style="btn-primary" required>
	  <?php include("dbcon/dbcon.php");
	  $sq=mysql_query("select * from store");
	  $ro=mysql_fetch_array($sq);
	  ?>
	  <?php do { ?>
	  <option value="<?php echo $ro['name'];?>"><?php echo $ro['name'];?></option>
	  	  <?php }while($ro=mysql_fetch_array($sq));?>

      </select></td>
	  </tr><tr>
      <td style="width:8%;">الصــنف</td>
      <td><select style="height: 38px;" name="name"  class="selectpicker" data-live-search="true" data-style="btn-primary" required>
	
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select Distinct name from storing");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
              
            </select>></td>

      <td style="width:8%;">من تاريخ</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date1" class="form-control" required autocomplete="off"></td>
      <td style="width:8%;">الي تاريخ</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date2" class="form-control" required autocomplete="off"></td>
        <td style="width:15%;"><button type="submit" name="ok3" class="btn btn-primary" style="width: 100%;  font-family: 'Droid Arabic Kufi';"> عــرض <i class="fab fa-accusoft"></i></button></td>
  </tr>
  </table>
</form>
</body>
</html>


<!-- نهاية فورم حركة المخزن!-->
