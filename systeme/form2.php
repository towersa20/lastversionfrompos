
<?php include("header.php");?>
<script src="js/shortcut.js"></script>
<script>
function disable_f5(e)
{
  if ((e.which || e.keyCode) == 116)
  {
      e.preventDefault();
  }
}

$(document).ready(function(){
    $(document).bind("keydown", disable_f5);    
});
</script>

<script>
function printDiv() 
{

  var divToPrint=document.getElementById('DivIdToPrint');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();
  //newWin.window.close();

  setTimeout(function(){newWin.close();},1);
}</script>
<div id='DivIdToPrint'  style="width:100%; font-family: 'Droid Arabic Kufi'; font-size: 14px;" align="right">
<table style="width:100%;" dir="rtl" border="1" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 15%;"><?php echo '<img src="file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?></strong><br><br><strong style="font-size:25px; "><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 15%;"><?php echo '<img src="file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td nowrap="" style="width: 22%;" align="center">تاريخ   <?php echo $_POST['datefrom'];?></td>
            <td align="center"><strong>فاتورة مشتريات رقم <?php echo $_POST['CODE'];?></strong></td>
            <td nowrap="" style="width: 22%;" align="center"> مخزن <?php echo $_POST['stores'];?> </td>
        </tr>
		<tr>
		<td colspan="3">المورد : <?php echo $_POST['cust_name'];?></td></tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>

<center><table align="center" style="width:100%;" dir="rtl" border="1" class="table table-bordered table-hover">
  <tr align="center">
    <td nowrap style="width:13%; "><strong>Barcode</strong></td>
    <td nowrap style="width:25%; "><strong>Product</strong></td>
    <td nowrap style="width:12%; "><strong>unit</strong></td>
    <td nowrap style="width:8%; "><strong>Quntity</strong></td>
    <td nowrap style="width:8%; "><strong>Price</strong></td>
    <td nowrap style="width:8%; "><strong>Vat</strong></td>
    <td nowrap style="width:8%; "><strong>Total+vat</strong></td>
  </tr>
        <?php
	  include('dbcon/dbcon.php');
	  $pid=$_POST['pid'];
	   if($pid!= NULL){
{
for($i = 0; $i <count($pid); $i++)
{?>
<tr>
<td nowrap><?php echo $_POST['pid'][$i];?></td>
    <td nowrap><?php echo $_POST['product_name'][$i];?></td>
    <td nowrap><?php echo $_POST['unit'][$i];?></td>
    <td nowrap><?php echo $xx1=$_POST['qty'][$i];?></td>
    <td nowrap> <?php echo $xx2=$_POST['price'][$i];?> </td>
    <td nowrap> <?php echo $adx=($xx1*$xx2)*$tax/100;?> </td>
    <td nowrap><input type="hidden" value="<?php  $add+=$_POST['qty'][$i]*$_POST['price'][$i]+$adx;?>"> <?php echo $_POST['qty'][$i]*$_POST['price'][$i]+$adx;?> </td>
<?php }}}?>
  <tr class="text-danger">
    <td nowrap>Total <?php echo $tax;?></td>
  <td nowrap></td>
  <td nowrap><strong><?php //echo $xa1=array_sum ($_POST['c']);?></strong></td>
    <td nowrap><strong><?php echo $xa2=array_sum ($_POST['qty']);?></strong></td>
    <td nowrap><strong><?php echo $xa2=array_sum ($_POST['price']);?></strong></td>

<td nowrap><strong><?php echo $adx;?></strong></td>
<td nowrap><strong><?php echo $add;?></strong></td>

  </tr>
  

</table>
</div>
<table style="width:100%;" border="1" align="center" class="table table-bordered table-hover">
<tr>
        <td style="width:20%;"><button type="submit" class="btn  btn-primary" id='btn'  style="width: 100%;font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> Print <i class="fa fa-print"></i></button></td>
</form> 
        <td style="width:20%;"><a href="move.php"> <button type="button" id='btn'  class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';" onclick="printDiv(); javascript:window.close()"> New <i class="fa fa-shopping-basket"></i></button></a></td>
        <td style="width:20%;"><a href="vshare.php"> <button type="button" class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> SEARCH <i class="fa fa-search"></i></button></a></td>
        <td style="width:20%;"><a href="shselect1.php"> <button type="button" class="btn btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> REPORT <i class="ft-pie-chart"></i></button></a></td>
        <td style="width:20%;"><a href="index.php"> <button type="button" class="btn  btn-primary" style="width: 100%;font-family: 'Droid Arabic Kufi';"> HOME <i class="fa fa-home"></i></button></a></td>
</tr></table>

<?php
if(isset($_POST['ok1'])){



   include("dbcon/dbcon.php"); 
   $pid=$_POST['pid'];
   $product_name=$_POST['product_name'];
   $unit=$_POST['unit'];
   $qty=$_POST['qty'];
   $price=$_POST['price'];
   $pays=$_POST['pays'];
   //=$_POST['sum2'];
   //$date=$_POST['date'];
   $datefrom=$_POST['datefrom'];
   $stores=$_POST['stores'];
 if($pid!= NULL){
{
for($i = 0; $i <count($pid); $i++)
{


//كود تسجيل بيانات المشتريات
$x=mysql_query("insert into share values('','".$_POST['pid'][$i]."','".$_POST['product_name'][$i]."',
'".$_POST['unit'][$i]."','".$_POST['qty'][$i]."','".$_POST['price'][$i]."','".$_POST['pays'][$i]."',
'".$_POST['tax'][$i]."','$0','$_POST[stores]',
'$_POST[datefrom]','$_POST[cust_name]','$_POST[CODE]','$_SESSION[tell]');");
}
if($x)
{
 echo "<script type='text/javascript'>
  $(document).ready(function(){
  $('#centralModalSuccess').modal('show');
  });
  </script>";
}}}}?>

<?php /* نهاية كود تسجيل المشتريات
*/ ?>

   <?php
if(isset($_POST['ok1'])){
   include("dbcon/dbcon.php"); 
 if($pid!= NULL){
{
for($i = 0; $i <count($pid); $i++)
{
$sql=mysql_query("select * from storing where barco='".$_POST['pid'][$i]."'");
$row=mysql_fetch_array($sql);
if($row['name']==$_POST['product_name'][$i])
{
//echo $_POST['b'][$i];
$qty=$_POST['qty'];
 $brima=$row['qunt']+$_POST['qty'][$i];
$up=mysql_query("update storing set qunt='$brima',price='".$_POST['pays'][$i]."' where barco='".$_POST['pid'][$i]."' ");
/*echo "<script> alert('تم اضافة كمية جديدة لكمية مجودة مسبقاً بالمخزن');</script>";*/
}
else
{
$new=mysql_query("insert into storing values('null','".$_POST['pid'][$i]."','".$_POST['product_name'][$i]."','".$_POST['unit'][$i]."','".$_POST['pays'][$i]."','".$_POST['qty'][$i]."','".$_POST['date'][$i]."',now(),'$_POST[stores]','$_SESSION[tell]');");
/*echo "<script> alert('تم اضافة عملية التخزين');</script>";*/



}
}
}
}}?>




 <!-- Central Modal Medium Success -->
 <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-success" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <p class="heading lead">POS</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
           <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
           <p>Save Done</p>
         </div>
       </div>

       <!--Footer-->
       <div class="modal-footer justify-content-center">
         <a href="move.php" type="button" class="btn btn-primary waves-effect" style="width: 100%; font-family: 'Droid Arabic Kufi';" data-dismiss="">ok</a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->










 

 <?php  
if(isset($_POST['ok1'])){
   include("dbcon/dbcon.php"); 
 if($pid!= NULL){
{
for($i = 0; $i <count($pid); $i++)
{
 $pid=$_POST['pid'];
 $product_name=$_POST['product_name'];
 $unit=$_POST['unit'];
 $qty=$_POST['qty'];
 $price=$_POST['price'];
 $stores=$_POST['stores'];
 
$new=mysql_query("insert into mstor values('null','".$_POST['pid'][$i]."','".$_POST['product_name'][$i]."','".$_POST['unit'][$i]."','".$_POST['qty'][$i]."'
,'".$_POST['price'][$i]."' ,'$_POST[stores]' ,'$_SESSION[uname]',now(),now(),'$_SESSION[tell]');");
/*echo "<script> alert('تم اضافة عملية التخزين');</script>";*/



}}}}?>


 



<?php  
if(isset($_POST['ok1'])){
   include("dbcon/dbcon.php"); 
 if($pid!= NULL){
{
for($i = 0; $i <count($pid); $i++)
{
 $pid=$_POST['pid'];
 $cust_name=$_POST['cust_name'];
 $product_name=$_POST['product_name'];
 $unit=$_POST['unit'];
 $qty=$_POST['qty'];
 $price=$_POST['price'];
 $pay=$_POST['pay'];
 $date=$_POST['date'];
 //$price=$_POST['price'];
 $code=$_POST['CODE'];
echo $total= $_POST['qty'][$i]*$_POST['price'][$i];
$new=mysql_query("insert into payment values('null','$cust_name','".$_POST['product_name'][$i]."','".$_POST['unit'][$i]."','".$_POST['qty'][$i]."'
,'".$_POST['price'][$i]."' ,'$total' ,'0' ,'0' ,now(),now(),'$pay','$code');");
/*echo "<script> alert('تم اضافة عملية التخزين');</script>";*/



}}}}?>
           







<?php
/*include 'dbcon/dbcons.php';
if (isset($_POST['pid'])) {
   
  $pid=$_POST['pid'];
  $product_name=$_POST['product_name'];
  $unit=$_POST['unit'];
  $qty=$_POST['qty'];
  $price=$_POST['price'];
  $pays=$_POST['pays'];
  //=$_POST['sum2'];
  //$date=$_POST['date'];
  $datefrom=$_POST['datefrom'];
  $stores=$_POST['stores'];
    
    for ($i = 0; $i < count($pid); $i++) {
        $sql = "INSERT INTO products (pid, product_name, unit,product_price,product_stock,p_status,tell) " .
                             " VALUES ('$pid[$i]','$product_name[$i]','$unit[$i]','$price[$i]' ,'1000000','0','$pays[$i]' )";

        //$conn is the name of your connection string
        $results = mysqli_query($conn, $sql);
        if (!$results) {
         //   echo "Error: " . $sql . "<br>" . $query->error;
        }

    }
}*/
?>



<?php
if(isset($_POST['ok1'])){
   include("dbcon/dbcon.php"); 
 if($pid!= NULL){
{
for($i = 0; $i <count($pid); $i++)
{
$sql=mysql_query("select * from products where pid='".$_POST['pid'][$i]."'");
$row=mysql_fetch_array($sql);
if($row['pid']==$_POST['pid'][$i])
{
$up=mysql_query("update products set product_price='".$_POST['price'][$i]."',tell='".$_POST['pays'][$i]."' where pid='".$_POST['pid'][$i]."' ");
/*echo "<script> alert('تم اضافة كمية جديدة لكمية مجودة مسبقاً بالمخزن');</script>";*/
} else {
include 'dbcon/dbcons.php';
$pid=$_POST['pid'];
  $product_name=$_POST['product_name'];
  $unit=$_POST['unit'];
  $qty=$_POST['qty'];
  $price=$_POST['price'];
  $pays=$_POST['pays'];
  //=$_POST['sum2'];
  //$date=$_POST['date'];
  $datefrom=$_POST['datefrom'];
  $stores=$_POST['stores'];
       for ($i = 0; $i < count($pid); $i++) {
        $sql = "INSERT INTO products (pid, product_name, unit,product_price,product_stock,p_status,tell) " .
                             " VALUES ('$pid[$i]','$product_name[$i]','$unit[$i]','$price[$i]' ,'1000000','0','$pays[$i]' )";
        //$conn is the name of your connection string
        $results = mysqli_query($conn, $sql);
        if (!$results) {
         //   echo "Error: " . $sql . "<br>" . $query->error;
        }
}}}}}}?>
