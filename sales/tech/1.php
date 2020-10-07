
<form action="" method="post">
<input name="xm" type="text">
<input name="" type="submit"></form>
<?php 
  include('I18N/Arabic.php'); 
  $obj = new I18N_Arabic('Numbers'); 
$xm=$_POST['xm'];
  echo $obj->int2str($_POST['xm']); 
?>