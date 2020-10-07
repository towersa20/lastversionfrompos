<?php include('header.php');?>
 <div class="app-content content container-fluid">
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
  xmlhttp.open("GET","loadperson.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<center>
    <table style="width:100%; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
<form> 
<tr>
<td colspan="2"><span style="color: #000000; font-size:14px"><strong>البحث في سجلات مدفوعات العمــلاء </strong> <i class="fa fa-user"></i></span></td>
</tr><tr>
<td> <input type="text"  class="form-control big-shadow" style="font-size:14px;" placeholder="أدخل اسم العميــل" onkeyup="showHint(this.value)"></td>
</tr></form>
</table>
<span id="txtHint"></span></p>

</body>
</html>


