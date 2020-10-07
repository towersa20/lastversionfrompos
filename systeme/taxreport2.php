<?php include('header.php');?>
<br>
 <div class="app-content content container-fluid">
<br>

<form name="form1" method="post" action="tax2.php">
    <table style="width:100%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
      <td colspan="5">Tax Reports <i class="fa icon-basket-loaded"></i></td>
    </tr>
    <tr>
      <td style="width:8%;">From date</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date1" class="form-control big-shadow " required autocomplete="off"></td>
      <td style="width:8%;">To date</td>
      <td><input type="date"  value="20<?php echo date('y-m-d');?>" name="date2" class="form-control big-shadow " required autocomplete="off"></td>
    <td style="width:15%; "><button type="submit" name="ok1" class="btn btn-primary" style="font-family: 'Droid Arabic Kufi';width: 100%;"> View <i class="fa icon-basket-loaded"></i></button></td> </tr>
  </table>
</form>
<br>
