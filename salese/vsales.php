
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
  xmlhttp.open("GET","loadsales.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>
  <div class="container-fluid">
<center>

    <table style="width:100%; font-size:14px; " border="1" align="center" dir="rtl"  class="table table-bordered table-hover">
<form> 
<tr>
<td colspan="2"><span style="color: #000000; font-size: 14px"><strong>البحث في سجل المبيعات <i class="fa fa-search"></i></strong></span></td>
<td><a  href="../System/"><button type="button" style="font-family: 'Droid Arabic Kufi'; font-size:14px;" class="btn btn-primary form-control"><i class="fa fa-home"></i> الرئيسية </button></a></td>
<td><a href="exe.php"><button type="button" style="font-family: 'Droid Arabic Kufi'; font-size:14px;" class="btn btn-primary form-control"><i class="fa fa-check"></i> جديد </button></a></td>
<td><a href="poss.php"><button type="button" style="font-family: 'Droid Arabic Kufi'; font-size:14px;" class="btn btn-primary form-control"><i class="fa fa-shopping-bag"></i> المبيعات </button></a></td>
<td><a href="logout.php"><button type="button" style="font-family: 'Droid Arabic Kufi'; font-size:14px;" class="btn btn-primary form-control"><i class="fa fa-lock"></i> خروج </button></a></td>
</tr><tr>
<td colspan="6"> <input type="text"  class="form-control" style="font-size:14px; color:#FF0000;" placeholder="أدخل كلمة البحث" onkeyup="showHint(this.value)"></td>
</tr></form>
</table>
<span id="txtHint"></span></p>

</body>
</html>
</center>