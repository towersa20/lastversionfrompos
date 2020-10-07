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

    <link rel="stylesheet" href="w3.css">

    <style>
        label,
        button {
            font-family: 'Droid Arabic Kufi';

        }

        .fas {
            cursor: pointer;
            font-size: 16px;
            margin: 3px;
        }

        .list-group-item {

            background-color: beige;
        }
    </style>
</head>

<!--  جسم شاشة البرنامج!-->


<body onload="load_products(<?= $_GET['invoice_Id'] ?>)" class="sidebar-disable" style="font-family: 'Droid Arabic Kufi';">

    <!-- بداية الصفحة شريط العنوان زو اللون الوردي -->
    <div id="">

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
                            <div style="background-color: #0595B7;" class="row">

                                <div class="col-md-12  offset-md-3">
                                    <h4 style="color: #eff5fc;text-align: center;">Refund Bills</h4>
                                </div>
                            </div>
                            <!-- كود فورم استخراج فاتورة البيع  -->
<div class="row">
    <div class="col-md-10 col-lg-10 ">
        <div class="card-box">
<!-- كود جدول اضافة بيانات الفاتورة -->
<table class="table table-bordered">
<tbody>
<tr>
<td style="width:45%;">
<div class="input-group">
<input type="text" autocomplete="off" id="suggestions_value" class="form-control" style="font-size:18px; color:red;" placeholder="Search Product" name="search">
<div id="suggestions" style="position: absolute;top: 44px;width: 100%;" class="list-group"></div>
</div>
</td>
<td style="width: 20%;">
<div class="input-group">
<input name="customer_name" type="text" placeholder="New Name" id="search_customer" class="form-control" style="font-size: 18px; color:red;">
<div id="search_customer_list" style="position: absolute;top: 44px;width: 100%; background-color: #0595B7;overflow: hidden;z-index: 100;" class="list-group"></div>
</div>
</td>
<td style="width:12%;">
<button onclick="customer()" style=" font-family: 'Droid Arabic Kufi'; font-size:16px; width: 200px; background-color:#0595B7;" class="btn btn-md  btn-rounded"> Add Customer</button>
</td>


<td style="width:10%;">Bills Name</td>
<td style="width: 25%;">
<input type="text" id="invoice_id" class="form-control" style="font-size: 16px; color:red;" value="<?= $_GET['invoice_Id'] ?>" name="b">
</td>
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

                                            .my-custom-scrollbar {
                                                position: absolute;
                                                height: 100px;
                                                overflow: auto;
                                                font-size: 2px;
                                                
                                            }

                                            .table-wrapper-scroll-y {
                                                display: block;
                                            }
                                        </style>
                                        <!--نهاية كود التنسيق  -->


                                        <!-- كود جدول الفاتورة   -->
                                        <div style="height: 250px;overflow: scroll;margin: 14px 0;">

                                            <table class="table table-bordered tab-content table-embed-responsive" style="background-color: #eff5fc; width: 100%; font-family: 'Droid Arabic Kufi'; font-size:15px;  font-family: 'Droid Arabic Kufi'; ">


                                                <thead>
                                                    <tr align="center">
                                                        <th style=" font-family: 'Droid Arabic Kufi';">Product</th>
                                                        <th style=" font-family: 'Droid Arabic Kufi';">Unit</th>
                                                        <th style=" font-family: 'Droid Arabic Kufi';">Quantatiy</th>
                                                        <th style=" font-family: 'Droid Arabic Kufi';">Price</th>
                                                        <th style=" font-family: 'Droid Arabic Kufi';">Amount</th>
                                                        <th style=" font-family: 'Droid Arabic Kufi';">Tax</th>
                                                        <th style=" font-family: 'Droid Arabic Kufi';">Total + Tax</th>

                                                    </tr>
                                                </thead>

                                                <tbody id="invoice_container">

                                                </tbody>
                                            </table>
                                        </div>
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
                                                        <a href="print3.php?print=<?= $_GET['invoice_Id'] ?>" id="add">
                                                            <button type="button" style="background-color:#0595B7; font-size:16px; height:40px; width:100%; font-family: 'Droid Arabic Kufi';" class="btn btn-rounded">
                                                                <i class="fas fa-print "></i> Save
                                                            </button>
                                                            <script>
shortcut.add("HOME",function() {
	 document.getElementById("add").click();
},{
	'type':'keydown',
	'propagate':true,
	'target':document
});</script>

                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="width:16.6%;">
                                                        <a href="exe.php">
                                                            <button type="button" style="background-color:#0595B7; font-size:16px; height:40px; width:100%; font-family: 'Droid Arabic Kufi';" class="btn btn-rounded">
                                                                <i class="fas fa-plus "></i> New
                                                            </button>
                                                        </a></td>
                                                </tr>

                                                <tr>
                                                    <td style="width:16.6%;">
                                                      
                                                            <a href="print2.php?print=<?php echo $_GET['invoice_Id'] ?>&&discount=0" type="button" style="background-color:#0595B7; font-size:16px; height:40px; width:100%; font-family: 'Droid Arabic Kufi';" class="btn btn-rounded">
                                                                <i class="fas fa-Print "></i> Print
                                                            </a>
                                                        </a>
                                                    </td>
                                                </tr>
                              
                                                <tr>

                                                    <td style="width:16.6%;">
                                                        <a href="posss.php?delete=2020000151&amp;&amp;maxi=2021" onclick="return confirm('هل تريد حذف الفاتورة');">
                                                            <button type="button" style="background-color:#0595B7; font-size:16px; height:40px; width:100%; font-family: 'Droid Arabic Kufi';" class="btn btn-rounded">
                                                                <i class=" fas fa-times-circle  "></i> Remove
                                                            </button>
                                                        </a></td>

                                                </tr>
                                                <tr>

                                                    <td style="width:16.6%;">
                                                        <a href="exe.php" target="_blank">
                                                            <button type="button" style="background-color:#0595B7; font-size:16px; height:40px; width:100%; font-family: 'Droid Arabic Kufi';" class="btn btn-rounded">
                                                                <i class=" far fa-stop-circle "></i> Hold
                                                            </button>
                                                        </a></td>
                                                    <input type="hidden" value="" id="customer_id_value">
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- بداية كود الالة الحاسبه والبحث بالصنف والباركود -->

                                <div class="footer_page col-md-4 col-lg-4">
                                    <div class="card" style=" border-radius:1.7em;">
                                        <div class="container">
                                            <!-- بداية الجدول!-->
                                            <table class="table table-bordered table-hover" style="font-size:15px; padding:05rem;  background-color:#EAE3E3; font-family: Droid Arabic Kufi;  border-radius:1.1em;">

                                                <!-- بداية حقل الباركود ونتائج الاله الحسابة!-->
                                                <tbody>
                                                    <tr>
                                                        <td colspan="3">
                                                            <input type="text" name="info" autofocus="" style="font-size:15px; background-color: #707070; color:yellow;" class="cal-display  form-control btn-rounded " id="barcode" placeholder="Scan Barcode" autocomplete="off">
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

                                <div class=" footer_page1 col-md-4 col-lg-6">
                                    <div style="font-size:16px; border-radius:0.7em;  color:#707070;" class="card-box" align="center">


                                        <!-- بداية جدول الحسابات !-->
                                        <table class="table table-borderd" style="background-color: #eff5fc; font-family: 'Droid Arabic Kufi'; font-size:14px; ">
                                            <tbody>
                                                <tr>

                                                    <td style="width: 25%;">
                                                        <button type="button" style="background-color:#0595B7; font-size:16px;  width:100%;  font-family: 'Droid Arabic Kufi';" class="btn  btn"><strong>Total</strong></button>
                                                    </td>
                                                    <td style="width:25%;">

                                                        <strong id="sub_total" style="font-family: Droid Arabic Kufi; font-size:18px; color:#000000;">0</strong></td>

                                                    <!--نهاية كود عرض اجمالي الفاتورة فقط بدون قمية مضافة   !-->


                                                    <!-- الحقل الثانية عرض اجمالي القيمة المضافة  !-->

                                                    <td style="width: 25%;">
                                                        <button type="button" style="background-color:#0595B7; font-size:16px;  width:100%;  font-family: 'Droid Arabic Kufi';" class="btn  btn"><strong>Tax</strong></button>
                                                    </td>
                                                    <td style="width:25%;">
                                                        <strong id="vat" style="font-family: Droid Arabic Kufi; font-size:18px; color:#000000;">0</strong></td>

                                                    <!-- نهاية كود الضريبة  !-->

                                                </tr>

                                                <!-- بداية حقل طريقة الدفع  !-->

                                                <tr name="addem" action="" id="addem">
                                                    <td colspan="4" align="center">
                                                        <select id="payment" name="payment" class="form-control">
                                                            <option value="1">Cash</option>
                                                            <option value="2">Visa</option>
                                                            <option value="3">Dept</option>

                                                        </select>
                                                    </td>
                                                </tr>

                                                <!-- بداية عنوان حقول الجدول  !-->
                                                <tr align="center">
                                                    <td colspan="2">
                                                        <button type="button" style="background-color:#707070; font-size:16px;  width:100%;  font-family: 'Droid Arabic Kufi';" class="btn  btn">paid up
                                                        </button>
                                                    </td>
                                                    <td colspan="2">
                                                        <button type="button" style="background-color:#707070; font-size:16px;  width:100%;  font-family: 'Droid Arabic Kufi';" class="btn  btn"> Residual
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
                                                        <button onclick="document.getElementById('id01').style.display='block'" type="button" class="btn  btn-rounded form-control" style="height: 40px; font-family: 'Droid Arabic Kufi'; background-color:#707070;" data-toggle="modal" data-target="#sideModalTR">
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

                                <div class="footer_page2 col-md-2 col-lg-2 round">
                                    <div class="card-box" style="border-radius:1.7em;" align="center">
                                        <button type="button" class="btn btn-round" style="border-color:#707070; color:#707070; width:100%; font-family: 'Droid Arabic Kufi'; font-size:16px; border-radius:0.7em;">
                                        Total Includes Tax
                                            <hr>
                                            <strong id="total" style="color:red; font-size:45px;">0<p></p></strong></button>
                                        <strong style="color:red;">
                                        </strong></div>
                                    <strong style="color:red;">
                                        <br><br><br>

                                        <div class="card-box" style="border-radius:2.2em;" align="center">
                                            <table class="table table-bordered tab-content table-embed-responsive" style="background-color: #eff5fc; width: 100%; font-family: 'Droid Arabic Kufi'; font-size:15px; ">

                                                <tbody>

                                                    <tr>
                                                        <td><a href="logout.php">
                                                                <button type="button" style="background-color:#E80458; color:#eff5fc; font-size:15px; height:40px;  width:100%;  font-family: 'Droid Arabic Kufi';" class="btn btn-rounded">
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



                <div class="w3-container">

                    <div id="customer" class="w3-modal">
                        <div class="w3-modal-content">
                            <div class="w3-container">
                                <span onclick="document.getElementById('customer').style.display='none'" class="w3-button w3-display-topright">
                                    <i style="color:red; font-size: 24px;margin: - 20px;" class=" fas fa-times-circle  "></i>
                                </span>
                                <div class="container">
                                    <div class="col-md-12">
                                        <h3 style="margin-right: 20px;">Add Customer</h3>
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <!-- customer `cid`, `name`, `tell1`, `cno`, `acno`, `bank`, `adres`, `item`, `date` -->
                                            <!-- customer_name  - bank - acno - adres -->

                                            <div class="form-group col-md-6">
                                                <label for="">Name</label>
                                                <input type="text" class="form-control" id="customer_name">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Phone</label>
                                                <input type="text" class="form-control" id="phone">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">Type</label>
                                                <input type="text" class="form-control" id="type">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label for="">Bank</label>
                                                <input type="text" class="form-control" id="bank">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Account No</label>
                                                <input type="text" class="form-control" id="acount">
                                            </div>
                                         
                                            <div class="form-group col-md-12">

                                                <button onclick="register_new_customer()" style="font-family: 'Droid Arabic Kufi';" class="btn-info btn btn-md">
                                                     Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div id="id01" class="w3-modal">
                        <div class="w3-modal-content">
                            <div class="w3-container">
                                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">
                                    <i style="color:red; font-size: 24px;margin: - 20px;" class=" fas fa-times-circle  "></i>
                                </span>
                                <div class="container">
                                    <div class="col-md-12">
                                        <h3 style="margin-right: 20px;">Add an unknown item</h3>
                                        <hr>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="">Name</label>
                                                <input type="text" id="name" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Price</label>
                                                <input type="text" id="price" class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Quantatiy </label>
                                                <input type="number" id="qyt" class="form-control">
                                            </div>
                                            <div class="form-group col-md-12">

                                                <button onclick="add_unknown_product()" style="font-family: 'Droid Arabic Kufi';" class="btn-info btn btn-md" id="add_unk_product">
                                                Add an unknown item
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

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
                    function select_customer(a) {
                        var x = (a.value || a.options[a.selectedIndex].value); //crossbrowser solution =)
                        // alert(x);
                        $('#customer_id_value').val(x)
                    }

                    function register_new_customer() {
                        // customer_name  - bank - acno - adres

                        var customer_name = $("#customer_name").val();
                        var bank = $("#bank").val();
                        var acount = $("#acount").val();
                        var phone = $("#phone").val();
                        var type = $("#type").val();

                        $.ajax({
                            type: 'POST',
                            url: "ajaxPosLogincs.php",
                            data: {
                                'customer_name': customer_name,
                                'acount': acount,
                                'bank': bank,
                                'type': type,
                                'phone': phone,
                                'operation': 'register_new_customer',
                            },
                            beforeSend: function() {

                            },
                            success: function(resultData) {
                                document.getElementById('customer').style.display = 'none'
                                $("#search_customer").val(customer_name)


                            }
                        });
                    }

                    function select_customer_from_list(customer_id) {

                        $.ajax({
                            type: 'POST',
                            url: "ajaxPosLogincs.php",
                            data: {
                                'customer_id': customer_id,
                                'operation': 'get_single_customer',
                            },
                            beforeSend: function() {

                            },
                            success: function(resultData) {

                                $("#search_customer").val(resultData)
                                $("#search_customer_list").html("")

                            }
                        });
                    }

                    function load_products(invoice_id) {
                        // alert(barcode);

                        $.ajax({
                            type: 'POST',
                            url: "http://127.0.0.1/pos/sales/ajaxPosLogincs.php",
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

                    function add_unknown_product() {


                        var payment = $("#payment").val();
                        var invoice_id = $("#invoice_id").val();


                        var search_customer = $("#search_customer").val();
                        var customer_name = $("#customer_name").val();
                        var name = $("#name").val();
                        var price = $("#price").val();
                        var qyt = $("#qyt").val();

                        if (name.length < 1 || price.length < 1 || qyt.length < 1) {
                            alert("كل الحقول مطلوبه")
                            return;
                        }

                        $.ajax({
                            type: 'POST',
                            url: "ajaxPosLogincs.php",
                            data: {
                                'payment': payment,
                                'invoice_id': invoice_id,
                                'search_customer': search_customer,
                                'customer_name': customer_name,
                                'name': name,
                                'price': price,
                                'qyt': qyt,
                                'operation': 'add_unknown_product',
                            },
                            beforeSend: function() {

                            },
                            success: function(resultData) {
                                // alert(resultData);
                                // console.log(JSON.parse(resultData));
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

                    function customer() {
                        document.getElementById('customer').style.display = 'block';

                        $.ajax({
                            type: 'POST',
                            url: "ajaxPosLogincs.php",
                            data: {
                                'operation': 'get_customer',
                            },
                            beforeSend: function() {

                            },
                            success: function(resultData) {
                                // alert(resultData)
                                console.log(resultData)
                                // data = JSON.parse(resultData);
                                $("#customer_id").html(resultData)
                            }
                        });
                    }


                    function customerValidation() {

                        var search_customer = $('#search_customer').val()
                        if (search_customer == "") {
                            return false
                        } else return true

                    }
                    $('#barcode').on('keypress', function(e) {
                        if (e.which == 13) {
                            var payment = $("#payment").val();
                            if (payment == 3) {
                                if (!customerValidation()) {
                                    alert('الرجاء اختيار العميل اولا')
                                    return;
                                }
                            }
                            var barcode = $("#barcode").val();
                            var invoice_id = $("#invoice_id").val();

                            var search_customer = $('#search_customer').val()

                            if (barcode == "") {
                                alert("عفوا الرجاء كتابه الباركود")
                            } else {
                                $.ajax({
                                    type: 'POST',
                                    url: "ajaxPosLogincs.php",
                                    data: {
                                        'payment': payment,
                                        'sid': barcode,
                                        'search_customer': search_customer,
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
                            url: "ajaxPosLogincs.php",
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
                    // suggestions_value
                    $("#search_customer").keyup(function() {

                        var search_customer = $("#search_customer").val();
                        $.ajax({
                            type: 'POST',
                            url: "ajaxPosLogincs.php",
                            data: {
                                'search_customer': search_customer,
                                'operation': 'search_customer',
                            },
                            beforeSend: function() {

                            },
                            success: function(resultData) {
                                data = JSON.parse(resultData);
                                // $("#search_customer_list").html(resultData)
                                $("#search_customer_list").html(data['list'])
                            }
                        });
                    });

                    function add_product(barcode) {


                        var payment = $("#payment").val();
                        var invoice_id = $("#invoice_id").val();

                        if (payment == 3) {
                            if (!customerValidation()) {
                                alert('الرجاء اختيار العميل اولا')
                                return;
                            }

                        }

                        $.ajax({
                            type: 'POST',
                            url: "ajaxPosLogincs.php",
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
                            url: "ajaxPosLogincs.php",
                            data: {
                                'payment': payment,
                                'barcode': barcode,
                                'invoice_id': invoice_id,
                                'operation': 'decrease_product_qyt',
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



                    function delete_invoice() {
                        // alert(barcode);

                        var invoice_id = $("#invoice_id").val();
                        // alert(invoice_id);

                        $.ajax({
                            type: 'POST',
                            url: "ajaxPosLogincs.php",
                            data: {
                                'invoice_id': invoice_id,
                                'operation': 'delete_invoice',
                            },
                            beforeSend: function() {

                            },
                            success: function(resultData) {

                                data = JSON.parse(resultData);
                                alert(data['msg']);
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

                    function delete_product(barcode) {
                        // alert(barcode);

                        var invoice_id = $("#invoice_id").val();

                        $.ajax({
                            type: 'POST',
                            url: "ajaxPosLogincs.php",
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
                </script>
            </div>
</body>

</html>