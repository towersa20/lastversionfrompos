<?php include('header.php');?>

<script>
function printDiv() 
{
  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><title>تقرير العملاء</title><body border="1" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
// newWin.window.close();
  setTimeout(function(){newWin.close();},1);
}</script>



<center>
<link rel="stylesheet" type="text/css" href="font/mystyle.css">
<link rel="stylesheet" type="text/css" href="font/font_face.css">
<link rel="stylesheet" type="text/css" href="font/animate.min.css">
<link rel="stylesheet" type="text/css" href="font/animate.css">
<div id='DivIdToPrint' style="width:99%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<table style="width:100%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;"><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;"><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td nowrap>Time <?php echo date('y-m-d h:i:s');?></td>
            <td colspan="2" align="center"><strong>Customer <?php echo $_POST['xname'];?></strong></td>
          
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>

<table align="center" border="1" class="table table-bordered table-hover" style="width:100%; ">
<?php include('dbcon/dbcon.php');
$sql=mysql_query("select*from sales where  invoice ='$_POST[xname]'");
$row=mysql_fetch_array($sql);?>
<tr>
<td>Bills ID</td>
<td style="width:15%;">Product</td>
<td style="width:10%;">Unit</td>
<td style="width:7%;">Quntity</td>
<td style="width:7%;">Price</td>
<td style="width:7%;">TOTAL</td>
<td style="width:7%;">tax</td>
<td style="width:7%;">total+tax</td>
<td style="width:7%;">type</td>
<td style="width:15%;">date</td>
</tr>
<?php do {?> 
<tr>
<td nowrap><?php echo $row['invoice'];?></td>
<td nowrap><?php echo $row['name'];?></td>
<td><?php echo $row['unit'];?></td>
<td><?php echo $row['qty'];?></td>
<td><?php echo $row['price'];?></td>
<td><?php echo $row['qty']*$row['price'];?></td>
<td><?php echo $x1=$row['qty']*$row['price']*$tax/100;?></td>
<td><?php echo $row['qty']*$row['price'];?></td>
<td><?php echo $row['type'];?></td>
<td><?php echo $row['dateitem'];?></td>
</tr>
<?php }while($row=mysql_fetch_array($sql));?>
<tr>
<td><strong>Total</strong></td>
<td ><?php 
include("dbcon/dbcon.php");
$sql=mysql_query("select count(invoice)from sales where invoice='$_POST[xname]'");
$row=mysql_fetch_array($sql);
echo $row['count(invoice)'];?></td>
<td></td>
<td><?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select count(qty) from sales where invoice='$_POST[xname]'");
$row=mysql_fetch_array($sql);
echo $row['count(qty)'];?></td>
<td><?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select sum(price) from sales where  invoice='$_POST[xname]'");
$row=mysql_fetch_array($sql);
echo $row['sum(price)'];?></td>

<td><?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select sum(price*qty) from sales where invoice='$_POST[xname]'");
$row=mysql_fetch_array($sql);
echo $row['sum(price*qty)'];?></td>
<td><?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select sum(price*qty) from sales where  invoice='$_POST[xname]'");
$row=mysql_fetch_array($sql);
echo $x11=$row['sum(price*qty)']*$tax/100;?></td>
<td><?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select sum(price*qty)from sales where invoice='$_POST[xname]'");
$row=mysql_fetch_array($sql);
echo $x11=$row['sum(price*qty)'];?></td>

<td></td>
<td></td>
</tr>
</table>

<table style="width:100%;" border="1"  align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
    <tr><td style="width:14%;" nowrap><strong>User</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>
<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 15%;">Url</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 15%;">Eamil</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;">Phone</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left"><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png" width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
</div>
<table style="width:100%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%;"  onclick="printDiv(); javascript:window.close()"> Print <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="login-exec.php"><button class="btn btn-primary" style="width: 100%;"> Sales <i class="fa ft-airplay"></i></button></a></td>
<td style="width:15%;"><a href="vsal.php"><button class="btn btn-primary" style="width: 100%;"> Query <i class="fa ft-search"></i></button></a></td>
<td style="width:15%;"><a href="salr1.php"><button class="btn btn-primary" style="width: 100%;"> Report <i class="fa ft-paperclip"></i></button></a></td>
<td style="width:15%;"><a href="crecord.php"><button class="btn btn-primary" style="width: 100%;"> Back <i class="fa fa-undo"></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>

</center>
