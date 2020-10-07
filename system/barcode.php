<html>
<head>
<style>
p.inline {display: inline-block;}
span { font-size: 13px;}

</style>
<style type="text/css" media="print">
    @page 
    {
		height: 80px;
        margin: 0mm;  /* this affects the margin in the printer settings */

    }
</style>
</head>
<body onload="window.print();">
<table >
	<tr><td>	<?php
		include 'barcode128.php';
		$product = $_POST['product'];
		$product_id = $_POST['product_id'];
//		$rate = $_POST['rate'];

		for($i=1;$i<=$_POST['print_qty'];$i++){
			echo "<strong style='font-size: 30px;'>".bar128(stripcslashes($_POST['product_id']))."</strong><br>";
		}

		?></td></tr>
		</table>
</body>
</html>