<?php include('header.php');?>
<body style="background-image:url(icon/about-bg.jpg); background-repeat:no-repeat; ">			
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
  xmlhttp.open("GET","loadpayment.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>
<center>
<br>

    <table style="width:100%; "  align="center" class="table table-bordered table-hover animated flipInX">
        <form>
<tr>
<td colspan="2"><span style="font-size: 14px"><strong>البحث في سجلات سداد الموردين</strong> <i class="fa ft-layers"></i></span></td>
</tr><tr>
<td> <input type="text"  class="form-control" style="font-size:14px;" placeholder="أدخل اسم المورد" onkeyup="showHint(this.value)"></td>
</tr></form>
</table>
<span id="txtHint"></span></p>

</body>
</html>
</center>