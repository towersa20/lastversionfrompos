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
  xmlhttp.open("GET","loademp.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>
<center>
<br>

    <table style="width:100%; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
<form> 
<tr>
<td colspan="2"><span style="color: #000000; font-size: 16px"><strong>بحث في سجلات الموظفين <i class="fa fa-user"></i></strong></span></td>
</tr><tr>
<td> <input type="text"  class="form-control big-shadow" style="font-size:18px; border:0px;" placeholder="أدخل اسم الموظف" onkeyup="showHint(this.value)"></td>
</tr></form>
</table>
<span id="txtHint"></span></p>

</body>
</html>
</center>