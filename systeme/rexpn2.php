<?php include('header.php');?>
 <div class="app-content content container-fluid">
<br>

<form name="form1" method="post" action="expn2.php" >
 <table style="width:100%; font-family: 'Droid Arabic Kufi'; " align="center" class="table table-bordered table-hover ">
    <tr>
      <td colspan="5">عرض تقرير المصروفات الدوري </td>
    </tr>
    <tr>
      <td style="width:8%;" nowrap>من تاريخ</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date1" class="form-control  big-shadow " required autocomplete="off"></td>
      <td style="width:8%;" nowrap>الي تاريخ</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date2" class="form-control  big-shadow " required autocomplete="off"></td>
      <td style="width:15%; "><button type="submit" name="ok1" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class="fa ft-pie-chart"></i></button></td>
    </tr>
  </table>
</form>
<br>
<form name="form1" method="post" action="expn2.php" >
 <table style="width:100%; font-family: 'Droid Arabic Kufi'; " align="center" class="table table-bordered table-hover ">
    <tr>
      <td colspan="7">عرض التقرير الدوري لمصــروف</td>
    </tr>
    <tr>
      <td style="width:8%;">المصروفات</td>
      <td colspan="4"><input type="text"   name="exp" class="form-control  big-shadow " required id="search" placeholder="اختر المصروف" list="searchrt" autocomplete="off">
         </tr>
		     <tr>
 <td style="width:8%;">من تاريخ</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date1" class="form-control  big-shadow " required autocomplete="off"></td>
      <td style="width:8%;">الي تاريخ</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date2" class="form-control  big-shadow " required autocomplete="off"></td>
	<datalist id="searchrt">
            <?php include('dbcon/config.php');
		$brima=mysql_query("select * from exp");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
      <td style="width:15%; "><button type="submit" name="ok2" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class="fa ft-pie-chart"></i></button></td>
    </tr>
  </table>
</form>
<Br>

<form name="form1" method="post" action="expn2.php" >
<table style="width:100%; font-family: 'Droid Arabic Kufi'; " align="center" class="table table-bordered table-hover ">
      <tr>
      <td colspan="7">عرض التقرير الدوري لمنصرفات مستخدم</td>
    </tr>
    <tr>
      <td style="width:8%;">المستخدم</td>
      <td colspan="4"><input type="text"  name="exp" class="form-control  big-shadow " required id="search" placeholder="اختر المستخدم" list="searchrxt" autocomplete="off">
         </tr>
		     <tr>
 <td style="width:8%;">من تاريخ</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date1" class="form-control  big-shadow " required autocomplete="off"></td>
      <td style="width:8%;">الي تاريخ</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date2" class="form-control  big-shadow " required autocomplete="off"></td>
	<datalist id="searchrxt">
            <?php include('dbcon/config.php');
		$brima=mysql_query("select * from users");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
      <td style="width:15%; "><button type="submit" name="ok3" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> عــرض <i class="fa ft-pie-chart"></i></button></td>
    </tr>
  </table>
</form>
<Br>

<Br>
<Br>
<Br>
<Br>
</body>
</html>
