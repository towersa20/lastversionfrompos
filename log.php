<?php
//بداية جلسة الإتصال
session_start();
?>
<!-- كود تعريف نمط اللغة العربية علي مستوي الصفحة !-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<!--نهاية كود تعريف نمط اللغة العربية علي مستوي الصفحة !-->
<?php
//كود إستدعاء ملف الإتصال بقاعدة البيانات
include("System/dbcon/dbcon.php");
            //الكود أدناه يمثل شرط إستقبال قيمة إسم المستخدم
            if($_POST['username'])
{
//تحديث زمن عملية تسجيل الدخول    
$up=mysql_query("update users set date=now() where username = '$_POST[username]'");


//كود مقارنة إسم المستخدم وكلمة المرور المرسله مع محتويات صلاحية المستخدم بقاعدة البيانات
$sql=mysql_query("select * from users where username='$_POST[username]' && password='$_POST[password]'  ");
$row=mysql_fetch_array($sql);

// حفظ بيانات المستخدم في جلسة إتصال للإستفاده منها طول زمن تشغيل النظام
$_SESSION["id"]=$row["id"];
$_SESSION["uname"]=$row["name"];
$_SESSION["tell"]=$row["phone"];
$_SESSION["level"]=$row["level"];

//دالة تعريف وتوجيه المستخدم الي النظام الخاص به
switch($row["level"])
{
case 1:
    //التوجيه الي نظام الإدارة
echo "<meta http-equiv='refresh' content='0;url=System/'>";
break;
case 2:
    //التوجيه الي صلاحية مستخدم المبيعات
echo "<meta http-equiv='refresh' content='0;url=sales/exe.php'>";

break;
default :
    
    //في حالة البيانات غير صحيحة التوجيه الي نافذة إدخال بيانات المستخدم والتحقق
echo"<script>alert('أدخلت بيانات خاطئة الرجاء ادخال المعلومات الصحيحة');</script>";
require("login.php");
//نهاية الكود
}
}
?>

