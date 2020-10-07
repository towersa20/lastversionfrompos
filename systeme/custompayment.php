<?php include("header.php");?>
<form name="form1" method="post" action="customerform.php">
    <table style="width:100%; font-size:14px;" align="center" class="table table-bordered table-hover">

    <tr>
      <td colspan="3"><strong>Payment procedures for a supplier</strong>  <i class="fa icon-basket-loaded"></i></td>
    </tr>
    <tr>
      <td  style="width:8%; ">Supplier </td>
      <td><input type="text" name="xname" class="form-control " required id="search" placeholder="" list="searchrt" autocomplete="off">
	<datalist id="searchrt">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select * from customer");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
      <td  style="width:15%; "><button class="btn btn-primary" type="submit" style="width: 100%;">  Search <i class="fa ft-search"></i></button></td>
    </tr>
  </table>
</form>
</body>
</html>
