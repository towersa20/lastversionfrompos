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
  xmlhttp.open("GET","loadcustom.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>
<center>
    <table style="width:100%;" align="center" dir="ltr"  class="table table-borderd table-hover">
    <tr>
      <td style="width:15%;"><a href="vperson.php"><button type="button" class="btn btn-primary"  style="width: 100%; font-family: 'Droid Arabic Kufi';"> Payments search <i class="fa fa-search"></i></button></a></td>
      <td style="width:15%;"><a href="custom_search.php"><button type="button" class="btn btn-danger"  style="width: 100%; font-family: 'Droid Arabic Kufi';"> Purchase history <i class="fas fa-shopping-cart"></i></button></a></td>
      <td style="width:15%;"><a href="crecord.php"><button type="button" class="btn btn-success"  style="width: 100%; font-family: 'Droid Arabic Kufi';"> Back <i class="fa fa-undo"></i></button></a></td>
</tr>
<form> 
<tr>
<td dir="rtl" colspan="5"> 
<input type="text"  class="form-control" style="font-size:14px;" placeholder="Search customer records" onkeyup="showHint(this.value)"></td>
</tr></form>
</table>
<span id="txtHint"></span></p>

</body>
</html>
</center>