<?php include('header.php');?>


<script type="text/javascript">
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<form action="form2.php" method="post">
<Div class="card">
    <table class="table table-bordered table-hover">
        <tr>
            <Td colspan="8">شاشة المشتريات</Td>
        </tr>
        <tr>
        <td>المورد</td>
            <td style="width: 40%;"><input type="text" name="cust_name" class="form-control" required></td>
            <td>التاريخ</td>
            <td><input type="date" name="datefrom" class="form-control" required> <input type="hidden" name="date" value="<?php echo date('Y-m-d');?>" class="form-control" required></td>
            <td>الفاتورة</td>
            <td><input type="text" name="CODE" class="form-control" required></td>
            <td>المخزن</td>
            <td><input type="text" name="stores" class="form-control" required></td>
        </tr>
    </table>
</Div>
                <div  style="font-family: 'Droid Arabic Kufi', serif;" >
                    <table style="" dir="rtl" class="table table-bordered">
                        <thead>
                            <tr  class="item-row">
                                <td  style="width:4%;">إزالة</td>
                                <td>الباركود</td>
                                <td>الصنف</td>
                                <td>الوحدة</td>
                                <td style="width:8%;">الشراء</td>
                                <td style="width:8%;">البيع</td>
                                <td style="width:8%;">الكمية</td>
                                <td style="width:8%;">الضريبة</td>
                                <td>الإجمالي</td>
                            </tr>
                        </thead>
                        <tbody>
                        <tr id="hiderow">

</table>
<table style="" dir="rtl" class="table table-bordered">

                        <td>
     <a id="addRow"  style="font-family: 'Droid Arabic Kufi', serif; width:180px;"  href="javascript:;" title="Add a row" class="btn btn-danger">
                                <i class=" fas fa-plus "> </i> جديد</a>
                            </td>
                            <td colspan="4">
                                <button type="submit" name="ok1"  style="font-family: 'Droid Arabic Kufi', serif; width:180px;"  href="javascript:;" title="Add a row" class="btn btn-primary">
                                <i class=" fas fa-qrcode "> </i> حفظ</button>
                            </td>
                        </tr>
                     
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-right"><strong>الإجمالي</strong></td>
                            <td><span id="subtotal">0.00</span></td>
                        </tr>
                        <tr>
                            <td><strong>كمية الأصناف: </strong><span id="totalQty" style="color: red; font-weight: bold">0</span> صنف</td>
                            <td></td>
                            <td class="text-right"><strong>الخصم</strong></td>
                            <td><input class="form-control" id="discount" value="0" type="text"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-right"><strong>الضريبة</strong></td>
                            <td><?php echo $tax;?>% <input class="form-control" type="hidden" id="shipping" value="0" type="text"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td class="text-right"><strong>شامل الضريبة</strong></td>
                            <td><span id="grandTotal">0</span></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery.invoice.js"></script>
    <script>
        jQuery(document).ready(function(){
            jQuery().invoice({
                addRow : "#addRow",
                delete : ".delete",
                parentClass : ".item-row",

                price : ".price",
               qty : ".qty",
                total : ".total",
                totalQty: "#totalQty",

                subtotal : "#subtotal",
                discount: "#discount",
                shipping : "#shipping",
                grandTotal : "#grandTotal"
            });
        });
    </script>
</body>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</form>
</html>
