<?php
// استدعاء قاعدة البيانات
include("dbcon/dbcon.php");
//عرض بيانات الفاتورة المخزن بشاشة المبيعات
$nx=mysql_query("select * from vat");
$mx=mysql_fetch_array($nx);  $tax=$mx['tax'];
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
<form action="poss.php" method="POST">
    <!-- كود العنوان-->
      <div class="container-fluid">
              <div class="row">

<!--كود تعريف قيمة الفاتورة!-->
<?php include("dbcon/dbcon.php");
    $sql=mysql_query("select sum(price*qty) from sales where invoice='$_SESSION[SESS_MEMBER_ID]'");
        $row=mysql_fetch_array($sql);
             $costs=$row['sum(price*qty)']*$tax/100+$row['sum(price*qty)'];?> 
            </strong>
<!--  نهاية الكود --> 
</div>     


<!-- كود فورم استخراج فاتورة البيع  --> 
<div class="row">
    <div class="col-md-5 col-lg-10" style="font-size:25px; ">
        <div class="card-box">
<!-- كود جدول اضافة بيانات الفاتورة --> 
<table class="table table-bordered" style="font-family: 'Droid Arabic Kufi';font-size:25px;" >

<tr>
    <td style="width: 33.3%;"><div class="input-group">
        <div class="input-group-prepend ">
<!-- حق البيانات العميل --> 
<span style="font-size:25px;" class="input-group-text bg-light"><i class="fas fa-angle-down"></i></span></div>
     <input type="text"  style="width: 83%;" value="إسم العميل" name="a"   class=" btn-rounded"></div></td>
<!-- نهاية حقل بيانات العميل --> 


<!--حقل بيانات رقم الفاتورة --> 
<td style="width: 33.3%;"><div class="input-group">
    <div class="input-group-prepend ">
        <span style="font-size:25px;" class="input-group-text bg-light"><i class=" far fa-file-alt "></i></span></div>
            <input type="text" style="width:83%;" value="<?php echo $_SESSION['SESS_MEMBER_ID'];?>" name="b" class=" btn-rounded"></div></td>
<!--حقل بيانات رقم الفاتورة --> 


<!-- بداية حقل التاريخ --> 
<td style="width: 33.3%;"><div class="input-group">
<div class="input-group-prepend ">
<span style="font-size:25px;" class="input-group-text bg-light"><i class=" far fa-calendar "></i></span></div>
<input type="date" name="c"  style="width:83%;" value="<?php echo date('Y-m-d h:i:s');?>" class=" btn-rounded"></div></td>
<!-- نهاية حقل التاريخ --> 

    </tr>
    </table>
    <!-- نهاية كود الجدول --> 



<!-- مؤسسة برجي التقني نظام المبيعات --> 


<!-- بداية جدول بيانات الأصناف المستدعاه بالبحث أو الباركود --> 
<!-- كود تسنيق الفاتورة علي شاشة المبيعات --> 
<style>
.my-custom-scrollbar {
position: relative;
height: 100px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>
<!--نهاية كود التنسيق  --> 



<!-- كود جدول الفاتورة   --> 
<table class="table table-bordered" style="background-color: #eff5fc; font-family: 'Droid Arabic Kufi'; font-size:18px; ">


<!--بداية حقول العنوان --> 

<tr align="center">
<td>رقم</td>
<td>الباركود</td>
<td>الصنف</td>
<td>الوحده</td>
<td>الكمية</td>
<td>السعر</td>
<td>الخصم</td>
<td>الضريبة</td>
<td>المبلغ</td>
<td>إزالة</td>
</tr>

<!-- نهاية حقول العنوان --> 

<?php
// استدعاء قاعدة البيانات
include("dbcon/dbcon.php");
//عرض بيانات الفاتورة المخزن بشاشة المبيعات
$sql=mysql_query("select sum(qty),invoice,name,category,
product,price,discount,transaction_id from sales where
invoice='$_SESSION[SESS_MEMBER_ID]' GROUP BY NAME");
$row=mysql_fetch_array($sql);
//نهاية الكود
?>

<?php
// دالة الترقيم التلقائي لحقول المبيعات
$i=0; do {
    $i=$i+1;
    
    //نهاية ?>
<tr>
    <!--حقول المبيغات المستدعاة --> 

<td><?php echo $i;?></td>
<td><?php echo $row['invoice'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['category'];?></td>
<td><?php echo $row['sum(qty)'];?></td>
<td><?php echo $row['price'];?></td>
<td><?php echo $row['discount'];?> </td>
<td><?php
// استدعاء قاعدة البيانات
include("dbcon/dbcon.php");
//عرض بيانات الفاتورة المخزن بشاشة المبيعات
$nx=mysql_query("select * from vat");
$mx=mysql_fetch_array($nx);
echo  $tax=$mx['tax'];
//نهاية الكود
?>%</td>
<td><?php echo $row['price']*$row['sum(qty)']*$tax/100+$row['price']*$row['sum(qty)'];?></td>

<td align="center"><a href="poss.php?del=<?php echo $row['transaction_id'] ;?>"><i style="color:red;font-size:30px;" class="fas fa-times-circle"></i></a></td>
</tr>
<?php }while($row=mysql_fetch_array($sql));?>
</table>
<!--نهاية الجدول الخاص بفاتورة المبيعات  --> 

</div>
<!-- نهاية الجزء الأول من شاشة المبيعات  --> 


<!-- بداية الجزء الثاني المتعلق بإزرار العمليات --> 

</div>
    
                               
 <!--بداية ازرار شاشة المبيعات --> 
                               
<div class="col-md-2 col-lg-2">

<div class="card-box" style="border-radius:2.5em;">

<!-- زر الطباعة --> 
<a href="print.php?print=<?php echo $_SESSION['SESS_MEMBER_ID'];?>">
<button type="button" 
style="background-color:#1FAF2E; font-size:20px; height:40px; width:100%; font-family: 'Droid Arabic Kufi';" class="btn btn-succes btn-rounded">
 <i class="  fas fa-calendar-check "></i> حفـــــــظ</button>
</a><br>
<br>
<!-- نهاية زر الطباعة --> 

<!-- زر الاسترجاع --> 
<a href="poss.php?invoice=<?php echo $_SESSION['SESS_MEMBER_ID'];?>"><button type="button" 
style="background-color:#F6B00A; font-size:20px; height:40px;  width:100%;  font-family: 'Droid Arabic Kufi';" class="btn  btn-rounded"><i class=" fas fa-undo-alt  "></i>
 إسترجاع</button>
</a><br><br>
<!-- نهاية زر الإسترجاع --> 


<!-- زر حذف الفاتورة --> 
<a href="poss.php?delete=<?php echo $_SESSION['SESS_MEMBER_ID'];?>&&max=<?php echo $row['transaction_id'] ;?>" onclick="return confirm('هل تريد حذف الفاتورة');">
<button type="button" style="background-color:#DD5706; font-size:20px; height:40px;  width:100%;  font-family: 'Droid Arabic Kufi';" class="btn btn-succes btn-rounded">
<i class=" fas fa-times-circle  "></i> إزالــــــــة</button>
</a><br><br>
<!-- نهاية زر حذف الفاتورة --> 


<!-- بداية زر التعليق -->
<a href="exe.php" target="_blank"><button type="button"
 style="background-color:#1E1170; font-size:20px; height:40px; width:100%;  font-family: 'Droid Arabic Kufi';" class="btn btn-succes btn-rounded"> 
 <i class=" far fa-stop-circle "></i>  تعليــــق</button>
</a><br><br>
<!-- نهاية زر تعليق الفاتورة --> 


<!-- بداية زر البحث  --> 
<a href="logout.php"><button type="button" 
style="background-color:#EDEBF9; color:#000000; font-size:20px; height:40px;  width:100%;  font-family: 'Droid Arabic Kufi';" class="btn btn-succes btn-rounded">
 <i class=" fas fa-lock "></i> إغــــلاق </button>
</a><br><br>
<!-- نهاية زر البحث --> 
            </div>
                </div>
                    </div>
                        </div>
                            </div>
      
  
                            
                            <!-- بداية كود الالة الحاسبه والبحث بالصنف والباركود --> 

<div class="col-md-2 col-lg-4">
        <div class="card-box" style=" border-radius:1.7em;">
                <div class="container">
<!-- بداية الجدول!-->
<table class="table table-borderd" style="font-size:30px; height: 356px; background-color:#EAE3E3; font-family: Gadugi;  border-radius:1.1em;">
  
<!-- بداية حقل الباركود ونتائج الاله الحسابة!-->
<tr>
        <td colspan="3">
                <input name="info" style="height:60px; font-size:25px; font-family: GE SS Two; " class="cal-display  form-control btn-rounded" required id="search"  
                list="searchrxt" autocomplete="off" placeholder="الباركود">
            <datalist id="searchrxt">
 <?php
 // البحث في المخزن
 // الاتصال بقاعدة البيانات
  include("dbcon/dbcon.php");
    $sqr=mysql_query("select * from storing where  tell ='$_SESSION[tell]'");
        $res=mysql_fetch_array($sql);?>
            <?php do { ?>
                <!-- الحقول المستدعاه!-->
        <option value="<?php echo $res['barco'];?>"><?php echo $res['barco'];?><?php echo $res['name'];?></option>
    <?php }while($res=mysql_fetch_array($sqr));?>
</datalist>
</td></tr>
<!-- نهاية حقل الباركود والاله الحسابه!-->

<!-- بداية الازرار للقيم 1 - 2- 3  !-->
<tr>
<td style="width: 25%;"><button style="width: 100%; height:60px;background-color:white; border-radius:1.5em;" type="button" class="num  btn-round" value="1"><strong>1</strong></button></td>
<td style="width: 25%;"><button style="width: 100%; height:60;background-color:white; border-radius:1.5em;" type="button" class="num btn-round" value="2"> <strong>2</strong></button></td>
<td style="width: 25%;"><button style="width: 100%; height:60;background-color:white; border-radius:1.5em;" type="button" class="num btn-rounded" value="3"><strong>3</strong></button></td>
<!--<td><button style="background-color: #1FAF2E;" class="btn-blue op form-control btn-rounded" value="*"> *</button></td>!-->
</tr>
<!-- نهاية الازرار للقيم 1 - 2- 3  !-->


<!-- بداية الازرار للقيم 4 - 5 - 6    !-->

<tr>
<td><button class="num btn-round"  style="width: 100%; height:60px;background-color:white; border-radius:1.5em;" type="button" value="4"><strong>4</strong> </button></td>
<td><button class="num btn-round"  style="width: 100%; height:60px;background-color:white; border-radius:1.5em;" type="button" value="5"><strong>5</strong></button></td>
<td><button class="num btn-round"  style="width: 100%; height:60px;background-color:white; border-radius:1.5em;" type="button" value="6"><strong>6</strong></button></td>
<!--<td><button style="background-color: #1FAF2E;" class="op form-control btn-rounded" value="-"> -</button></td>!-->
</tr>

<!-- نهاية الازرار للقيم 4 - 5 - 6    !-->


<!-- بداية الازرار للقيم 7 - 8 - 9     !-->

<tr>
<td><button  style="width: 100%; height:60px;background-color:white; border-radius:1.5em;"  class="num  btn-rounded" type="button" value="7"><strong>7</strong></button></td>
<td><button  style="width: 100%; height:60px;background-color:white; border-radius:1.5em;"  class="num  btn-rounded" type="button" value="8"><strong>8</strong></button></td>
<td><button  style="width: 100%; height:60px;background-color:white; border-radius:1.5em;"  class="num  btn-rounded" type="button" value="9"><strong>9</strong></button></td>
<!--<td><button style="background-color: #1FAF2E;" class="op form-control  btn-rounded" value="+"> +</button></td>!-->
</tr>

<!-- نهاية الازرار للقيم  7-8-9     !-->


<!-- بداية الازرار للقيم   0 - + - delete     !-->

<tr>
<!--<td><button class="num form-control btn-rounded" value="."> .</button></td>!-->
<td><button style="background-color: green;COLOR:#ffffff; width: 100%; height:60px; border-radius:1.5em;" class="btn-equal form-control  btn-round" type="button" value="="><strong>ENT</strong> </button></td>
<td><button  style="width: 100%; height:60px;background-color:white; border-radius:1.5em;" class="num btn-rounded" type="button" value="0"><strong> 0</strong></button></td>
<td><button style="background-color: RED;COLOR:#ffffff;  width: 100%; height:60px; border-radius:1.5em;" class="form-control  btn-round" id="clear" type="button" value=" "><strong>DEL</strong></button></td>
<!--<td><button class="op form-control  btn-rounded" value="/"> /</button></td>!-->
</tr>

<!-- بداية الازرار للقيم   0 - + - delete     !-->
    </table>
</div>
    </div>
        </div>
<!-- نهاية جدول الاله الحسابه  !-->


<!-- كود تسنيق الفاصل الخاصة بملخص الحساب الاجمالي  !-->
<style>
hr {
  display: block;
  margin-top: 0.1em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  border-width: 1px;
}
</style>
<!-- نهاية تسنيق الفاصل الخاصة بملخص الحساب الاجمالي  !-->






<!-- كود التنسيق الخاص بالضريبة والأجمالي وطريقة السداد والمبلغ المدفوع  !-->

<div class="col-md-4 col-lg-6">
    <div align="center" style="font-size:20px; border-radius:0.7em; font-family: GE SS Two; color:#707070;" class="card-box">
     
    
<!-- بداية جدول الحسابات !-->
<table style="width:95%;" class="table table-borderd">
    <tr>
        <td style="background-color:#FF5422; color:white; border-radius:0.7em; width:20%;"> الإجمالـي</td>
            <td style="width:30%;">
                    
            <strong style="font-family: Gadugi; font-size:35px; color:#000000;">
                    <?php
                    // الاتصال بقاعدة البيانات
                         include("dbcon/dbcon.php");
                            // عرض بيانات الفاتورة 
                            $sql=mysql_query("select sum(price*qty) from sales where invoice='$_SESSION[SESS_MEMBER_ID]'");
                                    $row=mysql_fetch_array($sql); 
                                            // إجمالي الفاتورة
                                            echo $row['sum(price*qty)'];?></strong></td>
                                            
        <!--نهاية كود عرض اجمالي الفاتورة فقط بدون قمية مضافة   !-->


        <!-- الحقل الثانية عرض اجمالي القيمة المضافة  !-->

<td style="background-color:#57DD6C; color:white; font-family: GE SS Two; border-radius:0.7em; width:20%;" ><strong>VAT</strong></td>
     <td style="width:30%;">
        <strong style="font-family: Gadugi; font-size:25px; color:black;">
            <?php 
                // الاتصال بقاعدة البيانات
                include("dbcon/dbcon.php");
                // عرض أجمالي الضريبة من الفاتورة الحالية
                        $sql=mysql_query("select sum(price*qty) from sales where invoice='$_SESSION[SESS_MEMBER_ID]'");
                                $row=mysql_fetch_array($sql);
                                   // إجمالي الضريبة 
                                    echo $row['sum(price*qty)']*$tax/100;?></strong></td>

            <!-- نهاية كود الضريبة  !-->

    </tr>
</table> 
<!-- نهاية جدول عرض اجمالي المبيعات وأجمالي الضريبة  !-->


<!-- جدول عرض القيمة المطلوبة والقيمة المدفوعة  !-->

<table class="table table-borderd"  name="addem" action="" id="addem" >

<!-- بداية حقل طريقة الدفع  !-->
 
<tr><td align="center"><select name="type" style="width:95%; height:50px;  border-radius:0.7em;" required>
        <option  data-icon="mdi mdi-account-circle" value="1"><i class=" fab fa-cc-visa "></i> نقداً</option>
        <option  data-icon="mdi mdi-account-circle" value="2"><i class=" fab fa-cc-visa "></i> شبكـة</option>
        <option  data-icon="mdi mdi-account-circle" value="3"><i class=" fab fa-cc-visa "></i> أجـل</option>
  </select>
</td></tr>
</table>
  <!-- نهاية جدول طريقة الدفع  !-->



<!--  جدول المبلغ المطلوب والمبلغ المدفوع   !-->

<table class="table card" style="border-radius:1.7em; border: #707070;">
   
  <!-- بداية عنوان حقول الجدول  !-->
  <tr align="center">
        <td style="width: 50%;">  <p>المبلغ المدفوع</p></td>
            <td style="width: 50%;">  <p>المبلغ المتبقي</p></td>
                </tr>
  <!-- نهاية عناون حقول الجدول  !-->


<tr align="center">
      <!-- حقل اضافة المبلغ ويحسب تلقائيا !-->

<input name="prices" id="prices" type="hidden" value="<?php echo $costs;?>" />
<input type="hidden" id="total" name="total" value="0" />
<td>
   <input type="number" step="00.01" id="tb1" name="tb1" style="border-color:silver; width:80%; font-family: GE SS Two; font-size:35px; color:green;" class="btn btn-card btn-rounded btn" onkeyup="calc(this)"/></td>
        <input type="hidden" id="tb2" value="<?php echo $costs;?>" name="tb2" onkeyup="calc(this)"/> 

          <!-- عرض المبلغ المتبقي  !-->

<td><button  style="border-color:silver; width:80%; font-family: GE SS Two; font-size:35px; color:red;" class="btn btn-card btn-rounded btn">
    <strong style="color:#DD5656;">
        <span id="update"><?php echo $costs;?></span></button></td>
</tr>
  <!-- نهاية الحقول  !-->
</table> 
  <!-- نهاية الجدول  !-->
  </div> 
</div>         
                             

  <!-- عرض المبلغ الاجمالي بناء علي متغير معرف مسبقاً  !-->

<div  class="col-md-3 col-lg-2 round">
    <div align="center"  class="card-box" style="border-radius:2.7em;">
                <button type="button" class="btn btn-round" 
                style="border-color:#707070; color:#707070; width:100%; font-size:40px; font-family:GE SS Two; border-radius:0.7em;">
        الإجمالي <hr ><strong style="color:#DD5656;"><?php echo $costs;?></p></button>
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
const clear =  document.querySelector('#clear')
const compute =  document.querySelector('.btn-equal')
// تعريف الازرار الخاصه بالادخال
const buttons = document.querySelectorAll('.num, .op')
let input = [];
Array.from(buttons).forEach((button)=>{
//تعريف المعاملات الرياضيه
button.addEventListener('click', ()=>{
 const operator = ['+', '-', '/', '*']
//التحقق من صحة النتائج
 if (input[input.length-1] == '=' && !operators.includes(button.value)){
     result.value  = button.value;
 }else{
     result.value += button.value;
 }
input.push(button.value)
})})

// الشرط(=)
compute.addEventListener('click', ()=>{
 input.push('=');
 //التحقق 
 if(result.value.length == 0){
     return false
 }else{
     result.value = eval(result.value)
 }})
// مسح شاشة الاله الحسابه
clear.addEventListener('click', () =>{
    result.value=''
})
 </script>
<!-- نهاية كود جافا سكربت للاله الحسابه!-->

<!-- تنسيق الاله الحاسبه !-->
<style>
body{
font-family: Arial, Helvetica, sans-serif;
    margin: 0;
         padding: 0;
            box-sizing: border-box;
                height: 100vh;
                    display: flex;
                        justify-content: center;
                                align-items: center; }
                </style>
<!-- نهاية التنسيق!-->
</form>
<!-- نهاية الفورم!-->