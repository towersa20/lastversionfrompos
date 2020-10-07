<?php
// استدعاء قاعدة البيانات
include("dbcon/dbcon.php");
//عرض بيانات الفاتورة المخزن بشاشة المبيعات
$nx=mysql_query("select * from vat");
$mx=mysql_fetch_array($nx); 
 $tax=$mx['tax'];
//نهاية الكود
?><?php
// بداية التحقق من صحة البيانات
session_start();
if(!isset($_SESSION["level"])) {
    echo 'عذراً تم تأمين النظام لايمكن الدخول من دون صلاحيات';
    echo "<meta http-equiv='refresh' content='0;url=logout.php'>";
    exit;
    // نهاية كود التحقق
}?>


<?php 
// عرض الشعار
include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);
  
    ?>

<script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/order.js"></script>

    <script>
                                function goBack() {
                                    window.history.back();
                                }
                            </script>
                                <style>
        .badge {
            position: absolute;
            top: 10px;
            right: 170px;
            padding: 5px 10px;
            border-radius: 50%;
            background: red;
            color: #fff;
        }

        .blink_me {
            animation: blinker 1s linear infinite;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }
    </style>
<html lang="en">
    
<head>

        <meta charset="utf-8" />
        <title>نظام مبيعات </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="نظام" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- وضع شعار المؤسسة -->
        <link rel="شعار النظام" href="green-rtl/image/logo.png" src="image/logo.png">
        <link rel="shortcut icon" href="green-rtl/image/logo.png" />
     
        <!-- إدارج مكتبات التصميم -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />   
        <link href="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />

        <!-- إدارج مكتبات الخطوط -->

    <link href="font/font_face.css" rel="stylesheet" type="text/css">
    <link href="font/mystyle.css" rel="stylesheet" type="text/css">
    </head>

    <body oncontextmenu="return false;" style="font-family: 'Droid Arabic Kufi';">

        <!-- بداية جسم النافذة -->
            <!-- Begin page -->
        <!-- Begin page -->
 
            
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">
              </ul>
                <!-- وضع الشعار -->
                <div class="logo-box">
    
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
              
                    &nbsp;
                    <li class="d-none d-sm-block">
                        <a  class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <button data-toggle="modal" data-target="#exampleModal" type="button" class="form-control" > إغــــلاق</button>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fa fa-user"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
</a>
                    </li>
                </ul>
            </div>
            <!-- نهاية شريط العنوان -->
          
            <!-- ========== بداية القائمة الجانبيه ========== -->
   </div>  
                            
                            </div>        <!-- End Sidebar -->
                            <br>     <br>     <br>     <br>     
    
                   
                    <div class="ؤخى">
                                  <div class="card-box">
              
                 

  
        <!-- روابط مكتبات التصميم والتنسيق -->
        <script src="green-rtl/assets/js/vendor.min.js"></script>
        <script src="green-rtl/assets/libs/chart-js/Chart.bundle.min.js"></script>
        <script src="green-rtl/assets/js/pages/dashboard.init.js"></script>
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
   
        <!-- نهاية الملف -->
       
        <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">تسجيل خروج <i class=" fas fa-user-shield "></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div align="center" class="modal-body">
        هل تريد إغلاق النظام
      </div>
      <div class="modal-footer">
        <button style="width: 180px;" type="button" class="btn btn-primary" data-dismiss="modal"><i class="  fas fa-user-shield  "></i> لا</button>
      <a href="logout.php">  <button style="width: 180px;" type="button" class="btn btn-danger"><i class=" fas fa-user-check "></i>  نعم</button></a>
      </div>
    </div>
  </div>
</div>