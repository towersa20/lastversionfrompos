<?php session_start();?>
<html dir="rtl"><link rel="stylesheet" type="text/css" href="font/mystyle.css">
<link rel="stylesheet" type="text/css" href="font/font_face.css">
<link rel="stylesheet" type="text/css" href="font/animate.min.css">
<link rel="stylesheet" type="text/css" href="font/animate.css">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="نظام إدارة مبيعات  من شركة برجي التقني" name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="شعار النظام" href="green-rtl/image/logo.png" src="image/logo.png">
        <link rel="shortcut icon" href="green-rtl/image/logo.png" />
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css" />

        
        <link href="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" />
        <link href="assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />


<link rel="stylesheet" type="text/css" href="print/animate.css">
<link rel="stylesheet" type="text/css" href="print/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="print/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="print/style.css">
<link rel="stylesheet" type="text/css" href="print/theme.css">
<link rel="stylesheet" type="text/css" href="print/li-scroller.css">
<link rel="stylesheet" type="text/css" href="print/animate.css">
<link rel="stylesheet" type="text/css" href="print/animate.css">


<link rel="stylesheet" type="text/css" href="font/animate.css">
<link rel="stylesheet" type="text/css" href="font/animate.min.css">
<link rel="stylesheet" type="text/css" href="font/mstyle.css">

<script src="print/bootstrap.min.js"></script>

<body style="color:red; background-color: #000; font-family: 'Droid Arabic Kufi';">

<div class="card-box">
<br>
<div align="center">
<?php include("dbcon/dbcon.php");
$sql=mysql_query("select * from systematical limit 1");
$row=mysql_fetch_array($sql);
$logo=$row['ar']?>
<table align="center" class="table table-bordered" border="1" style="width:55%; font-size:17px; font-family: 'Droid Arabic Kufi';">
    <tr>
        <td  style="font-family: Arabic Typesetting; font-size:60px; color:red;" colspan="5" align="center"><?php echo $logo;?></td>
    </tr>
    <?php include("dbcon/dbcon.php");
$sql=mysql_query("select sum(qty),invoice,name,category,qty ,product,price,discount,transaction_id from sales where invoice='$_SESSION[SESS_MEMBER_ID]' GROUP BY NAME");
$row=mysql_fetch_array($sql);?>

    <tr style="font-family: Arabic Typesetting; font-size:45px; color:#ff5c01;" >
    <td>الصنف</td>
    <td>الكمية</td>
    <td>السعر</td>
    <td>الضريبة</td>
    </tr>
    <?php 
    do { ?>
    <tr style="font-size: 22px;">

    <td><?php echo $row['name'];?></td>
    <td><?php echo $x1=$row['sum(qty)'];?></td>
    <td><?php echo $x2=$row['price'];?> ريال</td>
    <td><?php echo $z1=$x1*$x2*15/100;?> ريال</td>
    </tr>
    <?php }while($row=mysql_fetch_array($sql));?>
    <tr  style="font-size: 18px;">
    <td  colspan="2" style="font-family: Arabic Typesetting; font-size:38px; color:#ff5c01;">الإجمالي</td>
    <td  style="font-size: 28px;" colspan="3"> 
    <?php include("dbcon/dbcon.php");
$sql=mysql_query("select sum(qty*price) from sales where invoice='$_SESSION[SESS_MEMBER_ID]'");
$row=mysql_fetch_array($sql);
echo $sum=$row['sum(qty*price)'];?> ريال
<tr>
    <td  style="font-family: Arabic Typesetting; font-size:38px; color:#ff5c01;" colspan="2">الضريبة VAT</td>
    <td   style="font-size: 28px;" colspan="3"><?php echo $end=$sum*15/100;?> ريال</td>
</tr>
<tr>
    <td style="font-family: Arabic Typesetting; font-size:38px; color:#ff5c01;" colspan="2">شامل VAT 15%</td>
    <td align="center" style="font-family: Arabic Typesetting; font-size:80px; color:red;" colspan="3"><?php echo $end=$sum*15/100+$sum;?> ريال</td>
</tr>
    <tr>
        <td style="font-family: Arabic Typesetting; font-size:38px; color:#ff5c01;">التاريخ</td>
        <Td style="font-size:40px; color:red; font-family: Monotype Corsiva;" colspan="3"><strong><?php echo date('Y-m-d h:i:s');?></strong></Td>
    </tr>
</table>
</div>
</html>



<table class="table table-bordered" class="animated jello" align="center"  style="width:55%; font-size:25px;">
<tr align="center">
<td> <img style="width: 100px; height: 80px;" src="font/logo.png"></td>

<td style="font-family: Arabic Typesetting; font-size:45px; color:#ff5c01;">مؤسسة برجي التقني للإتصالات وتقنية المعلومات</td>

<td> <img style="width: 100px; height: 80px;" src="font/logo.png"></td>

</tr>

<tr align="center">
    <td colspan="3" style="font-family: Monotype Corsiva; font-size:30px; color:#000#;">www.towersa.com / Tell : 0539155577-0551224255</td>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
</tr>

</table>