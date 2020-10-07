<?php
// استدعاء قاعدة البيانات
include("dbcon/dbcon.php");
//عرض بيانات الفاتورة المخزن بشاشة المبيعات
$nx = mysql_query("select * from vat");
$mx = mysql_fetch_array($nx);
$tax = $mx['tax'];
//نهاية الكود
?><!--دالة المبلغ المدفوع مع المبلغ المتبقي !-->
<script>
    var x = 0;
    var y = 0;
    var z = 0;

    function calc(obj) {
        var e = obj.id.toString();
        if (e == 'tb1') {
            x = Number(obj.value);
            y = Number(document.getElementById('tb2').value);
        } else {
            x = Number(document.getElementById('tb1').value);
            y = Number(obj.value);
        }
        z = x - y;
        document.getElementById('total').value = z;
        document.getElementById('update').innerHTML = z;
    }
</script>

<!--نهاية الدالة!-->


<!--بداية فورم المبيعات!-->
<!-- كود العنوان-->
<div class="container-fluid">
    <div class="row">

        <!--كود تعريف قيمة الفاتورة!-->
        <?php include("dbcon/dbcon.php");
        $sql = mysql_query("select sum(price*qty) from sales where invoice='$_SESSION[SESS_MEMBER_ID]'");
        $row = mysql_fetch_array($sql);
        $costs = $row['sum(price*qty)'] * $tax / 100 + $row['sum(price*qty)']; ?>
        </strong>
        <!--  نهاية الكود -->
    </div>


    <!-- كود فورم استخراج فاتورة البيع  -->
    <div class="row">
        <div class="col-md-10 col-lg-10">
            <div class="card-box">

                <form action="posss.php" method="POST">
                    <!-- كود جدول اضافة بيانات الفاتورة -->
                    <table class="table table-bordered">

                        <tr>
                            <td style="width:58%;">
                                <div class="input-group">
                                    <input type="text" class="form-control" style="font-size:15px; color:red;"
                                           placeholder="أدخل كلمة البحث" name="search" class=" btn-rounded">

                            </td>
                            <!-- نهاية حقل بيانات العميل -->


                            <!-- بداية حقل التاريخ -->
                            <td style="width:10%;">
                                <div class="input-group">
                                    <button class="btn btn" name="add_search"
                                            style="width: 100%; background-color: #1FAF2E;  font-family: 'Droid Arabic Kufi'; ">
                                        بحث <i class="fa fa-search"></i></button>
                            </td>
                            <td style="width: 12%;">رقم الفاتورة</td>
                            <td style="width: 20%;">
                                <input type="text" class="form-control" style="font-size: 15px; color:red;"
                                       value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>" name="b" class=" btn-rounded">
                            </td>

                           <div class="row">
                               <div class="form-group col-md-6">
                                   <?php
                                   //                                customer

                                   include("dbcon/dbcon.php");
                                   //عرض بيانات الفاتورة المخزن بشاشة المبيعات
                                   $customers_result = mysql_query("select * from customer");   ?>

                                   <select name="customer_id"  class="form-control">
                                       <option value="0">
                                           اختار عميل
                                       </option>
                                       <?php while ($customers = mysql_fetch_array($customers_result)) : ?>


                                           <option value="<?= $customers['id'] ?>">
                                               <?= $customers['name'] ?>
                                           </option>
                                       <?php endwhile; ?>
                                       <option value="0">
                                           اضافة عميل جديد
                                       </option>
                                   </select>
                               </div>
                               <div class="col-md-6">
                                   <button class="btn btn-md btn-info">
                                       <span> اضافة عميل</span>
                                   </button>
                               </div>
                           </div>

                            </td>

                        </tr>
                    </table>
                </form>
                <!-- نهاية كود الجدول -->


                <form action="poss.php" method="POST">

                    <input type="hidden" class="form-control" style="font-size: 10px;"
                           value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>" name="b" class=" btn-rounded">
                    <input type="hidden" name="c" class="form-control" style="font-size: 10px;"
                           value="<?php echo date('Y-m-d'); ?>" class=" btn-rounded"><!-- نهاية حقل التاريخ -->
                    <!-- مؤسسة برجي التقني نظام المبيعات -->


                    <!-- بداية جدول بيانات الأصناف المستدعاه بالبحث أو الباركود -->
                    <!-- كود تسنيق الفاتورة علي شاشة المبيعات -->
                    <style>
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


                    <style>
                        .my-custom-scrollbar {
                            position: relative;
                            height: 300px;
                            overflow: auto;
                        }

                        .table-wrapper-scroll-y {
                            display: block;
                        }
                    </style>

                    <div id="maintable">
                        <div style="margin-top: -19px; margin-bottom: 21px; font-size:25px;">
                            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                                <!-- كود جدول الفاتورة   -->
                                <table class="table table-bordered tab-content table-embed-responsive"
                                       style="background-color: #eff5fc; width: 100%; font-family: 'Droid Arabic Kufi'; font-size:12px; ">


                                    <!--بداية حقول العنوان -->

                                    <tr align="center">
                                        <td>رقم</td>
                                        <td>الصنف</td>
                                        <td>الوحده</td>
                                        <td>الكمية</td>
                                        <td>السعر</td>
                                        <td>المبلغ</td>
                                        <td>إزالة</td>
                                    </tr>

                                    <!-- نهاية حقول العنوان -->


                                    <?php
                                    // استدعاء قاعدة البيانات
                                    include("dbcon/dbcon.php");
                                    //عرض بيانات الفاتورة المخزن بشاشة المبيعات
                                    $sql = mysql_query("select sum(qty),invoice,name,category,product,price,discount,transaction_id from sales where invoice='$_SESSION[SESS_MEMBER_ID]' GROUP BY NAME order by transaction_id desc");
                                    $row = mysql_fetch_array($sql);
                                    //نهاية الكود
                                    ?>


                                    <?php
                                    // دالة الترقيم التلقائي لحقول المبيعات
                                    $i = 0;
                                    do {
                                        $i = $i + 1;

                                        //نهاية ?>
                                        <tr>
                                            <!--حقول المبيغات المستدعاة -->

                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['category']; ?></td>
                                            <td align="center" style="width:18%;">

                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-3"><a
                                                                    href="me.php?max=<?php echo $pro = $row['product']; ?>&max2=1&transaction_id=<?php echo $row['transaction_id']; ?>">
                                                                <img src="1.png" style="width:20px;"></a></div>

                                                        <div class="col-6" align="center">
                                                            <input type="text" value="<?php echo $row['sum(qty)']; ?>"
                                                                   class="form-control"
                                                                   style="font-size:20px;width:62px; color:red; height:33px;">
                                                        </div>
                                                        <div class="col-3">
                                                            <a href="me2.php?min=<?php echo $row['product']; ?>&max2=1&transaction_id=<?php echo $row['transaction_id']; ?>">
                                                                <img src="2.png" style="width:20px;"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td style="font-size:14px;"><?php echo $row['price']; ?></td>

                                            <td style="font-size:14px;"
                                                align="center"><?php $endsum = $row['price'] * $row['sum(qty)'] * $tax / 100 + $row['price'] * $row['sum(qty)'];
                                                echo round($endsum, 2);  // 1.96
                                                ?></td>

                                            <td align="center"><a
                                                        href="poss.php?del=<?php echo $row['transaction_id']; ?>"><i
                                                            style="color:red;font-size:20px;"
                                                            class="fas fa-times-circle"></i></a></td>
                                        </tr>
                                    <?php } while ($row = mysql_fetch_array($sql)); ?>
                                </table>
                                <!--نهاية الجدول الخاص بفاتورة المبيعات  -->

                            </div>
                            <!-- نهاية الجزء الأول من شاشة المبيعات  -->


                            <!-- بداية الجزء الثاني المتعلق بإزرار العمليات -->

                        </div>
                    </div>
            </div>
        </div>


        <div class="col-md-2 col-lg-2">
            <div class="card-box">
                <table class="table table-bordered"
                       style="background-color: #eff5fc; font-family: 'Droid Arabic Kufi'; font-size:14px; ">
                    <tr>
                        <td style="width:16.6%;">
                            <a href="print.php?print=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>">
                                <button type="button"
                                        style="background-color:#1FAF2E; font-size:12px; height:33px; width:100%; font-family: 'Droid Arabic Kufi';"
                                        class="btn btn-succes">
                                    <i class="fas fa-print "></i> طباعة
                                </button>
                            </a></td>


                    </tr>

                    <tr>
                        <td style="width:16.6%;">
                            <a href="exe.php">
                                <button type="button"
                                        style="background-color:#707070; font-size:12px; height:33px; width:100%; font-family: 'Droid Arabic Kufi';"
                                        class="btn btn-primary">
                                    <i class="fas fa-plus "></i> جديد
                                </button>
                            </a></td>
                    </tr>
                    <tr>
                        <td style="width:16.6%;">
                            <a href="posss.php?invoice=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>">
                                <button type="button"
                                        style="background-color:#F6B00A; font-size:12px; height:33px;  width:100%;  font-family: 'Droid Arabic Kufi';"
                                        class="btn form-control"><i class=" fas fa-search  "></i>
                                    بحث
                                </button>
                            </a></td>

                    </tr>
                    <tr>

                        <td style="width:16.6%;">
                            <a href="poss.php?delete=<?php echo $_SESSION['SESS_MEMBER_ID']; ?>&&maxi=<?php echo $pro; ?>"
                               onclick="return confirm('هل تريد حذف الفاتورة');">
                                <button type="button"
                                        style="background-color:#DD5706; font-size:12px; height:33px;  width:100%;  font-family: 'Droid Arabic Kufi';"
                                        class="btn btn-succes">
                                    <i class=" fas fa-times-circle  "></i> إزالــة
                                </button>
                            </a></td>

                    </tr>
                    <tr>

                        <td style="width:16.6%;">
                            <a href="exe.php" target="_blank">
                                <button type="button"
                                        style="background-color:#1E1170; font-size:10px; height:33px; width:100%;  font-family: 'Droid Arabic Kufi';"
                                        class="btn btn-succes">
                                    <i class=" far fa-stop-circle "></i> تعليق
                                </button>
                            </a></td>

                    </tr>
                </table>
            </div>
        </div>
        <!-- بداية كود الالة الحاسبه والبحث بالصنف والباركود -->

        <div class="col-md-5 col-lg-4">
            <div class="card" style=" border-radius:1.7em;">
                <div class="container">
                    <!-- بداية الجدول!-->
                    <table class="table table-bordered table-hover"
                           style="font-size:15px; padding:05rem;  background-color:#EAE3E3; font-family: Droid Arabic Kufi;  border-radius:1.1em;">

                        <!-- بداية حقل الباركود ونتائج الاله الحسابة!-->
                        <tr>
                            <td colspan="3">
                                <input type="text" name="info" autofocus style="font-size:15px;"
                                       class="cal-display  form-control btn-rounded " required id="search"
                                       placeholder="اختر الصنف" list="searchrxt" autocomplete="off">
                                <datalist id="searchrxt">
                                    <?php include('dbcon/dbcon.php');
                                    $brima = mysql_query("select * from storing limit 5");
                                    $res = mysql_fetch_array($brima); ?>
                                    <option></option>
                                    <?php do { ?>
                                        <option value="<?php echo $res['barco']; ?>"><?php echo $res['name']; ?> <i
                                                    class="fa fa-shopping-bag"></i> <?php echo $res['barco']; ?>
                                        </option>
                                    <?php } while ($res = mysql_fetch_array($brima)); ?>
                                </datalist>
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

                        <tr align="center" style="height: 10px;">
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
                                <button style="background-color: green;COLOR:#ffffff;"
                                        class="btn-equal form-control  btn-rounded" type="submit" value="=">
                                    <strong>ENT</strong></button>
                            </td>
                            <td>
                                <button class="num  btn-rounded form-control" type="button" value="0"><strong>
                                        0</strong></button>
                            </td>
                            <td>
                                <button style="background-color: RED;COLOR:#ffffff;" class="form-control  btn-rounded"
                                        id="clear" type="button" value=" "><strong>DEL</strong></button>
                            </td>
                            <!--<td><button class="op form-control  btn-rounded" value="/"> /</button></td>!-->
                        </tr>
                        <tr>


                            <!-- بداية الازرار للقيم   0 - + - delete     !-->
                    </table>
                </div>
            </div>
        </div>
        <!-- نهاية جدول الاله الحسابه  !-->


        <!-- كود تسنيق الفاصل الخاصة بملخص الحساب الاجمالي  !-->
        <!-- نهاية تسنيق الفاصل الخاصة بملخص الحساب الاجمالي  !-->


        <br><Br><Br>

        <!-- كود التنسيق الخاص بالضريبة والأجمالي وطريقة السداد والمبلغ المدفوع  !-->

        <div class="col-md-5 col-lg-6">
            <div align="center" style="font-size:16px; border-radius:0.7em;  color:#707070;" class="card-box">


                <!-- بداية جدول الحسابات !-->
                <table class="table table-borderd"
                       style="background-color: #eff5fc; font-family: 'Droid Arabic Kufi'; font-size:14px; ">
                    <tr>

                        <td style="width: 25%;">
                            <button type="button"
                                    style="background-color:#1FAF2E; font-size:12px;  width:100%;  font-family: 'Droid Arabic Kufi';"
                                    class="btn  btn"><strong>المبلغ</strong></button>
                        </td>
                        <td style="width:25%;">

                            <strong style="font-family: Droid Arabic Kufi; font-size:18px; color:#000000;">
                                <?php
                                // الاتصال بقاعدة البيانات
                                include("dbcon/dbcon.php");
                                // عرض بيانات الفاتورة
                                $sql = mysql_query("select sum(price*qty) from sales where invoice='$_SESSION[SESS_MEMBER_ID]'");
                                $row = mysql_fetch_array($sql);
                                // إجمالي الفاتورة
                                echo $row['sum(price*qty)']; ?></strong></td>

                        <!--نهاية كود عرض اجمالي الفاتورة فقط بدون قمية مضافة   !-->


                        <!-- الحقل الثانية عرض اجمالي القيمة المضافة  !-->

                        <td style="width: 25%;">
                            <button type="button"
                                    style="background-color:#DD5656; font-size:12px;  width:100%;  font-family: 'Droid Arabic Kufi';"
                                    class="btn  btn"><strong>الضريبة</strong></button>
                        </td>
                        <td style="width:25%;">
                            <strong style="font-family: Droid Arabic Kufi; font-size:18px; color:#000000;">
                                <?php
                                // الاتصال بقاعدة البيانات
                                include("dbcon/dbcon.php");
                                // عرض أجمالي الضريبة من الفاتورة الحالية
                                $sql = mysql_query("select sum(price*qty) from sales where invoice='$_SESSION[SESS_MEMBER_ID]'");
                                $row = mysql_fetch_array($sql);
                                // إجمالي الضريبة
                                echo round($row['sum(price*qty)'] * $tax / 100, 2); ?></strong></td>

                        <!-- نهاية كود الضريبة  !-->

                    </tr>

                    <!-- بداية حقل طريقة الدفع  !-->

                    <tr name="addem" action="" id="addem">
                        <td colspan="4" align="center"><select name="type" dir="rtl" class="selectpicker m-b-0"
                                                               data-style="btn-primary"
                                                               style="width:100%; border-radius:0.7em;" required>
                                <option data-icon="mdi mdi-account-circle" value="1"><i class=" fab fa-cc-visa "></i>
                                    نقــــداً
                                </option>
                                <option data-icon="mdi mdi-account-circle" value="2"><i class=" fab fa-cc-visa "></i>
                                    شبكـة
                                </option>
                                <option data-icon="mdi mdi-account-circle" value="3"><i class=" fab fa-cc-visa "></i>
                                    أجــــل
                                </option>
                            </select>
                        </td>
                    </tr>

                    <!-- بداية عنوان حقول الجدول  !-->
                    <tr align="center">
                        <td colspan="2">
                            <button type="button"
                                    style="background-color:#1FAF2E; font-size:12px;  width:100%;  font-family: 'Droid Arabic Kufi';"
                                    class="btn  btn">المدفوع
                            </button>
                        </td>
                        <td colspan="2">
                            <button type="button"
                                    style="background-color:#DD5656; font-size:12px;  width:100%;  font-family: 'Droid Arabic Kufi';"
                                    class="btn  btn"></i> المتبقي
                            </button>
                        </td>
                    </tr>
                    <!-- نهاية عناون حقول الجدول  !-->


                    <tr align="center">
                        <!-- حقل اضافة المبلغ ويحسب تلقائيا !-->

                        <input name="prices" id="prices" type="hidden"
                               value="<?php echo round($costs, 2);  // 1.96 ?>"/>
                        <input type="hidden" id="total" name="total" value="0"/>
                        <td colspan="2">
                            <input type="number" step="00.01" id="tb1" name="tb1"
                                   style="border-color:silver; width:100%;font-size:15px; color:green;"
                                   class="btn btn-card btn-rounded btn" onkeyup="calc(this)"/></td>
                        <input type="hidden" id="tb2" value="<?php echo round($costs, 2); ?>" name="tb2"
                               onkeyup="calc(this)"/>

                        <!-- عرض المبلغ المتبقي  !-->

                        <td colspan="2">
                            <button style="border-color:silver; width:100%;  font-size:15px; color:red;"
                                    class="btn btn-card btn-rounded btn">
                                <strong style="color:#DD5656;">
                                    <span id="update"><?php echo round($costs, 2); ?></span></button>
                        </td>
                    </tr>
                    <td colspan="4">
                        <button type="button" class="btn  btn-rounded form-control"
                                style="height: 40px; font-family: 'Droid Arabic Kufi'; background-color: #1E1170;"
                                data-toggle="modal" data-target="#sideModalTR">
                            <i class=" fas fa-qrcode "> </i> (غير معروفه) إصناف غير مسجله
                        </button>

                    </td>
                    </tr>
                    <!-- نهاية الحقول  !-->
                </table>
                <!-- نهاية الجدول  !-->
                <?php /*<table class="table table-bordered">
  <thead>          <tr>
             <td colspan="2">اصناف غير معروفه</td>
             <td>الكمية</td>
<td><?php include('dbcon/dbcon.php');
$sql2=mysql_query("select count(qty) from sales where invoice='$_SESSION[SESS_MEMBER_ID]' and name='غير معروف'");
$rowk=mysql_fetch_array($sql2);
echo $rowk['count(qty)'];?></td>
<td>الإجمالي</td>
<td><?php include('dbcon/dbcon.php');
$sql2=mysql_query("select sum(price*qty) from sales where invoice='$_SESSION[SESS_MEMBER_ID]' and name='غير معروف'");
$rowk=mysql_fetch_array($sql2);
echo $rowk['sum(price*qty)'];?></td>
             </tr>
             <tr>
                 <th>الباركود</th>
                 <th>الصنف</th>
                 <th>السعر</th>
                 <th>الكميه</th>
                 <th>الإجمالي</th>
                 <th>إزالة</th>
             </tr>
            </thead>
<?php include('dbcon/dbcon.php');
$sql1=mysql_query("select * from sales where
invoice='$_SESSION[SESS_MEMBER_ID]' and name='غير معروف'");
$rows=mysql_fetch_array($sql1);
do { ?>
               <tbody>
             <tr>
             <td><?php echo $rows['product'];?></td>
             <td><?php echo $rows['name'];?></td>
             <td><?php echo $y1=$rows['price'];?></td>
             <td><?php echo $y2=$rows['qty'];?></td>
             <td><?php echo $y1*$y2;?></td>
             <td align="center"><a href="poss.php?del=<?php echo $rows['transaction_id'] ;?>"><i style="color:red;font-size:20px;" class="fas fa-times-circle"></i></a></td>

             </tr>
</tbody>
<?php } while($rows=mysql_fetch_array($sql1))?>
             </table>*/ ?>
            </div>
        </div>

        <br><br><br>
        <!-- عرض المبلغ الاجمالي بناء علي متغير معرف مسبقاً  !-->

        <div class="col-md-2 col-lg-2 round">
            <div align="center" class="card-box" style="border-radius:2.7em;">
                <button type="button" class="btn btn-round"
                        style="border-color:#707070; color:#707070; width:100%; font-family: 'Droid Arabic Kufi'; font-size:19px; border-radius:0.7em;">
                    الإجمالي <br><strong
                            style="color:red;"><?php echo "المبلغ : " . round($costs, 2) . "<br> الاصناف : " . $i;  // 1.96

                        ?></p></button>
            </div>
            <br><br><br>

            <div align="center" class="card-box" style="border-radius:2.7em;">
                <table class="table table-bordered tab-content table-embed-responsive"
                       style="background-color: #eff5fc; width: 100%; font-family: 'Droid Arabic Kufi'; font-size:15px; ">

                    <tr>
                        <td><a href="../System/index.php">
                                <button type="button"
                                        style="background-color:#707070; color:#eff5fc; font-size:15px; height:28px;  width:100%;  font-family: 'Droid Arabic Kufi';"
                                        class="btn btn-succes btn">
                                    <i class=" fas fa-home "></i></button>
                            </a></td>
                    </tr>
                    <tr>
                        <td><a href="logout.php">
                                <button type="button"
                                        style="background-color:#DD5656; color:#eff5fc; font-size:15px; height:28px;  width:100%;  font-family: 'Droid Arabic Kufi';"
                                        class="btn btn-succes">
                                    <i class=" fas fa-lock "></i></button>
                            </a></td>
                    </tr>
                </table>
            </div>

        </div>

    </div>
    <!-- نهاية التعريف  !-->


</div><!-- نهاية العمليات -->
</div> <!-- نهاية التنيسق -->
</div> <!-- نهاية التصميم -->


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
<style>
    body {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<!-- نهاية التنسيق!-->
</form>
<!-- نهاية الفورم!-->


<!-- Side Modal Top Right -->

<!-- Button trigger modal -->

<!-- To change the direction of the modal animation change .right class -->
<div class="modal fade right" id="sideModalTR" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <form action="poss.php" method="POST">
        <!-- Add class .modal-side and then add class .modal-top-right (or other classes from list above) to set a position to the modal -->
        <div class="modal-dialog modal-side modal-top-right" role="document">


            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title w-100" id="myModalLabel" style="font-family: 'Droid Arabic Kufi';">إضافة صنف
                        غير معروف</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="2">قائمة المبيعات <?php echo $_SESSION['SESS_MEMBER_ID'] + 1; ?></tr>

                        <input type="hidden" class="form-control" style="font-size: 10px;"
                               value="<?php echo $_SESSION['SESS_MEMBER_ID']; ?>" name="it5" class=" btn-rounded">

                        <tr>
                            <Td>الصنف</Td>
                            <td><input type="text" value="غير معروف" name="it1" class="form-control btn-rounded"
                                       required></td>
                        </tr>
                        <tr>
                            <Td>الكمية</Td>
                            <td><input type="number" min="1" value="1" max="10000000" autofocus autocomplete="off"
                                       required name="it2" class="form-control btn-rounded"></td>
                        </tr>
                        <tr>
                            <Td>السعر</Td>
                            <td><input type="number" min="1" value="1" max="10000000" autocomplete="off" required
                                       name="it3" class="form-control btn-rounded"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button"
                            style="background-color: #DD5656; width:120px; font-family: 'Droid Arabic Kufi';"
                            class="btn btn-rounded " data-dismiss="modal"><i class=" fas fa-times "></i> الغاء
                    </button>
                    <button type="submit" name="okpos"
                            style="background-color: #1FAF2E; width: 120px; font-family: 'Droid Arabic Kufi';"
                            class="btn btn-rounded "><i class=" fab fa-accusoft "></i> حفظ
                    </button>
                </div>
            </div>
        </div>
</div>
<!-- Side Modal Top Right --></form>

