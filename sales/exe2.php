
<?php
 //شاشة توليد رقم فاتورة والتوجيه للمبيعات
  
 // بداية جلسة الإتصال
 session_start();
 // تعريف كود الإتصال بقاعدة البيانات

   echo   $finalcode=$_GET['invoice'];		
   
   //   echo "<script> alert('$finalcode');</script>";				
            session_regenerate_id();
      // تخزين رقم الفاتورة في جلسة إتصال
			        $_SESSION['SESS_MEMBER_ID'] = $finalcode;
                      session_write_close();
      // التوجيه الي شاشة المبيعات
		header("location: ajaxRPO.php?invoice_Id=".$_SESSION['SESS_MEMBER_ID']);

                exit();
      // نهاية الكود
mysql_close($con);	?>
