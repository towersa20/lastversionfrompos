<?php include('header.php');?>

<script>
function printDiv() 
{
  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><title>تقرير المدفوعات</title><body border="3" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
// newWin.window.close();
  setTimeout(function(){newWin.close();},1);
}</script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>المدفوعات</title>
</head>
  <body style="font-family: 'Droid Arabic Kufi';" data-open="click" data-menu="vertical-menu">

<?php if(isset($_POST['ok1']))
{ ?>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<br>
<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center">Date <?php echo date('y-m-d h:i:s');?></td>
    <td align="center"><strong>Supplier Payment <?php echo $_POST['date'];?> </strong></td>
            <td align="center"> Reports </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>

<?php include('dbcon/dbcon.php');
$sql=mysql_query("select * from payment where date='$_POST[date]'");
$row=mysql_fetch_array($sql);
?>
<table dir="rtl" border="1" style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
<tr >
<td style="width:20%;">Bill ID</td>
<td style="width:20%;">Supplier</td>
<td style="width:10%;">Required</td>
<td style="width:15%;">amount paid </td>
<td style="width:15%;">Remaining amount</td>
<td style="width:20%;">Date</td>
</tr>
<?php 
$total = 0;
$pay = 0 ;
$ex = 0 ;
do { 
$total = $total + $row['total'];
$pay = $pay + $row['pay'];
$ex = $ex + $row['ex'];
  ?>
<tr>
<td><?php echo $row['codes'];?></td>
<td><?php echo $row['cust'];?></td>
<td><?php echo $row['total'];?></td>
<td><?php echo $row['pay'];?></td>
<td><?php echo $row['ex'];?></td>
<td><?php echo $row['date'];?></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
<tr>
<td>Total</td>

<td><?php include('dbcon/dbcon.php'); $sql=mysql_query("select count(pxid) from payment where date='$_POST[date]'"); $row=mysql_fetch_array($sql); echo $row['count(pxid)'];?></td>

<td><?php echo $total ;?></td>

<td><?php echo $pay;?></td>

<td><?php echo $ex ; ?></td>
<td></td>
</tr>
</table>

<?php } ?>
<?php if(isset($_POST['ok2']))
{ ?>
<center>
<table dir="rtl" border="1"  style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center">Date <?php echo date('y-m-d h:i:s');?></td>
    <td align="center"><strong>Supplier Payment Reports <?php echo $_POST['name'];?></strong></td>
            <td align="center"> Reports </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<?php include('dbcon/dbcon.php');
$sql=mysql_query("select * from payment where cust='$_POST[name]'");
$row=mysql_fetch_array($sql);
?>
<table dir="rtl" border="1"  style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
<tr >
<td style="width:20%;">Bill ID</td>
<td style="width:20%;">Customer</td>
<td style="width:10%;">Required</td>
<td style="width:15%;">Pay Amount</td>
<td style="width:15%;">Remaining amount</td>
<td style="width:20%;">Date</td>
</tr>
<?php 
$total = 0;
$pay = 0 ;
$ex = 0 ;
do { 
$total = $total + $row['total'];
$pay = $pay + $row['pay'];
$ex = $ex + $row['ex'];
  ?>
<tr>
<td><?php echo $row['codes'];?></td>
<td><?php echo $row['cust'];?></td>
<td><?php echo $row['total'];?></td>
<td><?php echo $row['pay'];?></td>
<td><?php echo $row['ex'];?></td>
<td><?php echo $row['date'];?></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
<tr>
<tr>
<td>Total</td>
<td><?php include('dbcon/dbcon.php'); $sql=mysql_query("select count(pxid) from payment where cust='$_POST[name]'"); $row=mysql_fetch_array($sql); 
echo $row['count(pxid)'];?></td>
<td><?php echo $total; ?></td>
<td><?php echo $pay; ?></td>
<td><?php echo $ex; ?></td>
<td></td>
</tr>
</table>
<br>
<?php } ?>
<?php if(isset($_POST['ok3']))
{ ?>

<center>
<table dir="rtl" border="1"  style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center">Date <?php echo date('y-m-d h:i:s');?></td>
    <td align="center"><strong>Supplier Payment Reports <?php echo $_POST['name'];?> Date <?php echo $_POST['date'];?></strong></td>
            <td align="center"> Reports  </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<?php include('dbcon/dbcon.php');
$sql=mysql_query("select * from payment where cust='$_POST[name]' and date='$_POST[date]'");
$row=mysql_fetch_array($sql);
?>
<table dir="rtl" border="1"  style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
<tr >
<td style="width:20%;">Bill ID</td>
<td style="width:20%;">Supplier</td>
<td style="width:10%;">Required</td>
<td style="width:15%;">Payment</td>
<td style="width:15%;">Remaining amount</td>
<td style="width:20%;">Date</td>
</tr>
<?php 
$total = 0;
$pay = 0 ;
$ex = 0 ;
do { 
$total = $total + $row['total'];
$pay = $pay + $row['pay'];
$ex = $ex + $row['ex'];
  ?>
<tr>
<td><?php echo $row['codes'];?></td>
<td><?php echo $row['cust'];?></td>
<td><?php echo $row['total'];?></td>
<td><?php echo $row['pay'];?></td>
<td><?php echo $row['ex'];?></td>
<td><?php echo $row['date'];?></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
<tr>
<tr>
<td>Total</td>
<td><?php include('dbcon/dbcon.php'); $sql=mysql_query("select count(pxid) from payment where cust='$_POST[name]'and date='$_POST[date]' "); $row=mysql_fetch_array($sql); 
echo $row['count(pxid)'];?></td>
<td><?php echo $total; ?></td>
<td><?php echo $pay; ?></td>
<td><?php echo $ex; ?></td><td></td>
</tr>
</table>
<table dir="rtl" border="1" style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
<tr>
<td style="width:8%;"><strong>Total</strong> </td>
<td  style="width:17%;"><?php echo $pay;?></td>
<td style="width:8%;"><strong>Payment</strong></td>
<td  style="width:17%;"><?php include('dbcon/dbcon.php'); $sql=mysql_query("select pay from payment where cust='$_POST[name]' and date='$_POST[date]'"); $row=mysql_fetch_array($sql); echo $info=$row['pay'];?></td>
<td style="width:8%;"><strong>Remaing</strong></td>
<td  style="width:17%;"><?php echo $sud=$pay-$info;?></td>
<td style="width:8%;"><strong>Status</strong></td>
<td  style="width:17%;"><?php if($sud<=0)
{
echo "Paid";
}
else
{
echo "Unpaid";
}?></td>
</tr>
</table><br>
<?php } ?>

<?php if(isset($_POST['ok4']))
{ ?>
<center>
<br>
<center>
<table dir="rtl" border="1"  style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center">Date <?php echo date('y-m-d h:i:s');?></td>
    <td align="center"><strong>Supplier Reports <?php echo $_POST['name'];?> Product <?php echo $_POST['item'];?> Date <?php echo $_POST['date'];?></strong></td>
            <td align="center"> Reports </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<?php include('dbcon/dbcon.php');
$sql=mysql_query("select * from payment where cust='$_POST[name]' and date='$_POST[date]' and item='$_POST[item]'");
$row=mysql_fetch_array($sql);
?>
<table dir="rtl" border="1"  style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
<tr >
<td style="width:20%;">Bill ID</td>
<td style="width:20%;">Supplier</td>
<td style="width:20%;">Required</td>
<td style="width:20%;">Payment</td>
<td style="width:20%;">Remaing</td>
</tr>
<?php 
$total = 0;
$pay = 0 ;
$ex = 0 ;
do { 
$total = $total + $row['total'];
$pay = $pay + $row['pay'];
$ex = $ex + $row['ex'];
  ?>
<tr>
<td><?php echo $row['codes'];?></td>
<td><?php echo $row['cust'];?></td>
<td><?php echo $row['total'];?></td>
<td><?php echo $row['pay'];?></td>
<td><?php echo $row['ex'];?></td>
</tr>
<?php } while($row=mysql_fetch_array($sql));?>
<tr>
<tr>
<td>Total</td>
<td><?php include('dbcon/dbcon.php'); $sql=mysql_query("select count(pxid) from payment where cust='$_POST[name]'and date='$_POST[date]' and item='$_POST[item]'"); $row=mysql_fetch_array($sql); echo $row['count(pxid)'];?></td>
      <td></td>
      <td></td>
      <td></td>
<td><?php include('dbcon/dbcon.php'); $sql=mysql_query("select sum(qunt) from payment where cust='$_POST[name]' and date='$_POST[date]' and item='$_POST[item]'"); $row=mysql_fetch_array($sql); echo $row['sum(qunt)'];?></td>
<td><?php include('dbcon/dbcon.php'); $sql=mysql_query("select sum(price) from payment where cust='$_POST[name]' and date='$_POST[date]' and item='$_POST[item]'"); $row=mysql_fetch_array($sql); echo $row['sum(price)'];?></td>
<td><?php include('dbcon/dbcon.php'); $sql=mysql_query("select sum(qunt*price) from payment where cust='$_POST[name]' and date='$_POST[date]' and item='$_POST[item]'"); $row=mysql_fetch_array($sql); echo $pay=$row['sum(qunt*price)'];?></td>
</tr>
</table>
<table dir="rtl" border="1" style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
<tr>
<td style="width:8%;"><strong>Total</strong> </td>
<td  style="width:17%;"><?php echo $pay;?></td>
<td style="width:8%;"><strong>Payments</strong></td>
<td  style="width:17%;"><?php include('dbcon/dbcon.php'); $sql=mysql_query("select pay from payment where cust='$_POST[name]' and date='$_POST[date]' and item='$_POST[item]'"); $row=mysql_fetch_array($sql); echo $info=$row['pay'];?></td>
<td style="width:8%;"><strong>Remaning</strong></td>
<td  style="width:17%;"><?php echo $sud=$pay-$info;?></td>
<td style="width:8%;"><strong>Status</strong></td>
<td  style="width:17%;"><?php if($sud<=0)
{
echo "Paid";
}
else
{
echo "Unpaid";
}?></td>
</tr>
</table><br>
<br>
<?php } ?>
<br>
<table dir="rtl" style="width:100%;" border="1" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 12%;">Url</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 12%;">Eamil</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;"> phone</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left"  ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png"  width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table></center>
</div>
<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-primary" id='btn'  style="width: 100%;"  onclick="printDiv(); javascript:window.close()"> Print <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="record.php"><button class="btn btn-primary" style="width: 100%;"> Supplier <i class="fa ft-airplay"></i></button></a></td>
<td style="width:15%;"><a href="vpayment.php"><button class="btn btn-primary" style="width: 100%;"> Search <i class="fa ft-search"></i></button></a></td>
<td style="width:15%;"><a href="repcust2.php"><button class="btn btn-primary" style="width: 100%;"> Reports <i class="fa ft-paperclip"></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%;"> Home <i class="fa fa-home"></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>
</center>
</body>
</html>
