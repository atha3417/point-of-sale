<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Qr-Code Print Product <?= $row->barcode; ?></title>
</head>
<body>
  <img style="width: 30%; margin-top: 20px;" src="./assets/img/qr-code/Qr-code-<?= $row->item_id ?>.png ?>" alt="<?= $row->barcode; ?>">
  <div style="font-size: 20px; margin-left: 5px; margin-top: -12px;"><?= $row->barcode; ?></div>
</body>
</html>