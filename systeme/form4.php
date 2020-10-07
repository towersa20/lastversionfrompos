<?php include('header.php');?>

<script>
function printDiv() 
{
  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><title>تقرير </title><body border="3" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
// newWin.window.close();
  setTimeout(function(){newWin.close();},1);
}</script>


<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<br>
<table style="width:100%;" border="1" align="center" class="table table-bordered">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width:25%;"><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width:25%;"><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center">Date <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"><strong>bill of payment </strong></td>
            <td align="center"> bill of payment </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br> 

<table style="width:100%;" align="center" border="1" class="table table-bordered table-hover">
    <tr>
	<td style="width:8%;" >Supplier</td>
	<td style="width:60%; " ><?php echo $_POST['cust'];?></td>
	<td style="width:10%;" >Tax Number</td>
	<td><?php echo $_POST['cno'];?></td>
	</tr>
	</table>



<table style="width:100%; " align="center" border="1" class="table table-bordered table-hover">
    <tr align="center">
    <td nowrap style="width:15%; "><strong>Bill ID</strong></td>
    <td nowrap style="width:10%; "><strong>Total</strong></td>
    <td nowrap style="width:10%; "><strong> amount required</strong></td>
    <td nowrap style="width:10%; "><strong>paid up</strong></td>
    <td nowrap style="width:12%; "><strong>Remaining amount</strong></td>
    <td nowrap style="width:12%; "><strong>date</strong></td>
  </tr>
    <?php
	  include('dbcon/dbcon.php');
	  $a=$_POST['a'];
	   if($a!= NULL){
{
for($i = 0; $i <count($a); $i++)
{?>
  <tr>
    <td nowrap><?php echo $x1=$_POST['a'][$i];?></td>
    <td nowrap><?php echo $x2=$_POST['b'][$i];?></td>
    <td nowrap bgcolor=""><?php echo $x4=$_POST['d'][$i];?></td>
    <td nowrap bgcolor=""><?php echo $x5=$_POST['e'][$i];?></td>
     <td nowrap><?php echo $x4-$x5;?></td>
     <td nowrap>20<?php echo date('y-m-d');?></td>
 </tr>
 <?php //echo $_POST['qaz'][$i];?>

    <?php }}}?>
  <tr>
    <td nowrap>Total</td>
    <td nowrap><strong><?php echo $xa1=array_sum ($_POST['c']);?></strong></td>
    <td nowrap><strong><?php echo $xa2=array_sum ($_POST['d']);?></strong></td>
    <td nowrap><strong><?php echo $xa3=array_sum ($_POST['e']);?></strong></td>
    <td nowrap><strong><?php echo $xa2-$xa3;?></strong></td>
  </tr>
  <tr>
  <td>Total amount write</td>
  <td colspan="6"> <?php 
  include('tech/I18N/Arabic.php'); 
  $obj = new I18N_Arabic('Numbers'); 
  print $obj->int2str($xa3); 
?> </td>
  </tr>
</table>
<br>
<table style="width:100%;" border="1"  align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
    <tr><td style="width:13%; "><strong>User</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
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
            <td  align="left"  ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png" width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table>
</div>
<table style="width:100%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:15%;"><a href="#"><button class="btn btn-raised gradient-pomegranate white" id='btn'  style="width: 100%;"  onclick="printDiv(); javascript:window.close()"> طباعة <i class="fa ft-printer"></i></button></a></td>
<td style="width:15%;"><a href="record.php"><button class="btn big-shadow " style="width: 100%;"> Supplier <i class="fa ft-airplay"></i></button></a></td>
<td style="width:15%;"><a href="vpayment.php"><button class="btn btn-raised gradient-pomegranate white" style="width: 100%;"> Search <i class="fa ft-search"></i></button></a></td>
<td style="width:15%;"><a href="repcust2.php"><button class="btn big-shadow" style="width: 100%;"> Report <i class="fa ft-paperclip"></i></button></a></td>
<td style="width:15%;"><a href="index.php"><button class="btn btn-raised gradient-pomegranate white" style="width: 100%;"> Home <i class="fa ft-home"></i></button></a></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
</tr></table>
</center>
   <?php
if(isset($_POST['ok'])){
   include("dbcon/dbcon.php"); 
 if($a!= NULL){
{
for($i = 0; $i <count($a); $i++)
{
//echo ".$_POST[a][$i].";
$sql=mysql_query("select * from payment where codes='".$_POST['a'][$i]."'");
$row=mysql_fetch_array($sql);
if($row['codes']==$_POST['a'][$i])
{
//$_POST['bx'][$i];
// $x4[$i]; echo "<br>";
   $sum[$i]=$row['pay']+$_POST['e'][$i]; echo "<br>";
//echo  $sum=$row['note']+$x4[$i]; echo "<br>";
$up=mysql_query("update payment set pay='".$sum[$i]."' ,ex ='".$_POST['d'][$i]."' where codes='".$_POST['a'][$i]."'");
//$new=mysql_query("insert into payment values('null','".$_POST['a'][$i]."','".$_POST['b'][$i]."','".$_POST['c'][$i]."','".$_POST['bx'][$i]."',now(),'".$_POST['year'][$i]."');");
echo "<script> alert(' Complete Is OK');</script>";
}
else
{
echo "<script> alert('Not Complete');</script>";

}
}
}
}}?>

