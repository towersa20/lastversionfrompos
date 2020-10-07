<?php
// echo $_GET['invoice_Id'];

$connect = mysqli_connect('localhost', 'root', '', 'infos');
mysqli_set_charset($connect, 'utf8');


$sql = mysqli_query($connect, "select count(price) as price from sales where invoice='" . $_GET['invoice_Id'] . "'");
$row = mysqli_fetch_array($sql);
$row_count =  $row['price'];
// print_r($row);

?>



<html lang="en">

<head>
    <meta charset="utf-8">
    <!-- عنوان الصفحة!-->
    <title>نظام مبيعات</title>

    <!--ملفات تعريف البرنامج!-->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="نظام إدارة مبيعات  من شركة برجي التقني" name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- شعار البرنامج علي عنوان الشاشة -->
    <link rel="شعار النظام" href="green-rtl/image/logo.png" src="image/logo.png">
    <link rel="shortcut icon" href="green-rtl/image/logo.png">
    <!-- ملفات التصميم سي اس اس -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/select2/select2.min.css" rel="stylesheet" type="text/css">

    <link href="assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="assets/libs/switchery/switchery.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css">
    <!--  تعريف نوع الخط!-->

    <link href="font/font_face.css" rel="stylesheet" type="text/css">
    <link href="font/mystyle.css" rel="stylesheet" type="text/css">
    
    <style>
        label {
            font-family: 'Droid Arabic Kufi';

        }

        .fas {
            cursor: pointer;
            font-size: 16px;
            margin: 3px;
        }
    </style>
</head>

<!--  جسم شاشة البرنامج!-->


<body onload="load_products(<?= $_GET['invoice_Id'] ?>)" class="sidebar-disable" style="font-family: 'Droid Arabic Kufi';">

    <!-- بداية الصفحة شريط العنوان زو اللون الوردي -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="" style="background-color: #E80458;">
            <ul class="list-unstyled topnav-menu float-right mb-0">

            </ul>
            <!-- مكان لوضع الشعار -->

        </div>
        <!-- نهاية شريط العنوان الوردي -->


        <!-- ============================================================== -->
        <!-- الكود ادناه يمثل تنسيق شاشة المبيعت -->
        <!-- ============================================================== -->
        <br>
        <div class="content">

            <!-- بداية تسنيق قالب شاشة المبيعات-->
            <div class="container-fluid">

                <div class="row">

                    <div class="col-12">
                        <?php if ($row_count == 0) : ?>
                            <div style="background-color: #E80458;" class="row">

                                <div class="col-md-12  offset-md-3">
                                    <h1 style="color: #eff5fc;text-align: center;">عفوا الفاتورة غير موجوده الرجاء البحث مره اخرى</h1>
                                    <h1 style="color: #eff5fc;text-align: center;"><a href="ref.php" style="color: #fff;font-family: Roboto,sans-serif;border: 1px solid;font-size: 20px;" class="btn btn-md ">ابحث</a></h1>

                                </div>
                            </div>
                        <?php else : ?>
                            <div style="background-color: #E80458;" class="row">

                                <div class="col-md-12  offset-md-3">
                                    <h1 style="color: #eff5fc;text-align: center;">فاتورة مرتجعات</h1>
                                </div>
                            </div>
                            <div class="container-fluid">


                                <!-- كود فورم استخراج فاتورة البيع  -->
                                <div class="row">
                                    <div class="col-md-10 col-lg-10 ">
                                        <div class="card-box">

                                            <!-- كود جدول اضافة بيانات الفاتورة -->
                                            <table class="table table-bordered">
                                            
                                                <tbody>
                                                    <tr>
                                                        <td style="width:58%;">
                                                            <div class="input-group">
                                                                <input type="text" autocomplete="off" id="suggestions_value" class="form-control" style="font-size:15px; color:red;" placeholder="أدخل كلمة البحث" name="search">
                                                                <br>
                                                                <div id="suggestions" style="position: absolute;top: 44px;width: 100%;" class="list-group">

                                                                </div>

                                                            </div>
                                                        </td>

                                                        <td style="width: 12%;">رقم الفاتورة</td>
                                                        <td style="width: 20%;">
                                                            <input type="text" id="invoice_id" class="form-control" style="font-size: 15px; color:red;" value="<?= $_GET['invoice_Id'] ?>" name="b">
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>

                                            <!-- نهاية كود الجدول -->


                                            <!-- كود جدول الفاتورة   -->
                                            <table class="table table-bordered tab-content table-embed-responsive" style="background-color: #eff5fc; width: 100%; font-family: 'Droid Arabic Kufi'; font-size:12px; ">


                                                <thead>
                                                    <tr align="center">
                                                        <th>الصنف</th>
                                                        <th>الوحده</th>
                                                        <th>الكمية</th>
                                                        <th>السعر</th>
                                                        <th>المبلغ</th>
                                                        <th>الضريبه</th>
                                                        <th>المبلغ + الضريبه</th>
                                                        <th><i style="color:red" class=" fas fa-times-circle  "></i> إزالة</th>
                                                    </tr>
                                                </thead>

                                                <tbody id="invoice_container">

                                                </tbody>
                                            </table>
                                            <!--نهاية الجدول الخاص بفاتورة المبيعات  -->

                                        </div>
                                        <!-- نهاية الجزء الأول من شاشة المبيعات  -->


                                        <!-- بداية الجزء الثاني المتعلق بإزرار العمليات -->

                                    </div>
                                    <!-- FIXME: new addinton  -->

                                    <div class="col-md-2 col-lg-2">
                                        <div class="card-box">
                                            <table class="table table-bordered" style="background-color: #eff5fc; font-family: 'Droid Arabic Kufi'; font-size:14px; ">
                                                <tbody>
                                                    <tr>
                                                        <td style="width:16.6%;">
                                                            <a href="print2.php?print=<?= $_GET['invoice_Id'] ?>">
                                                                <button type="button" style="background-color:#1FAF2E; font-size:12px; height:33px; width:100%; font-family: 'Droid Arabic Kufi';" class="btn btn-succes">
                                                                    <i class="fas fa-print "></i> طباعة
                                                                </button>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width:16.6%;">
                                                            <a href="exe.php">
                                                                <button type="button" style="background-color:#707070; font-size:12px; height:33px; width:100%; font-family: 'Droid Arabic Kufi';" class="btn btn-primary">
                                                                    <i class="fas fa-plus "></i> جديد
                                                                </button>
                                                            </a></td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width:16.6%;">
                                                            <a href="exe.php">
                                                                <a href="ref.php" type="button" style="background-color:red; font-size:12px; height:33px; width:100%; font-family: 'Droid Arabic Kufi';" class="btn btn-primary">
                                                                    <i class="fas fa-minus "></i> راجعه
                                                                </a>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:16.6%;">
                                                            <a href="poss2.php?invoice=2020000151">
                                                                <button type="button" style="background-color:#F6B00A; font-size:12px; height:33px;  width:100%;  font-family: 'Droid Arabic Kufi';" class="btn form-control"><i class=" fas fa-search  "></i>
                                                                    بحث
                                                                </button>
                                                            </a></td>

                                                    </tr>
                                                    <tr>

                                                        <td style="width:16.6%;">
                                                            <a href="posss.php?delete=2020000151&amp;&amp;maxi=2021" onclick="return confirm('هل تريد حذف الفاتورة');">
                                                                <button type="button" style="background-color:#DD5706; font-size:12px; height:33px;  width:100%;  font-family: 'Droid Arabic Kufi';" class="btn btn-succes">
                                                                    <i class=" fas fa-times-circle  "></i> إزالــة
                                                                </button>
                                                            </a></td>

                                                    </tr>
                                                    <tr>

                                                        <td style="width:16.6%;">
                                                            <a href="exe.php" target="_blank">
                                                                <button type="button" style="background-color:#1E1170; font-size:10px; height:33px; width:100%;  font-family: 'Droid Arabic Kufi';" class="btn btn-succes">
                                                                    <i class=" far fa-stop-circle "></i> تعليق
                                                                </button>
                                                            </a></td>

                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- بداية كود الالة الحاسبه والبحث بالصنف والباركود -->

                                    <div class="col-md-5 col-lg-4">
                                        <div class="card" style=" border-radius:1.7em;">
                                            <div class="container">
                                                <!-- بداية الجدول!-->
                                                <table class="table table-bordered table-hover" style="font-size:15px; padding:05rem;  background-color:#EAE3E3; font-family: Droid Arabic Kufi;  border-radius:1.1em;">

                                                    <!-- بداية حقل الباركود ونتائج الاله الحسابة!-->
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="3">
                                                                <input type="text" name="info" autofocus="" style="font-size:15px;" class="cal-display  form-control btn-rounded " id="barcode" placeholder="اختر الصنف" autocomplete="off">
                                                            </td>
                                                        </tr>
                                                        <!-- نهاية حقل الباركود والاله الحسابه!-->

                                                        <!-- بداية الازرار للقيم 1 - 2- 3  !-->
                                                        <tr align="center">
                                                            <td style="width:33.3%;">
                                                                <button type="button" class="num btn-rounded form-control" value="1"><strong>1</strong>
                                                                </button>
                                                            </td>
                                                            <td style="width:33.3%;">
                                                                <button type="button" class="num btn-rounded form-control" value="2"><strong>2</strong>
                                                                </button>
                                                            </td>
                                                            <td style="width:33.3%;">
                                                                <button type="button" class="num btn-rounded form-control" value="3"><strong>3</strong>
                                                                </button>
                                                            </td>
                                                            <!--<td><button style="background-color: #1FAF2E;" class="btn-blue op form-control btn-rounded" value="*"> *</button></td>!-->
                                                        </tr>
                                                        <!-- نهاية الازرار للقيم 1 - 2- 3  !-->


                                                        <!-- بداية الازرار للقيم 4 - 5 - 6    !-->

                                                        <tr align="center">
                                                            <td style="width: 23%;">
                                                                <button class="num btn-rounded form-control" type="button" value="4"><strong>4</strong>
                                                                </button>
                                                            </td>
                                                            <td style="width: 23%;">
                                                                <button class="num btn-rounded form-control" type="button" value="5"><strong>5</strong>
                                                                </button>
                                                            </td>
                                                            <td style="width: 23%;">
                                                                <button class="num btn-rounded form-control" type="button" value="6"><strong>6</strong>
                                                                </button>
                                                            </td>
                                                            <!--<td><button style="background-color: #1FAF2E;" class="op form-control btn-rounded" value="-"> -</button></td>!-->
                                                        </tr>

                                                        <!-- نهاية الازرار للقيم 4 - 5 - 6    !-->


                                                        <!-- بداية الازرار للقيم 7 - 8 - 9     !-->

                                                        <tr style="height: 10px;" align="center">
                                                            <td>
                                                                <button class="num  btn-rounded form-control" type="button" value="7"><strong>7</strong>
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <button class="num  btn-rounded form-control" type="button" value="8"><strong>8</strong>
                                                                </button>
                                                            </td>
                                                            <td>
                                                                <button class="num  btn-rounded form-control" type="button" value="9"><strong>9</strong>
                                                                </button>
                                                            </td>
                                                            <!--<td><button style="background-color: #1FAF2E;" class="op form-control  btn-rounded" value="+"> +</button></td>!-->
                                                        </tr>

                                                        <!-- نهاية الازرار للقيم  7-8-9     !-->


                                                        <!-- بداية الازرار للقيم   0 - + - delete     !-->

                                                        <tr align="center">

                                                            <!--<td><button class="num form-control btn-rounded" value="."> .</button></td>!-->
                                                            <td>
                                                                <button style="background-color: green;COLOR:#ffffff;" class="btn-equal form-control  btn-rounded" type="submit" value="=">
                                                                    <strong>ENT</strong></button>
                                                            </td>
                                                            <td>
                                                                <button class="num  btn-rounded form-control" type="button" value="0"><strong>
                                                                        0</strong></button>
                                                            </td>
                                                            <td>
                                                                <button style="background-color: RED;COLOR:#ffffff;" class="form-control  btn-rounded" id="clear" type="button" value=" "><strong>DEL</strong></button>
                                                            </td>
                                                            <!--<td><button class="op form-control  btn-rounded" value="/"> /</button></td>!-->
                                                        </tr>
                                                        <tr>


                                                            <!-- بداية الازرار للقيم   0 - + - delete     !-->
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- نهاية جدول الاله الحسابه  !-->


                                    <!-- كود تسنيق الفاصل الخاصة بملخص الحساب الاجمالي  !-->
                                    <!-- نهاية تسنيق الفاصل الخاصة بملخص الحساب الاجمالي  !-->


                                    <br><br><br>

                                    <!-- كود التنسيق الخاص بالضريبة والأجمالي وطريقة السداد والمبلغ المدفوع  !-->

                                    <div class="col-md-5 col-lg-6">
                                        <div style="font-size:16px; border-radius:0.7em;  color:#707070;" class="card-box" align="center">


                                            <!-- بداية جدول الحسابات !-->
                                            <table class="table table-borderd" style="background-color: #eff5fc; font-family: 'Droid Arabic Kufi'; font-size:14px; ">
                                                <tbody>
                                                    <tr>

                                                        <td style="width: 25%;">
                                                            <button type="button" style="background-color:#1FAF2E; font-size:12px;  width:100%;  font-family: 'Droid Arabic Kufi';" class="btn  btn"><strong>المبلغ</strong></button>
                                                        </td>
                                                        <td style="width:25%;">

                                                            <strong id="sub_total" style="font-family: Droid Arabic Kufi; font-size:18px; color:#000000;">0</strong></td>

                                                        <!--نهاية كود عرض اجمالي الفاتورة فقط بدون قمية مضافة   !-->


                                                        <!-- الحقل الثانية عرض اجمالي القيمة المضافة  !-->

                                                        <td style="width: 25%;">
                                                            <button type="button" style="background-color:#DD5656; font-size:12px;  width:100%;  font-family: 'Droid Arabic Kufi';" class="btn  btn"><strong>الضريبة</strong></button>
                                                        </td>
                                                        <td style="width:25%;">
                                                            <strong id="vat" style="font-family: Droid Arabic Kufi; font-size:18px; color:#000000;">0</strong></td>

                                                        <!-- نهاية كود الضريبة  !-->

                                                    </tr>

                                                    <!-- بداية حقل طريقة الدفع  !-->

                                                    <tr name="addem" action="" id="addem">
                                                        <td colspan="4" align="center">
                                                            <select id="payment" name="payment" class="form-control">
                                                                <option value="1">نقدا</option>
                                                                <option value="2">شبكه</option>
                                                                <option value="3">اجل</option>

                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <!-- بداية عنوان حقول الجدول  !-->
                                                    <tr align="center">
                                                        <td colspan="2">
                                                            <button type="button" style="background-color:#1FAF2E; font-size:12px;  width:100%;  font-family: 'Droid Arabic Kufi';" class="btn  btn">المدفوع
                                                            </button>
                                                        </td>
                                                        <td colspan="2">
                                                            <button type="button" style="background-color:#DD5656; font-size:12px;  width:100%;  font-family: 'Droid Arabic Kufi';" class="btn  btn"> المتبقي
                                                            </button>
                                                        </td>
                                                    </tr>
                                                    <!-- نهاية عناون حقول الجدول  !-->


                                                    <tr align="center">
                                                        <!-- حقل اضافة المبلغ ويحسب تلقائيا !-->

                                                        <td colspan="2">
                                                            <input type="number" step="00.01" id="tb1" name="tb1" style="border-color:silver; width:100%;font-size:15px; color:green;" class="btn btn-card btn-rounded btn" onkeyup="calc(this)"></td>
                                                        <input type="hidden" id="tb2" value="3.45" name="tb2" onkeyup="calc(this)">

                                                        <!-- عرض المبلغ المتبقي  !-->

                                                        <td colspan="2">
                                                            <button style="border-color:silver; width:100%;  font-size:15px; color:red;" class="btn btn-card btn-rounded btn">
                                                                <strong style="color:#DD5656;">
                                                                    <span id="update">0</span></strong></button>
                                                            <strong style="color:#DD5656;">
                                                            </strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="4">
                                                            <button type="button" class="btn  btn-rounded form-control" style="height: 40px; font-family: 'Droid Arabic Kufi'; background-color: #1E1170;" data-toggle="modal" data-target="#sideModalTR">
                                                                <i class=" fas fa-qrcode "> </i> (غير معروفه) إصناف غير مسجله
                                                            </button>

                                                        </td>
                                                    </tr>
                                                    <!-- نهاية الحقول  !-->
                                                </tbody>
                                            </table>
                                            <!-- نهاية الجدول  !-->
                                        </div>
                                    </div>

                                    <br><br><br>
                                    <!-- عرض المبلغ الاجمالي بناء علي متغير معرف مسبقاً  !-->

                                    <div class="col-md-2 col-lg-2 round">
                                        <div class="card-box" style="border-radius:2.7em;" align="center">
                                            <button type="button" class="btn btn-round" style="border-color:#707070; color:#707070; width:100%; font-family: 'Droid Arabic Kufi'; font-size:19px; border-radius:0.7em;">
                                                الإجمالي
                                                <hr>
                                                <strong id="total" style="color:red;">0<p></p></strong></button>
                                            <strong style="color:red;">
                                            </strong></div>
                                        <strong style="color:red;">
                                            <br><br><br>

                                            <div class="card-box" style="border-radius:2.7em;" align="center">
                                                <table class="table table-bordered tab-content table-embed-responsive" style="background-color: #eff5fc; width: 100%; font-family: 'Droid Arabic Kufi'; font-size:15px; ">

                                                    <tbody>
                                                        <tr>
                                                            <td><a href="logout.php">
                                                                    <button type="button" style="background-color:#DD5656; color:#eff5fc; font-size:15px; height:28px;  width:100%;  font-family: 'Droid Arabic Kufi';" class="btn btn-succes">
                                                                        <i class=" fas fa-lock "></i></button>
                                                                </a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </strong>
                                    </div>
                                    <strong style="color:red;">

                                    </strong>
                                </div>
                                <strong style="color:red;">


                                    <!-- نهاية التعريف  !-->


                                </strong>
                            </div><!-- نهاية العمليات --><strong style="color:red;">
                            </strong>
                    </div>
                    <strong style="color:red;">
                        <!-- نهاية التنيسق -->
                    </strong>
                </div>
                <strong style="color:red;"></strong>
                <!-- نهاية التصميم -->


            <?php endif; ?>


            <!-- كود جافا سكربت لعمل الاله الحاسبه!-->
            <script>
                // تعريف المعاملات
                const result = document.querySelector('.cal-display')
                const clear = document.querySelector('#clear')
                const compute = document.querySelector('.btn-equal')
                // تعريف الازرار الخاصه بالادخال
                const buttons = document.querySelectorAll('.num, .op')
                let input = [];
                Array.from(buttons).forEach((button) => {
                    //تعريف المعاملات الرياضيه
                    button.addEventListener('click', () => {
                        const operator = ['+', '-', '/', '*']
                        //التحقق من صحة النتائج
                        if (input[input.length - 1] == '=' && !operators.includes(button.value)) {
                            result.value = button.value;
                        } else {
                            result.value += button.value;
                        }
                        input.push(button.value)
                    })
                })

                // الشرط(=)
                compute.addEventListener('click', () => {
                    input.push('=');
                    //التحقق
                    if (result.value.length == 0) {
                        return false
                    } else {
                        result.value = eval(result.value)
                    }
                })
                // مسح شاشة الاله الحسابه
                clear.addEventListener('click', () => {
                    result.value = ''
                })
            </script>
            <!-- نهاية كود جافا سكربت للاله الحسابه!-->

            <!-- تنسيق الاله الحاسبه !-->

            <!-- نهاية التنسيق!-->

            <!-- نهاية الفورم!-->


            <!-- Side Modal Top Right -->

            <!-- Button trigger modal -->

            <!-- ملفات جافا سكربت لوضع تطبيقات الجوال -->

            <script src="js/jquery.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/custom.js"></script>


            <script>
                function load_products(invoice_id) {
                    // alert(barcode);

                    $.ajax({
                        type: 'POST',
                        url: "http://localhost/pos/sales/ajaxPosLoginc.php",
                        data: {

                            'invoice_id': invoice_id,
                            'operation': 'loading',
                        },
                        beforeSend: function() {

                        },
                        success: function(resultData) {
                            
                            data = JSON.parse(resultData);
                            $("#invoice_container").html(data['table'])
                            $("#barcode").val('');
                            $("#total").text(data['total']);
                            $("#vat").text(data['vat']);

                            $("#sub_total").text(data['sub_total']);

                            $("#tb1").val("");
                            $("#payed").text(0);
                            $("#update").text(0);
                        }
                    });
                }




                $('#barcode').on('keypress', function(e) {
                    if (e.which == 13) {
                        var payment = $("#payment").val();
                        if (payment < 1) {
                            alert("الرجاء اختيار طريقه الدفع")
                            return;
                        }
                        var barcode = $("#barcode").val();
                        var invoice_id = $("#invoice_id").val();

                        if (barcode == "") {
                            alert("عفوا الرجاء كتابه الباركود")
                        } else {
                            $.ajax({
                                type: 'POST',
                                url: "http://localhost/pos/sales/ajaxPosLoginc.php",
                                data: {
                                    'payment': payment,
                                    'sid': barcode,
                                    'invoice_id': invoice_id,
                                    'operation': 'add_product',
                                },
                                beforeSend: function() {

                                },
                                success: function(resultData) {
                                    // alert(resultData);
                                    console.log(JSON.parse(resultData));
                                    data = JSON.parse(resultData);
                                    $("#invoice_container").html(data['table'])
                                    $("#barcode").val('');
                                    $("#total").text(data['total']);
                                    $("#vat").text(data['vat']);

                                    $("#sub_total").text(data['sub_total']);

                                    $("#tb1").val("");
                                    $("#payed").text(0);
                                    $("#update").text(0);
                                }
                            });
                        }
                        // $("#barcode").val("")
                    }
                    // اذا ثام المستخدم بالضغط على زر enter 

                });

                // suggestions_value
                $("#suggestions_value").keyup(function() {

                    var suggestions_value = $("#suggestions_value").val();
                    $.ajax({
                        type: 'POST',
                        url: "http://localhost/pos/sales/ajaxPosLoginc.php",
                        data: {
                            'suggestions_value': suggestions_value,
                            'operation': 'sarech',
                        },
                        beforeSend: function() {

                        },
                        success: function(resultData) {
                            data = JSON.parse(resultData);
                            $("#suggestions").html(data['list'])
                        }
                    });
                });

                function add_product(barcode) {


                    var payment = $("#payment").val();
                    var invoice_id = $("#invoice_id").val();

                    if (payment < 1) {
                        alert("الرجاء اختيار طريقه الدفع")
                        return;
                    }

                    $.ajax({
                        type: 'POST',
                        url: "http://localhost/pos/sales/ajaxPosLoginc.php",
                        data: {
                            'payment': payment,
                            'sid': barcode,
                            'invoice_id': invoice_id,
                            'operation': 'add_product',
                        },
                        beforeSend: function() {

                        },
                        success: function(resultData) {
                            // alert(resultData);
                            console.log(JSON.parse(resultData));
                            data = JSON.parse(resultData);
                            $("#invoice_container").html(data['table'])
                            $("#suggestions_value").val('');
                            $("#total").text(data['total']);
                            $("#vat").text(data['vat']);

                            $("#sub_total").text(data['sub_total']);

                            $("#tb1").val("");
                            $("#payed").text(0);
                            $("#update").text(0);
                        }
                    });

                    $("#suggestions").html("");
                }
                function decrease(barcode) {


                    var payment = $("#payment").val();
                    var invoice_id = $("#invoice_id").val();

                    if (payment < 1) {
                        alert("الرجاء اختيار طريقه الدفع")
                        return;
                    }

                    $.ajax({
                        type: 'POST',
                        url: "http://localhost/pos/sales/ajaxPosLoginc.php",
                        data: {
                            'payment': payment,
                            'sid': barcode,
                            'invoice_id': invoice_id,
                            'operation': 'decrease',
                        },
                        beforeSend: function() {

                        },
                        success: function(resultData) {
                            // alert(resultData);
                            console.log(JSON.parse(resultData));
                            data = JSON.parse(resultData);
                            $("#invoice_container").html(data['table'])
                            $("#suggestions_value").val('');
                            $("#total").text(data['total']);
                            $("#vat").text(data['vat']);

                            $("#sub_total").text(data['sub_total']);

                            $("#tb1").val("");
                            $("#payed").text(0);
                            $("#update").text(0);
                        }
                    });

                    $("#suggestions").html("");
                }



                function delete_product(barcode) {
                    // alert(barcode);

                    var invoice_id = $("#invoice_id").val();

                    $.ajax({
                        type: 'POST',
                        url: "http://localhost/pos/sales/ajaxPosLoginc.php",
                        data: {
                            'barcode': barcode,
                            'invoice_id': invoice_id,
                            'operation': 'delete_product',
                        },
                        beforeSend: function() {

                        },
                        success: function(resultData) {
                            data = JSON.parse(resultData);
                            $("#invoice_container").html(data['table'])
                            $("#total").text(data['total']);
                            $("#vat").text(data['vat']);

                            $("#sub_total").text(data['sub_total']);


                            $("#tb1").val("");
                            $("#payed").text(0);
                            $("#update").text(0);
                        }
                    });
                }

                function calc(x) {

                    var payed = x.value;

                    var total = $("#total").text();
                    var update = $("#update").text();
                    var full_total = 0;
                    full_total = payed - total

                    if (full_total > 0)
                        $("#update").text(full_total)
                }
                $('body').ready(function() {

                    $.ajax({
                        type: 'POST',
                        url: "http://localhost/pos/sales/ajaxPosLoginc.php",
                        data: {
                            'payment': payment,
                            'sid': barcode,
                            'invoice_id': invoice_id,
                            'operation': 'loading',
                        },
                        beforeSend: function() {

                        },
                        success: function(resultData) {
                            alert('resultData');
                            console.log(JSON.parse(resultData));
                            data = JSON.parse(resultData);
                            $("#invoice_container").html(data['table'])
                            $("#barcode").val('');
                            $("#total").text(data['total']);
                            $("#vat").text(data['vat']);

                            $("#sub_total").text(data['sub_total']);

                            $("#tb1").val("");
                            $("#payed").text(0);
                            $("#update").text(0);
                        }
                    });
                });
            </script>

</body>

</html>