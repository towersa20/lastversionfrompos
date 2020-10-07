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
  xmlhttp.open("GET","loadsales2.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>
<center>


    <table style="width:100%; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
<form> 
<tr>
<td colspan="2"><span style="color: #000000; font-size: 16px">إستعلام عن فواتير المبيعات  <i class="fa fa-search"></i></span></td>
</tr><tr>
<td> <input type="text"  class="form-control big-shadow" style="font-size:18px; border:0px;" placeholder="أدخل رقم الفاتورة" onkeyup="showHint(this.value)"></td>
<td style="width:2%;"><input name="" class="custom-control-label"  for="customCheckboxInline1" type="checkbox" required></td></tr></form>
</table>
<span id="txtHint"></span></p>

</body>
</html>
</center>