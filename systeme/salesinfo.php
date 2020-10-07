<?php
// ملف التصميم
include('header.php');?>
<body>
 <div class="app-content content container-fluid">

          <div class="content-wrapper">
              
 <!-- بداية روابط شاشة تقرير المبيعات -->
<section id="minimal-statistics">
  <div class="row">
    <div class="col-12 mt-2 mb-0 card tilebox-one">
      <div class="content-header" style="font-size: 20px;">Sales Reports </div>
    </div>
  </div>

  <div class="card">
<div class="row" matchHeight="card">
<div class="col-md-4 col-xl-4">
 <a href="salr1.php">   
   <div class="card-box tilebox-one bg-primary">
      <i class="fab fa-themeisle  float-right"></i>
      <h4 class="text-white" style="font-family: 'Droid Arabic Kufi';">Daily Report </h4>
 </div></div></a>

                        

 <div class="col-md-4 col-xl-4">
 <a href="salr2.php">   
   <div class="card-box tilebox-one bg-primary">
      <i class="fab fa-themeisle bg-primary  float-right"></i>
      <h4 class="text-white" style="font-family: 'Droid Arabic Kufi';">Periodic report</h4>
 </div></div></a>


 <div class="col-md-4 col-xl-4">
 <a href="salr3.php">   
   <div class="card-box tilebox-one bg-primary">
      <i class="fab fa-themeisle bg-primary  float-right"></i>
      <h4 class="text-white" style="font-family: 'Droid Arabic Kufi';">General report</h4>
 </div></div></a>



 <div class="col-md-12 col-xl-12">
 <a href="backs.php">   
   <div class="card-box tilebox-one" style="background-color: red;">
      <i class="fab fa-themeisle bg-primary  float-right"></i>
      <h4 class="text-white" style="font-family: 'Droid Arabic Kufi';"> Refund Reports</h4>
 </div></div></a>



 </div></div></div></div>
  <!--اضافة كود السنف الاقل والاكثر مبيعا -->

 <div class="row" style="font-size:20px;" >
  <div class="col-md-3 col-xl-3">
  Most selling products  </div>
  <div class="col-md-3 col-xl-3">
  <?php
  //PHP CODE
  include('dbcon/config.php');
  //product name
  $p = ""; 
  //جلب المنتجات ومجموع مبيعاتها
  $q = mysql_query("SELECT product , SUM(qty) , name FROM `sales` GROUP BY product ORDER BY  SUM(qty)");
  while($n = mysql_fetch_array($q)){
    $qty = $n['SUM(qty)'] ; // 
    $p = $n['name'];
    }
  // الحصول هلي اسم المنتج الاكثر مبيعا
  echo $p;
  ?>
  </div>
  <div class="col-md-3 col-xl-3">
  Least selling products  </div>
  <div class="col-md-3 col-xl-3">
  <?php
  //PHP CODE
  include('dbcon/config.php');
  //product name
  $p = ""; 
  //جلب المنتجات ومجموع مبيعاتها
  $q = mysql_query("SELECT product , SUM(qty) , name FROM `sales` GROUP BY product ORDER BY  SUM(qty) lIMIT 1");
  while($n = mysql_fetch_array($q)){
    $qty = $n['SUM(qty)'] ; // 
    $p = $n['name'];
    }
  // الحصول هلي اسم المنتج الاقل مبيعا
  echo $p;
  ?>
  </div>
  </div>
  </div>
    <!--نهاية كود الصنف الاقل والاكثر مبيعا -->
 
 
 </div></div>
 <!-- نهاية شاشة تقرير المبيعات-->



 











 <?php 
include('dbcon/dbcon.php');
$sql=mysql_query("select * from share");
$row=mysql_fetch_array($sql);
do {
 $row['price'];
$row['barco'];
$up=mysql_query("update sales set discount='$row[price]' where product='$row[barco]'");
}while($row=mysql_fetch_array($sql));
?>