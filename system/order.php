
<?php /* شاشة الطلبات الخاصة بطلبات العملاء*/?>


<?php
// استدعاء ملف التصميم
include('header.php');?>

<table class="table table-bordered table-stripe">
    <tr>
        <Td colspan="12"> شاشة طلبات العملاء </Td>
    </tr>
<tr align="center">
<td>رقم الطلب</td>
<td>العميــل</td>
<td>رقم الهاتف</td>
<td>المنطقة</td>
<td>الموقع</td>
<td>الوقت</td>
<td>حمولة السيارة</td>
<td colspan="3">الاجراء</td>
</tr>
<tr>
<td>100</td>
<td nowrap>عميل برجي</td>
<td>05512028486</td>
<td>الرياض</td>
<td nowrap>تم التوصيل</td>
<td nowrap><?php echo date('Y-m-d H:i:s');?></td>
<td style="width:13%;"><select name="c" class="selectpicker" data-live-search="true" data-style="btn-danger" required>
			  <?php // كود استدعاء وحدة القياس
			  include('dbcon/config.php');
              $brima=mysql_query("select * from unitz");
              $res=mysql_fetch_array($brima);?>
              <?php do { ?>
                  <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
              <?php } while($res=mysql_fetch_array($brima));?>
              </select></td>
<td  style="width:9%;"><button  class="btn btn-info"><i class=" mdi mdi-contact-phone"></i> عميل</button></td>
<td  style="width:9%;"><button  class="btn btn-primary"><i class="fa fa-location-arrow"></i> طلب  </button></td>
<td  style="width:9%;">
<select name="c" class="selectpicker" data-live-search="true" data-style="btn-warning" required>
              <?php // كود استدعاء وحدة القياس/*
              /*
			  include('dbcon/config.php');
              $brima=mysql_query("select * from unitz");
              $res=mysql_fetch_array($brima);?>
              <?php do { */?>
                  <option value="0" >حالة الطلب</option>
                  <option value="1" >موافقة</option>
                  
                  <option value="2" >قيد الشحن</option>
                  
                  <option value="3" >تم الشحن</option>
                  
                  <option value="4" >قيد التوصيل</option>
                  
                  <option value="5" >تم التوصيل</option>
                  
                  <option value="6" >رفض الطلب</option>
                  
                  <option value="7" >مرتجع</option>
                  
                  <option value="8" >اضافة صنف</option>

              <?php // } while($res=mysql_fetch_array($brima));?>
              </select>
</td>
</tr>
</table>

