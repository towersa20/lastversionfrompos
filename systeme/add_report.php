<?php
//استدعاء ملف التصميم
include('header.php');?>
<body>
 <div class="app-content content container-fluid">

          <div class="content-wrapper">
              
 <!-- بداية نافذة تقارير المشتريات-->
<section id="minimal-statistics">
  <div class="row">
    <div class="col-12 mt-2 mb-0 card tilebox-one">
      <div class="content-header" style="font-size: 20px;">
    <table class="table table-bordered">
        <tr>
            <td>
            Purchases Reports <i class=" fab fa-artstation "></i>
            </td>
        </tr>
    </table>  
    </div>
    </div>
  </div>

  <div class="card">
<div class="row" matchHeight="card">
<div class="col-md-6 col-xl-4">
 <a href="shselect1.php">   
   <div class="card-box tilebox-one bg-primary">
      <i class=" fab fa-artstation   float-right"></i>
      <h4 class="text-white" style="font-family: 'Droid Arabic Kufi';">Daily Report </h4>
 </div></div></a>

                        

 <div class="col-md-6 col-xl-4">
 <a href="shselect2.php">   
   <div class="card-box tilebox-one bg-primary">
      <i class=" fab fa-artstation  bg-primary  float-right"></i>
      <h4 class="text-white" style="font-family: 'Droid Arabic Kufi';">Periodic report</h4>
 </div></div></a>


 <div class="col-md-6 col-xl-4">
 <a href="shselect3.php">   
   <div class="card-box tilebox-one bg-primary">
      <i class=" fab fa-artstation  bg-primary  float-right"></i>
      <h4 class="text-white" style="font-family: 'Droid Arabic Kufi';">annual report</h4>
 </div></div></a>


 </div>
 </div>
 </div>


 <br>
 <form action="new.php" method="POST" enctype="multipart/form-data">
    <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr style="background-color:#066185; color : white;">
      <td colspan="4">Search Product <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
        <td style="width:10%;">Bills ID </td>
        <td style="width:75%;"><input type="text" name="search" class="form-control" required></td>
        <td style="width:15%;"><button type="submit" name="ok" class="form-control btn-primary"> Search <i class="fa fa-search"></button></td>
    </tr>
    </table>
    </form>

<!-- فورم عرض التقرير الدوري للمشتريات!-->

<form name="form1" method="post" action="backreport.php">
    <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="8"  style="background-color:#066185; color : white;">Purchase Returns Report <i class="fab fa-accusoft"></i></td>
    </tr>
    <tr>
    <td style="width:8%;"> Status</td>
  <td><input type="text"   name="xw"  class="form-control big-shadow" required id="search" placeholder="Select Status" list="searrcus" autocomplete="off">
  <datalist id="searrcus">

  <option value="مشتريات">مشتريات</option>
  <option value="مرودات مشتريات">مردودات مشتريات</option>


  </datalist></td>
      <td style="width:8%;">From</td>
      <td style="width:15%;"><input type="date"  value="20<?php echo date('y-m-d');?>" name="date1" class="form-control big-shadow " required autocomplete="off"></td>
      <td style="width:8%;">To</td>
      <td style="width:15%;"><input type="date"  value="20<?php echo date('y-m-d');?>" name="date2" class="form-control big-shadow " required autocomplete="off"></td>
    <td style="width:15%;"><button type="submit" name="ok1" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> View <i class="fab fa-accusoft"></i></button></td> </tr>
  </table>
</form>
<br>



 </div>
 </div>
 </div>

        <!-- نهاية شاشة استدعاء التقارير -->








