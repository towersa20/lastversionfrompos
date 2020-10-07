<?php
                                                 /**مؤسسة برجي التقني للإتصالات وتقنية المعلومات**/
                                                        /*** توثيق الكود البرمجي ***/
//توثيق كود تسجيل الدخول


//كود الإتصال بقاعدة البيانات 
include('System/dbcon/dbcon.php');

/*

//كود تفعيل برنامج المبيعات
$month=date('m')+1;
// كود تفعيل النسخة المؤقتة بإستخدام دالة التشفيرة أحادية الإتجاه md5
$add=mysql_query("insert into expires values('0','$month',MD5('112233445566'),now())");
//كود
$sql=mysql_query("select * from expires");
$row=mysql_fetch_array($sql);

// مقارنة التاريخ الحالي مع التاريخ المفعل بقاعدة البيانات
if($row['months']>=$month)
{*/
 ?>
 
 <!DOCTYPE html>
<html lang="en">
    
<head>
<?php /**الكود أدناه يقوم بتفعيل خاصية الوضع الذكي ليعمل البرنامج علي جميع الأجهزة***/?>
        <meta charset="utf-8" />

        <!-- الكود ادناه يقوم بإظاهر العنوان في أعلي الشاشة !-->
        <title>تسجيل دخول</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="برجي التقني" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

   
   
    <!-- مكتبات التصميم الخاصة بواجهات البرنامج-->
    <!-- دليل روابط التصميم  -->
    <!-- الكود أدناه يضع شعار الشركة علي أعلي قائمة متصفح الأنترنت في وضع والويب وعلي رابط البحث في وضع الهاتف وعلي عنوان الشاشة في وضع البرنامج التنفيذي!-->

    <link rel="shortcut icon" href="System/file/logo.png">
    <link href="font/font_face.css" rel="stylesheet" type="text/css">
    <link href="font/mystyle.css" rel="stylesheet" type="text/css">
   
    <!--  الروابط أدناه خاصة بضبط الهاتف الجوال علي البرنامج!-->
    <link href="System/green-rtl/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="System/green-rtl/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="System/green-rtl/assets/css/app.min.css" rel="stylesheet" type="text/css" />
  <!-- نهاية كود استدعاء المكتبات-->

    </head>

    

      <!-- جسم الصفحة-->

    <body style="font-family: 'Droid Arabic Kufi';" class="authentication-bg bg-gradient">

            <div class="account-pages mt-5 pt-5 mb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card bg-pattern">
    
                               
           <!-- كود صفحة تسجيل الدخول-->
                                <div class="card-body p-4">
                                    
                                    <div class="text-center w-75 m-auto">
                                        <a href="login.php">
                                            <span><img src="System/file/logo.png" style="width:180px; height:105px;" alt="" height="10"></span>
                                        </a>
    <h5 style="font-family: 'Droid Arabic Kufi';" class="text-uppercase text-center font-bold mt-1"><strong>نظام إدارة المبيعات</strong></h5>

                                    </div>
    
                                    <form action="log.php" method="POST" enctype="multipart/form-data" > 
    
          <div class="form-group mb-3">
          <input class="form-control" minlength="3"
           maxlength="12" title="أضف أسم المستخدم" autofocus autocomplete="off"  name="username" type="text"  id="username" required="" placeholder="إسم المستخــــدم">
          </div>
    
                                        <div class="form-group mb-3">
                                     
         <input class="form-control" autocomplete="off" name="password" type="password" required="" id="password" placeholder="أضف كلمة المرور">
                                        </div>
    
    
                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-gradient btn-block" name="ok" style="font-family: 'Droid Arabic Kufi';" type="submit"> تسجيل دخول <i class=" fas fa-user-lock "></i></button>
                                        </div>
                                        <BR>
                                
                                    </form>
</div>
    </div>
        </div> 
            </div>
<!-- نهاية كود الجدول !-->
</div>
            </div>
        <script src="System/green-rtl/assets/js/vendor.min.js"></script>

        <script src="System/green-rtl/assets/js/app.min.js"></script>
        
    <!-- نهاية كود جافا سكربت-->
    </body>
  <!-- نهاية الجزء المتعلق بكود التصميم -->

</html>
<?php /*
  // شرط إنتهاء التفعيل التجريبي للبرنامج
//echo "<script> alert('إنتهت فترة الإستخدام التجريبي');</script>";
}?>

<?php

// عن الضغط علي تسجيل دخول يقوم بارسال المتغيرات عن طريق الرمز Ok --!>
/*
if(isset($_POST['ok']))
{
 
//إستداء ملف الإتصال بقاعدة البيانات
include('System/dbcon/dbcon.php');

// دالة تحويل رقم التفغيل الي رقم مشفر 
$ser=MD5('$_POST[serial]');

// كود إستعراض مقارنة مفتاح التفعيل مع بيانات قاعدة البيانات

$sql=mysql_query("select * from expires where serial = '$ser'");
$row=mysql_fetch_array($sql);


// أدناه دالة تحويل القيمة المرسلة الي قيمة مشفرة باستخدام دالة md5

if($ser=MD5('$row[serial]'))
{
$mons=date('m')+1;
  $upx=mysql_query("update expires set months='$mons'");

//الكود ينفذ بعد تحقق العملية أعلاه بحيث يتم  التوجيه الي صفحة تسجيل الدخول
//  echo "<meta http-equiv='refresh' content='0;url=System/index.php'>";
//في حالة تم التفعيل يتم ارسال رسالة تنبيه بانه تم التفعيل
 // echo "<script> alert('تم التفعيل');</script>";
}
else
{
// في حالة لم يتم التفعيل يتم إرسالة بانه لم يتم التفعيل
 // echo "<script> alert('لم يتم التفعيـل');</script>";
  //نهاية الكود البرمجي
}}*/?>