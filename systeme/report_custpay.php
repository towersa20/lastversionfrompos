<?php include('header.php');?>
<center>
<script>
function printDiv() 
{
  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><title>تقرير </title><body border="1" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
// newWin.window.close();
  setTimeout(function(){newWin.close();},1);
}</script>
<link rel="stylesheet" type="text/css" href="font/font_face.css">
<link rel="stylesheet" type="text/css" href="font/animate.min.css">
<link rel="stylesheet" type="text/css" href="font/mystyle.css">
<link rel="stylesheet" type="text/css" href="font/animate.css">

<?php if(isset($_POST['ok1']))
{?>
<div id='DivIdToPrint' style="width:98%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<table style="width:100%;" border="1" align="center" class="table table-bordered">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center">date <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>Sales Record  <?php echo $_POST['cash'];?> From <?php echo $_POST['date1'];?> to <?php echo $_POST['date2'];?> </strong></td>
            <td align="center"> Customer Report  </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>
<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered">
<?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select * from sales  where type='$_POST[cash]' and date between '$_POST[date1]' and '$_POST[date2]'");
$row=mysql_fetch_array($sql);
?>
<tr align="center">
<td>Bills</td>
<td>Product</td>
<td>Unit</td>
<td>Quntity</td>
<td>Price</td>
<td>total</td>
<td>tax</td>
<td>Total+tax</td>
<td>Pay</td>
<td>Date</td>
</tr>
<?php do { ?>
<tr>
<td><?php echo $row['invoice'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['category'];?></td>
<td><?php echo $row['qty'];?></td>
<td><?php echo $row['price'];?></td>
<td><?php echo $row['qty']*$row['price'];?></td>
<td><?php echo $x1=$row['qty']*$row['price']*$tax/100;?></td>
<td><?php echo $x1+$row['qty']*$row['price'];?></td>
<td><?php if($row['type']==1)
{
    echo "Cash";
}
elseif($row['type']==2)
{
    echo "Visa";
 
}
elseif($row['type']==3)
{
    echo "Dept";
 
}?></td>
<td><?php echo $row['date'];?></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
<tr>
<td><strong>Total</strong></td>
<td><?php 
include("dbcon/dbcon.php");
$sql=mysql_query("select count(transaction_id)from sales where type='$_POST[cash]' and date between '$_POST[date1]' and '$_POST[date2]'");
$row=mysql_fetch_array($sql);
echo $row['count(transaction_id)'];?></td>
<td></td>
<td><?php 
include("dbcon/dbcon.php");
$sql=mysql_query("select count(qty)from sales where type='$_POST[cash]' and date between '$_POST[date1]' and '$_POST[date2]'");
$row=mysql_fetch_array($sql);
echo $row['count(qty)'];?></td>
<td><?php 
include("dbcon/dbcon.php");
$sql=mysql_query("select count(price)from sales where type='$_POST[cash]' and date between '$_POST[date1]' and '$_POST[date2]'");
$row=mysql_fetch_array($sql);
echo $row['count(price)'];?></td>
<td><?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select sum(qty*price) from sales where type='$_POST[cash]' and date between '$_POST[date1]' and '$_POST[date2]'");
$row=mysql_fetch_array($sql);
echo $x22=$row['sum(qty*price)'];?></td>
<td><?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select sum(price*qty) from sales where type='$_POST[cash]' and date between '$_POST[date1]' and '$_POST[date2]'");
$row=mysql_fetch_array($sql);
echo $x11=$row['sum(price*qty)']*$tax/100;?></td>
<td><?php echo $x11+$x22;?></td>
<td></td>
<td></td>
</tr>

</table>

<br>
<table style="width:100%;"  border="1" align="center" class="table table-bordered"  dir="rtl">
    <tr><td nowrap style="width:12%; "><strong>User</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>
<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td nowrap style="width: 15%;">Url</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td nowrap style="width: 15%;">Email</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;"> Phone</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left"  ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png"  width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
<?php } ?>

<?php if(isset($_POST['ok2']))
{?>
<div id='DivIdToPrint' style="width:98%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<table style="width:100%;" border="1" align="center" class="table table-bordered">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center">date <?php echo date('y-m-d h:i:s');?></td>
            <td colspan="2" align="center"><strong>Sales Record  <?php echo $_POST['cash'];?> Customer <?php echo $_POST['person'];?> From <?php echo $_POST['date1'];?> to <?php echo $_POST['date2'];?> </strong></td>
            
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>
<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered">
<?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select * from sales where type='$_POST[cash]' and date between '$_POST[date1]' and '$_POST[date2]'");
$row=mysql_fetch_array($sql);
?>
<tr align="center">
<td>Bills</td>
<td>Product</td>
<td>Unit</td>
<td>Quntity</td>
<td>Price</td>
<td>total</td>
<td>tax</td>
<td>Total</td>
<td>Pay</td>
<td>Date</td>
</tr>
<?php do { ?>
<tr>
<td><?php echo $row['invoice'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['category'];?></td>
<td><?php echo $row['qty'];?></td>
<td><?php echo $row['price'];?></td>
<td><?php echo $row['qty']*$row['price'];?></td>
<td><?php echo $x1=$row['qty']*$row['price']*$tax/100;?></td>
<td><?php echo $x1+$row['qty']*$row['price'];?></td>
<td><?php if($row['type']==1)
{
    echo "Cash";
}
elseif($row['type']==2)
{
    echo "Visa";
 
}
elseif($row['type']==3)
{
    echo "Dept";
 
}?></td>
<td><?php echo $row['date'];?></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
<tr>
<td><strong>Total</strong></td>
<td><?php 
include("dbcon/dbcon.php");
$sql=mysql_query("select count(invoice)from sales where type='$_POST[cash]' and date between '$_POST[date1]' and '$_POST[date2]'");
$row=mysql_fetch_array($sql);
echo $row['count(invoice)'];?></td>
<td></td>
<td><?php 
include("dbcon/dbcon.php");
$sql=mysql_query("select count(qty)from sales where type='$_POST[cash]' and date between '$_POST[date1]' and '$_POST[date2]'");
$row=mysql_fetch_array($sql);
echo $row['count(qty)'];?></td>
<td><?php 
include("dbcon/dbcon.php");
$sql=mysql_query("select count(price)from sales where type='$_POST[cash]' and date between '$_POST[date1]' and '$_POST[date2]'");
$row=mysql_fetch_array($sql);
echo $row['count(price)'];?></td>
<td><?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select sum(price*qty) from sales where type='$_POST[cash]' and date between '$_POST[date1]' and '$_POST[date2]'");
$row=mysql_fetch_array($sql);
echo $x22=$row['sum(price*qty)'];?></td>
<td><?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select sum(price*qty) from sales where type='$_POST[cash]' and date between '$_POST[date1]' and '$_POST[date2]'");
$row=mysql_fetch_array($sql);
echo $x11=$row['sum(price*qty)']*$tax/100;?></td>
<td><?php echo $x11+$x22;?></td>
<td></td>
<td></td>
</tr>

</table>

<br>
<table style="width:100%;" border="1"  align="center" class="table table-bordered"  dir="rtl">
    <tr><td nowrap style="width:12%; "><strong>User</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>
<table dir="rtl" border="1" style="width:100%;" align="center" class="table table-bordered">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td nowrap style="width: 15%;">Url</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td nowrap style="width: 15%;">Email</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;"> Phone</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left"  ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png"  width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
<?php } ?>
</div>
<table style="width:100%;" align="center" class="table table-borderd">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%;"  onclick="printDiv(); javascript:window.close()"> Print <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="custom_search.php"><button class="btn btn-primary" style="width: 100%;"> Pay <i class="fa ft-airplay"></i></button></a></td>
<td style="width:15%;"><a href="vperson.php"><button class="btn btn-primary" style="width: 100%;"> Query <i class="fa ft-search"></i></button></a></td>
<td style="width:15%;"><a href="cash.php"><button class="btn btn-primary" style="width: 100%;"> Report <i class="fa ft-paperclip"></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%;"> Home <i class="fa fa-home"></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>
</center>

