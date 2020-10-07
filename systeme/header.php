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
    echo "<meta http-equiv='refresh' content='0;url=../logout.php'>";
    exit;
    // نهاية كود التحقق
}?>


<?php 
// عرض الشعار
include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);
    $brima='<img src="./file/' .$query['imge']. '"width="90" height="60">';
  
  
  
  
    $currrent_date = date("Y-m-d");
    //Get Store Data if product less QUN less than 5 and EndDate less than current Date or equal current date//
    $store_sql  = "SELECT * FROM `storing` WHERE enddate <= CURDATE() OR  qunt <= 5 ";
    $store_query = mysql_query($store_sql);
    $store_num = mysql_num_rows($store_query);
    
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
                    <a href="index.php" class="logo text-center">
                        <span class="logo-lg">
                            <?php echo $brima;?>
                        </span>
                        <span class="logo-sm">
                            <?php echo $brima;?>
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
                        <form class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <input type="text" class="form-control text-info" placeholder="Search">
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fe-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </li>
         
                   
                    &nbsp;
                    <li class="d-none d-sm-block">
                        <a href="record.php" class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                <button type="button" class="form-control" > 
                                <?php
                             //اختيار جميع عمليات الدفع غير المكتملة
                            $q = mysql_query("SELECT * FROM `payment` WHERE ((qunt*price)+qunt*price*5/100) > pay");
                            // وضعها في متغير اسمه num
                            $num = mysql_num_rows($q);
                            // التاكد من وجود مستحقات لم يتم دفعها لدي الموردين
                            if($num > 0){
                                // طباعة عدد العمليات التي لم يتم
                                echo ' <span style="background-color:red;padding-left:5px;padding-right:5px;border-radius:10px;">'.$num.'</span>
                                ';}
                            ?>    
                                Supplier 
                                    
                                </button>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fa fa-user-shield"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
</a>
                    </li>

                    &nbsp;

                    <li class="d-none d-sm-block">
                        <a  class="app-search" href="crecord.php">
                            <div class="app-search-box">
                                <div class="input-group">
                                <button type="button" class="form-control" > Customer </button>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fa fa-users"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
</a>
                    </li>

                    &nbsp;


                    
                    <li class="d-none d-sm-block">
                        <a href="#" class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                <button onclick="goBack()" type="button" class="form-control" > Back </button>
                                    <div class="input-group-append">
                                        <button class="btn" type="submit">
                                            <i class="fa fa-undo"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
</a>
                    </li>

                    &nbsp;

                    
<li class="d-none d-sm-block">
    <a  class="app-search" href="../System/">
        <div class="app-search-box">
            <div class="input-group">
            <button type="button" class="form-control" > عربي </button>
                <div class="input-group-append">
                    <button class="btn" type="submit">
                        <i class="fa fa-language"></i>
                    </button>
                </div>
            </div>
        </div>
</a>
</li>

                    &nbsp;
                    <li class="d-none d-sm-block">
                        <a  class="app-search">
                            <div class="app-search-box">
                                <div class="input-group">
                                    <button data-toggle="modal" data-target="#exampleModal" type="button" class="form-control" > Exit</button>
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
            <div class="left-side-menu">

                <div class="slimscroll-menu">

                    <!--- قائمة محتويات الشاشة -->
                    <div id="sidebar-menu" style="font-family: 'Droid Arabic Kufi';">

                        <ul class="metismenu" id="side-menu">


                        <li>
                                <a href="index.php">
                                    <i class="fa fa-home"></i>
                                    <span style="font-family: 'Droid Arabic Kufi';"> Home </span>
                                </a>
                            </li>
                      
                  

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fas fa-shopping-cart"></i>
                                    <span style="font-family: 'Droid Arabic Kufi';"> Purchases </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="move.php">Add  Purchases</a></li>
                                    <li><a href="add_itemsearch.php">Query</a></li>
                                    <li><a href="add_reports.php">Report</a></li>
                                </ul>
                            </li>
                            <li>
                                    <a href="javascript: void(0);">
                                        <i class="fas fa-boxes"></i>
                                        <span style="font-family: 'Droid Arabic Kufi';"> Manage Store 
                                        <?php
                                if ($store_num != 0) {
                                ?>

                                    <span class="badge">
                                    <?php
                                    echo $store_num;
                                }
                                    ?> </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                            <li><a href="storing.php" <?php if ($store_num != 0) {
                                                            echo "style='color:#FF0000;'";
                                                            echo "class='blink_me'";
                                                        } ?>>Store</a></li>
                                            <li><a href="mstor.php"> Movement</a></li>
                                            <li><a href="vstore.php">Query</a></li>
                                            <li><a href="rselect1.php">Report</a></li>
                                    </ul>
                                </li>

                            <li>
                                <a href="javascript: void(0);">
                                    <i class="fe-bar-chart-2"></i>
                                    <span style="font-family: 'Droid Arabic Kufi';"> Sales </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="../salese/exe.php">POS</a></li>
                                        <li><a href="sales_search.php">Query </a></li>
                                        <li><a href="salesinfo.php"> Report</a></li>
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
                                    <span  style="font-family: 'Droid Arabic Kufi';"> Report </span>
                                    <span class="menu-arrow"></span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                        <li><a href="salesinfo.php">Sales Report</a></li>
                                        <li><a href="storereprt.php">store Reports</a></li>
                                        <li><a href="add_report.php">Purchases Reports</a></li>
                                        <li><a href="tax.php">Tax Reports</a></li>
                                                          
                                </ul>
                            </li>

                            <li class="menu-title mt-2"> Operation</li>

                            <li>
                                    <a href="javascript: void(0);">
                                        <i class="mdi mdi-scatter-plot"></i>
                                        <span style="font-family: 'Droid Arabic Kufi';"> performance </span>
                                        <span class="menu-arrow"></span>
                                    </a>
                                    <ul class="nav-second-level" aria-expanded="false">
                                    <li><a href="day.php">User Operation</a></li>
                                    <li><a href="day1.php">Daily Report</a></li>
                                    <li><a href="alert.php">Alert Report</a></li>
                                    </ul>
                                </li>

             
                
                            <li>
                                <a href="backup.php">
                                    <i class="mdi mdi-database"></i>
                                    <span style="font-family: 'Droid Arabic Kufi';"> Backup </span>
                                </a>
                              
                            </li>


                            <li>
                                <a data-toggle="modal" data-target="#exampleModal" >
                                    <i class="mdi mdi-exit-to-app"></i>
                                    <span  style="font-family: 'Droid Arabic Kufi';"> Exit </span>
                                </a>
                             
                            </li>
                            <i>
                                <hr>
                                <div align="center"><?php echo $brima;?></div>
                            </i>
                            <i>
                            </i>
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
       
        <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">exit <i class=" fas fa-user-shield "></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div align="center" class="modal-body">
       Do you want exit
      </div>
      <div class="modal-footer">
        <button style="width: 180px;" type="button" class="btn btn-primary" data-dismiss="modal"><i class="  fas fa-user-shield  "></i> No</button>
      <a href="../logout.php">  <button style="width: 180px;" type="button" class="btn btn-danger"><i class=" fas fa-user-check "></i>  Yes </button></a>
      </div>
    </div>
  </div>
</div>