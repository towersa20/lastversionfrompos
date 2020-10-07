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
  xmlhttp.open("GET","loadcust.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>
<center>

    <table style="width:100%;" border="1" align="center" dir="rtl"  class="table table-bordered table-hover ">
<form>
<tr>
<td colspan="2"><span style="color: #000000; font-size: 13px">سجلات المورديــــن</span></td>
</tr><tr>
<td> <input type="text"  class="form-control  big-shadow" style="font-size:13px; color:#FF0000;" placeholder="أدخل اسم المورد" onkeyup="showHint(this.value)"></td>
</tr></form>
</table>
<span id="txtHint"></span></p>

</body>
</html>
</center>