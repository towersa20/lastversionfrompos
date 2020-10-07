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
  xmlhttp.open("GET","loadexpn.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>
<center>

    <table style="width:100%; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover animated flipInX">
        <form>
<tr>
<td colspan="2"><span style="color:#000000; font-size: 16px"><strong>سجلات المصروفات</strong></span> <i class="fa ft-activity"></i></td>
</tr><tr>
<td> <input type="text"  class="form-control big-shadow" style="font-size:14px; color:#990066; " placeholder="أدخل اسم المصروف" onkeyup="showHint(this.value)"></td>
<td style="width:1px;"><input class="form-control btn-danger" type="text" required></td></tr></form>

</table>
<span id="txtHint"></span></p>

</body>
</html>
</center>