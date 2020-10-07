<?php include("header.php");?>
<form name="form1" method="post" action="eprush.php" enctype="multipart/form-data">
 <table style="width:100%; " align="center" class="table table-borderd table-hover ">
    <tr>
      <td colspan="8"><strong>شراء مجموعة أصنـــاف</strong> <i class="fa fa-shopping-basket"></i> </td>
    </tr>
    <tr>
      <td style="width: 5%;">الكمية</td>
      <td style="width: 20%;"><input type="number" min="0" style="border: 0px;" max="500" name="x1" class="form-control" required autocomplete="off"></td>

        <td style="width: 5%;">الفاتورة</td>
        <td style="width: 20%;"><input type="text"  style="border: 0px;" name="binf" class="form-control" required autocomplete="off"></td>
        <td>المورد</td>
        <td><input type="text" name="x5" style="border: 0px;" class="form-control" required id="search" placeholder="اختر المورد" list="searchrcus" autocomplete="off">
            <datalist id="searchrcus">
                <?php include('dbcon/dbcon.php');
                $brima=mysql_query("select * from customer");
                $res=mysql_fetch_array($brima);?>
                <option></option>
                <?php do { ?>
                    <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
                <?php } while($res=mysql_fetch_array($brima));?>
            </datalist></td>
        <td colspan="2" rowspan="2">
            <button type="submit" name="ok" value="تنفيذ" class="btn btn-info" style="width: 100%; height: 100px;"> معالجة <i class="fa ft-shopping-cart"></i></button>
        </td>
    </tr>
     <tr>
         <td style="width: 5%;">المخزن</td>
      <td ><input type="text" value="" style="border: 0px;" name="x4" class="form-control" required id="search" placeholder="اختر المخزن" list="searchrst" autocomplete="off">
	<datalist id="searchrst">
            <?php include('dbcon/dbcon.php');
		$brima=mysql_query("select * from store");
		$res=mysql_fetch_array($brima);?>
            <option></option>
            <?php do { ?>
            <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
            <?php } while($res=mysql_fetch_array($brima));?>
</datalist></td>
         <td style="width: 5%;">الشهر</td>
         <td style="width: 20%;"><select style="border: 0px; height: 35px;" name="x2" class="form-control">
                 <?php include("dbcon/dbcon.php");
                 $sq=mysql_query("select * from month");
                 $ro=mysql_fetch_array($sq);
                 ?>
                 <?php do { ?>
                     <option value="<?php echo $ro['name'];?>" style="color:#FFFFFF; " class="form-control btn-black"><?php echo $ro['name'];?></option>
                 <?php }while($ro=mysql_fetch_array($sq));?>

             </select></td>
         <td style="width: 5%;"> السنة</td>
         <td style="width: 20%;"><input type="number" style="border: 0px;" min="2018" value="20<?php echo date('y');?>" max="2030" name="x3" class="form-control" required autocomplete="off"></td>
       </tr>

  </table>
</form>
