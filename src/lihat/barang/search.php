<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
	<title> Gallery </title>
</head>
<body>

<h3> Hasil Pencarian untuk keyword <font color="green"><?=$data['nama_barang'];?></font> </h3>

<table border = 1>
<tr>
	<th>Nama Barang</th>
	<th>Harga</th>
	<th>Stok</th>
	<th>Aksi</th>
</tr>
<?php
while($row = mysql_fetch_object($data['barang']))
{
?>
	<tr>
		<td><?=$row->nama_barang;?></td>
		<td><?=$row->harga_barang;?></td>
		<?php
		if ($row->jumlah_barang > 0)
		{
		?>
		<td><?=$row->jumlah_barang;?></td>
		<td><a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/barang/beli?id=<?=$row->id;?>">Beli</a>
		    <a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/barang/detail?id=<?=$row->id;?>">Detail</a>
		</td>
		<?php
		}
		else
		{
		?>
			<td>Habis</td>
			<td>
			  <a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/barang/detail?id=<?=$row->id;?>">Detail</a>
			</td>
		<?php		
		}
		?>
	</tr>	
<?
}
?>
<table>

Halaman : 
<?php
for ($i=0; $i<$data['jmlPage']; $i++)
{
?>
	 <a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/barang/cari?page=<?=$i;?>&search=<?=$data['nama_barang']?>"> <?=$i;?> </a>
<?
}
?>

</body>
</html>