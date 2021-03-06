<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
	<title> Gallery </title>
	<link href="<?=SITE_ROOT.NAME_ROOT;?>/css/table.css" rel="stylesheet"/>
    <link href="<?=SITE_ROOT.NAME_ROOT;?>/css/mainstyle.css" rel="stylesheet"/>
    <link href="<?=SITE_ROOT.NAME_ROOT;?>/css/loginPopup.css" rel="stylesheet"/>
    <script src="<?=SITE_ROOT.NAME_ROOT;?>/js/ajaxShop.js" type="text/javascript"></script>
    <script src="<?=SITE_ROOT.NAME_ROOT;?>/js/ajaxLogin.js" type="text/javascript"></script>
	<script src="<?=SITE_ROOT.NAME_ROOT;?>/js/autoGeneratedContent.js" type="text/javascript"></script>
</head>
<?php
$URLJS = SITE_ROOT.NAME_ROOT."/index.php/barang/generateContent";
?>
<body onload="init('<?=$URLJS;?>','nama','ASC')">
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
            <br><br>
			<p id="welcometext">Welcome, <?php echo $_SESSION['username'] ?></p>
            <a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/user/cart"><img id="tasbelanja" src="<?=SITE_ROOT.NAME_ROOT;?>/gambar_barang/tasbelanja.jpg" alt="Tas Belanja"></a>        

			<?php
				}
			?>
                        <form action="<?=SITE_ROOT.NAME_ROOT;?>/index.php/barang/cari" method="GET">
                        <p id ="search"><b>Cari Barang:</b>
                        Nama : <input type="text" name="search">
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
                        Harga : <input type="text" name="harga">
                        <input type="submit"><br>
                        <span id="radiobutt">
                        <input type="radio" name="operator" value="L" checked>Less than
                        <input type="radio" name="operator" value="E">Equal to
                        <input type="radio" name="operator" value="G">Greater than
                        </span>
                        </p>
                        </form>
        </div>
                <div id="kategori">
                         <p>
								<span><a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/barang/cari?search=&kategori=Sembako"><strong>Sembako</strong></a></span>
                                <span><a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/barang/cari?search=&kategori=Handphone"><strong>Handphone</strong></a></span>
                                <span><a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/barang/cari?search=&kategori=Peralatan+Listrik"><strong>PeralatanElektronik</strong></a></span>
                                <span><a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/barang/cari?search=&kategori=Aksesoris+Komputer"><strong>AksesorisKomputer</strong></a></span>
                                <span><a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/barang/cari?search=&kategori=Perabotan+Rumah"><strong>PerabotanRumah</strong></a></span>
                                <span><a href="<?=SITE_ROOT.NAME_ROOT;?>/index.php/barang/cari?search=&kategori=Alat+Tulis"><strong>AlatTulis</strong></a></span>
                         </p>
                </div>
    </div>
	<div class="basiccontent" id="autogenerate">
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
		
		Sort By : <br>
		<b> Nama (<a href="#" onclick="init('<?=$URLJS;?>','nama','ASC')">ASC</a>, <a href="#" onclick="init('<?=$URLJS;?>','nama','DESC')"> DESC </a>) <br>
		Kategori(<a href="#" onclick="init('<?=$URLJS;?>','kategori','ASC')">ASC</a>,<a href="#" onclick="init('<?=$URLJS;?>','kategori','DESC')"> DESC </a>)<br>
		Harga(<a href="#" onclick="init('<?=$URLJS;?>','harga','ASC')"> ASC </a>,<a href="#" onclick="init('<?=$URLJS;?>','harga','DESC')"> DESC </a>)<br>
		</b>

		<div id="table">
		<div class="header">
			<span class="kolom satu">Nama Barang</span>
			<span class="kolom dua">Gambar Barang</span>
			<span class="kolom tiga">Harga</span>
			<span class="kolom empat">Stok</span>
			<span class="kolom lima">Jumlah Beli</span>
			<span class="kolom enam">Aksi</span>
		</div>
		<div id="ISI">
		</div>
		<center><img src="<?=SITE_ROOT.NAME_ROOT;?>/gambar_barang/loading.gif"></center>
		</div>
	</div>
    

<div id="login_popup">
    <div id="popup">
    <?=$data['loginView'];?>
</div>

</body>
</html>
