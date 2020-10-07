<?php include('header.php');?>



  <!-- بداية شاشة المشتريات -->


  <!--- ملف جافا سكربت لتسريع عملية البحث -->

  <script src="js/payment.js"></script> 
     


     <!--- بداية فورم المشتريات -->
   
   <div class="app-content content container-fluid">
   <br>
   
     <!--- جدول عرض السجلات الخاصة بفاتورة المشتريات -->
   
   <form name="form1" method="post" action="form2.php" enctype="multipart/form-data">
   <table style="width:100%;" class="table table-bordered table-hover">
   <tr>
    
    <td style="width:9%;">المشتريات <i class="fa fa-shopping-basket"></i></td>
    <td style="width:20%;">
     <select name="cust_name" class="selectpicker" data-live-search="true" data-style="btn-primary" required>
   <?php include('dbcon/dbcon.php');	$brim=mysql_query("select * from customer");	$resa=mysql_fetch_array($brim);?>
               <option>أختر المورد</option>
               <?php do { ?>
               <option value="<?php echo $resa['name'];?>" ><?php echo $resa['name'];?></option>
               <?php } while($resa=mysql_fetch_array($brim));?>
   
   </td>
   
   <input type="hidden" id="order_date" name="order_date" readonly  class="form-control " value="<?php echo date("Y-d-m"); ?>">
   <td style="width:8%;">الفاتـورة</td>
   
   
   <td  style="width:14%;"><input name="CODE" required  readonly="" class="form-control " type="text" size="12" id="CODE" value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>"></td>
   <td  style="width:9%;">التــاريخ</td>
       
   <td  style="width:15%;"><input name="datefrom"  class="form-control " type="date" size="12" value="20<?php echo date('y-m-d');?>" required></td>
   
   <td  style="width:8%;">المخـــزن</td>
   <td  style="width:22%;">
           <select name="stores" class="selectpicker" data-live-search="true" data-style="btn-primary" required>
               <?php include('dbcon/dbcon.php');
           $brim=mysql_query("select * from store");
           $resa=mysql_fetch_array($brim);?>
               <?php do { ?>
               <option value="<?php echo $resa['name'];?>" ><?php echo $resa['name'];?></option>
               <?php } while($resa=mysql_fetch_array($brim));?>
               </select></td>
   
   
   </tr>
        </table>
     <!--- نهاية عرض سجلات بيانات الفاتورة -->
   
   
   
   
     <!--- جدول فورم المشتريات -->
   
    <table style="width:100%; " align="center" class="table table-bordered table-hover flipInX">
        <tr>
         <td colspan="10"><strong>شراء مجموعة أصناف</strong> <i class="fa fa-shopping-basket"></i> </td>
       </tr>
        <tr align="center">
         <td style="width:14%;"><strong>الباركود</strong></td>
         <td style="width:15%;"><strong>الصنف</strong></td>
         <td style="width:12%;"><strong>الوحدة</strong></td>
         <td style="width:8%;"><strong>الكمية</strong></td>
         <td style="width:8%;" title="سعر الشراء قبل الضريبة للوحده الواحده"><strong title="سعر الشراء قبل الضريبة للوحده الواحده">سعر الوحده</strong></td>
         <td style="width:8%;"><strong>سعر البيع</strong></td>
         <td style="width:8%;"><strong>الضريبة</strong></td>
       </tr>
       <tr>
       <td><input type="text" name="pid[]"  class="form-control" autocomplete="off" required></td>
       <td><input type="text" name="product_name[]"  class="form-control" autocomplete="off" required></td>
       <td><input type="text" name="unit[]"  class="form-control" autocomplete="off" required></td>
       <td><input type="text" name="qty[]"  class="form-control" autocomplete="off" required></td>
       <td><input type="text" name="price[]"  class="form-control" autocomplete="off" required></td>
       <td><input type="text" name="pays[]"  class="form-control" autocomplete="off" required></td>
       <td><input type="text" name="tax[]"  value="<?php include('dbcon/dbcon.php');
       $sm=mysql_query("select * from vat");
       $mx=mysql_fetch_array($sm);
       echo $mx['tax'];?>" class="form-control" autocomplete="off" required></td>
       </tr>
    </table>
    <table class="table table-bordered">
        <tr>
        <td  style="width: 20%;"></td>
        <td  style="width: 20%;"></td>
        <td  style="width: 20%;"></td>
        <td  style="width: 20%;"></td>
        <td  style="width: 20%;"><button name="ok1" style="width: 100%;  font-family: 'Droid Arabic Kufi';" value="ok" class="btn btn-primary">شراء <i class="fa fa-shopping-bag"></i></button></td>
        </tr>
    </table>