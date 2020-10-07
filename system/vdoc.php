<?php include('header.php');?>
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
  xmlhttp.open("GET","loaddoc.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>
<center>

    <table style="width:100%; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
<form> 

<td colspan="2"><span style="color: #000000; font-size: 16px">إستعلام في سجلات السندات </span> <i class="fa icon-cursor"></i></td>
</tr><tr>
<td> <input type="text"  class="form-control" style="font-size:18px; border:0px; color:#FF0000; color:#990066; " placeholder="أدخل اسم الصنف" onkeyup="showHint(this.value)"></td>
</tr></form>
</table>
<span id="txtHint"></span></p>

</body>
</html>
</center>