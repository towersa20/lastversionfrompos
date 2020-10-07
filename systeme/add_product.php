<?php include('header.php');?>
<?php
include('dbcon/dbcon.php');
$sql=mysql_query("select * from storing ");
$row=mysql_fetch_array($sql);
do { ?>

<form action="add_product.php" method="POST">

   <input type="hidden" name="a[]" value="<?php echo $row['barco'];?>">
   <input type="hidden" name="b[]" value="<?php echo $row['name'];?>">
   <input type="hidden" name="c[]" value="<?php echo $row['unit'];?>">
    </tr>
    <?php }while($row=mysql_fetch_array($sql));?>
    <table class="table table-borderd">
    <tr>
    <td style="width:14%;"><button name="ok" class="btn " style="background-color:red; width: 100%;height:100px; font-size:20px; font-family: 'Droid Arabic Kufi';"> Purchases Activation <i class="fa fa-qrcode"></i> </button></td>

    </tr>
</table>
</form>





<?php
include 'dbcon/dbcons.php';
if (isset($_POST['ok'])) {
   
  $a=$_POST['a'];

  $b=$_POST['b'];
  $c=$_POST['c'];
    
    for ($i = 0; $i < count($a); $i++) {
        $sql = "INSERT INTO products (pid, product_name, unit,product_price,product_stock,p_status,tell) " .
                             " VALUES ('$a[$i]','$b[$i]','$c[$i]','0' ,'1000000','0','0' )";

        //$conn is the name of your connection string
        $results = mysqli_query($conn, $sql);
        if (!$results) {
         //   echo "Error: " . $sql . "<br>" . $query->error;
        }

    }
}
?>




 <!-- Central Modal Medium Success -->
 <div class="modal fade" id="centralModalSuccess" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-success" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <H5 class="heading lead" style="font-family: 'Droid Arabic Kufi';">نظام المبيعات</H5>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
           <i style="width: 10px;" class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
           <p>تم تسجيل البيانات بنجاح</p>
         </div>
       </div>

       <!--Footer-->
       <div align="left" class="modal-footer justify-content-center">
         <a href="vat.php" type="button" class="btn btn-Primary waves-effect" style="width: 50%; font-family: 'Droid Arabic Kufi';" data-dismiss="">موافـق <i class=" fas fa-user-shield "></i></a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->