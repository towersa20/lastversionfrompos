<?php include('header.php');?>
<hr>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">

<div class="card card-nav-tabs">
  <h4 class="card-header card-header-primary" style="font-family: 'Droid Arabic Kufi';" >تثبيت برنامج المبيعات</h4>

  <div class="card-body">
    <h4 class="card-title"><button type="button" style="font-family: 'Droid Arabic Kufi';" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
            منح حقوق إستخدام البرنامج            <i class="material-icons">ondemand_video</i>
        </button></h4>
    <table class="table table-borderd table-responsive-xl">
    <thead>
    <tr align="center" class="card-body card-header-primary">
    <td  class="text-center">#</td>
            <th style="width: 20%;">الإسم عربي</th>
           <th style="width: 15%;">الرقم الضريبي</th>
        <th style="width: 15%;">رقم الترخيص</th>
        <th style="width: 15%;">الهاتف</th>
            <th style="width: 15%;">الإيميل</th>
            <th style="width: 15%;">الموقع</th>
            <th style="width: 15%;">الشعار</th>
            <th style="width: 15%;" align="center">الإجراء</th>
        </tr>
    </thead>
	<?php
	include('../dbcon/dbcon.php');
	$sql=mysql_query("select * from systematical order by id asc");
	$row=mysql_fetch_array($sql);?>
	
    <tbody>
    <?php do { ?>    <tr>
            <td class="text-center"><?php echo $row['id'];?></td>
            <td><?php echo $row['ar'];?></td>
        <td><?php echo $row['lino'];?></td>
        <td><?php echo $row['taxno'];?></td>
        <td><?php echo $row['phone'];?></td>
            <td><?php echo $row['email'];?></td>
            <td><?php echo $row['site'];?></td>       
            <td><?php echo '<img src="./' .$row['imge']. '"width="80" height="80"> '; ?></td>
        <td><a href="delete.php?id=<?php echo $row['id'];?>" onclick="return confirm('هل تريد الحذف');">
                <button class="btn btn-rose"> حذف <i class="material-icons">delete</i></button></a> </td>
         </tr>
		<?php }while($row=mysql_fetch_array($sql));?>
        <tr>
            <td class="text-center">العدد</td>
            <td>
			<?php include('../dbcon/dbcon.php');
			$sql=mysql_query("select count(id)from systematical");
			$row=mysql_fetch_array($sql);
			echo $row['count(id)'];?></td>
            <td></td>
            <td></td>
            <td></td>

            <td></td>

            <td></td>
            <td></td>
                    </tr>
        
    </tbody>
</table>
  </div>
</div>
        </div>
      </nav>
    </div>
<!-- Modal -->
<div class="modal fade animated flipInY" id="exampleModalLong" tabindex="-5" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> تسجيل برنامج نقاط البيع <i class="material-icons">streetview</i></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
           <form name="form1"  action="info.php" method="post" enctype="multipart/form-data" >
		      <table class="table">
                   <tr>
                       <td nowrap="on" style="width: 12%;">الأسم عربي</td>
                       <td><input  name="a" type="text" class="form-control"  id="search" placeholder="إسم المؤسسة باللغة العربيـــــــة" list="searchresults" autocomplete="off">
</td>
                   </tr>
                   <tr>
                       <td>Org Name</td>
                       <td><input type="text" name="b" class="form-control"  autocomplete="off" placeholder="إسم المؤسسة باللغة الإنجليزية"></td>
                   </tr>
                  <tr>
                      <td>رقم الترخيص</td>
                      <td><input type="Number" name="c1" class="form-control"  autocomplete="off" placeholder="رقم الترخيص"></td>
                  </tr>
                  <tr>
                      <td>الرقم الضريبي</td>
                      <td><input type="Number" name="c2" class="form-control"  autocomplete="off" placeholder="الرقم الضريبي"></td>
                  </tr>
                  <tr>
                      <td>رقم الهاتف</td>
                      <td><input type="Number" name="c" class="form-control"  autocomplete="off" placeholder="رقم الهاتف"></td>
                  </tr>
				                      <tr>
                       <td>البريد الإلكتروني</td>
                       <td><input type="text" name="d" class="form-control"  autocomplete="off" placeholder="البريد الإلكتروني"></td>
                   </tr>
				                      <tr>
                       <td>الموقع الإلكتروني</td>
                       <td><input type="text" name="e" class="form-control"  autocomplete="off" placeholder="الموقع الإلكتروني"></td>
                   </tr>
				                      <tr>
                       <td>العنوان</td>
                       <td><input type="text" name="f" class="form-control"  autocomplete="off" placeholder="العنوان الدائم"></td>
                   </tr>
		
                   <tr>
                       <td>المرفقــات</td>
                       <td><input name="uploadedimage" type="file" class="form-control"  title="صورة مرفقة"/></td>
                   </tr>
                   
               </table>
           </div>
            <div class="modal-footer">
                <button type="submit" name="ok" style="width: 180px; font-family:'Droid Arabic Kufi';" class="btn btn-primary"><i class="material-icons">dashboard</i> موافق </button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php 
if(isset($_POST["ok"]))
{
include('../dbcon/dbcon.php');
$a=$_POST['a'];
$b=$_POST['b'];
$c=$_POST['c'];
    $c1=$_POST['c1'];
    $c2=$_POST['c2'];
 function GetImageExtension($imagetype)
   	 {
       if(empty($imagetype)) return false;
       switch($imagetype)
       {
           case 'image/bmp': return '.bmp';
           case 'image/gif': return '.gif';
           case 'image/jpeg': return '.jpg';
           case 'image/png': return '.png';
           default: return false;
       }
     }
	 
	 
	 
if (!empty($_FILES["uploadedimage"]["name"])) {

	$file_name=$_FILES["uploadedimage"]["name"];
	$temp_name=$_FILES["uploadedimage"]["tmp_name"];
	$imgtype=$_FILES["uploadedimage"]["type"];
	$ext= GetImageExtension($imgtype);
	$imagename=date("d-m-Y")."-".time().$ext;
	$mx=$target_path = "upload/".$imagename;
	

if(move_uploaded_file($temp_name, $target_path)) {

 $ems=mysql_query("insert into systematical values (' ','$_POST[a]','$_POST[b]','$_POST[c1]','$_POST[c2]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[f]','$target_path')");
if($ems)
{
echo "<script> alert('تم حفظ المعلومات $a');</script>";
        echo "<meta http-equiv='refresh' content='0;url=info.php'>";

} 
else
{
echo "<script> alert('لم يتم حفظ اي بيانات');</script>";
        echo "<meta http-equiv='refresh' content='0;url=info.php'>";

}
}}}
?>