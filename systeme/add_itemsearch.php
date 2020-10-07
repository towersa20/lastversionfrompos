<?php
// ملف التصميم
include('header.php');?>


        <!-- مكتبات التصميم  -->

<link href="assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
             <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
                <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
                       <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

		
		
<div class="content-body">
    
    <!-- ملف البحث في المشتريات -->
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
				Search in purchases
        <!-- جدول عرض سجلات المشتريات -->

<div class="card-content  collapse show">
    <div class="card-body card-dashboard">
	            <div class="table-responsive">
                

<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
<thead>
<tr align="center">
<th style="font-family:'Droid Arabic Kufi';">Product</th>
<th style="font-family:'Droid Arabic Kufi';">Unit</th>
<th style="font-family:'Droid Arabic Kufi';">Quntity</th>
<th style="font-family:'Droid Arabic Kufi';">Purchases</th>
<th style="font-family:'Droid Arabic Kufi';">Tax</th>
<th style="font-family:'Droid Arabic Kufi';">Total</th>
<th style="font-family:'Droid Arabic Kufi';">date</th>
<th style="font-family:'Droid Arabic Kufi'; width: 15%;">Delete</th>
<th style="font-family:'Droid Arabic Kufi'; width: 15%;">Edit</th>
<th style="font-family:'Droid Arabic Kufi'; width: 15%;">Print Barcode</th>

</tr>
</thead>


<?php
// استدعاء ملف الاتصال بقاعدة البيانات
include('dbcon/dbcon.php');
//عرض بيانات المشتريات من جدول المشتريات
$sql=mysql_query("select * from share where tell ='$_SESSION[tell]'");
$row=mysql_fetch_array($sql);?>

<tbody>

<?php
// حلقة التكرار
do { ?>
<tr>

<td><?php echo $row['name'];?></td>
<td><?php echo $row['unit'];?></td>
<td><?php echo $row['qunt'];?></td>
<td><?php echo $row['price'];?></td>
<td><?php echo $row['price']*$row['qunt']*$tax/100;?></td>
<td><?php echo $row['price']*$row['qunt'];?></td>
<td><?php echo $row['date'];?></td>


        <!-- ازار الحذف والتعديل -->

<td><a href="delete.php?&&pid2=<?php echo $row['pid'];?>" onClick="return confirm('Do you want Delete <?php echo $row['name'];?>');">
<button class="btn btn-danger" style="width: 100%; font-family:'Droid Arabic Kufi';">  Delete <i class=" fas fa-times-circle "></i></button></a></td>
<td align="center"><a href="upprush.php?&&pid=<?php echo $row['pid'];?>"><button class="btn btn-primary form-control" style="font-family:'Droid Arabic Kufi';"> Edit <i class="fa fa-edit"></i></button>

<td align="center"><a href="printbarcode.php?&&pid=<?php echo $row['pid'];?>"><button class="btn btn-warning form-control" style="font-family:'Droid Arabic Kufi';">Print <i class="fa fa-qrcode"></i></button>

</tr>

<?php }while($row=mysql_fetch_array($sql));?>
						
</tbody>

<tfoot>
<tr align="center">

<th style="font-family:'Droid Arabic Kufi';">Product</th>
<th style="font-family:'Droid Arabic Kufi';">Unit</th>
<th style="font-family:'Droid Arabic Kufi';">Quntity</th>
<th style="font-family:'Droid Arabic Kufi';">Purchases</th>
<th style="font-family:'Droid Arabic Kufi';">Tax</th>
<th style="font-family:'Droid Arabic Kufi';">Total</th>
<th style="font-family:'Droid Arabic Kufi';">date</th>
<th style="font-family:'Droid Arabic Kufi'; width: 15%;">Delete</th>
<th style="font-family:'Droid Arabic Kufi'; width: 15%;">Edit</th>
<th style="font-family:'Droid Arabic Kufi'; width: 15%;">Print Barcode</th>
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