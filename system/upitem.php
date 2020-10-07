<?php
// ملف التصميم
include('header.php');?>

<?php

// كود عرض البيانات المرسلة للتعديل
include('dbcon/dbcons.php');
   $strinfoprod = null;

   if(isset($_GET["infoprod"]))
   {
     $infoprod=$_GET["infoprod"];
	 $strinfoprod = $_GET["infoprod"];
   }
include('dbcon/dbcons.php');
   $sql = "SELECT * FROM products WHERE prid = '$_GET[infoprod]'";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);
// نهاية كود عرض البيانات المرسلة للتعديل
?>




<!-- بداية فورم تعديل الاصناف!-->


<form action="" name="frmAdd" enctype="multipart/form-data" method="post">
<table class="table table-bordered table-hover" border="1">
  <tr><td colspan="8">تعديل بيانات الصنف <i class="fab fa-accusoft"></i></td></tr>
  <tr>
   <input type="hidden" name="ax" value="<?php echo $result["prid"];?>"><?php  $result["prid"];?>
       <td >باركود</td>
    <td><input type="text" name="a" class="form-control" autocomplete="off"  value="<?php echo $result["pid"];?>"></td>
 
    <td >الصنف</td>
    <td><input type="text" name="b" class="form-control" autocomplete="off"  value="<?php echo $result["product_name"];?>"></td>

    <td >الوحدة</td>
    <td><input type="text" name="c" class="form-control" autocomplete="off" value="<?php echo $result["unit"];?>"></td>

    <td >السعر</td>
    <td><input type="text" name="d" class="form-control" step="00.01" autocomplete="off"  value="<?php echo $result["product_price"];?>"></td>
    </tr>

  </table>
<table class="table table-bordered table-hover">
<tr>
<td align="left"><button class="btn btn-primary" style="width:20%; font-family: 'Droid Arabic Kufi';" name="ok" type="submit"> تعديـل <i class="fab fa-accusoft"></i></button>
</td></tr></table></form>

<!-- نهاية فورم تعديل الاصناف!-->
<?php
// نهاية الاتصال
mysqli_close($conn);
?>





<?php
if(isset($_POST['ok']))
{
  // كود تعديل بيانات الاصناف
include('dbcon/dbcon.php');
$up=mysql_query("update products set pid='$_POST[a]',product_name='$_POST[b]', unit='$_POST[c]',product_price='$_POST[d]' where prid='$_POST[ax]'");
	if($up) {
		
    echo "<script type='text/javascript'>
    $(document).ready(function(){
    $('#centralModalSuccess').modal('show');
    });
    </script>";
	}
	}
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
           <p>تم  تعديل البيانات بنجاح</p>
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