<?php session_start(); ?>
<html dir="rtl">
<?php
include "database/constants.php";
$result = mysql_query("SELECT * FROM sales WHERE invoice = '".$_GET['print']."' LIMIT 1");
echo "<pre>";
$row = mysql_fetch_array($result);
//print_r($row);
//die;
?>
<head>
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
</head>

<body>

    <!-- فاتورة جديدة -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row p-5">

                            <div class="col-md-6 text-left">
                                <p class="font-weight-bold mb-1">فاتورة #550</p>
                                <p class="text-muted"><?php echo date('Y-m-d h:i:s'); ?></p>
                            </div>
                            <div class="col-md-6 text-right">
                                <img src="../system/file/logo.png" width="100" height="100">
                            </div>
                        </div>

                        <hr class="my-3">

                        <div class="row pb-5 p-5">

                            <div class="col-md-6">
                                <p class="font-weight-bold mb-4">بيانات الدفع</p>
                                <p class="mb-1"><span class="text-muted">ضريبة القيمة المضافة:</span> 1425782</p>
                                <p class="mb-1"><span class="text-muted">رقم تعريف الضريبة: </span> 10253642</p>
                                <p class="mb-1"><span class="text-muted">نوع الدفع: </span> Root</p>
                            </div>
                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-4">معلومات العميل</p>
                                <p class="mb-1"><?php echo $_SESSION['uname']; ?></p>
                                <p>Acme Inc</p>
                            </div>
                        </div>

                        <div class="row p-5">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">الصنف</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">الكمیة</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">السعر</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">المبلغ</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">السعر x  الكمیة</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Software</td>
                                            <td>LTS Versions</td>
                                            <td>21</td>
                                            <td>$321</td>
                                            <td>$3452</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Software</td>
                                            <td>Support</td>
                                            <td>234</td>
                                            <td>$6356</td>
                                            <td>$23423</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Software</td>
                                            <td>Sofware Collection</td>
                                            <td>4534</td>
                                            <td>$354</td>
                                            <td>$23434</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">المبلغ الإجمالي</div>
                                <div class="h2 font-weight-light">$234,234</div>
                            </div>

                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">خصم</div>
                                <div class="h2 font-weight-light">10%</div>
                            </div>

                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">VAT</div>
                                <div class="h2 font-weight-light">15%</div>
                            </div>
                            <br>

                        </div>
                        <div class="d-flex flex-row-reverse bg-dark text-white p-1">
                            <div class="py-3 m-auto text-center">
                                <div class="h2 font-weight-light">يرجي إحضار الفاتورة في حالة الإستبدال أو الارجاع</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- نهاية الفاتورة الجديدة -->


    <div class="col-md-3 col-lg-3 round">
        <?php include("dbcon/dbcon.php");
        $sql = mysql_query("select * from systematical limit 1");
        $row = mysql_fetch_array($sql);
        $logo = $row['ar'];
        $logo2 = $row['taxno'];
        $logo3 = $row['adres'];
        $logo4 = $row['phone']; ?>
        <table class="table table-borderd" border="1" style="width:40%; font-size:20px;" bordercolor="blue">


            <tr>

                <td colspan="5" align="center"><?php echo $logo; ?></td>
            </tr>
            <tr>
                <Td colspan="4"> <?php echo $logo2; ?></Td>
            </tr>



            <?php include("dbcon/dbcon.php");
            $sql = mysql_query("select sum(qty),invoice,name,category,
product,price,discount,transaction_id from sales where
invoice='$_SESSION[SESS_MEMBER_ID]' GROUP BY NAME");
            $row = mysql_fetch_array($sql); ?>
            <tr>
                <td colspan="4">فاتورة رقم <?php echo $row['invoice']; ?></td>
            </tr>
            <tr>
                <td><strong>الصنف</strong></td>
                <td><strong>الكمية</strong></td>
                <td><strong>السعر</strong></td>
                <td><strong>الضريبة</strong></td>
            </tr>
            <?php
            do { ?>
                <tr>

                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $x1 = $row['sum(qty)']; ?></td>
                    <td><?php echo $x2 = $row['price']; ?></td>
                    <td><?php echo $z1 = $x1 * $x2 * 15 / 100; ?></td>
                </tr>
            <?php } while ($row = mysql_fetch_array($sql)); ?>
            <tr>
                <td colspan="2"><strong>إجمالي المبلغ</strong></td>
                <td colspan="3">
                    <?php include("dbcon/dbcon.php");
                    $sql = mysql_query("select sum(qty*price) from sales where invoice='$_SESSION[SESS_MEMBER_ID]'");
                    $row = mysql_fetch_array($sql);
                    echo $sum = $row['sum(qty*price)']; ?>
            <tr>

                <td colspan="2"><strong>الضريبة VAT 15%</strong></td>
                <td colspan="3"><?php echo $ed = $sum * 15 / 100; ?></td>
            </tr>
            <tr>
                <td colspan="2"><strong>شامل VAT 15%</strong></td>
                <td colspan="3"><?php echo $end = $sum * 15 / 100 + $sum; ?></td>

            </tr>

            <tr>
                <Td colspan="4" align="justify">يرجي إحضار الفاتورة في حالة الإستبدال أو الارجاع </Td>
            </tr>


            <tr>
                <Td colspan="4" style="font-size:18px;" colspan="3"><?php echo date('Y-m-d h:i:s'); ?></Td>
            </tr>
            <tr>
                <td>البائع</td>
                <td colspan="3"><?php echo $_SESSION['uname']; ?></td>
            </tr>
            <tr>
                <td colspan="4"><?php echo $logo3; ?></td>
            </tr>

            <tr>
                <td colspan="4"><?php echo $logo4; ?></td>
            </tr>
        </table>
    </div>
    
</body>
    
</html>