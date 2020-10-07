<? 
//session_start();
if(!isset($_SESSION['username'])) { 
  echo 'عذراً تم تأمين النظام لايمكن الدخول من دون صلاحيات'; 
echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
  exit; 
} 
?>

