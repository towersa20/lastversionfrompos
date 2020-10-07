<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php 
//بداية كود حذف سجل من جدول المستخدمين
if(isset($_GET['id']))
{
  // تعريف المتغير
  $id=$_GET['id'];
  // الاتصال بقاعدة البيانات
	include('dbcon/config.php');
  //كود الحذف
$del=mysql_query("delete from users where id ='$_GET[id]'");
if($del)
{
  // شرط التحقق
echo "<script> alert ('تم حذف المستخدم');</script>";
echo "<meta http-equiv='refresh' content='0;url=user.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف المستخدم');</script>";
echo "<meta http-equiv='refresh' content='0;url=user.php'>";
}}
// نهاية الكود البرمجي
?>


<?php 
//x2
if(isset($_GET['infoprod']))
{
  $infoprod=$_GET['infoprod'];
    // الاتصال بقاعدة البيانات

	include('dbcon/config.php');
$del=mysql_query("delete from products where prid ='$_GET[infoprod]'");
if($del)  // شرط التحقق

{
echo "<script> alert ('تم حذف الصــنف');</script>";
echo "<meta http-equiv='refresh' content='0;url=item.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف التصنيف');</script>";
echo "<meta http-equiv='refresh' content='0;url=item.php'>";
// نهاية الكود البرمجي
}}
?>


<?php 
//بداية كود حذف سجل من جدول الاصناف

if(isset($_GET['prodid']))
{
  $prodid=$_GET['prodid'];
  // الاتصال بقاعدة البيانات
	include('dbcon/config.php');
$del=mysql_query("delete from products where pid ='$_GET[prodid]'");
if($del)
{
echo "<script> alert ('تم حذف الصــنف');</script>";
echo "<meta http-equiv='refresh' content='0;url=item.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف التصنيف');</script>";
echo "<meta http-equiv='refresh' content='0;url=item.php'>";
// نهاية الكود البرمجي

}}
?>



<?php 
//بداية كود حذف سجل من جدول المبيعات

if(isset($_GET['epoid']))
{
  $epoid=$_GET['epoid'];
  // الاتصال بقاعدة البيانات
	include('dbcon/config.php');
$del=mysql_query("delete from info where id ='$_GET[epoid]'");
if($del)
{   // شرط التحقق

echo "<script> alert ('تم حذف الصــنف');</script>";
echo "<meta http-equiv='refresh' content='0;url=vsales.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف التصنيف');</script>";
echo "<meta http-equiv='refresh' content='0;url=vsales.php'>";
}}
?>

<?php 
//بداية كود حذف سجل من جدول المبيعات

if(isset($_GET['epoid2']))
{
  $epoid2=$_GET['epoid2'];
  // الاتصال بقاعدة البيانات
	include('dbcon/config.php');
$del=mysql_query("delete from info where formatid ='$_GET[epoid2]'");
if($del)
{
echo "<script> alert ('تم حذف الفاتورة');</script>";
echo "<meta http-equiv='refresh' content='0;url=vsales.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف الفاتورة');</script>";
echo "<meta http-equiv='refresh' content='0;url=vsales.php'>";
// نهاية الكود البرمجي

}}
?>




<?php
//بداية كود حذف سجل من جدول المصروفات

//x4
if(isset($_GET['xid']))
{
  $xid=$_GET['xid'];
  // الاتصال بقاعدة البيانات
	include('dbcon/config.php');
$del=mysql_query("delete from exp where xid ='$_GET[xid]'");
if($del)
{
echo "<script> alert ('تم حذف التصنيف');</script>";
echo "<meta http-equiv='refresh' content='0;url=exp.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف التصنيف');</script>";
echo "<meta http-equiv='refresh' content='0;url=exp.php'>";
// نهاية الكود البرمجي
}}
?>



<?php 
///بداية كود حذف سجل من جدول سجلات المصروفات

if(isset($_GET['exid']))
{
  $exid=$_GET['exid'];
  // الاتصال بقاعدة البيانات
	include('dbcon/config.php');
$del=mysql_query("delete from expn where exid ='$_GET[exid]'");
if($del)
{   // شرط التحقق

echo "<script> alert ('تم حذف المصروف');</script>";
echo "<meta http-equiv='refresh' content='0;url=expn.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف المصروف');</script>";
echo "<meta http-equiv='refresh' content='0;url=expn.php'>";
}}
?>




<?php 
//بداية كود حذف سجل من جدول المصروفات

if(isset($_GET['exids']))
{
  $exids=$_GET['exids'];
	  // الاتصال بقاعدة البيانات
include('dbcon/config.php');
$del=mysql_query("delete from expn where exid ='$_GET[exids]'");
if($del)
{
echo "<script> alert ('تم حذف المصروف');</script>";
echo "<meta http-equiv='refresh' content='0;url=vexpn.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف المصروف');</script>";
echo "<meta http-equiv='refresh' content='0;url=vexpn.php'>";
// نهاية الكود البرمجي

}}
?>




<?php 
//بداية كود حذف سجل من جدول البنوك

if(isset($_GET['bid']))
{
  $bid=$_GET['bid'];
  // الاتصال بقاعدة البيانات
	include('dbcon/config.php');
$del=mysql_query("delete from bank where bid ='$_GET[bid]'");
if($del)
{
echo "<script> alert ('تم حذف البنكـ');</script>";
echo "<meta http-equiv='refresh' content='0;url=bank.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف البنكـ');</script>";
echo "<meta http-equiv='refresh' content='0;url=bank.php'>";
}}
?>


<?php 
//بداية كود حذف سجل من جدول الوظائف

if(isset($_GET['jid']))
{
  $jid=$_GET['jid'];
  // الاتصال بقاعدة البيانات
	include('dbcon/config.php');
$del=mysql_query("delete from job where jid ='$_GET[jid]'");
if($del)
{  // شرط التحقق

echo "<script> alert ('تم حذف الوظيفة');</script>";
echo "<meta http-equiv='refresh' content='0;url=job.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف الوظيفة');</script>";
echo "<meta http-equiv='refresh' content='0;url=job.php'>";
// نهاية الكود البرمجي
}}
?>



<?php 
//بداية كود حذف سجل من جدول العملاء

if(isset($_GET['cid']))
{
  $cid=$_GET['cid'];
	  // الاتصال بقاعدة البيانات
include('dbcon/config.php');
$del=mysql_query("delete from customer where cid ='$_GET[cid]'");
if($del)
{
echo "<script> alert ('تم حذف المورد');</script>";
echo "<meta http-equiv='refresh' content='0;url=cust.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف المورد');</script>";
echo "<meta http-equiv='refresh' content='0;url=cust.php'>";
// نهاية الكود البرمجي

}}
?>

<?php 
//بداية كود حذف سجل من جدول العملاء
if(isset($_GET['cids']))
{
  $cids=$_GET['cids'];
	  // الاتصال بقاعدة البيانات
include('dbcon/config.php');
$del=mysql_query("delete from customer where cid ='$_GET[cids]'");
if($del)
{
echo "<script> alert ('تم حذف المورد');</script>";
echo "<meta http-equiv='refresh' content='0;url=vcustomer.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف المورد');</script>";
echo "<meta http-equiv='refresh' content='0;url=vcustomer.php'>";
// نهاية الكود البرمجي
}}
?>




<?php 
//بداية كود حذف سجل من جدول الموظفين
if(isset($_GET['eid']))
{
  $eid=$_GET['eid'];
	  // الاتصال بقاعدة البيانات
include('dbcon/config.php');
$del=mysql_query("delete from emp where eid ='$_GET[eid]'");
if($del)
{  // شرط التحقق

echo "<script> alert ('تم حذف الموظف');</script>";
echo "<meta http-equiv='refresh' content='0;url=emp.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف الموظف');</script>";
echo "<meta http-equiv='refresh' content='0;url=emp.php'>";
// نهاية الكود البرمجي
}}
?>


<?php 
//بداية كود حذف سجل من جدول الموظفين

if(isset($_GET['eids']))
{
  $eids=$_GET['eids'];
  // الاتصال بقاعدة البيانات
	include('dbcon/config.php');
$del=mysql_query("delete from emp where eid ='$_GET[eids]'");
if($del)
{
echo "<script> alert ('تم حذف الموظف');</script>";
echo "<meta http-equiv='refresh' content='0;url=vemp.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف الموظف');</script>";
echo "<meta http-equiv='refresh' content='0;url=vemp.php'>";
}}
?>



<?php 
////بداية كود حذف سجل من جدول المرتبات

if(isset($_GET['salid']))
{
  $salid=$_GET['salid'];
  // الاتصال بقاعدة البيانات
	include('dbcon/config.php');
$del=mysql_query("delete from salary where salid ='$_GET[salid]'");
if($del)
{  // شرط التحقق

echo "<script> alert ('تم حذف المرتب');</script>";
echo "<meta http-equiv='refresh' content='0;url=vsal.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف المرتب');</script>";
echo "<meta http-equiv='refresh' content='0;url=vsal.php'>";
// نهاية الكود البرمجي
}}
?>



<?php 
//بداية كود حذف سجل من جدول المشتريات

if(isset($_GET['pids']))
{
  $pids=$_GET['pids'];
	  // الاتصال بقاعدة البيانات
include('dbcon/config.php');
$del=mysql_query("delete from share where pid ='$_GET[pids]'");
if($del)
{  // شرط التحقق

echo "<script> alert ('تم حذف الصنف');</script>";
echo "<meta http-equiv='refresh' content='0;url=move.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف الصنف');</script>";
echo "<meta http-equiv='refresh' content='0;url=move.php'>";
// نهاية الكود البرمجي
}}
?>


<?php 
//بداية كود حذف سجل من جدول المشتريات من سجلات العرض

if(isset($_GET['pid2']))
{
  $pid2=$_GET['pid2'];
	  // الاتصال بقاعدة البيانات
include('dbcon/config.php');
$del=mysql_query("delete from share where pid ='$_GET[pid2]'");
if($del)
{
echo "<script> alert ('تم حذف الصنف');</script>";
echo "<meta http-equiv='refresh' content='0;url=add_itemsearch.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف الصنف');</script>";
echo "<meta http-equiv='refresh' content='0;url=add_itemsearch.php'>";
}}
?>


<?php
//بداية كود حذف سجل من جدول اىسماء المخازن

if(isset($_GET['sid']))
{
  $sid=$_GET['sid'];
	  // الاتصال بقاعدة البيانات
include('dbcon/config.php');
$del=mysql_query("delete from store where sid ='$_GET[sid]'");
if($del)
{  // شرط التحقق

echo "<script> alert ('تم حذف المخزن');</script>";
echo "<meta http-equiv='refresh' content='0;url=store.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف المخزن');</script>";
echo "<meta http-equiv='refresh' content='0;url=store.php'>";
// نهاية الكود البرمجي
}}
?>

<?php 
//بداية كود حذف سجل من جدول العملاء

if(isset($_GET['prid']))
{
  $prid=$_GET['prid'];
	include('dbcon/config.php');
$del=mysql_query("delete from person where prid ='$_GET[prid]'");
if($del)
{
echo "<script> alert ('تم حذف العميـل');</script>";
echo "<meta http-equiv='refresh' content='0;url=customer.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف العميـل');</script>";
echo "<meta http-equiv='refresh' content='0;url=customer.php'>";
}}
?>


<?php 
//بداية كود حذف سجل من جدول تصنيف المستندات

if(isset($_GET['did']))
{
  $did=$_GET['did'];
	  // الاتصال بقاعدة البيانات
include('dbcon/config.php');
$del=mysql_query("delete from doc where did ='$_GET[did]'");
if($del)  // شرط التحقق

{
echo "<script> alert ('تم حذف السند');</script>";
echo "<meta http-equiv='refresh' content='0;url=vdoc.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف السند');</script>";
echo "<meta http-equiv='refresh' content='0;url=vdoc.php'>";
// نهاية الكود البرمجي
}}
?>



<?php 
////بداية كود حذف سجل من جدول المخزن

if(isset($_GET['xsid']))
{
  $xsid=$_GET['xsid'];
	include('dbcon/config.php');
$del=mysql_query("delete from storing where sid ='$_GET[xsid]'");
if($del)
{
echo "<script> alert ('تم حذف الصنف');</script>";
echo "<meta http-equiv='refresh' content='0;url=storing.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف الصنف');</script>";
echo "<meta http-equiv='refresh' content='0;url=storing.php'>";
}}
?>

<?php 
//بداية كود حذف سجل من جدول التخزين
if(isset($_GET['xsid2']))
{
  $xsid2=$_GET['xsid2'];
	  // الاتصال بقاعدة البيانات
include('dbcon/config.php');
$del=mysql_query("delete from storing where sid ='$_GET[xsid2]'");
if($del)  // شرط التحقق

{
echo "<script> alert ('تم حذف الصنف');</script>";
echo "<meta http-equiv='refresh' content='0;url=vstore.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف الصنف');</script>";
echo "<meta http-equiv='refresh' content='0;url=vstore.php'>";
}}
?>


<?php 
//بداية كود حذف سجل من جدول الوحدات

if(isset($_GET['yid']))
{
  $yid=$_GET['yid'];
	include('dbcon/config.php');
$del=mysql_query("delete from unitz where yid ='$_GET[yid]'");
if($del)
{  // شرط التحقق

echo "<script> alert ('تم حذف الوحدة');</script>";
echo "<meta http-equiv='refresh' content='0;url=unit.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف الوحدة');</script>";
echo "<meta http-equiv='refresh' content='0;url=unit.php'>";
}}
?>

<?php 
//بداية كود حذف سجل من جدول الضريبة

if(isset($_GET['vatid']))
{
  $vatid=$_GET['vatid'];
  // الاتصال بقاعدة البيانات
	include('dbcon/config.php');
$del=mysql_query("delete from vat where vid ='$_GET[vatid]'");
if($del)
{  // شرط التحقق

echo "<script> alert ('تم حذف الضريبة');</script>";
echo "<meta http-equiv='refresh' content='0;url=vat.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف الضريبة');</script>";
echo "<meta http-equiv='refresh' content='0;url=vat.php'>";
}}
?>






<?php 
////بداية كود حذف سجل من جدول الدفع
if(isset($_GET['pxid']))
{
//$xname=$_POST['xname'];
  $pxid=$_GET['pxid'];
	include('dbcon/config.php');
$del=mysql_query("delete from payment where pxid ='$_GET[pxid]'");
if($del)
{
    // شرط التحقق

echo "<script> alert ('تم حذف الصنف');</script>";
echo "<meta http-equiv='refresh' content='0;url=custompayment.php'>";
}

else
{
echo "<script> alert ('لم يتم حذف الصنف');</script>";
echo "<meta http-equiv='refresh' content='0;url=custompayment.php'>";
// نهاية الكود البرمجي
}}
?>


<?php 
//بداية كود حذف سجل من جدول الدفع

if(isset($_GET['pxid2']))
{
//$xname=$_POST['xname'];
  $pxid2=$_GET['pxid2'];
	  // الاتصال بقاعدة البيانات
include('dbcon/config.php');
$del=mysql_query("delete from payment where pxid ='$_GET[pxid2]'");
if($del)
{
echo "<script> alert ('تم حذف سجل السداد');</script>";
echo "<meta http-equiv='refresh' content='0;url=vpayment.php'>";
}
else
{
echo "<script> alert ('لم يتم سجل السداد');</script>";
echo "<meta http-equiv='refresh' content='0;url=vpayment.php'>";
// نهاية الكود البرمجي
}}
?>




<?php 
//بداية كود حذف سجل من جدول الدفع

if(isset($_GET['usd']))
{
//$xname=$_POST['xname'];
  $usd=$_GET['usd'];
	  // الاتصال بقاعدة البيانات
include('dbcon/config.php');
$del=mysql_query("delete from rep where id ='$_GET[usd]'");
if($del)
{
echo "<script> alert ('تم حذف المندوب');</script>";
echo "<meta http-equiv='refresh' content='0;url=preson.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف المندوب');</script>";
echo "<meta http-equiv='refresh' content='0;url=preson.php'>";
// نهاية الكود البرمجي
}}
?>







<?php 
//بداية كود حذف سجل من جدول الدفع

if(isset($_GET['paymentid']))
{
//$xname=$_POST['xname'];
  $paymentid=$_GET['paymentid'];
	  // الاتصال بقاعدة البيانات
include('dbcon/config.php');
$del=mysql_query("delete from custpayment where id ='$_GET[paymentid]'");
if($del)
{
echo "<script> alert ('تم حذف البيانات');</script>";
echo "<meta http-equiv='refresh' content='0;url=endcust.php'>";
}
else
{
echo "<script> alert ('لم يتم حذف البيانات');</script>";
echo "<meta http-equiv='refresh' content='0;url=endcust.php'>";
// نهاية الكود البرمجي
}}
?>


<?php
////بداية كود حذف سجل من جدول المبيعات
if(isset($_GET['idexxx']))
{
  // الاتصال بقاعدة البيانات
	include('connects.php');
	$idxxx=$_GET['idxxx'];
	$c=$_GET['invoice'];
	$sdsd=$_GET['dle'];
	$qty=$_GET['qty'];
	$wapak=$_GET['code'];
	//edit qty
	$sql = "UPDATE storing 
			SET qunt=qunt+?
			WHERE barco=?";
	$q = $db->prepare($sql);
	$q->execute(array($qty,$wapak));

	$result = $db->prepare("DELETE FROM sales_order WHERE transaction_id= :memid");
	$result->bindParam(':memid', $idxxx);
	$result->execute();
	header("location: search.php");
}// نهاية الكود البرمجي

?>

