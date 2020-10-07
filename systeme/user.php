<?php include('header.php');?>
<div class="app-content content container-fluid">

        <form name="form1" method="post" action="user.php" enctype="multipart/form-data">
            <table style="width:100%; border:20px;" border="0" align="center" class="table table-bordered  table-hover ">
                <tr>
                    <td colspan="8" class="">Add New User <i class="fa fa-user"></i> </td>
                   </tr>
                <tr>
                    <td nowrap style="width:5%; ">Full Name </td>
                    <td colspan="3"><input type="text" name="a"  class="form-control" required autofocus autocomplete="off"></td>
               
                    <td nowrap="nowrap" style="width:5%; ">Phone</td>
                    <td><input type="number" min="0" maxlength="14"   name="b"  class="form-control" required autocomplete="off"></td>
                    </tr>
                <tr>
				    <td style="width:8%; ">Type</td>
                    <td ><select name="c" class="selectpicker m-b-0" data-style="btn-light" required>
                            <option value="1" data-icon="mdi mdi-account-circle">Manage</option>
                            <option value="2" data-icon="mdi mdi-account-circle">Sales</option>
                            <option value="3" data-icon="mdi mdi-account-circle">Purchases</option>
                            <option value="4" data-icon="mdi mdi-account-circle">Store</option>
                            <option value="0"  data-icon="mdi mdi-account-circle">Block</option>
                        </select></td>
              
                    <td style="width:5%;" nowrap> User</td>
                    <td ><input type="text" name="d" class="form-control" required autocomplete="off"></td>
                    <td style="width:5%;">Password </td>
                    <td><input type="password" name="e" class="form-control" required autocomplete="off"></td>
                    </tr>
                <tr>
         <td style="width:8%;">Work</td>
<td><select name="cxx" class="selectpicker m-b-0 btn-primary" data-style="btn-primary" required>
                            <option value="صباح" data-icon="mdi mdi-account-circle">morning</option>
                            <option value="مساء" data-icon="mdi mdi-account-circle">evening</option>
              
                        </select></td>

         <td nowrap>From </td>
<td style="width:14%;"><input type="time" name="t1" id="timepicker"  class="form-control" required autocomplete="off"></td>
         <td nowrap> To</td>
<td style="width:14%;"><input type="time" name="t2" id="timepicker"   class="form-control" required autocomplete="off"></td>

		    </table>

            <table style="width:100%; border:1px;" align="center" class="table table-borderd table-hover ">
                <tr>
        <td style="width: 15%;">&nbsp;</td>
        <td style="width: 10%;">&nbsp;</td>
        <td style="width: 15%;">&nbsp;</td>
        <td style="width: 15%;">&nbsp;</td>
        <td style="width: 15%;" align="left"><button type="submit" style="font-family:'Droid Arabic Kufi';" name="ok" class="btn btn-primary form-control" style="width:100%;"> Save <i class="fa fa-user"></i></button></td>
        <td style="width: 15%;" align="left"><a href="index.php"><button type="button" style="font-family:'Droid Arabic Kufi';" class="btn btn-danger form-control" style="width:100%;"> Home <i class="fa fa-home"></i></button></a></td>
                </tr>
            </table>
        </form>
        <table style="width:100%;border:20px;" border="1" align="center" class="table table-bordered table-hover ">
            <?php
            include('dbcon/config.php');
            $sql=mysql_query("select * from users ");
            $row=mysql_fetch_array($sql);
            ?>
            <tr align="center">
                <td style="width: 35%;">Full Name</td>
                <td nowrap>Phone</td>
                <td>Type</td>
                <td style="width: 10%;" colspan="2">Control</td>
            </tr>
            <?php do { ?>
                <tr>
                    <td nowrap><?php echo $row['name'];?></td>
                    <td nowrap><?php echo $row['phone'];?></td>
                    <td nowrap><?php if($row['level']==1)
                        {
                            echo "Manager";
                        }
                        elseif($row['level']==2)
                        {
                            echo "Sales";
                        }elseif($row['level']==3)
                        {
                            echo "Purchases";
                        }elseif($row['level']==4)
                        {
                            echo "Storing";
                        }elseif($row['level']==5)
                        {
                            echo "Account";
                        }elseif($row['level']==6)
                        {
                            echo "Block";
                        };?></td>
                    <td align="center"><a href="delete.php?&&id=<?php echo $row['id'];?>" onClick="return confirm('Do you want Delete المستخدم <?php echo $row['name'];?>');">
                            <button class="btn form-control btn-primary" style="width: 100px; font-family:'Droid Arabic Kufi';"> Delete <i class="fa fa-times"></i></button>
                        </a></td>
                    <td align="center"><a href="upuser.php?&&id=<?php echo $row['id'];?>">
                            <button class="btn form-control btn-danger" style="width: 100px; font-family:'Droid Arabic Kufi';"> Edit <i class="fa fa-edit"></i></button>
                        </a></td>
                </tr>
            <?php } while($row=mysql_fetch_array($sql));?>
        </table>
    </div>

<?php
include('dbcon/config.php');
if(isset($_POST['ok']))
{
    $a=$_POST['a'];
    $b=$_POST['b'];
    $c=$_POST['c'];
    $d=$_POST['d'];
    $e=$_POST['e'];
    $cxx=$_POST['cxx'];
    $t1=$_POST['t1'];
    $t2=$_POST['t2'];
    $user=mysql_query("insert into users values('null','$a','$b','$c','$d','$e','$cxx','$t1','$t2',now(),'$_SESSION[tell]')");
    if($user)
    {
        echo "<script type='text/javascript'>
        $(document).ready(function(){
        $('#centralModalSuccess').modal('show');
        });
        </script>";
      }
    else
    {
        echo "<script> alert('عفو المستخدم $a مسجل مسبقاً');</script>";
        echo "<meta http-equiv='refresh' content='0;url=user.php'>";
    }
}
?>






 <!-- Central Modal Medium Success -->
 <div class="modal fade" id="centralModalSuccess" data-backdrop="static" data-keyboard="false"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-success" role="document">
     <!--Content-->
     <div class="modal-content">
       <!--Header-->
       <div class="modal-header">
         <p class="heading lead">POS</p>

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
         <a href="user.php" type="button" class="btn btn-Primary waves-effect" style="width: 50%; font-family: 'Droid Arabic Kufi';" data-dismiss="">موافـق <i class=" fas fa-user-shield "></i></a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Success-->