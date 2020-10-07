<?php
//استدعاء ملف التصميم

include('header.php');?>
 <div class="app-content content container-fluid">
<br>
<!-- عرض التقرير اليومي!-->
<form name="form1" method="post" action="share1.php" >
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td class="text-primary" colspan="3">عرض تقرير المشتريات ليــــــــــــــــــــــــــوم  <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td style="width:8%;">اليـوم</td>
      <td><input type="date" value="20<?php echo date('y-m-d');?>" name="date" class="form-control" required autocomplete="off"></td>
      <td style="width:18%;"><button type="submit" name="ok1" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>
</form>
<!-- نهاية عرض التقرير اليومي!-->





<!-- فورم تقرير مشتريات الموردين!-->

<br>
<form name="form1" method="post" action="share1.php" >
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td class="text-primary" colspan="5">عرض تقرير المشتريات من المورديـــــــن  <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td style="width:8%;"> المورد</td>
      <td><select name="cust" class="selectpicker" data-live-search="true" data-style="btn-primary">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select distinct name from customer limit 20 ");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
            </select></td>
      <td style="width:8%;"> اليوم</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date" class="form-control" required autocomplete="off"></td>
      <td style="width:18%; "><button type="submit" name="ok2" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>
</form>
<Br>
 
 <!-- نهاية عرض تقرير مشتريات الموردين!-->





<!-- عرض تقرير  مشتريات صنف!-->

<br>
<form name="form1" method="post" action="share1.php" >
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="5" class="text-primary">عرض تقرير المشتريـــــــــــــــــات من صنف  <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
      <td  style="width:8%;"> الصنف</td>
      <td   style="width:17%;"><select  name="item"  class="selectpicker" data-live-search="true" data-style="btn-primary">
	  <?php include("dbcon/dbcon.php");
	  $sq=mysql_query("select distinct name from share limit 30");
	  $ro=mysql_fetch_array($sq);
	  ?>
	  <?php do { ?>
	  <option value="<?php echo $ro['name'];?>" class="form-control big-shadow  btn-black"><?php echo $ro['name'];?></option>
	  	  <?php }while($ro=mysql_fetch_array($sq));?>

      </select></td>
            
      <td style="width:8%;"> اليوم</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date" class="form-control" required autocomplete="off"></td>
      <td style="width:18%; "><button type="submit" name="ok3" class="btn btn-primary" style="width:100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>
</form>
<Br>
 <!-- نهاية عرضر تقرير مشتريات صنف!-->

<br>
<form name="form1" method="post" action="share1.php" >
  <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="7" class="text-primary">عرض تقرير المشتريات من لصنف لمورد  <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
	<td nowrap="" style="width:8%;"> المورد</td>
      <td><select name="cust"  class="selectpicker" data-live-search="true" data-style="btn-primary" >
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select * from customer limit 10");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
            </select></td>
      <td nowrap="" style="width:8%;"> الصنف</td>
      <td><select  name="item"  class="selectpicker" data-live-search="true" data-style="btn-primary">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select distinct name from share limit 20");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
            </select></td>
      <td style="width:8%;"> اليوم</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date" class="form-control  " required autocomplete="off"></td>
      <td style="width:18%; "><button type="submit" name="ok4" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class="fab fa-accusoft"></i></button></td>
    </tr>
  </table>
</form>
<Br>
 <!-- نهاية الفورم!-->

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
<Br>
</body>
</html>
<!-- فورم نهاية فورمات استعراض التقارير!-->
