<?php include('header.php');?>

<!-- بداية كود تخطيط الصفحة!-->

 <div class="app-content content">
      <div class="content-wrapper">
          <div class="content-wrapper-before"></div>
               <div class="">
                     <div class="content-header-left col-md-4 col-12 mb-2">
                       
                             </div><br/><br/><br/>
                             
      <!-- نهاية كود تخطيط الصفحة!-->
                       
<div class="table-struct full-width full-height">
    <div class="table-cell vertical-align-middle auth-form-wrap">
        <div class="auth-form  ml-auto mr-auto no-float">
            	<div class="row">
                   <div class="col-sm-12 col-xs-12">
<div><h3 align="center" style="font-family:Droid Arabic Kufi;">Manual backup window</h3></div>	
     <div class="form-wrap">
     
     <!-- بداية فورم نافذة النسخ الإحتياطي!-->

          <form action="bmd/database_backup.php" method="post" id="">
    
    
     <div class="form-group">
     <!-- بداية فورم السيرفر!-->

           <input type="hidden" class="form-control" value="localhost"  name="server" id="server" required="" autocomplete="on">
     
     <!-- نهاية فورم السيرفر!-->
     </div>

     <div class="form-group">
     <!-- بداية فورم مستخدم قاعدة البيانات!-->

       <input type="hidden" class="form-control" value="atayebdw_kaz"       name="username" id="username" required="" autocomplete="on">
     
     <!-- نهاية مستخدم قاعدة البيانات!-->

     </div>

    <div class="form-group">
          
          <!-- بداية فورم كلمة مرور قاعدة البيانات!-->
    
    <input type="hidden" class="form-control" value="ksa@ksa123" name="password" id="password" >
    
         <!-- نهاية فورم كلمة مرور قاعدة البيانات!-->

    </div>

<div class="form-group">

      <!-- بداية فور قاعدة بيانات برنامج المبيعات!-->

 
<input type="hidden" class="form-control" value="atayebdw_kaz" name="dbname" id="dbname" required="" autocomplete="on">

     <!-- نهاية فورم برنامج قاعدة البيانات!-->

    </div>
  							<div class="form-group text-center">


<!-- بداية الزر الخاص بإجراء النسخ الإحتياطي لقاعدة البيانات!-->


<button type="submit" name="backupnow" class="btn btn-rounded btn-primary" style="width:600px; height:120px; font-size:35px; color:white; "> Backup  <i class="fa fa-qrcode danger font-large-2"></i></button>

<!-- نهاية الزر الخاص بإجراء النسخ الإحتياطي لقاعدة البيانات!-->
					
        				</div>
											</form>
								<!-- نهاية الفورم الخاص بنافذة النسخ الإحتياطي !-->
		</div></div>
    </div></div>
						</div></div></div>
         </div>
				
		

     <!-- نهاية كود صفحة النسخ الإحتياطي!-->
