<?php include('header.php');?>
<script>
// كود البجث السريع
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
  // استدعاء نافذة نتائج البحث
  xmlhttp.open("GET","loadshare.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>

    <table style="width:100%; font-size:13px; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover ">
<form> 
<tr>
<td colspan="2"><span style="color: #000000;"><strong>الإستعلام في قائمـــة المشتريـــات</strong>  <i class="fa fa-search"></i></span></td>
</tr><tr>
<td> <input type="text"  class="form-control big-shadow" style="font-size:14px;" placeholder="أدخل اسم الصنــف" onkeyup="showHint(this.value)"></td>
<td style="width:1px;"><input class="form-control btn-danger" type="text" required></td></tr></form>

</table>
<span id="txtHint"></span></p>

</body>
</html>
</center>