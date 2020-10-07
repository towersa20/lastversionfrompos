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
</head>

<!--  جسم شاشة البرنامج!-->


<body class="sidebar-disable" style="font-family: 'Droid Arabic Kufi';">

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

                        <div class="container-fluid">
                            <div style="background-color: #E80458;" class="row">

                                <div class="col-md-12  offset-md-3">
                                    <h5 style="color: #eff5fc;text-align: center; font-family: 'Droid Arabic Kufi'; font-size:18px; ">Find an invoice</h5>
                                </div>
                            </div>
                            <!-- كود فورم استخراج فاتورة البيع  -->
                            <div class="row">
                                <div class="col-md-10 col-lg-12 ">
                                    <div class="card-box">

                                        <!-- كود جدول اضافة بيانات الفاتورة -->
                                        <table class="table table-bordered">

                                            <tbody>
                                                <form action="exe2.php" method="get">
                                                    <tr>
                                                        <td style="width:88%;">
                                                            <div class="input-group">
                                                                <input type="text" autocomplete="off" id="suggestions_value" class="form-control" required style="font-size:15px; color:red;" placeholder="Enter The Bills Number" name="invoice">
                                                                <br>
                                                                <div id="suggestions" style="position: absolute;top: 44px;width: 100%;" class="list-group"></div>

                                                            </div>
                                                        </td>

                                                        <td style="width:12%;">
        <button type="submit" class="form-control btn btn-info" style="font-size: 15px; color:#fff;" > Search <i class="fa fa-search"></i></button>
                                                        </td>

                                                </form>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <!-- نهاية كود الجدول -->

                                        <input type="hidden" class="form-control" style="font-size: 10px;" value="2020000151" name="b">
                                        <input type="hidden" name="c" class="form-control" style="font-size: 10px;" value="2020-08-30"><!-- نهاية حقل التاريخ -->
                                        <!-- مؤسسة برجي التقني نظام المبيعات -->


                                        <!-- بداية جدول بيانات الأصناف المستدعاه بالبحث أو الباركود -->
                                        <!-- كود تسنيق الفاتورة علي شاشة المبيعات -->
                                        <style>
                                            h1,
                                            h2,
                                            h3,
                                            h4,
                                            h5,
                                            h6 {
                                                font-family: 'Droid Arabic Kufi' !important;
                                            }
                                        </style>
                                        <!--نهاية كود التنسيق  -->


                                        <!--نهاية الجدول الخاص بفاتورة المبيعات  -->

                                    </div>


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



                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                <script>
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
                </script>
            </div>


        </div>
    </div>
</body>

</html>