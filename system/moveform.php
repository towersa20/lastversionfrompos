<?php session_start();?><br><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html dir="rtl">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>فاتورة مشتريات</title>
</head>
<html>
<link rel="stylesheet" type="text/css" href="process/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="process/assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="process/assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="process/assets/css/font.css">
<link rel="stylesheet" type="text/css" href="process/assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="process/assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="process/assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="process/assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="process/assets/css/style.css">
<link rel="stylesheet" type="text/css" href="font/font_face.css">
<link rel="stylesheet" type="text/css" href="font/animate.min.css">
<link rel="stylesheet" type="text/css" href="font/mystyle.css">
<link rel="stylesheet" type="text/css" href="font/animate.css">
<style type="text/css">
    <!--
    body {
        background-color: #FFFFFF;
    }
    .style1 {font-weight: bold}
    -->
</style>



<table style="width:90%;" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 20%;" ><?php echo '<img src="file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 20%; color: red" ><?php echo '<img src="file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td nowrap="" align="center">المشتريات</td>
            <td align="center"><strong>فاتورة مشتريات <?php echo $_POST['b'];?></strong></td>
            <td nowrap="" align="center"> الرقم الضريبي <?php echo $query['taxno'];?> </td>
        </tr></table>
<table style="width:90%;" align="center" class="table table-bordered table-hover animated flipInX">
        <tr>
            <td style="width: 8%;">تاريخ الإصدار</td><td style="width:15%;">20<?php echo date('y-m-d h:i:s l');?></td>
            <td style="width: 8%;">رقم الفاتورة</td><td style="width:15%;"><?php echo $_POST['lno'];?></td>
            <td style="width: 8%;">تاريخ التوريد</td><td style="width:15%;"><?php echo $_POST['i'];?></td>
            <td style="width: 8%;">مـن مؤسسة</td><td colspan="3"><?php echo $_POST['lno'];?></td>

        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>
<br>


<table style="width:90%;" align="center" class="table table-bordered table-hover animated flipInX">
    <tr>
        <td colspan="8"><strong>بيان المشتريات</strong></td>

    </tr>
    <tr>
        <td style="width:8%;">المورد</td>
        <td colspan="2"><?php echo $_POST['f'];?></td>
        <td style="width:10%;">الصنف</td>
        <td><?php echo $_POST['b'];?></td>
        <td style="width:10%;">باركود</td>
        <td><?php echo $_POST['a'];?></td>
    </tr>
</table>
<table style="width:90%;" align="center" class="table table-bordered table-hover animated flipInX">

    <td style="width: 9%;">الكمية</td><td style="width: 16%;"><?php echo $_POST['c'];?></td>
    <td style="width: 9%;">سعر الشراء</td  style="width: 16%;"><td><?php echo $_POST['e'];?></td>
    <td style="width: 9%;">الإجمالي</td><td  style="width: 16%;"><?php echo $_POST['c']*$_POST['e'];?></td>
    <td style="width: 9%;">تاريخ الشراء</td><td  style="width: 16%;"><?php echo $_POST['i'];?></td>
    </tr>
    <tr>
    <td style="width: 9%;">تاريخ الصلاحية</td><td  style="width: 16%;"><?php echo $_POST['h'];?></td>
        <td colspan="2">جمله المبلغ بالحروف</td>
        <td colspan="4"><?php
            include('tech/I18N/Arabic.php');
            $obj = new I18N_Arabic('Numbers');
            $xm=$_POST['b'];
            echo $obj->int2str($_POST['c']*$_POST['e']);
            ?></td>

    </tr>

</table>


<br>
<table style="width:90%; background-color: #F5F5F5;"  align="center" class="table table-bordered table-hover animated flipInX"  dir="rtl">
    <tr><td style="width:9%; "><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>
<br>
<table dir="rtl" style="width:90%;" align="center" class="table table-bordered table-hover animated flipInX">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td style="width: 12%;">الموقع الإلكتروني</td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td style="width: 12%;">البريد الإلكتروني</td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td style="width: 10%;">رقم الهاتـــف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left"  ><?php echo '<img src="file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png"  width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

</table></center>


</body>
</html>
