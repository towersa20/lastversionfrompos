<?php
// إستدعاء ملف التصميم
include('header.php');?>


<!-- ملفات جافا سكربت لتوليد الارقام المتسلسله!-->
<script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/order.js"></script><?php
function createRandomPassword() {
    //توليد الارقام المتسلسله
    $chars = "003232303232023232023456789";
    srand((double)microtime()*100000);
    $i = 0;
    $pass = '' ;
    while ($i <= 6) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}
// رقم الفاتورة المولد
$finalcode='RS-'.createRandomPassword();
?>


<?php
//ملف المشتريات
include('ttt.php');?>