<?php
session_start();
if(!isset($_SESSION["level"])) {
    echo 'عذراً تم تأمين النظام لايمكن الدخول من دون صلاحيات';
    echo "<meta http-equiv='refresh' content='0;url=logout.php'>";
    exit;
}?><?php
function createRandomPassword() {
    $chars = "003232303232023232023456789";
    srand((double)microtime()*100000);
    $i = 0;
    $pass = '' ;
    while ($i <= 6) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>

<!DOCTYPE html>
<html lang="en" class="loading">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="Towersa">
    <meta name="author" content="PIXINVENT">
    <title>Tower POSV19</title>
    <link rel="apple-touch-icon" sizes="60x60" href="icon/logo.png">
    <link rel="apple-touch-icon" sizes="76x76" href="icon/logo.png">
    <link rel="apple-touch-icon" sizes="120x120" href="icon/logo.png">
    <link rel="apple-touch-icon" sizes="152x152" href="icon/logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="icon/logo.png">
    <link rel="shortcut icon" type="image/png" href="icon/logo.png">

    <link rel="stylesheet" type="text/css" href="jquery.tablescroll.css"/>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="js/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="js/font-awesome.min.css">
    <script type="text/javascript" src="js/order.js"></script>

    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">

    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <!-- font icons-->
    <!-- font icons-->
    <link href="font/animate.css"  rel="stylesheet" type="text/css">
    <link href="font/animate.min.css"  rel="stylesheet" type="text/css">
    <link href="font/mystyle.css"  rel="stylesheet" type="text/css">
    <link href="font/font_face.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/chartist.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/tables/datatable/datatables.min.css">


    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/app.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css-rtl/custom-rtl.css">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->

</head>
<!-- END : Head-->

<!-- BEGIN : Body-->
<body  style="font-family:'Droid Arabic Kufi'; font-size:20px; data-col="2-columns" 
class="2-columns pace-done layout-dark layout-transparent bg-blue-lagoon">
<div class="wrapper nav-collapsed menu-collapsed">

    <div>
      <div  style="font-family: 'Droid Arabic Kufi';" class="sidebar-content">
            <div class="nav-container">
                <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">
                   
              

                </ul>
            </div>
        </div>

        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
    </div>
    <!-- / main menu-->


    <!-- Navbar (Header) Starts-->
    <nav class="navbar navbar-expand-lg navbar-light bg-faded header-navbar">
        <div class="container-fluid">
            <div class="#">
                <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><span class="d-lg-none navbar-right navbar-collapse-toggle"><a aria-controls="navbarSupportedContent" href="javascript:;" class="open-navbar-container black"><i class="ft-more-vertical"></i></a></span>
                <form role="search" class="navbar-form navbar-right mt-1">
                    <div class="position-relative has-icon-right">
                        <input type="text" placeholder="بحث عن" style="border: 0px; width: 400px;" class="form-control"/>
                        <div class="form-control-position"><i class="ft-search"></i></div>
                    </div>
                </form>
            </div>
            <div class="navbar-container">
                <div id="navbarSupportedContent" class="collapse navbar-collapse">
                    <ul class="navbar-nav">
                   <a href="index.php" target="_blank">
                      <button type="button" style="width: 220px;" class="btn btn-raised gradient-pomegranate white" > تعليق <i class="fa ft-paperclip"></i> </button></a>
    
                    <li class="nav-item mr-2">
                            <button type="button" style="width: 220px;" class="btn btn-warning" onclick="goBack()">السابق <i class="fa fa-undo"></i> </button>

                            <script>
                                function goBack() {
                                    window.history.back();
                                }
                            </script></li>
                              <a href="logout.php" onclick="return confirm('هل تريد إغلاق البرنامج');"><button type="button" style="width: 220px;" class="btn btn-danger" >إغلاق  <i class="fa fa-lock"></i> </button></a>


                        <li class="dropdown nav-item"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="#"><i class="#"></i>
                                <p class="d-none">User Settings</p></a>
                            <div ngbdropdownmenu="" aria-labelledby="dropdownBasic3" class="dropdown-menu text-left dropdown-menu-right"><a href="" class="dropdown-item py-1"><i class="ft-message-square mr-2"></i><span>بيانات المستخدم</span></a>

                                <div class="dropdown-divider"></div><a href="logout.php"  class="dropdown-item"><i class="ft-power mr-2"></i><span>تسجيــــــــل خروج</span></a>
                            </div>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navbar (Header) Ends-->

    <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="">
            <div class="content-wrapper"><!--Statistics cards Starts-->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-6 col-12">


               
    <!-- END Notification Sidebar-->
    <!-- Theme customizer Starts-->
    <div class="customizer border-left-blue-grey border-left-lighten-4 d-none d-sm-none d-md-block"><a id="customizer-toggle-icon" class=""><i class="ft-settings font-medium-4 fa fa-spin white align-middle"></i></a>
      <div data-ps-id="df6a5ce4-a175-9172-4402-dabd98fc9c0a" class="customizer-content p-3 ps-container ps-theme-dark">
        <h4 class="text-uppercase mb-0 text-bold-400" style="font-family: 'Droid Arabic Kufi';">إعدادات التنسيق</h4>
        <p style="font-family: 'Droid Arabic Kufi';">يمكنك تخصيص الشكل الذي تريده</p>
        <hr>
        <!-- Layout Options-->
        <h6 style="font-family: 'Droid Arabic Kufi';" class="text-center text-bold-500 mb-3 text-uppercase">خيارات الشاشة</h6>
        <div class="layout-switch ml-4">
          <div class="custom-control custom-radio d-inline-block custom-control-inline light-layout">
            <input id="ll-switch" type="radio" name="layout-switch" checked class="custom-control-input">
            <label for="ll-switch" class="custom-control-label">مضئ</label>
          </div>
          <div class="custom-control custom-radio d-inline-block custom-control-inline dark-layout">
            <input id="dl-switch" type="radio" name="layout-switch" class="custom-control-input">
            <label for="dl-switch" class="custom-control-label">داكن</label>
          </div>
          <div class="custom-control custom-radio d-inline-block custom-control-inline transparent-layout">
            <input id="tl-switch" type="radio" name="layout-switch" class="custom-control-input">
            <label for="tl-switch" class="custom-control-label">شفاف</label>
          </div>
        </div>
        <hr>
        <!-- Sidebar Options Starts-->
        <h6 style="font-family: 'Droid Arabic Kufi';" class="text-center text-bold-500 mb-3 text-uppercase sb-options">لون الخلفية</h6>
        <div class="cz-bg-color sb-color-options">
          <div class="row p-1">
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="pomegranate" class="gradient-pomegranate d-block rounded-circle"></span></div>
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="king-yna" class="gradient-king-yna d-block rounded-circle"></span></div>
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="ibiza-sunset" class="gradient-ibiza-sunset d-block rounded-circle"></span></div>
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="flickr" class="gradient-flickr d-block rounded-circle"></span></div>
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="purple-bliss" class="gradient-purple-bliss d-block rounded-circle"></span></div>
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="man-of-steel" class="gradient-man-of-steel d-block rounded-circle"></span></div>
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="purple-love" class="gradient-purple-love d-block rounded-circle"></span></div>
          </div>
          <div class="row p-1">
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="black" class="bg-black d-block rounded-circle"></span></div>
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="white" class="bg-grey d-block rounded-circle"></span></div>
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="primary" class="bg-primary d-block rounded-circle"></span></div>
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="success" class="bg-success d-block rounded-circle"></span></div>
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="warning" class="bg-warning d-block rounded-circle"></span></div>
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="info" class="bg-info d-block rounded-circle"></span></div>
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="danger" class="bg-danger d-block rounded-circle"></span></div>
          </div>
        </div>
        <!-- Sidebar Options Ends-->
        <!-- Transparent Layout Bg color Options-->
        <h6 class="text-center text-bold-500 mb-3 text-uppercase tl-color-options d-none">لون الخلفية</h6>
        <div class="cz-tl-bg-color d-none">
          <div class="row p-1">
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="hibiscus" class="bg-hibiscus d-block rounded-circle"></span></div>
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-purple-pizzazz" class="bg-purple-pizzazz d-block rounded-circle"></span></div>
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-blue-lagoon" class="bg-blue-lagoon d-block rounded-circle"></span></div>
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-electric-viloet" class="bg-electric-violet d-block rounded-circle"></span></div>
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-protage" class="bg-portage d-block rounded-circle"></span></div>
            <div class="col"><span style="width:20px; height:20px;" data-bg-color="bg-tundora" class="bg-tundora d-block rounded-circle"></span></div>
          </div>
        </div>
        <!-- Transparent Layout Bg color Ends-->
        <hr>
        <!-- Sidebar BG Image Starts-->
        <h6 class="text-center text-bold-500 mb-3 text-uppercase sb-bg-img" style="font-family: 'Droid Arabic Kufi';">صور القائمة الجانبية</h6>
        <div class="cz-bg-image row sb-bg-img">
          <div class="col-sm-2 mb-3"><img src="app-assets/img/sidebar-bg/01.jpg" width="90" class="rounded sb-bg-01"></div>
          <div class="col-sm-2 mb-3"><img src="app-assets/img/sidebar-bg/02.jpg" width="90" class="rounded sb-bg-02"></div>
          <div class="col-sm-2 mb-3"><img src="app-assets/img/sidebar-bg/03.jpg" width="90" class="rounded sb-bg-03"></div>
          <div class="col-sm-2 mb-3"><img src="app-assets/img/sidebar-bg/04.jpg" width="90" class="rounded sb-bg-04"></div>
          <div class="col-sm-2 mb-3"><img src="app-assets/img/sidebar-bg/05.jpg" width="90" class="rounded sb-bg-05"></div>
          <div class="col-sm-2 mb-3"><img src="app-assets/img/sidebar-bg/06.jpg" width="90" class="rounded sb-bg-06"></div>
        </div>
        <!-- Transparent BG Image Ends-->
        <div class="tl-bg-img d-none">
          <h6 class="text-center text-bold-500 text-uppercase">الخلفيات</h6>
          <div class="cz-tl-bg-image row">
            <div class="col-sm-3"><img src="app-assets/img/gallery/bg-glass-1.jpg" width="90" class="rounded bg-glass-1 selected"></div>
            <div class="col-sm-3"><img src="app-assets/img/gallery/bg-glass-2.jpg" width="90" class="rounded bg-glass-2"></div>
            <div class="col-sm-3"><img src="app-assets/img/gallery/bg-glass-3.jpg" width="90" class="rounded bg-glass-3"></div>
            <div class="col-sm-3"><img src="app-assets/img/gallery/bg-glass-4.jpg" width="90" class="rounded bg-glass-4"></div>
          </div>
        </div>
        <!-- Transparent BG Image Ends    -->
        <hr>
        <!-- Sidebar BG Image Toggle Starts-->
        <div class="togglebutton toggle-sb-bg-img">
          <div class="switch"><span>الغاء صورة القائمة الجانبية</span>
            <div class="float-right">
              <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                <input id="sidebar-bg-img" type="checkbox" checked class="custom-control-input cz-bg-image-display">
                <label for="sidebar-bg-img" class="custom-control-label"></label>
              </div>
            </div>
          </div>
          <hr>
        </div>
        <!-- Sidebar BG Image Toggle Ends-->
        <!-- Compact Menu Starts-->
        <div class="togglebutton">
          <div class="switch"><span>تصغير القائمة</span>
            <div class="float-right">
              <div class="custom-control custom-checkbox mb-2 mr-sm-2 mb-sm-0">
                <input id="cz-compact-menu" type="checkbox" class="custom-control-input cz-compact-menu">
                <label for="cz-compact-menu" class="custom-control-label"></label>
              </div>
            </div>
          </div>
        </div>
        <!-- Compact Menu Ends-->
        <hr>
        <!-- Sidebar Width Starts-->
        <div>
          <label for="cz-sidebar-width"> حجم القائمة</label>
          <select id="cz-sidebar-width" class="custom-select cz-sidebar-width float-right">
            <option value="small">صغير</option>
            <option value="medium" selected="">متوسط</option>
            <option value="large">كبير</option>
          </select>
        </div>
        <!-- Sidebar Width Ends-->
      </div>
    </div>

    <!-- Theme customizer Ends-->
    <!-- BEGIN VENDOR JS-->
    <script src="app-assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/prism.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/pace/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="app-assets/vendors/js/chartist.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="app-assets/js/app-sidebar.js" type="text/javascript"></script>
    <script src="app-assets/js/notification-sidebar.js" type="text/javascript"></script>
    <script src="app-assets/js/customizer.js" type="text/javascript"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="app-assets/js/dashboard1.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
  </body>
</html>