<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <link rel="apple-touch-icon" sizes="76x76" href="files/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="files/assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    ملف الأعدادات
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'
  />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"
  />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!-- Markazi Text font include just for persian demo purpose, don't include it in your project -->
  <link href="https://fonts.googleapis.com/css?family=Cairo&amp;subset=arabic" rel="stylesheet">

  <!-- CSS Files -->
  <link href="files/assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <link href="files/assets/css/material-dashboard-rtl.css?v=1.1" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="files/assets/demo/demo.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="lib/mystyle.css">
    <link rel="stylesheet" type="text/css" href="lib/font_face.css">
    <link rel="stylesheet" type="text/css" href="lib/animate.min.css">
    <link rel="stylesheet" type="text/css" href="lib/animate.css">
    <link href="desgin/./assets/demo/demo.css" rel="stylesheet" />

  <!-- Style Just for persian demo purpose, don't include it in your project -->
  <style>
    body,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4 {
      font-family: "Droid Arabic Kufi";
    }
  </style>
</head>

<body style="font-family: 'Droid Arabic Kufi';" class="rtl">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active">
            <a class="nav-link   btn-info" href="../login.php">
              <i class="material-icons">dashboard</i>
              <p>فتح البرنامــــــــــــــــج </p>
            </a>
          </li>
        
     
         
          <li class="nav-item active">
            <a class="nav-link   btn-info"  href="../logout.php" onClick="return confirm('هل تريد الخروج');">
              <i class="material-icons">logout</i>
              <p>تسجيـــــــــــــــل خروج</p>
            </a>
          </li>
          <li class="">
<br>		  <div align="center" class="animated flip">
		  <img src="../icon/logo.png" style="width:65%;">
		  </div>
		  </li>
		  
          <li class="">
<br>		  <div align="center" class="animated flip">
		  <img src="../icon/qr.png" style="width:65%;">
		  </div>
		  </li>
        </ul>
      </div>
    </div>
  
  

<body class="index-page sidebar-collapse">
  
  
          <nav class="navbar navbar-expand-lg">
            <div class="container" style="color:#000000;">
              <div class="navbar-translate">
                <a class="navbar-brand" href="index.php">Tower SA</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                  <span class="navbar-toggler-icon"></span>
                </button>
              </div>
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
				
           <li class="active nav-item"><a href="info.php"   class="nav-link   btn-info"><i class="material-icons">home</i> تسجيل البرنامج </a></li>

           <li class="active nav-item"><a href="../logout.php"   class="nav-link   btn-info"><i class="material-icons">exit</i> تسجيل خروج </a></li>
           
                </ul>
              </div>
            </div>
          </nav>
    <!--   Core JS Files   -->
    <script src="files/assets/js/core/jquery.min.js" type="text/javascript"></script>
    <script src="files/assets/js/core/popper.min.js" type="text/javascript"></script>
    <script src="files/assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
    <script src="files/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="files/assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="files/assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="files/assets/js/material-dashboard.min.js?v=2.1.0" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="files/assets/demo/demo.js"></script>
    <script>
      $(document).ready(function () {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();

      });
    </script>
</body>

</html>
