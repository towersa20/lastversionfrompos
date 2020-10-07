
<?php
 //شاشة توليد رقم فاتورة والتوجيه للمبيعات
  
 // بداية جلسة الإتصال
 session_start();
 // تعريف كود الإتصال بقاعدة البيانات
include('dbcon/dbcon.php');
$sql=mysql_query("select Max(invoice) from sales ");	
$row=mysql_fetch_array($sql);
  
   echo   $finalcode=$row['Max(invoice)']+1;		
   
   //   echo "<script> alert('$finalcode');</script>";				
            session_regenerate_id();
      // تخزين رقم الفاتورة في جلسة إتصال
			        $_SESSION['SESS_MEMBER_ID'] = $finalcode;
                      session_write_close();
      // التوجيه الي شاشة المبيعات
		header("location: ajaxPOS.php?invoice_Id=".$_SESSION['SESS_MEMBER_ID']);

                exit();
      // نهاية الكود
mysql_close($con);	?>
