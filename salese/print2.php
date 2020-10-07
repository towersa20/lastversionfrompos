<?php session_start(); ?>
<html dir="rtl">
<link rel="stylesheet" type="text/css" href="font/mystyle.css">
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

<script src="print/bootstrap.min.js"></script>
<div class="col-md-3 col-lg-3 round">
    <?php include("dbcon/dbcon.php");
    $sql = mysql_query("select * from systematical limit 1");
    $row = mysql_fetch_array($sql);
    $logo = $row['ar'];
    $asd = $row['taxno'];
    $logosd = $row['en']; ?>
    <table class="table" style="width:26%; font-size:16px;">

    <tr>
    <td colspan="5" style="font-size: 18px;" align="center"><?php echo $logo; ?></td>
    </tr>

    
    <tr>
    <td colspan="5" style="font-size: 18px;" align="center"><?php echo $logosd; ?></td>
    </tr>

    <tr>
    <td colspan="5" style="font-size:18px;" align="center"><strong>الرقم الضريبي <?php echo $asd; ?></strong></td>
    </tr>
    <tr>
        <td nowrap colspan="5">الأسعار تشمل ضريبة القيمة المضافة 15%</td>
    </tr>
    <tr>
            <Td  align="center"  style="font-size: 20px;" colspan="4">رقم الفاتورة <?php echo $_GET['print']; ?> </Td>
        </tr>
         
    <tr>
        <td>التاريخ</td>
        <td nowrap colspan="4"><?php echo date('Y-m-d h:i:s'); ?></td>
    </tr>
    
    <br>
    <?php include("dbcon/dbcon.php");
    $sql = mysql_query("select * ,product,sum(qty),type ,price ,name from sales where invoice='$_GET[print]' Group by name");
    $row = mysql_fetch_array($sql); ?>
    <tr>
    <Td align="center" style="font-size: 18px;" colspan="4">فاتورة مبيعات <?php 
    if($row['type']==1)
    {
        echo "نقدا";
    }
    elseif($row['type']==2)
    {
        echo "شبكة";
    }
    elseif($row['type']==3)
    {
        echo "أجل";
    }?>
    </Td>
    </tr>
  

        <tr>
            <td colspan="2"><strong>الصنف</strong></td>
            <td><strong>الكمية</strong></td>
            <td><strong>السعر</strong></td>
        </tr>
        <?php
        do { ?>
            <tr>

                <td colspan="2"><?php echo $row['name']; ?>
                <br><?php echo $row['product']; ?></td>
                <td><?php echo $x1 = $row['sum(qty)']; ?></td>
                <td><?php echo $x2 = $row['price']; ?></td>
            </tr>
        <?php } while ($row = mysql_fetch_array($sql)); ?>

        <tr>
                                <td colspan="2">عدد الأصناف</td>
            <td colspan="2">
            <?php include("dbcon/dbcon.php");
                                $sql = mysql_query("select count(qty) from sales where invoice='$_GET[print]'");
                                $row = mysql_fetch_array($sql);
                                echo $sum0 = $row['count(qty)']; ?>
            </td>
                                </tr>

        <tr>
            
        <td colspan="3"><strong>الإجمالي</strong></td>
            <td colspan="2"> <?php include("dbcon/dbcon.php");
                                $sql = mysql_query("select sum(qty*price) from sales where invoice='$_GET[print]'");
                                $row = mysql_fetch_array($sql);
                                 $sum1 =$row['sum(qty*price)']-$row['sum(qty*price)']*15/100;
                                $sum1 = sprintf("%01.2f", $sum1);  echo $sum1; ?>
                                </td>
                                </tr>

                                <td colspan="3"><strong>الضريبة vat 15%</strong></td>
            <td colspan="2"> <?php include("dbcon/dbcon.php");
                                $sql = mysql_query("select sum(qty*price) from sales where invoice='$_GET[print]'");
                                $row = mysql_fetch_array($sql);
                                 $sum2 = $row['sum(qty*price)']*15/100;
                                $sum2 = sprintf("%01.2f", $sum2);  echo $sum2; ?>
                                </tr>
               
        <tr>
            <td colspan="3"><strong>الإجمالي شامل الضريبة</strong></td>
            <td colspan="2" style="font-size:18px;"  ><strong><?php  $end=$sum1+$sum2; $end = sprintf("%01.2f", $end);  echo $end;?></strong></td>
        </tr>
        <tr>
            <td style="font-size: 18px;" colspan="2"><strong> الإجمالي</strong>
            </td>
            <td colspan="3"> <?php include('tech/I18N/Arabic.php'); $obj = new I18N_Arabic('Numbers'); print $obj->int2str($end);?> ريال
            </td>
        </tr>


    </table>
</div>



<script type="text/javascript">
window.onload = function() {
        window.print();
    }
</script>
<?php

if (isset($_GET['print'])) {

    echo "<script type='text/javascript'>
window.onload = function() { window.print(); }
</script>";
    echo "<meta http-equiv='refresh' content='0;url=exe.php'>";
} else {
    echo "<meta http-equiv='refresh' content='0;url=exe.php'>";
}
?>
<?php include('dbcon/dbcon.php');
$up=mysql_query("update sales set type='0' where invoice='$_GET[print]'");
?>