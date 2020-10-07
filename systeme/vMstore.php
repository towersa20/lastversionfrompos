<?php
// ملف التصميم
include('header.php');?>
<script>
  
  // كود استدعاء الصفحة والبيانات المختارة ممن سجلات المخزن
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
  
  // استدعاء ملف عرض بيانات المخزن
  xmlhttp.open("GET","loadMstore.php?q="+str,true);
  xmlhttp.send();
}
</script>
<center>


<!-- فورم البحث في سجلات المخزن!-->

    <table style="width:100%;" border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
<form> 

<td colspan="2"><span style="color: #000000; font-size: 16px">Inquiry about store movement records</span> <i class="fa fa-th-large"></i></td>
</tr><tr>
<td> <input type="text"  class="form-control big-shadow" style="font-size:18px;" placeholder="Search For" onkeyup="showHint(this.value)"></td>
</tr></form>
</table>
<span id="txtHint"></span></p>

</body>
</html>
</center>