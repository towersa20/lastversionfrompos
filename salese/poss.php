<?php
// كود التحقق من صلاحية المستخدم 
session_start();
if(!isset($_SESSION["level"])) {
    echo 'عذراً تم تأمين النظام لايمكن الدخول من دون صلاحيات';
    echo "<meta http-equiv='refresh' content='0;url=../logout.php'>";
    exit;
//نهاية كود التحقق
}?>
                                                          
                                                          <!-- مؤسسة برجي التقني  للإتصالات وتقنية المعلومات!-->
                                                                        <!--نظام المبيعات!-->

<!-- كود شاشة المبيعات!-->


<!-- بداية الكود!-->

<html lang="en">
   <head>
        <meta charset="utf-8" />
        <!-- عنوان الصفحة!-->
<title>نظام مبيعات</title>

<!--ملفات تعريف البرنامج!-->

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="نظام إدارة مبيعات  من شركة برجي التقني" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- شعار البرنامج علي عنوان الشاشة -->
        <link rel="شعار النظام" href="green-rtl/image/logo.png" src="image/logo.png">
        <link rel="shortcut icon" href="green-rtl/image/logo.png" />
        <!-- ملفات التصميم سي اس اس -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />
        
        <link href="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
<!--  تعريف نوع الخط!-->

    <link href="font/font_face.css" rel="stylesheet" type="text/css">
    <link href="font/mystyle.css" rel="stylesheet" type="text/css">
    </head>

    <!--  جسم شاشة البرنامج!-->


    <body class="sidebar-disable enlarged" style="font-family: 'Droid Arabic Kufi';">

        <!-- بداية الصفحة شريط العنوان زو اللون الوردي -->
        <div id="wrapper">
       
            <!-- Topbar Start -->
            <div class="" style="background-color: #E80458;">
                <ul class="list-unstyled topnav-menu float-right mb-0">

                </ul>
                <!-- مكان لوضع الشعار -->
              
            </div>
            <!-- نهاية شريط العنوان الوردي -->
          
   
            <!-- ============================================================== -->
            <!-- الكود ادناه يمثل تنسيق شاشة المبيعت -->
            <!-- ============================================================== -->
            <br>
                <div class="content">
                    
                    <!-- بداية تسنيق قالب شاشة المبيعات-->
                    <div class="container-fluid">
                   
                    <div class="row">
                    
                         <div class="col-12">
               <!-- استدعاء شاشة المبيعات!-->

                <?php include("pos.php");?>
                <!-- نهاية شاشة المبيعات!-->

  
        <!-- ملفات جافا سكربت -->
        <script src="green-rtl/assets/js/vendor.min.js"></script>

         <script src="green-rtl/assets/libs/chart-js/Chart.bundle.min.js"></script>

        <script src="green-rtl/assets/js/pages/dashboard.init.js"></script>

        <!-- ملفات جافا سكربت لوضع تطبيقات الجوال -->
        <script src="green-rtl/assets/js/app.min.js"></script>
              
        <script src="green-rtl/assets/libs/switchery/switchery.min.js"></script>
        <script src="green-rtl/assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
        <script src="green-rtl/assets/libs/select2/select2.min.js"></script>
        <script src="green-rtl/assets/libs/jquery-mockjax/jquery.mockjax.min.js"></script>
        <script src="green-rtl/assets/libs/autocomplete/jquery.autocomplete.min.js"></script>
        <script src="green-rtl/assets/libs/bootstrap-select/bootstrap-select.min.js"></script>
        <script src="green-rtl/assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="green-rtl/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
        <script src="green-rtl/assets/libs/bootstrap-filestyle2/bootstrap-filestyle.min.js"></script>
        <script src="green-rtl/assets/js/pages/form-advanced.init.js"></script>
    </body>

</html>

<!-- كود تنفيذ عملية البيع!-->

  <!-- بداية كود المبيعات!-->

<?php 
// التحقق من الباركود مسمسي ب iNFO
if(isset($_POST['info']))
{

    // الاتصال بقاعدة البيانات
include('dbcon/dbcon.php');
    // عرض بيانات المخزن بشرط وجود الباركود
$sql=mysql_query("select * from storing where barco like '%$_POST[info]' or name='$_POST[info]'");
$row=mysql_fetch_array($sql);
// نهاية العرض

// بداية الحقول نتيجة البحث بالباركود
 $a1=$row['barco'];
 $a2=$row['name'];
 $a3=$row['price'];
 $a4=$row['qunt'];
 $a5=$row['unit'];
// نهاية الحقول المستدعاه من المخزن

//التحقق من الكمية بالمخزن
if($row['barco']=$_POST['info'] and $a4<=0)
{
    // ينفذ الكود في حال ان قيمة اصنف اقل من الواحد
    echo "<script type='text/javascript'>
    $(document).ready(function(){
    $('#centralModalSuccesd').modal('show');
    });
    </script>";
      //نهاية تنفيذ الشرط
    }
else
{

    //تعريق متغير زيادة الكمية بالمبيعات
    $qt=$row['qunt']+1;
    //تعريف متغيرات الخصم من المخزن
    $mt=$a4-1;
    //التحديث في قيمة المخزن بالنقص 1 قيمة من الحقل المراد
    $up=mysql_query("update storing set qunt='$mt'  where name='$a2' and barco='$a1'");
    // أضافة حقول الفاتورة الي جدول المبيعات
    $add=mysql_query("insert into sales values('','$_POST[b]','$a1','1','$a2','$a3','0','$a5',now()
    ,now(),'1','$_SESSION[uname]','$tax','$_SESSION[tell]')");
    //الرجوع الي شاشاة المبيعات    
  echo "<meta http-equiv='refresh' content='0;url=poss.php'>";
    //نهاية الكود البرمجي         
        }}?>
   <!-- نهاية كود المبيعات!-->
  
  
  
  
    <!-- بداية كود حذف صنف من الفاتورة!-->

  <?php 
  // شرط الحذف
  if(isset($_GET['del']))
  {
      // استدعاء قاعدة البيانات
      include('dbcon/dbcon.php');
      // عرض كل البيانات بقاعدة البيانات من المبيعات
      $sql=mysql_query("select * from sales where transaction_id='$_GET[del]' ");
      $row=mysql_fetch_array($sql);
      echo $row['product'];
      echo $row['qty'];
      // عرض بيانات المخزن
      $mx=mysql_query("select * from storing where barco='$row[product]'");
      $mi=mysql_fetch_array($mx);

      // تخزين البيانات في مخزن مؤقت 
      echo $xmx=$mi['qunt']+$row['qty'];
      // ارجاع البيانات في المخزن المؤقت الي المخزن
      $up=mysql_query("update storing set qunt='$xmx' where barco='$row[product]'");
            // حذف البيانات من المبيعات
      $add=mysql_query("delete from sales where transaction_id='$_GET[del]'");
      // التوجيه الي شاشاة المبيعات
    echo "<meta http-equiv='refresh' content='0;url=poss.php'>";

  }
?>
  <!-- نهاية كود حذف صنف من الفاتورة!-->



    <!-- بداية كود الحذف لكل الفاتورة!-->

<?php 
// شرط خذف الكل
if(isset($_GET['delete']))
{
// استدعاء قاعدة البيانت
include('dbcon/dbcon.php');
//الشرط الخاص بعرض قيمة الفاتورة بناء علي رقم الفاتورة
$sql=mysql_query("select * from sales where invoice='$_SESSION[SESS_MEMBER_ID]'  ");
$row=mysql_fetch_array($sql);
// استخراج القيمة الخاصة بالفاتورة لارجاعها الي المخزن
echo $row['product'];
echo $row['qty'];

// عرض البيانات المقابله في المخزن
$mx=mysql_query("select * from storing where barco='$row[product]'");
$mi=mysql_fetch_array($mx);
// تخزين مؤقت للقيمة المسترجعة
echo $xmx=$mi['qunt']+$row['qty'];
// ارجاع القيمة الي قاعدة بيانات المخزن
$up=mysql_query("update storing set qunt='$xmx' where barco='$row[product]'");

if($up) {
    // حذف الفاتورة
    $sql=mysql_query("delete from sales where invoice='$_SESSION[SESS_MEMBER_ID]'");
    
    //التوجيه
    echo "<script type='text/javascript'>
    $(document).ready(function(){
    $('#centralModalSuccess').modal('show');
    });
    </script>";
      }
      }
      ?>
  <!-- نهاية كود حذف الكل!-->


<!-- بداية كود المرتجعات!-->
<?php 
if(isset($_GET['back']))
{
    // كود الاتصال بقاعدة البيانات
    include('dbcon/dbcon.php');
    // تحديث قيمة المبيعات الي مرتجعات
    $my=mysql_query("update sales set type='3' where invoice='$_SESSION[SESS_MEMBER_ID]' ");
    // التنبيه بالعملية
    echo "<Script>alert('تم استرجاع الفاتورة');</script>";
    //التوجيه الي شاشة المبيعات
    echo "<meta http-equiv='refresh' content='0;url=poss.php'>";
    
}
?>
  <!-- نهاية كود المرتجعات!-->
<!-- نهاية الكود البرمجي!-->

 <!-- Central Modal Medium Success -->
 <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-success" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <p class="heading lead">نظام المبيعات</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
           <i class="fas fa-times fa-4x mb-3 animated rotateIn"></i>
           <p>تم حذف الفاتورة  بنجاح</p>
         </div>
       </div>

       <!--Footer-->
       <div class="modal-footer justify-content-center">
         <a href="exe.php" type="button" class="btn btn-Primary waves-effect" style="width: 50%; font-family: 'Droid Arabic Kufi';" data-dismiss="">موافـق <i class=" fas fa-user-shield "></i></a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->





 <!-- نهاية الكود البرمجي!-->

 <!-- Central Modal Medium Success -->
 <div class="modal fade" id="centralModalSuccesd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-success" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <p class="heading lead">نظام المبيعات</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
           <i class="fas fa-times fa-4x mb-3 animated rotateIn"></i>
           <p>الكمية المطلوبة غير متوفرة</p>
         </div>
       </div>

       <!--Footer-->
       <div class="modal-footer justify-content-center">
         <a href="exe.php" type="button" class="btn btn-Primary waves-effect" style="width: 50%; font-family: 'Droid Arabic Kufi';" data-dismiss="">موافـق <i class=" fas fa-user-shield "></i></a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->


 
<?php 
if(isset($_GET['maxi']))
{
include('dbcon/dbcon.php');
$sql=mysql_query("select * from storing where barco='$_GET[maxi]'");
$row=mysql_fetch_array($sql);
echo $qqq=$row['qunt'];
//echo "<Script> alert('تم الحفظ')</script>";

//$up=mysql_query("update sales set qty='$xv' where product = '$_GET[add]'");


}
?>


<?php 
if(isset($_POST['okpos']))
{
    include('dbcon/dbcon.php');
    
$barco=(rand(1,999999999999));

echo $barco;
    $it1=$_POST['it1'];
    $it2=$_POST['it2'];
    $it3=$_POST['it3'];
    $it5=$_POST['it5'];

    $addnew=mysql_query("insert into sales values('','$it5','$barco','$it2','$it1','$it3','0','قطعة',now(),now(),'1','$_SESSION[uname]','0','$_SESSION[tell]')");
    
    echo "<meta http-equiv='refresh' content='0;url=poss.php'>";
}
?>



<?php
if(isset($_GET['unknown']))
{
    include('dbcon/dbcon.php');
    
$barco=(rand(1,999999999999));

echo $barco;
    $unknown=$_GET['unknown'];
    $ks1=$_GET['ks1'];


    $addnew=mysql_query("insert into sales values('','$_SESSION[SESS_MEMBER_ID]','$barco','1','$ks1','$unknown','0','قطعة',now(),now(),'1','$_SESSION[uname]','0','$_SESSION[tell]')");
    
    echo "<meta http-equiv='refresh' content='0;url=poss.php'>";

}?>