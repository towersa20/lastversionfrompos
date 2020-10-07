<?php include("header.php");?>

<div class="app-content content container-fluid">
		<form name="form1" method="post" action="item.php">
				<table class="table table-bordered table-hover">
<tr><td colspan="8"> تسجيل بيانات الأصـناف <i class="fab fa-accusoft"></i></td></tr>		

<tr align="center">
	<td>الباركود</td>
	<td>الصنــف</td>
	<td>الوحده</td>
	<td>سعر الشراء</td>
</tr>

<tr>
<td><input type="text" autofocus  name="a" placeholder="الباركود" title="Pic Barcode Reader Here" class="form-control" required autocomplete="off"></td>
<td><input type="text" name="b" placeholder="الصنف" title="Add New Product Name" class="form-control" required autocomplete="off"></td>
<td style="width:20%;"><select name="c" autofocus class="selectpicker" data-live-search="true" data-style="btn-primary" required>
              <?php include('dbcon/config.php');
              $brima=mysql_query("select * from unitz");
              $res=mysql_fetch_array($brima);?>
              <?php do { ?>
                  <option value="<?php echo $res['name'];?>" ><?php echo $res['name'];?></option>
              <?php } while($res=mysql_fetch_array($brima));?>
              </select></td>
<td><input type="number"  step="0.00" min="1" title="add just prushes price" placeholder="00.0" name="d" class="form-control" required autocomplete="off"></td>
<tr>
</table>
<table class="table table-bordred table-hover">
	<tr>
<td style="width:54%;"></td>
<td style="width:23%;"><button style="width:100%; font-family: 'Droid Arabic Kufi';" type="submit" name="ok" title="save new Product" class="btn btn-primary "> تسجيـل  <i class=" fab fa-accusoft "></i></button></td>
<td style="width:23%;"><a href="index.php"><button type="button" style="width:100%; font-family: 'Droid Arabic Kufi';" title="Cancel Screen and Go to Home Page of System" class="btn btn-success"> النظام <i class="fa fa-home"></i></button></a></td>
    </tr>           
</table>
</form>

<link href="assets/libs/datatables/dataTables.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/buttons.bootstrap4.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/datatables/responsive.bootstrap4.css" rel="stylesheet" type="text/css" />
 
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

<?php /*
		
		 <div class="content-body"><!-- HTML (DOM) sourced data -->
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
	            <div class="card-content  collapse show">
	                <div class="card-body card-dashboard">
	              
						<div class="table-responsive">
						<table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                       		        <thead>
							            <tr align="center">
							                <th style="font-family:'Droid Arabic Kufi';">الباركود</th>
							                <th style="font-family:'Droid Arabic Kufi';">إسم الصنف</th>
										    <th style="font-family:'Droid Arabic Kufi';">الوحدة</th>
							                <th style="font-family:'Droid Arabic Kufi';">السعــر</th>
							                <th style="font-family:'Droid Arabic Kufi'; width: 15%;">حذف</th>
							                <th style="font-family:'Droid Arabic Kufi'; width: 15%;">تعديل</th>
							            </tr>
							        </thead>
									<?php include('dbcon/db.php');
									$sql=mysql_query("select * from products");
									$row=mysql_fetch_array($sql);?>
							        <tbody>
									<?php do { ?>
							            <tr>
							                <td><?php echo $row['pid'];?></td>
							                <td><?php echo $row['product_name'];?></td>
							                <td><?php echo $row['unit'];?></td>
							                <td><?php echo $row['product_price'];?></td>
											<td><a href="delete.php?&&infoprod=<?php echo $row['prid'];?>" onClick="return confirm('هل تريد حذف <?php echo $row['name'];?>');">
        <button class="btn btn-danger" style="width: 100%; font-family:'Droid Arabic Kufi';">  <i class=" fas fa-times-circle "></i> حذف </button></a></td>
		<td align="center"><a href="upitem.php?&&infoprod=<?php echo $row['prid'];?>">
		<button class="btn btn-primary form-control" style="font-family:'Droid Arabic Kufi';">  <i class="fa fa-edit"></i> تعديل</button>
										 </tr>
										<?php }while($row=mysql_fetch_array($sql));?>
						
							        </tbody>
							        <tfoot>
                                    <tr align="center">
							                <th style="font-family:'Droid Arabic Kufi';">الباركود</th>
							                <th style="font-family:'Droid Arabic Kufi';">إسم الصنف</th>
										    <th style="font-family:'Droid Arabic Kufi';">الوحدة</th>
							                <th style="font-family:'Droid Arabic Kufi';">السعــر</th>
							                <th style="font-family:'Droid Arabic Kufi';">حذف</th>
							                <th style="font-family:'Droid Arabic Kufi';">تعديل</th>
							            </tr>
							        </tfoot>
							</table>
						</div>
					</div>
	            </div>
	        </div>
	    </div>
	</div>
</section>*/?>
<!--/ HTML (DOM) sourced data -->


<!-- Required datatable js -->
<script src="assets/libs/datatables/jquery.dataTables.min.js"></script>
<script src="assets/libs/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/libs/datatables/dataTables.buttons.min.js"></script>
<script src="assets/libs/datatables/buttons.bootstrap4.min.js"></script>
<script src="assets/libs/jszip/jszip.min.js"></script>
<script src="assets/libs/pdfmake/pdfmake.min.js"></script>
<script src="assets/libs/pdfmake/vfs_fonts.js"></script>
<script src="assets/libs/datatables/buttons.html5.min.js"></script>
<script src="assets/libs/datatables/buttons.print.min.js"></script>

<!-- Responsive examples -->
<script src="assets/libs/datatables/dataTables.responsive.min.js"></script>
<script src="assets/libs/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatables init -->
<script src="assets/js/pages/datatables.init.js"></script>

<!-- App js -->
<script src="assets/js/app.min.js"></script>

<?php 
 if(isset($_POST["ok"])){
include('dbcon/dbcons.php');
                   // كود  تسجيل بيانات الاصناف
            if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            } 
            $sql = "INSERT INTO products(prid ,pid , product_name,unit ,product_price,product_stock,p_status)VALUES
			 ('','".$_POST["a"]."','".$_POST["b"]."','".$_POST["c"]."','".$_POST["d"]."',10000000,1)";

            if (mysqli_query($conn, $sql)) {
               echo "<script> alert('تم تسجيل الصنف');</script>";
			           echo "<meta http-equiv='refresh' content='0;url=item.php'>";

            } else {

               echo "<script> alert('لم يتم تسجيل الصنف');</script>";
			           echo "<meta http-equiv='refresh' content='0;url=item.php'>";
/*               echo "<script> alert('الصنف مسجل مسبقاً');</script>: " . $sql . "" . mysqli_error($conn);
        */    }
            $conn->close();
         }
      ?>
<?php
/*
include('dbcon/dbcon.php');

if(isset($_POST['ok']))

{

$a=$_POST['a'];
$b=$_POST['b'];


$sql=mysql_query("select * from storing where name='$_POST[b]'");
$row=mysql_fetch_array($sql);

if($row['name']==$_POST['a'])
{
$up=mysql_query("update storing set price='$d' where name='$_POST[b]'");

}
else
{
//$user=mysql_query("insert into storing  values('','$a','$cx','1000000',1)");
//echo "<meta http-equiv='refresh' content='0;url=item.php'>";
}
}*/
?>






 <!-- Central Modal Medium Success -->
 <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-success" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <p class="heading lead">نظام المبيعات</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
           <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
           <p>تم تسجيل البيانات بنجاح</p>
         </div>
       </div>

       <!--Footer-->
       <div class="modal-footer justify-content-center">
         <a href="item.php" type="button" class="btn btn-Primary waves-effect" style="width: 50%; font-family: 'Droid Arabic Kufi';" data-dismiss="">موافـق <i class=" fas fa-user-shield "></i></a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->