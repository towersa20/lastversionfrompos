<?php include('header.php');?>

       
        <!-- مكتبات البحث والتسنيق للجدول -->
        <link href="assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

		
		
<div class="content-body">
    
    <!-- بداية شاشة البحث -->
        <section id="html">
	            <div class="row">

<div class="col-md-12 col-12 mb-12">
        <div class="card">
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
         			<div class="heading-elements">
	                    <ul class="list-inline mb-0">
	                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
	                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
	                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
	                        <li><a data-action="close"><i class="ft-x"></i></a></li>
	                    </ul>
	                </div>
	            </div>
البحث في سجل المبيعات
<div class="card-content  collapse show">
    <div class="card-body card-dashboard">
	            <div class="table-responsive">
                

<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
<thead>
<tr align="center">
<th style="font-family:'Droid Arabic Kufi';">الباركود</th>
<th style="font-family:'Droid Arabic Kufi';">إسم الصنف</th>
<th style="font-family:'Droid Arabic Kufi';">الوحدة</th>
<th style="font-family:'Droid Arabic Kufi';">الكمية</th>
<th style="font-family:'Droid Arabic Kufi';">السعر</th>
<th style="font-family:'Droid Arabic Kufi';">شامل الضريبة</th>
<th style="font-family:'Droid Arabic Kufi';">الإجمالي</th>
<th style="font-family:'Droid Arabic Kufi';">التاريخ</th>
</tr>
</thead>

<?php
// كود البحث في  سجلات المبيعات
include('dbcon/dbcon.php'); $sql=mysql_query("select * from sales");
$row=mysql_fetch_array($sql);?>

<tbody>

<?php do { ?>
<tr>

<td><?php echo $row['invoice'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['category'];?></td>
<td><?php echo $row['qty'];?></td>
<td><?php echo $row['price'];?></td>
<td><?php $sum=$row['qty']*$row['price']; echo $sum*$tax/100;?></td>
<td><?php echo $sum=$row['qty']*$row['price'];?></td>
<td><?php echo $row['date'];?></td>

</tr>

<?php }while($row=mysql_fetch_array($sql));?>
						
</tbody>

<tfoot>
<tr align="center">

<th style="font-family:'Droid Arabic Kufi';">الباركود</th>
<th style="font-family:'Droid Arabic Kufi';">إسم الصنف</th>
<th style="font-family:'Droid Arabic Kufi';">الوحدة</th>
<th style="font-family:'Droid Arabic Kufi';">الكمية</th>
<th style="font-family:'Droid Arabic Kufi';">السعر</th>
<th style="font-family:'Droid Arabic Kufi';">الإجمالي</th>
<th style="font-family:'Droid Arabic Kufi';">شامل الضريبة</th>
<th style="font-family:'Droid Arabic Kufi';">التاريخ</th>
</tr>
						        </tfoot>
							</table>
						</div>
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</section>
<!--/نهاية الكود البرمجي لصفحة عرض البيانات  -->


<!--رابط مكتبات جافا سكربت لضبط تنسيق الملف -->
<script src="assets/js/vendor.min.js"></script>
<script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
<!-- مكتبات جافا سكربت لتنسيق الوضع -->
<script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/vfs_fonts.js"></script>
<script src="assets/libs/datatables/buttons.html5.min.js"></script>
<script src="assets/libs/datatables/buttons.print.min.js"></script>

<!-- كود مكتبة جافا سكربت لجداول البيانات علي الهاتف الجوال  -->
<script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>

<!-- رابط مكتبة جافا سكربت لمكتبات جداول البيانات -->
<script src="assets/js/pages/datatables.init.js"></script>

<!-- كود مكتبة جافا سكربت لتخصيص وضع التصميم علي الهاتف الجوال -->
<script src="assets/js/app.min.js"></script>