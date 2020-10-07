<?php
// بداية التحقق من صحة البيانات
session_start();
if(!isset($_SESSION["level"])) {
    echo 'عذراً تم تأمين النظام لايمكن الدخول من دون صلاحيات';
    echo "<meta http-equiv='refresh' content='0;url=../logout.php'>";
    exit;
    // نهاية كود التحقق
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>نظام مبيعات</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="نظام إدارة مبيعات من شركة برجي التقني" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- جزء وضع الشعار علي العنوان -->
    <link rel="شعار النظام" href="green-rtl/image/logo.png" src="image/logo.png">
    <link rel="shortcut icon" href="green-rtl/image/logo.png" />
    <!-- جزء مكتبات التصميم والتنسيق -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

    <link href="font/font_face.css" rel="stylesheet" type="text/css">
    <link href="font/mystyle.css" rel="stylesheet" type="text/css">
</head>

<body style="font-family: 'Droid Arabic Kufi';">

    <!-- بداية جسم البرنامج -->
    <div id="wrapper">


        <!-- شريط العنوان -->
        <div class="navbar-custom" style="height: 70px">
            <ul class="list-unstyled topnav-menu float-right mb-0">

            </ul>
            <!-- شعار المؤسسة -->
            <div class="logo-box">
                <a href="index.php" class="logo text-center">
                    <span class="logo-lg">
                        <img src="green-rtl/image/logo.png" alt="" height="16">
                    </span>
                    <span class="logo-sm">
                        <img src="green-rtl/image/logo.png" alt="" height="28">
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
                    <form class="app-search" action="sales_search.php" method="POST">
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
        <!-- بداية قائمة روابط النظام -->

        <!-- ========== قائمة روابط مكونات النظام ========== -->
        <div class="left-side-menu">

            <div class="slimscroll-menu">

                <!--- قائمة المحتويات -->
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

                        <!--     <li><a href="javascript: void(0);">
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
                                <span style="font-family: 'Droid Arabic Kufi';"> إدارة التقاريــــــر </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="item_report.php">تقارير الأصنــاف</a></li>
                                <li><a href="salesinfo.php">تقارير المبيعات</a></li>
                                <li><a href="storereprt.php">تقارير المخـــــزن</a></li>
                                <li><a href="add_report.php">تقارير المشتريات</a></li>
                                <li><a href="tax.php">تقرير الضريبـــــــــــة</a></li>

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
                                <span style="font-family: 'Droid Arabic Kufi';"> تسجيـــــل خروج </span>
                            </a>

                        </li>
                    </ul>

                </div>
                <div class="clearfix"></div>

            </div>

        </div>

        <!-- ============================================================== -->
        <!-- زيل الصفحة -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">لوحة البرنامج</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row mb-5">
                        <div class="col-md-6 col-xl-3">
                            <a href="exe.php">
                                <div class="card-box tilebox-one">
                                    <i class=" fab fa-accusoft  float-right"></i>
                                    <h5 class="text-muted text-uppercase mb-3 mt-0">المبيعات</h5>
                                    <h3 class="mb-3" data-plugin="counterup">0</h3>
                                    <span class="badge badge-primary"> +11% </span> <span
                                        class="text-muted ml-2 vertical-middle">سجل المبيعات</span>
                                </div>
                            </a>
                        </div>


                        <div class="col-md-6 col-xl-3">
                            <a href="item.php">
                                <div class="card-box tilebox-one">
                                    <i class=" fab fa-accusoft  float-right"></i>
                                    <h5 class="text-muted text-uppercase mb-3 mt-0">الأصنــاف</h5>
                                    <h3 class="mb-3">$<span data-plugin="counterup">0</span></h3>
                                    <span class="badge badge-primary"> -29% </span> <span
                                        class="text-muted ml-2 vertical-middle">سجل الأصناف</span>
                                </div>
                            </a></div>

                        <div class="col-md-6 col-xl-3">
                            <a href="add_item.php">
                                <div class="card-box tilebox-one">
                                    <i class=" fab fa-accusoft  float-right"></i>
                                    <h5 class="text-muted text-uppercase mb-3 mt-0">المشتريات</h5>
                                    <h3 class="mb-3">$<span data-plugin="counterup">0</span></h3>
                                    <span class="badge badge-primary"> 0% </span> <span
                                        class="text-muted ml-2 vertical-middle">سجل المشتريات</span>
                            </a> </div>
                    </div>

                    <div class="col-md-6 col-xl-3">
                        <a href="storing.php">
                            <div class="card-box tilebox-one">
                                <i class=" fab fa-accusoft  float-right"></i>
                                <h5 class="text-muted text-uppercase mb-3 mt-0">التخزين</h5>
                                <h3 class="mb-3" data-plugin="counterup">0</h3>
                                <span class="badge badge-primary"> 0% </span> <span
                                    class="text-muted ml-2 vertical-middle">سجل
                                    المخزن</span>
                        </a> </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-7">
                    <div class="card-box">
                        <h4 class="header-title">مخطط المال</h4>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="text-center mt-3">
                                    <h6 class="font-normal text-muted font-14">الصرف</h6>
                                    <h6 class="font-18"><i
                                            class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i>
                                        <span class="text-dark">1.78%</span> <small>SAR</small></h6>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-center mt-3">
                                    <h6 class="font-normal text-muted font-14">الدخل</h6>
                                    <h6 class="font-18"><i
                                            class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i>
                                        <span class="text-dark">25.87</span> <small>SAR</small></h6>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-center mt-3">
                                    <h6 class="font-normal text-muted font-14">المديونيات</h6>
                                    <h6 class="font-18"><i
                                            class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i>
                                        <span class="text-dark">87,4517</span> <small>SAR</small></h6>
                                </div>
                            </div>
                        </div>

                        <canvas id="transactions-chart" height="350" class="mt-4"></canvas>
                    </div>
                </div>
                <div class="col-xl-5">
                    <div class="card-box">
                        <h4 class="header-title">سجل العمليات</h4>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="text-center mt-3">
                                    <h6 class="font-normal text-muted font-14">المشتريات</h6>
                                    <h6 class="font-18"><i
                                            class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i>
                                        <span class="text-dark">0</span> <small>SAR</small></h6>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-center mt-3">
                                    <h6 class="font-normal text-muted font-14">المخزن</h6>
                                    <h6 class="font-18"><i
                                            class="mdi mdi-arrow-down-bold-hexagon-outline text-danger"></i>
                                        <span class="text-dark">0</span> <small>SAR</small></h6>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="text-center mt-3">
                                    <h6 class="font-normal text-muted font-14">المبيعات</h6>
                                    <h6 class="font-18"><i
                                            class="mdi mdi-arrow-up-bold-hexagon-outline text-success"></i>
                                        <span class="text-dark">0</span> <small>SAR</small></h6>
                                </div>
                            </div>
                        </div>

                        <canvas id="sales-history" height="350" class="mt-4"></canvas>
                    </div>
                </div>
            </div>
            <!-- end row -->


        </div> <!-- end container-fluid -->

    </div> <!-- end content -->



    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    مؤسسة برجي التقني للإتصالات وتقنية المعلومات <a href="#">Towersa.com</a>
                </div>

            </div>
        </div>
    </footer>
    <!-- end Footer -->

    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="mdi mdi-close"></i>
            </a>
            <h5 class="m-0 text-white">Settings</h5>
        </div>
        <div class="slimscroll-menu">
            <hr class="mt-0">
            <h5 class="pl-3">Basic Settings</h5>
            <hr class="mb-0" />


            <div class="p-3">
                <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                    <label class="custom-control-label" for="customCheck1">Notifications</label>
                </div>
                <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" id="customCheck2" checked>
                    <label class="custom-control-label" for="customCheck2">API Access</label>
                </div>
                <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" id="customCheck3">
                    <label class="custom-control-label" for="customCheck3">Auto Updates</label>
                </div>
                <div class="custom-control custom-checkbox mb-2">
                    <input type="checkbox" class="custom-control-input" id="customCheck4" checked>
                    <label class="custom-control-label" for="customCheck4">Online Status</label>
                </div>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck5">
                    <label class="custom-control-label" for="customCheck5">Auto Payout</label>
                </div>
            </div>

            <!-- Messages -->
            <hr class="mt-0" />
            <h5 class="pl-3 pr-3">Messages <span class="float-right badge badge-pill badge-danger">24</span></h5>
            <hr class="mb-0" />
            <div class="p-3">
                <div class="inbox-widget">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="green-rtl/assets/images/users/avatar-1.jpg"
                                class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);">Chadengle</a></p>
                        <p class="inbox-item-text">Hey! there I'm available...</p>
                        <p class="inbox-item-date">13:40 PM</p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="green-rtl/assets/images/users/avatar-2.jpg"
                                class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);">Tomaslau</a></p>
                        <p class="inbox-item-text">I've finished it! See you so...</p>
                        <p class="inbox-item-date">13:34 PM</p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="green-rtl/assets/images/users/avatar-3.jpg"
                                class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);">Stillnotdavid</a></p>
                        6 <p class="inbox-item-text">This theme is awesome!</p>
                        <p class="inbox-item-date">13:17 PM</p>
                    </div>

                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="green-rtl/assets/images/users/avatar-4.jpg"
                                class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);">Kurafire</a></p>
                        <p class="inbox-item-text">Nice to meet you</p>
                        <p class="inbox-item-date">12:20 PM</p>

                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="green-rtl/assets/images/users/avatar-5.jpg"
                                class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);">Shahedk</a></p>
                        <p class="inbox-item-text">Hey! there I'm available...</p>
                        <p class="inbox-item-date">10:15 AM</p>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- الشريط الايمن للنافذة-->
    <div class="rightbar-overlay"></div>

    <!-- مكتبات التنسيق -->
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/libs/chart-js/Chart.bundle.min.js"></script>
    <script src="assets/js/pages/dashboard.init.js"></script>
    <script src="assets/js/app.min.js"></script>

</body>

</html>