<?php include('header.php');?>



<form action="preson.php" method="POST" enctype="multipart/form-data">
<table class="table table-bordered table-striped">

<tr>
    <td colspan="6">  <i class="fa fa-user"></i> تسجيل بيانات المناديب</td>

</tr>
<tr>
<td>الاسم</td>
<td colspan="5"><input type="text" class="form-control" required name="a"></td>

</tr>
<tr>
<td>الهاتف</td>
<td><input type="text" class="form-control" required name="b"></td>
<td>الايميل</td>
<td><input type="text" class="form-control"  name="c"></td>
<td>العنوان</td>
<td><input type="text" class="form-control"  name="d"></td>

</tr>
<tr>
<td>رقم الهوية</td>
<td><input type="text" class="form-control"  name="e"></td>
<td>رقم المركبه</td>
<td><input type="text" class="form-control"  name="f"></td>
<td>المركبه</td>
<td><input type="text" class="form-control"  name="g"></td>
</tr>
<Tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td><button name="ok" value="تسجيل" class=" btn btn-primary" style="width:100%;"><i class="fa fa-user"></i> تسجيل</td>
</Tr>
</table>

</form>


<table style="width:100%;border:20px;" border="1" align="center" class="table table-bordered table-hover ">
            <?php
            include('dbcon/config.php');
            $sql=mysql_query("select * from rep");
            $row=mysql_fetch_array($sql);
            ?>
            <tr align="center">
                <td style="width: 35%;">الأسم الكامل</td>
                <td nowrap>رقم الهاتف</td>
                <td>البريد الالكتروني</td>
                <td style="width:15%;">تاريخ التسجيل</td>
                <td style="width: 10%;">التحكم</td>
            </tr>
            <?php do { ?>
                <tr>
                    <td nowrap><?php echo $row['name'];?></td>
                    <td nowrap><?php echo $row['phone'];?></td>
                    <td nowrap><?php echo $row['email'];?></td>
           
                    <td nowrap><?php echo $row['date'];?></td>
                    <td align="center"><a href="delete.php?&&usd=<?php echo $row['id'];?>" onClick="return confirm('هل تريد حذف المستخدم <?php echo $row['name'];?>');">
                            <button class="btn form-control btn-primary" style="width: 100px; font-family:'Droid Arabic Kufi';"> حذف <i class="fa fa-trash-o"></i></button>
                        </a></td>
              
                </tr>
            <?php } while($row=mysql_fetch_array($sql));?>
        </table>
<?php 
if(isset($_POST['ok']))
{
    include('dbcon/dbcon.php');
    $a=$_POST['a'];
    $b=$_POST['b'];
    $c=$_POST['c'];
    $d=$_POST['d'];
    $e=$_POST['e'];
    $f=$_POST['f'];
    $g=$_POST['g'];
 $add=mysql_query("insert into rep values('','$a','$b','$c','$d','$e','$f','$g',now())");
 if($add)
 {
     echo "<script> alert('تمت عملية تسجيل المندوب $a');</script>";
     echo "<meta http-equiv='refresh' content='0;url=preson.php'>";
 }
 else
 {
     echo "<script> alert('عفو المندوب $a مسجل مسبقاً');</script>";
     echo "<meta http-equiv='refresh' content='0;url=preson.php'>";
 }
}
?>