<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
	<title> Gallery </title>
</head>
<body>

<form action="<?=SITE_ROOT.NAME_ROOT;?>/index.php/barang/cari" method="GET">
<h3>Cari Barang</h3>
Nama : <input type="text" name="search"><br>
Kategori : 
<select name="kategori">
<option value="">--Pilih--</option>
<?php
while ($row = mysql_fetch_object($data['listCateg']))
{
?>
<option value="<?=$row->name;?>"><?=$row->name;?></option>
<?php
}
?>
</select>
<br>
Harga : <input type="text" name="harga"><br>
<input type="radio" name="operator" value="L" checked>Less than
<input type="radio" name="operator" value="E">Equal to
<input type="radio" name="operator" value="G">Greater than
<br>
<input type="submit"><br>
</form>
<hr>

<table border = 1>
<tr>
	<th>Nama Barang</th>
	<th>Gambar Barang </th>
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
		<td><img src="<?=SITE_ROOT.NAME_ROOT;?>/gambar_barang/<?=$row->gambar;?>"></td>
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
<?php
}
?>
</table>

Halaman : 
<?php
for ($i=0; $i<$data['jmlPage']; $i++)
{
?>
	 <a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/barang/index?page=<?=$i;?>"> <?=$i;?> </a>
<?php
}
?>

</body>
</html>
