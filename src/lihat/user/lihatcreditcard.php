<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
	<title> Lihat Kartu Kredit </title>
	<link href="<?=SITE_ROOT.NAME_ROOT;?>/css/table.css" rel="stylesheet"/>
</head>
<body>
Credit card anda<br>
<div id="table">
<div class="header">
	<span class="kolom satu">No</span>
	<span class="kolom dua">Number</span>
	<span class="kolom tiga">Nama</span>
	<span class="kolom empat">Expired Date</span>
</div>
<?php
$i=0;
while ($row = mysql_fetch_object($data['listCC']))
{
	$i++;
?>
<div class="baris">
	<span class="kolom satu"><?=$i;?></span>
	<span class="kolom dua"><?=$row->card_number;?></span>
	<span class="kolom tiga"><?=$row->name;?></span>
	<span class="kolom empat"><?=$row->expired_date;?></span>
</div>
<?php
}
?>
</div>
</body>
</html>
