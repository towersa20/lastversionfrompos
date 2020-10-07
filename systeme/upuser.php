<?php include('header.php');?>
<title>تعديل</title>

<?php
if(isset($_POST["ok"]))
{
include("dbcon/config.php");
$up=mysql_query("update users set name='$_POST[a]',phone='$_POST[b]',level='$_POST[c]',username='$_POST[d]',password='$_POST[e]',date=now() where id='$_GET[id]'");
if($up)
{
  echo "<script type='text/javascript'>
  $(document).ready(function(){
  $('#centralModalSuccess').modal('show');
  });
  </script>";
}
else
{
echo "<script> alert ('لم يتم تعديل المستخدم');</script>";
echo "<meta http-equiv='refresh' content='0;url=user.php'>";
}
}
else
{
include("dbcon/config.php");
$d=mysql_query("select*from users where id='$_GET[id]'");
$row=mysql_fetch_array($d);
?>

<div class="app-content content container-fluid">
    <form name="form1" method="post" action="" enctype="multipart/form-data">
          <table style="width:100%;" border="1" align="center" dir="rtl" class="table table-bordered table-hover">
                  <tr><td colspan="6" class="">Edit User <i class="fa fa-user"></i></td></tr>
<tr>
    <td nowrap style="width:5%;">Full Name </td>
<td colspan="3"><input type="text" name="a" value="<?php echo $row['name'];?>" class="form-control big-shadow" required autocomplete="off">
    </td>

<td style="width:7%; ">Type</td>

          <td>
            <select name="c" class="selectpicker m-b-0" data-style="btn-light" required>
            <option value="1" data-icon="mdi mdi-account-circle">Manager</option>
            <option value="2" data-icon="mdi mdi-account-circle">Sales</option>
            <option value="3" data-icon="mdi mdi-account-circle">Purchases</option>
            <option value="4" data-icon="mdi mdi-account-circle">Store</option>
            <option value="0"  data-icon="mdi mdi-account-circle">Block</option>
            </select>
          </td>
</tr>

<tr>
<td style="width:5%; ">Phone</td>
<td style="width:23%; "><input type="number" min="0" maxlength="14" value="<?php echo $row['phone'];?>" name="b" class="form-control big-shadow" required autocomplete="off"></td>

<td style="width:5%; " nowrap>Username</td>
<td><input type="text" name="d" value="<?php echo $row['username'];?>" class="form-control big-shadow" required autocomplete="off"></td>

<td style="width:6%;" nowrap="nowrap">Password </td>
<td><input type="password" name="e" value="<?php echo $row['password'];?>" class="form-control big-shadow" required autocomplete="off"></td>

</tr>

</table>      
<table style="width:100%;" align="center" class="table table-borderd table-hover ">
<td style="width:5%;"></td>   
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;"></td>
<td style="width:15%;" align="left"><button type="submit" name="ok" class="btn btn-primary" style="width:100%; font-family: 'Droid Arabic Kufi';"> Edit <i class="fa fa-edit"></i></button></td>
<td style="width:15%;" align="left"><a href="index.php"><button type="button" name="ok" class="btn btn-danger" style="width:100%; font-family: 'Droid Arabic Kufi';"> Home <i class="fa fa-home"></i></button></a></td>
  </tr>
  </table>
</form></div>
</body>
</html>
<?php
}?> 





 <!-- Central Modal Medium Success -->
 <div class="modal fade" id="centralModalSuccess" data-backdrop="static" data-keyboard="false"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-success" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <strong class="heading lead">POS</strong>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
           <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
           <p>Data Has been successfully  Saved</p>
         </div>
       </div>

       <!--Footer-->
       <div class="modal-footer justify-content-center">
         <a href="user.php" type="button" class="btn btn-Primary waves-effect" style="width: 50%; font-family: 'Droid Arabic Kufi';" data-dismiss="">ok <i class=" fas fa-user-shield "></i></a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->