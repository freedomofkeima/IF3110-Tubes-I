<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
	<title> Lihat Histori Belanjaan </title>
    <link href="<?=SITE_ROOT.NAME_ROOT;?>/css/table.css" rel="stylesheet"/>
	<link href="<?=SITE_ROOT.NAME_ROOT;?>/css/profile.css" rel="stylesheet"/>
    <link href="<?=SITE_ROOT.NAME_ROOT;?>/css/mainstyle.css" rel="stylesheet"/>
</head>
<body>
	<div id="header">
		<div id="toplogo">
			<a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/home"><img id="logo" src="<?=SITE_ROOT.NAME_ROOT;?>/gambar_barang/logoruserba.jpg" alt="home"></a>
		</div>
		<div id="logintop">
			<?php
				if ($_SESSION['username'] == null)
				{
			?>
			<a href="#login_popup"><strong>Login</strong></a>
			<br><br>
			<a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/user/register"><strong>Register</strong></a>
			<?php
				} else {
			?>
			<a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/user/logout"><strong>Logout</strong></a>
			<br><br>
			<a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/user"><strong>Profile</strong></a>
			<?php
				}
			?>
			<p id ="search">Cari Barang: <input type="text" size="100"> <input type="submit" value="Search"></p>
			<a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/user/cart"><img id="tasbelanja" src="<?=SITE_ROOT.NAME_ROOT;?>/gambar_barang/tasbelanja.jpg" alt="Tas Belanja"></a>	
		</div>
		<div id="kategori">
			 <p><span><a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/home/gallery"><strong>Sembako</strong></a></span>
				<span><a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/home/gallery"><strong>Handphone</strong></a></span>
				<span><a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/home/gallery"><strong>PeralatanElektronik</strong></a></span>
				<span><a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/home/gallery"><strong>AksesorisKomputer</strong></a></span>
				<span><a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/home/gallery"><strong>PerabotanRumah</strong></a></span>
				<span><a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/home/gallery"><strong>AlatTulis</strong></a></span>
			 <p>
		</div>
	</div>
	<div class="basiccontent" id="largecontent">
		Ini laman belanjaan<br>
		<div id="table">
		<div class="header">
			<span class="kolom satu" id="narrowcolumn">No</span>
			<span class="kolom dua">Nama Barang</span>
			<span class="kolom tiga">Quantity</span>
            <span class="kolom empat">Harga Total</span>
			<span class="kolom lima">Deskripsi Tambahan</span>
			<span class="kolom enam">Status</span>
			<span class="kolom tujuh">Aksi</span>
		</div>
		<?php
		$i=0; $total_harga=0;
		while ($row = mysql_fetch_object($data['listBarang']))
		{
			$i++;
            if ($row->status == 0) $total_harga = $total_harga + $row->jumlah_barang * $row->harga_barang;
		?>
		<div class="baris">
			<span class="kolom satu" id="narrowcolumn"><?=$i;?></span>
			<span class="kolom dua"><?=$row->nama_barang;?></span>
			<span class="kolom tiga"><?=$row->jumlah_barang;?></span>
            <span class="kolom empat"><?=$row->jumlah_barang * $row->harga_barang;?></span>
			<span class="kolom lima"><?=$row->deskripsi_tambahan;?></span>
			
			<?php
			if ($row->status == 0)
			{
			?>
				<span class="kolom enam"><font color="red">Barang belum dibayar / dibeli</font></span>
				<span class="kolom tujuh"><a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/barang/hapusBarang?id=<?=$row->id;?>">Delete</a></span>
			<?php
			}
			else
			{
			?>
				<span class="kolom enam"><font color="green">Barang sudah dibayar / dibeli</font></span>
				<span class="kolom tujuh"></span>
			<?php
			}
			?>
			</span>
		</div>
		<?php
		}
		?>
		</div><br>
        
    Total Harga (Yang belum dibeli) : <?=$total_harga;?><br><br>
        
	Klik <a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/barang/beli"> ini </a> untuk melakukan pembayaran<br>
	Klik <a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/barang/"> ini </a> untuk belanja kembali<br>
	</div>
</body>
</html>
