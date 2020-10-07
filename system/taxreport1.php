<?php include('header.php');?>
 <div class="app-content content container-fluid">

<form name="form1" method="post" action="tax1.php" >
  <table style="width:100%; " align="center" class="table table-bordered table-hover">
    <tr>
      <td colspan="3">عرض تقرير الضريبة اليومي <i class="fa fa-qrcode"></i></td>
    </tr>
    <tr>
      <td style="width:8%;"> اليــوم</td>
      <td><input type="date" value="20<?php echo date('y-m-d');?>"  name="date" class="form-control big-shadow" required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok1" class="btn btn-primary" style="font-family: 'Droid Arabic Kufi';width: 100%;"> عــرض <i class="fa ft-activity"></i></button></td>
    </tr>
  </table>
</form>
<br>
<form name="form1" method="post" action="tax1.php" >
  <table style="width:100%; " align="center" class="table table-bordered table-hover">
    <tr>
      <td colspan="5">عرض تقرير  الضريبة لصنف  <i class="fa fa-qrcode"></i></td>
    </tr>
    <tr>
      <td style="width:8%;"> الصنف</td>
      <td><select name="item" class="selectpicker" data-live-search="true" data-style="btn-primary">
	<datalist id="searchrt">
            <?php include('dbcon/config.php');
		$brima=mysql_query(" select Distinct name from share ");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
      <td style="width:8%;"> اليوم</td>
      <td><input type="date" value="20<?php echo date('y-m-d');?>"  name="date" class="form-control big-shadow" required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok2" class="btn btn-primary" style="font-family: 'Droid Arabic Kufi'; width: 100%; "> عــرض <i class="fa ft-activity"></i></button></td>
    </tr>
  </table>
</form>

<Br>
<Br>
<Br>
<Br>
<Br>
<Br>
<Br>
</body>
</html>
