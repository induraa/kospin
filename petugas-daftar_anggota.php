<htmL>
<title>Koperasi</title>
<head>
<link type="text/css" rel="stylesheet" href="css/style.css" media="screen">
</head>
<body>

<div id="wrapper">

<div class="sidebar">

<div class="head_sidebar">

<h3 class="kop">Koperasi</h3><span>Ulul Albab</span>
</div>

<div class="isi_sidebar">
 
<img src="gambar/koperasi.png" class="img"><br>
<span>Ulul</span><h3 class="logo">Albab</h3>

<div class="menu">
<div>
<input id="ac-1"  type="checkbox" checked>
<label for="ac-1"><img src="gambar/admin.png">Beranda</label>
<article class="artikel-1">
<li><a href="petugas.php">Home</a></li>
</article>
</div>

<div>
<input id="ac-2"  type="checkbox">
<label for="ac-2"><img src="gambar/user.png">User</label>
<article class="artikel-2">
<li><a href="petugas-data_anggota.php">Input Data Anggota</a></li>
<li><a href="petugas-data_user_anggota.php">Data Anggota</a></li>
</article>
</div>

<div>

<div>
<input id="ac-3"  type="checkbox" >
<label for="ac-3"><img src="gambar/simpan.png">Simpanan</label>
<article class="artikel-3">
<li><a href="simpanan.php">Simpanan</a></li>
</article>
</div>

<div>
<input id="ac-4"  type="checkbox" >
<label for="ac-4"><img src="gambar/pinjam.png">Pinjaman</label>
<article class="artikel-4">
<li><a href="pinjaman.php">Pinjaman</a></li>
</article>
</div>

<div>
<input id="ac-5"  type="checkbox" >
<label for="ac-5"><img src="gambar/angsuran.png">Angsuran</label>
<article class="artikel-5">
<li><a href="petugas_cari_angsuran.php">Bayar Angsuran</a></li>
</article>
</div>

<div>
<input id="ac-6"  type="checkbox" >
<label for="ac-6"><img src="gambar/laporan.png">Laporan</label>
<article class="artikel-6">
<li><a href="laporan_simpanan.php">Simpanan</a></li>
<li><a href="laporan_pinjaman.php">Pinjaman</a></li>
<li><a href="laporan_angsuran.php">Angsuran</a></li>

</article>
</div>
				
</div>

</div>

</div>



<div class="konten">

<div class="head_konten">
<span><?php echo date("l, d F Y"); ?></span>
<table align="right">
<tr>
<td><tulisan><h4>Welcome ,(<?php session_start(); echo $_SESSION['username'] ; ?>)</h4></tulisan></td><td><a href="logout.php"><h3>Logout</h3></a></td>
</tr>
</table>

</div>

<div class="isi_konten">


<div class="isi">
<div class="title"><img src="gambar/add_user.png">Data Anggota</div>

<?php
mysql_connect("localhost","root","");
mysql_select_db("koperasi_ujikom");
echo"<table class='border' >
<tr bgcolor='#009999' ><th>ID Anggota</th><th>Nama Anggota</th><th>Alamat Anggota</th><th>Tanggal Lahir</th><th>Tempat Lahir</th><th>Jenis Kelamin</th><th>Status</th><th>No Telepon</th><th>Keterangan</th><th>Aksi</th></tr>
";
$query=mysql_query("select * from anggota");
while($a=mysql_fetch_array($query)){
echo"<tr><td>$a[id_anggota]</td><td>$a[nama]</td><td>$a[alamat]</td><td>$a[tanggal_lahir]</td><td>$a[tempat_lahir]</td><td>$a[jenis_kelamin]</td><td>$a[status]</td><td>$a[no_telepon]</td><td>$a[keterangan]</td><td><a href='update_anggota.php?id_anggota=$a[id_anggota]'><input type='image' src='gambar/edit.jpg' width='40px' height='30px'></a><img src='gambar/slash.png' height='20' width='20'><a href='form/delete_anggota.php?id_anggota=$a[id_anggota]'><input type='image' src='gambar/delete.jpg' width='40px' height='30px'></a></td></tr>";
}
?>


</div>

</div>

</div>

</div>

</body>
</html>