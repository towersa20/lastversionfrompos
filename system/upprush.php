<?php
//ملف التصميم
include('header.php');?>




<?php
if(isset($_POST["ok"]))
{
 //كود تعديل بيانات المبيعات
include("dbcon/dbcon.php");
$up=mysql_query("update share set barco='$_POST[a]',name='$_POST[b]',unit='$_POST[c]',qunt='$_POST[d]',
price='$_POST[e]',sales='$_POST[f]',tax='$_POST[g]',totals='$_POST[h]',store='$_POST[i]',
date='$_POST[k]',customer='$_POST[l]',formid='$_POST[n]',tell='$_POST[xw]' where pid='$_GET[pid]'");
if($up)
{
 //شرط التحقق
echo "<script> alert ('تم تعديل الصنف');</script>";
echo "<meta http-equiv='refresh' content='0;url=vshare.php'>";
}
else
{
 // شرط التحقق
echo "<script> alert ('لم يتم تعديل الصنف');</script>";
echo "<meta http-equiv='refresh' content='0;url=vshare.php'>";

}}

else
{
 // كود عرض سجلات اصناف المشتريات المرسلة للتعديل
include("dbcon/dbcon.php");
$d=mysql_query("select*from share where pid='$_GET[pid]'");
$row=mysql_fetch_array($d);

// نهاية الكود
?>


  <!--- بداية فورم تعديل فاتورة مبيعات -->

 <div class="app-content content container-fluid">
<form name="form1" method="post" action="">
 <table style="width:100%; " align="center" class="table table-bordered table-hover  ">
    <tr>
    
    <td colspan="8">تعديل مشتريات صنف <i class="fa fa-shopping-basket"></i> </td>
    
    </tr>
    
    <tr>
    <td nowrap>باركــــــود</td>
    <td nowrap><input type="text" min="0"   value="<?php echo $row['barco'];?>" name="a" class="form-control big-shadow" required autocomplete="off"></td>
    
    <td nowrap>اسم الصنــف </td>
    <td nowrap colspan="5"><input type="text"   value="<?php echo $row['name'];?>" name="b" class="form-control big-shadow" required id="search" placeholder="اختر الصنــف" list="searchrt" autocomplete="off">
    <datalist id="searchrt">
        <?php include('dbcon/dbcon.php');
        // كود عرض سجلات الاصناف
           $brima=mysql_query("select * from item");
             	$res=mysql_fetch_array($brima);?>
    <option></option>
    
    <?php do { ?>
    <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
    <?php } while($res=mysql_fetch_array($brima));?>
    </datalist></td>

    </tr>

    <tr>
    
    <td nowrap>الوحــــدة</td>
    <td nowrap><input type="text" min="0"   value="<?php echo $row['unit'];?>" name="c" class="form-control big-shadow" required autocomplete="off"></td>
    
    
    <td nowrap>الكميـــــــــــــة </td>
    <td nowrap><input type="text" min="0"   value="<?php echo $row['qunt'];?>" name="d" class="form-control big-shadow" required autocomplete="off"></td>
    
    <td nowrap>السعــــــــر</td>
    <td nowrap><input type="text" min="0"   value="<?php echo $row['price'];?>"  name="e" class="form-control big-shadow" required autocomplete="off"></td>
    
    <td nowrap>البيــــــــــع</td>
    <td nowrap><input type="text" min="0"   value="<?php echo $row['sales'];?>"  name="f" class="form-control big-shadow" required autocomplete="off"></td>
    </tr>
    
    <tr>
    <td nowrap>الضريبـــة</td>
    <td nowrap><input type="number" min="0"  readonly=""  value="<?php echo $row['tax'];?>" name="g" class="form-control big-shadow" required autocomplete="off"></td>
    
    <td nowrap>الإجمالـــــــي </td>
    <td nowrap><input type="text" min="0"   readonly="" value="<?php echo $row['totals'];?>" name="h" class="form-control big-shadow" required autocomplete="off"></td>
    
    <td nowrap>المخــــــزن</td>
    <td nowrap><select name="i"  style="border: 0px; height: 38px;" class="form-control big-shadow" required>
	  <?php
   
   include("dbcon/dbcon.php");
   
   // كود عرض سجلات المخزن المرتبط بالفاتورة
	  $sq=mysql_query("select * from store");
	  $ro=mysql_fetch_array($sq);
	  ?>
	  
   <?php do { ?>
	  
   <option value="<?php echo $ro['name'];?>" style="color:#FFFFFF; " class="form-control big-shadow btn-black"><?php echo $ro['name'];?></option>
	 
  <?php }while($ro=mysql_fetch_array($sq));?>

  </select></td>
  <td nowrap>التاريـــــخ</td>
  <td nowrap><input type="date" min="0"   value="<?php echo $row['date'];?>"  name="k" class="form-control big-shadow" required autocomplete="off">
	 <input type="hidden" min="0"   value="<?php echo $row['enddate'];?>"  name="j" class="form-control big-shadow" required autocomplete="off"></td>
  </tr>
  
  
  <tr>
  <td nowrap>إسم المــورد</td>
  <td nowrap colspan="3"><input type="text"   name="l" value="<?php echo $row['customer'];?>" class="form-control big-shadow" required id="search" placeholder="اختر المورد" list="searchrcus" autocomplete="off">
  <datalist id="searchrcus">
  <?php include('dbcon/dbcon.php');
  // كود عرض سجلات الموردين المرتبطين بالفاتورة
		$brima=mysql_query("select * from customer");
		$res=mysql_fetch_array($brima);?>
  
  <option></option>
  
  <?php do { ?>
  <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
  <?php } while($res=mysql_fetch_array($brima));?>
  </datalist>
  </td>
  <td> الحالة</td>
  <td><input type="text"   name="xw" value="<?php echo $row['tell'];?>" class="form-control big-shadow" required id="search" placeholder="اختر الحالة" list="searrcus" autocomplete="off">
  <datalist id="searrcus">

  <option value="مشتريات">مشتريات</option>
  <option value="مرودات مشتريات">مردودات مشتريات</option>


  </datalist></td>
     
  <td nowrap>الفاتــورة </td>
  <td nowrap><input type="text" name="n"   style="border: 0px; color: red;" value="<?php echo $row['formid'];?>" class="form-control big-shadow" required autocomplete="off"></td>
  </tr>
    
  </table>
   <!--- نهاية فورم التعديل -->

 
 
 
   <!--- بداية جدول ازار التعديل والتنقل -->

    <table style="width:98%; " align="center" class="table table-borderd table-hover  animated flipInX">
    <tr>
      <td style="width: 16.6%;" nowrap>&nbsp;</td>
      <td style="width: 16.6%;" nowrap>&nbsp;</td>
      <td style="width: 16.6%;" nowrap>&nbsp;</td>
      <td style="width: 16.6%;" nowrap>&nbsp;</td>
    <td style="width: 16.6%;"><button type="submit" name="ok" class="btn btn-warning" style="width: 100%; font-family:'Droid Arabic Kufi';"> تعديـــل  <i class="fa fa-edit"></i></button></td>
        <td style="width: 16.6%;"><a href="index.php"> <button type="button" class="btn btn-primary" style="width: 100%; font-family:'Droid Arabic Kufi';"> النظام <i class="fa fa-home"></i></button></a></td></tr>
    </tr>
  </table>
   <!--- نهاية جدول ازار التعديل والتنقل -->

</form></div>
</body>
</html>
<?php
}?> 
<br>
<br>
<br>
<br>


  <!--- نهاية تعديل فاتورة المبيعات -->
