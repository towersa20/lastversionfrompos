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

		require "vendor/autoload.php";

		$product = $_POST['product'];
		$product_id = $_POST['product_id'];
//		$rate = $_POST['rate'];
$Bar = new Picqer\Barcode\BarcodeGeneratorHTML();

$code = $Bar->getBarcode($_POST['product_id'], $Bar::TYPE_CODE_128);


			echo "$code";

		

		?></td></tr>
		</table>
</body>
</html>