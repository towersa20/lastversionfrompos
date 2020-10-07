<?php
// بداية التحقق من صحة البيانات
session_start();
if(!isset($_SESSION["level"])) {
    echo 'عذراً تم تأمين النظام لايمكن الدخول من دون صلاحيات';
    echo "<meta http-equiv='refresh' content='0;url=../logout.php'>";
    exit;
    // نهاية كود التحقق
}?>

<html lang="en">
    
<head>
        <meta charset="utf-8" />
        <title>نظام مبيعات <?php echo $_SESSION['tell'];?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="نظام إدارة مبيعات  من شركة برجي التقني" name="description" />
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

    <body style="font-family: 'Droid Arabic Kufi';">

        <!-- بداية جسم النافذة -->
            <!-- Begin page -->
        <!-- Begin page -->
 
            
            <!-- Topbar Start -->
            <div class="navbar-custom">
                <ul class="list-unstyled topnav-menu float-right mb-0">
              </ul>
                <!-- وضع الشعار -->
                <div class="logo-box">
                    <a href="index.php" class="logo text-center">
                        <span class="logo-lg">
                            <img src="green-rtl/image/logo.png"  height="16">
                        </span>
                        <span class="logo-sm">
                            <img src="green-rtl/image/logo.png"  height="28">
                        </span>
                    </a>
                </div>

                <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                    <li>
                        <button class="button-menu-mobile waves-effect waves-light">
                            <i class="fe-menu"></i>
                        </button>
                    </li>
        
                    <li class="d-none d-sm-block">
                        <form action="sales_search.php" method="POST" class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control text-info" placeholder="بحث عن">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fe-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>

                </ul>
            </div>
            <!-- نهاية شريط العنوان -->
          
            <!-- ========== بداية القائمة الجانبيه ========== -->
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- قائمة محتويات الشاشة -->
                    <div id="sidebar-menu" style="font-family: 'Droid Arabic Kufi';">

                        <ul class="metismenu" id="side-menu">


                            <li>
                                <a href="datas.php">
                                    <i class="mdi mdi-widgets"></i>
                                    <span style="font-family: 'Droid Arabic Kufi';"> لوحة التحكـــــــم </span>
                                </a>
                            </li>

                    <!--        <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-view-dashboard"></i>
                                    <span style="font-family: 'Droid Arabic Kufi';"> إدارة الأصنـــــاف</span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="item.php">بيانــــــــــــات الأصناف</a></li>
                                    <li><a href="item_select.php">إستعلامات الأصناف</a></li>
                                    <li><a href="item_report.php">تقاريـــــــــــــر الأصناف</a></li>
                                   
                                </ul>
                            </li>-->

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span style="font-family: 'Droid Arabic Kufi';"> إدارة المشتريات </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="move.php">تسجيـــل مشتريات</a></li>
                                    <li><a href="add_itemsearch.php">إستعلام مشتريات</a></li>
                                    <li><a href="add_report.php">تقاريــــــر مشتريات</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-bar-chart-2"></i>
                                    <span style="font-family: 'Droid Arabic Kufi';"> إدارة المبيعــــات </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="exe.php">المبيعـــــــــــــــــــــات</a></li>
                                        <li><a href="sales_search.php">إستـعلام مبيعــات</a></li>
                                        <li><a href="salesinfo.php">تقاريــــــــر مبيعــات</a></li>
                                </ul>
                            </li>

                            <li>
                                    <a href="javascript: void(0);">
                                        <i class="fas fa-boxes"></i>
                                        <span style="font-family: 'Droid Arabic Kufi';"> إدارة المخــــــــزن </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                            <li><a href="storing.php">بيانـــــــــات المخزن</a></li>
                                            <li><a href="mstor.php">حركـــــــــــة المخزن</a></li>
                                            <li><a href="vstore.php">إستعـــلام المخزن</a></li>
                                            <li><a href="rselect1.php">تقاريـــــــــر المخزن</a></li>
                                    </ul>
                                </li>

                     <!--           
                            <li><a href="javascript: void(0);">
                                        <i class="fas fa-boxes"></i>
                                        <span style="font-family: 'Droid Arabic Kufi';"> إدارة المخـــــزن (B) </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="torder.php">إدارة المخــــــــزن B</a></li>
                                    <li><a href="preson.php">إدارة المناديــــــــــــب</a></li>
                                            <li><a href="del.php">إدارة الطلبيــــــــــــات</a></li>
                                            <li><a href="search.php">إستعلامات التوصيل</a></li>
                                            <li><a href="select1.php">تقارير التوصيـــــــــــــل</a></li>
                                    </ul>
                                
                                </li>-->
                       
                            <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-finance"></i>
                                    <span  style="font-family: 'Droid Arabic Kufi';"> إدارة التقاريــــــر </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="item_report.php">تقارير الأصنــاف</a></li>
                                        <li><a href="salesinfo.php">تقارير المبيعات</a></li>
                                        <li><a href="storereprt.php">تقارير المخـــــزن</a></li>
                                        <li><a href="add_report.php">تقارير المشتريات</a></li>
                                        <li><a href="tax.php">تقرير الضريبـــــة</a></li>
                                                          
                                </ul>
                            </li>

                            <li class="menu-title mt-2">إدارة العمليات</li>

                            <li>
                                    <a href="javascript: void(0);">
                                        <i class="mdi mdi-scatter-plot"></i>
                                        <span style="font-family: 'Droid Arabic Kufi';"> تقاريـــــــــر الاداء </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="day.php">سجل المستخدم</a></li>
                                    <li><a href="day1.php">تقرير اليــــــــــــوم</a></li>
                                    </ul>
                                </li>

             
                
                            <li>
                                <a href="backup.php">
                                    <i class="mdi mdi-database"></i>
                                    <span style="font-family: 'Droid Arabic Kufi';"> نسخ إحتياطـــي</span>
                                </a>
                              
                            </li>


                            <li>
                                <a href="logout.php" onclick="return confirm('هل تريد الخروج');">
                                    <i class="mdi mdi-exit-to-app"></i>
                                    <span  style="font-family: 'Droid Arabic Kufi';"> تسجيـــــل خروج </span>
                                </a>
                             
                            </li>
                        </ul>
                    </div></div>  
                              
                    </div></div>          <!-- End Sidebar -->
      <br>     
    
            <div class="content-page">
                <div class="content">
                    
                    <!-- Start Content-->
                    <div class="container-fluid">
                   
                    <div class="row">
                            <div class="col-12">
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
