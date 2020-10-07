<?php
// ملف التصميم
include('header.php');?>

<script>
 // دالة تنسيق الطابعة
function printDiv() 
{
  var divToPrint=document.getElementById('DivIdToPrint');
  var newWin=window.open('','Print-Window');
  newWin.document.open();
  newWin.document.write('<html><title>تقرير الاصناف</title><body border="3" dir="rtl" onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
  newWin.document.close();
// newWin.window.close();
  setTimeout(function(){newWin.close();},1);
}
//نهاية الدالة
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>المخزن</title>
</head>
  <body style="font-family: 'Droid Arabic Kufi';" data-open="click" data-menu="vertical-menu">





  <!--- جدول ترويسة ملف عرض تقرير الاصناف -->
<center>
<div id='DivIdToPrint' style="width:100%; font-family: 'Droid Arabic Kufi';" dir="rtl">
<table style="width:100%;" border="1" align="center" class="table table-bordered table-hover ">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?><tr>
        <td align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        <td style="font-size: 18px;" align="center"><strong><?php echo $query['ar'];?><br><br><?php echo $query['en'];?></strong></td>
        <td align="center" style="width: 25%;" ><?php echo '<img src="./file/' .$query['imge']. '"width="110" height="100"> '; ?></td>
        </tr>
        <tr>
            <td align="center"> <?php echo date('y-m-d h:i:s');?></td>
            <td align="center"> <strong>تقرير قائمة أسعار الأصنـــاف</strong></td>
            <td align="center"> تقارير الأصنـاف </td>
        </tr>

    <?php } while ($query=mysql_fetch_array($link));?>
</table>

  <!--- نهاية ملف عرض تقرير الاصناف -->

<br>


  <!--- بداية جدول عرض تقرير الاصناف -->

<table dir="rtl" border="1" style="width:100%; background-color: white;" align="center" class="table table-bordered table-hover ">
<?php 
include('dbcon/dbcon.php');
//كود عرض سجلات تقرير الاصناف
 $sql=mysql_query("select * from products where tell='$_SESSION[tell]'");
   $row = mysql_fetch_array($sql);?>
    <tr align="center" >
      <td style="width:20%;"><strong>رقم الباركود</strong></td>
      <td style="width:40%;"><strong>اسم الصنف</strong></td>
      <td style="width:25%;"><strong>الوحدة</strong></td>
      <td style="width:15%;" nowrap><strong>سعر الصنف</strong></td>
    </tr>
  
 
                            <?php do {  ?>
                                    <tr>
                                        <td><?php echo $row['pid'];?></td>
                                        <td><?php echo $row['product_name'];?></td>
                                        <td><?php echo $row['unit'];?></td>
                                        <td><?php echo $row['product_price'];?> ريال</td>
             </tr>
                 <?php
                 //نهاية عرض سجلات الاصناف
                 }while($row=mysql_fetch_array($sql));?>  
               <tr>
      <td><strong>المجموع</strong></td>
      <td><?php include('dbcon/dbcon.php');
      // عرض مجموع الاصناف
	$sql=mysql_query("select count(pid) from products");
	$row=mysql_fetch_array($sql);
	echo $row['count(pid)'];?></td>
	<td></td>	<td></td>
    </tr>
  </table>


  <!--- نهاية  ملف عرض تقرير سجلات الاصناف -->

<br>

  <!--- بداية جدول طباعة اسم المستخدم -->

<table style="width:100%;" border="1"  align="center" class="table table-bordered table-hover "  dir="rtl">
    <tr><td style="width:15%;"><strong>طبع بواسطة</strong></td><td><?php echo $_SESSION['uname'];?></td></tr>
</table>

  <!--- نهاية عرض سجل المستخدم -->

<br>


  <!--- بداية جدول عرض زيل التقرير -->

<table dir="rtl" border="1" style="width:100%;" align="center" class="table table-bordered table-hover ">
    <?php include "dbcon/dbcon.php";
    $link=mysql_query("select * from systematical");
    $query=mysql_fetch_array($link);?>
    <?php do { ?>
        <tr>
            <td nowrap style="width: 10%;">الموقع </td><td  style="width: 23%;"><?php echo $query['site'];?></td>
            <td nowrap style="width: 10%;">البريد </td><td style="width: 23%;"><?php echo $query['email'];?></td>
            <td nowrap style="width: 10%;"> الهاتـف</td><td style="width: 23%;"><?php echo $query['phone'];?></td>
        </tr>
        <tr>
            <td colspan="5"><?php echo $query['adres'];?></td>
            <td  align="left"  ><?php echo '<img src="./file/' .$query['imge']. '"width="25" height="25"> '; ?>
                <img src="icon/qr.png"  width="25" height="25" alt=""></td>
        </tr>
    <?php } while ($query=mysql_fetch_array($link));?>

  <!--- نهاية عرض زيل التقرير -->

</table></center>



  <!--- بداية جدول عرض ازرار الطباعة والتنقل -->

</div>
<table style="width:98%;" align="center" class="table table-borderd table-hover">
<tr>
<td style="width:20%;"><a href=""><button class="btn btn-primary" id='btn'  style="width: 100%; font-family: 'Droid Arabic Kufi';"  onclick="printDiv(); javascript:window.close()"> طباعة <i class="fas fa-file-medical-alt"></i></button></a></td>
<td style="width:20%;"><a href="item.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> الأصناف <i class="fab fa-accusoft"></i></button></a></td>
<td style="width:20%;"><a href="item_select.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> الإستعلام <i class="fas fa-search"></i></button></a></td>
<td style="width:20%;"><a href="index.php"><button class="btn btn-primary" style="width: 100%; font-family: 'Droid Arabic Kufi';"> النظام <i class="fa fa-home"></i></button></a></td>
<td style="width:10%;"></td>
<td style="width:10%;"></td>
</tr></table>
</center>
  <!--- نهاية جدول عرض تقرير الطباعة والتنقل -->


</body>
</html>
  <!--- نهاية عرض ملف تقرير الاصناف -->
