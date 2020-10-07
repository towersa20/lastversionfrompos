<?php include('header.php');?>


<table style="width:100%; " align="center" class="table table-bordered table-hover ">

<form action="" method="POST" enctype="multipart/form-data">
<tr>
<td>العميل</td>
<td colspan="2"><input type="text" name="xx1" value="<?php echo $_GET['x1'];?>" class="form-control" required></td>
<td>رقم الفاتورة</td>
<td colspan="2"><input type="text" name="xx3" value="<?php echo $_GET['x2'];?>" class="form-control" required></td>
<td>المبلغ</td>
<td><input type="text" name="xx2" value="<?php echo $_GET['x3'];?>" class="form-control" required></td>
<td><input value="سدا" type="submit" name="ok"  class="form-control btn-danger btn" ></td>
</tr>
</form>
</table>

<?php 
if(isset($_POST['ok']))
{
    $xx1=$_POST['xx1'];
    $xx2=$_POST['xx2'];
    $add=mysql_query("update info set pros='$_POST[xx2]' where id='$_POST[xx3]' ");
    echo "<Script> alert('تم السداد');</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";

}
?>
