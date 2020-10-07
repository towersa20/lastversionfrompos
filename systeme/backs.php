<?php include('header.php');?>

<!-- بداية فورم عرض تقرير المبيعات Dayي -->
<div class="app-content content container-fluid">

   <form name="form1" method="post" action="rback.php" >
   <table style="width:100%; " align="center" class="table table-bordered table-hover">
   
   <tr>
   <td colspan="3">View Refund Report <i class="fa fa-qrcode"></i></td>
   </tr>
   
   
   <tr>
   <td style="width:8%;">Day</td>
   <td><input type="date" value="20<?php echo date('y-m-d');?>" style=" " name="date" class="form-control big-shadow" required autocomplete="off"></td>
   <td style="width:18%; "><button type="submit" name="ok1" class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> View <i class=" fab fa-accusoft "></i></button></td>
   </tr>
  
   </table>

</form>


<!-- نهاية فورم عرض تقرير المبيعات Dayي -->

<br>
