<?php
//ملف التصميم
include('header.php');?>


<!-- فورم التقرير اليوم لحركة المخزن!-->

 <div class="app-content content container-fluid">
<br>

<form name="form1" method="post" action="selectmove1.php" >
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="3">سجل حركة اليوم  <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td style="width:8%;">أختر اليـوم</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date" class="form-control big-shadow " required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok1" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>
</form>
<br>


<!--فورم التقرير اليوم لحركة صنف بالمخزن!-->

<form name="form1" method="post" action="selectmove1.php" >
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="5">عرض تقرير حركة صنف <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td style="width:8%;">أختر الصنف</td>
      <td><select type="text" name="name" class="selectpicker" data-live-search="true" data-style="btn-primary" required>
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select distinct name from storing");
		$res=mysql_fetch_array($brima);?>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
            </selct></td>
      <td style="width:8%;">أختر اليوم</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date" class="form-control big-shadow " required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok2" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>
</form>
<Br>



<!-- فورم تقرير حركة صنف بالباركو!-->
<br>
<form name="form1" method="post" action="selectmove1.php" >
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="5">عرض تقرير صنف باركود  <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td nowrap="" style="width:8%;">رقم الباركود</td>
      <td><select type="text" name="barco" class="selectpicker" data-live-search="true" data-style="btn-primary" required>
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select distinct barco from storing");
		$res=mysql_fetch_array($brima);?>
        
            <?php do { ?>
            <option value="<?php echo $res['barco'];?>" ><?php echo $res['barco'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
            </select></td>
      <td style="width:8%;">أختر اليوم</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date" class="form-control big-shadow " required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok3" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>
</form>
<Br>
<br>


<!-- فورم حركة المخزن !-->
<form name="form1" method="post" action="selectmove1.php" >
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="7">عرض تقرير حركة مخزن  <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
	<td nowrap="" style="width:8%;">أختر المخزن</td>
      <td><select type="text" name="store"  class="selectpicker" data-live-search="true" data-style="btn-primary" required>
	<datalist id="searchsts">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select distinct store from storing");
		$res=mysql_fetch_array($brima);?>
 
            <?php do { ?>
            <option value="<?php echo $res['store'];?>" ><?php echo $res['store'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
       
              
            </select></td>
      <td nowrap="" style="width:8%;">أختر الصنف</td>
      <td><select type="text" name="item"  class="selectpicker" data-live-search="true" data-style="btn-primary" required>

            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select distinct name from storing");
		$res=mysql_fetch_array($brima);?>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
            </select></td>
      <td style="width:8%;">أختر اليوم</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date" class="form-control big-shadow " required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok4" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</html>
<!--نهاية الفورم-->