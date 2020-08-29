<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Barcode Print Product <?= $row->barcode; ?></title>
</head>
<body>
	<?php 
	$generator = new Picqer\Barcode\BarcodeGeneratorPNG();
	echo '<img style="width: 40%; margin-top: 10px;" src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '">';
	?>
	<br><br>
	<div style="font-size: 25px; margin-left: 2px; margin-top: 7px;"><?= $row->barcode; ?></div>
</body>
</html>