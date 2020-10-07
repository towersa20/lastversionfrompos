<?php
//ملف التصميم
include('header.php');?>


<!-- فورم التقريرDate لحركةStore!-->

 <div class="app-content content container-fluid">
<br>

<form name="form1" method="post" action="selectmove1.php" >
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="3">Record your movement today<i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td style="width:8%;">day</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date" class="form-control big-shadow " required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok1" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> View <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>
</form>
<br>


<!--فورم التقريرDate لحركة صنف بالمخزن!-->

<form name="form1" method="post" action="selectmove1.php" >
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="5">View an item movement report <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td style="width:8%;">Product</td>
      <td><select type="text" name="name" class="selectpicker" data-live-search="true" data-style="btn-primary" required>
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select distinct name from storing");
		$res=mysql_fetch_array($brima);?>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
            </selct></td>
      <td style="width:8%;">Date</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date" class="form-control big-shadow " required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok2" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> View <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>
</form>
<Br>



<!-- فورم تقرير حركة صنف بالباركو!-->
<br>
<form name="form1" method="post" action="selectmove1.php" >
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="5">Display the barcode class report  <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td nowrap="" style="width:8%;">Barcode</td>
      <td><select type="text" name="barco" class="selectpicker" data-live-search="true" data-style="btn-primary" required>
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select distinct barco from storing");
		$res=mysql_fetch_array($brima);?>
        
            <?php do { ?>
            <option value="<?php echo $res['barco'];?>" ><?php echo $res['barco'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
            </select></td>
      <td style="width:8%;">Date</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date" class="form-control big-shadow " required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok3" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> View <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>
</form>
<Br>
<br>


<!-- فورم حركةStore !-->
<form name="form1" method="post" action="selectmove1.php" >
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="7">View a store movement report <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
	<td nowrap="" style="width:8%;">Store</td>
      <td><select type="text" name="store"  class="selectpicker" data-live-search="true" data-style="btn-primary" required>
	<datalist id="searchsts">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select distinct store from storing");
		$res=mysql_fetch_array($brima);?>
 
            <?php do { ?>
            <option value="<?php echo $res['store'];?>" ><?php echo $res['store'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
       
              
            </select></td>
      <td nowrap="" style="width:8%;">Product</td>
      <td><select type="text" name="item"  class="selectpicker" data-live-search="true" data-style="btn-primary" required>

            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select distinct name from storing");
		$res=mysql_fetch_array($brima);?>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
            </select></td>
      <td style="width:8%;">Date</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date" class="form-control big-shadow " required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok4" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> View <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>
</form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
</html>
<!--نهاية الفورم-->