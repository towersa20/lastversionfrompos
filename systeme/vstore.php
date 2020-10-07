<?php
// استدعاء ملف التصميم
include('header.php');?>
<script>
function showHint(str) {
  if (str.length==0) { 
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
  // استدعاء السجلات المراد البحث عنها 
  xmlhttp.open("GET","loadstore.php?q="+str,true);
  xmlhttp.send();
}
</script>
<center>
<p>
  
  <!-- فورم البحث في سجلات المخزن!-->

   <table style="width:100%; font-size:14px; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
<form> 

<td colspan="2"><span style="color:#000000; font-size: 14px;">Query in store records</span> <i class="fa fa-th-large"></i></td>
</tr><tr>
<td> <input type="text"  class="form-control big-shadow" style="font-size:18px;" autofocus placeholder="Search For" onkeyup="showHint(this.value)"></td>
<td style="width:1px;"><input class="form-control btn-danger" type="text" required></td></tr></form>
</table>
<span id="txtHint"></span></p>

</center>
<!-- نهاية فورم البحث في سجلات المخزن!-->
