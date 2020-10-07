<?php
//تاريخ التوثيق 15-4-2020

// كود تنفيذ عملية تسجيل الخروج

// التحقق من جلسة الإتصالات
session_start();
//إلغاء جلسة الإتصال
    session_unset();
//تدمير جلسة الإتصال
            session_destroy();
//ذهاب الي شاشة تسجيل الدخول 
    echo "<meta http-equiv='refresh' content='0;url=../login.php'>";
//نهاية التوثيق
?>
