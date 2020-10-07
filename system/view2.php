<?php include('header.php');?>
<body background="icon/yaz7.jpg"  style="background-image:url(icon/yaz7.jpg); background-position:inherit;">			
<div class="app-content content container-fluid">
<div class="row match-height">
<div class="col-xs-12">
<div class="card">
	<div class="card-header">
		<h4 class="card-title">نظام إدارة الصيدلية</h4>
</div>
	<div class="card-body">
		<div class="card-block">
						<ul class="nav nav-tabs nav-justified">
<li class="nav-item"><a class="nav-link active" id="active-tab" data-toggle="tab" href="#active" aria-controls="active" aria-expanded="true">عرض السجلات</a></li>
<li class="nav-item"><a class="nav-link" id="link-tab" data-toggle="tab" href="#link" aria-controls="link" aria-expanded="false">الموظفيــن</a></li>
						</ul>
						<div class="tab-content px-1 pt-1">
							<div role="tabpanel" class="tab-pane fade active in" id="active" aria-labelledby="active-tab" aria-expanded="true">
<p>
<table class="table table-borderd table-hover">
<tr>
<td><a href="suser.php"><input type="button" class="form-control round btn-info" value="سجل المستخدمين"></a></td>
<td><a href="sitem.php"><input type="button" class="form-control round btn-info" value="سجل الأصنــــاف"></a></td>
<td><a href="sstore.php"><input type="button" class="form-control round btn-info" value="سجل المخـــازن"></a></td>
<td><a href="sunit.php"><input type="button" class="form-control round btn-info" value="سجل القياسـات"></a></td>
</tr>
<tr>
<td><a href="sjob.php"><input type="button" class="form-control round btn-info" value="سجل الوظـــائف"></a></td>
<td><a href="sexp.php"><input type="button" class="form-control round btn-info" value="سجل المنصـرفات"></a></td>
<td><a href="sbank.php"><input type="button" class="form-control round btn-info" value="سجل البنــــوك"></a></td>
<td><a href="snation.php"><input type="button" class="form-control round btn-info" value="سجل الــــدول"></a></td>
</tr>

<tr>
<td><a href="scust.php"><input type="button" class="form-control round btn-info" value="سجل المورديــن"></a></td>
<td><a href="scustom.php"><input type="button" class="form-control round btn-info" value="سجل العمـــلاء"></a></td>
<td><a href="emp.php"><input type="button" class="form-control round btn-info" value="سجل الموظفيـــن"></a></td>
<td><a href="sal1.php"><input type="button" class="form-control round btn-info" value="سجل المرتبـــات"></a></td>
</tr>
</table>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br><br>
								 </p>
							</div>
							<div class="tab-pane fade" id="link" role="tabpanel" aria-labelledby="link-tab" aria-expanded="false">
								<p><table class="table table-borderd table-hover">
<tr>
<td colspan="2"><input type="button" class="form-control round btn-primary" value="سجلات الموظفيـــن"></td>
</tr>
<tr>
<td><a href="emp.php"><input type="button" class="form-control round btn-warning" value="تسجيـل موظف"></a></td>
<td colspan="2"><a href="vemp.php"><input type="button" class="form-control round btn-warning" value="تعديـل موظف"></a></td>
<td><a href="remp.php"><input type="button" class="form-control round btn-warning" value="تقارير الموظفين"></a></td>
</tr>
<tr>
<td colspan="2"><input type="button" class="form-control round btn-primary" value="مرتبات الموظفين"></td>
</tr>
<tr>
<td><a href="sal1.php"><input type="button" class="form-control round btn-warning" value="صرف المرتبات"></a></td>
<td colspan="2"><a href="vsal.php"><input type="button" class="form-control round btn-warning" value="تعديل مرتـب"></a></td>
<td><a href="rsal.php"><input type="button" class="form-control round btn-warning" value="تقرير المرتبات"></a></td>
</tr>
<tr>
</table>
			<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
										<br>
							<br>
				<br>
				
</p>
							</div>
							
							<div class="tab-pane fade" id="linkOpt" role="tabpanel" aria-labelledby="linkOpt-tab" aria-expanded="false">
								<p><table class="table table-borderd table-hover">
<tr>
<td><a href=""><input type="button" class="form-control round btn-primary" value="شراء صنــف"></a></td>
<td><a href=""><input type="button" class="form-control round btn-primary" value="شراء أصناف"></a></td>
<td><a href=""><input type="button" class="form-control round btn-primary" value="تعديـل صنف"></a></td>
<td><a href=""><input type="button" class="form-control round btn-primary" value="سداد لمورد"></a></td>
</tr>
<tr>
<td><a href=""><input type="button" class="form-control round btn-primary" value="الفواتيـر"></a></td>
<td colspan="2"><a href=""><input type="button" class="form-control round btn-primary" value="المشتريات"></a></td>
<td><a href=""><input type="button" class="form-control round btn-primary" value="الاستعلامات"></a></td>
</tr>
<tr>
<td><a href=""><input type="button" class="form-control round btn-primary" value="التقرير اليومي"></a></td>
<td><a href=""><input type="button" class="form-control round btn-primary" value="التقرير الدوري"></a></td>
<td><a href=""><input type="button" class="form-control round btn-primary" value="التقرير الشهري"></a></td>
<td><a href=""><input type="button" class="form-control round btn-primary" value="التقرير السنوي"></a></td>
</tr>
</table>
			<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
				</p>
							</div>
							<div class="tab-pane fade" id="link2" role="tabpanel" aria-labelledby="link2-tab" aria-expanded="false">
								<p><table class="table table-borderd table-hover" >
<tr>
<td><a href="store.php"><input type="button" class="form-control round btn-black" value="تسجيل مخزن"></a></td>
<td><a href="storing.php"><input type="button" class="form-control round btn-black" value="تخزين أصناف"></a></td>
<td><a href="vstore.php"><input type="button" class="form-control round btn-black" value="تعديل المخزن"></a></td>
<td><a href=""><input type="button" class="form-control round btn-black" value="جرد المخزن"></a></td>
</tr>

<tr>
<td><a href="rselect1.php"><input type="button" class="form-control round btn-black" value="التقرير اليومي"></a></td>
<td colspan="2"><a href="rselect2.php"><input type="button" class="form-control round btn-black" value="التقرير الدوري"></a></td>
<td><a href="rselect3.php"><input type="button" class="form-control round btn-black" value="التقرير السنوي"></a></td>
</tr>
</table>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br>
							<br><br>
							<br>
							<br></p>
							</div>
							<div class="tab-pane fade" id="link3" role="tabpanel" aria-labelledby="link3-tab" aria-expanded="false">
								<p><table class="table table-borderd table-hover" border="1">
</tr>
<tr><td colspan="4"><input type="button" class="form-control round btn-warning" value="تقارير المبيعات"></td>
</tr>
<tr>
<td><a href=""><input type="button" class="form-control round btn-success" value="التقرير اليومي"></a></td>
<td><a href=""><input type="button" class="form-control round btn-success" value="التقرير الدوري"></a></td>
<td><a href=""><input type="button" class="form-control round btn-success" value="التقرير الشهري"></a></td>
<td><a href=""><input type="button" class="form-control round btn-success" value="التقرير السنوي"></a></td>
</tr>
<tr>
<td><a href=""><input type="button" class="form-control round btn-success" value="تقرير العملاء"></a></td>
<td><a href=""><input type="button" class="form-control round btn-success" value="تقرير الفواتير"></a></td>
<td><a href=""><input type="button" class="form-control round btn-success" value="تقرير الأصناف"></a></td>
<td><a href=""><input type="button" class="form-control round btn-success" value="التقرير العــام"></a></td>
</tr>
</tr>
<tr><td colspan="4"><input type="button" class="form-control round btn-warning" value="تقارير المشتريــات"></td>
</tr>
<tr>
<td><a href=""><input type="button" class="form-control round btn-success" value="التقرير اليومي"></a></td>
<td><a href=""><input type="button" class="form-control round btn-success" value="التقرير الدوري"></a></td>
<td><a href=""><input type="button" class="form-control round btn-success" value="التقرير الشهري"></a></td>
<td><a href=""><input type="button" class="form-control round btn-success" value="التقرير السنوي"></a></td>
</tr>
<tr>
<td><a href=""><input type="button" class="form-control round btn-success" value="تقرير الموردين"></a></td>
<td><a href=""><input type="button" class="form-control round btn-success" value="تقرير الفواتير"></a></td>
<td><a href=""><input type="button" class="form-control round btn-success" value="تقرير الأصناف"></a></td>
<td><a href=""><input type="button" class="form-control round btn-success" value="التقرير العــام"></a></td>
</tr>

</tr>
<tr><td colspan="4"><input type="button" class="form-control round btn-warning" value="تقارير النظام"></td>
</tr>
<tr>
<td><a href=""><input type="button" class="form-control round btn-success" value="تقارير العاملين"></a></td>
<td><a href=""><input type="button" class="form-control round btn-success" value="تقارير المرتبات"></a></td>
<td><a href=""><input type="button" class="form-control round btn-success" value="تقارير المصروفات"></a></td>
<td><a href=""><input type="button" class="form-control round btn-success" value="تقارير العمليات"></a></td>
</tr>
</table>
							<br>
							<br>
							<br><br>
							<br></p>
							</div>
							
							<div class="tab-pane fade" id="link4" role="tabpanel" aria-labelledby="link4-tab" aria-expanded="false">
								<p>6</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Justified With Top Border end -->
