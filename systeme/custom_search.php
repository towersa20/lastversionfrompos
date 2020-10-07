<?php include("header.php");?>
<form name="form1" method="post" action="personresult.php">
    <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">

    <tr>
      <td colspan="3"><strong>
      Record customer purchases
      </strong> <i class="fa fa-search"></i></td>
    </tr>
    <tr>
      <td  style="width:8%; ">Cusotmer </td>
      <td><input type="text" name="xname" class="form-control" required id="search" placeholder="" list="searchrt" autocomplete="off">
	<datalist id="searchrt">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select * from person");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
      <td  style="width:15%; "><button class="btn btn-primary" type="submit" style="width: 100%;">  View <i class="fa ft-search"></i></button></td>
    </tr>
  </table>
</form>
</body>
</html>
