<htmL>
<title>Koperasi</title>
<head>
<link type="text/css" rel="stylesheet" href="css/style.css" media="screen">
</head>
<body>

<div id="wrapper">

<div class="sidebar">

<div class="head_sidebar">

<h3 class="kop">KSP</h3><span>Waluyo Sejati</span>
</div>

<div class="isi_sidebar">
 
<img src="gambar/koperasi.png" class="img"><br>
<span>KSP</span><h3 class="logo">Waluyo Sejati</h3>

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
<label for="ac-2"><img src="gambar/user.png">Anggota</label>
<article class="artikel-2">
<li><a href="petugas-data_anggota.php">Input Data Anggota</a></li>
<li><a href="petugas-data_user_anggota.php">Data Anggota</a></li>
</article>
</div>


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


<div class="data_user">
<div class="title"><img src="gambar/data.png">Data Pinjaman</div>
<div id="data_user_wrap">
<form method="post" action="pinjaman_cari.php">
<table>
<tr><td><input type="submit" value="Cari"></td><td><input type="text" name="cari" size="30"></td></tr>
</table>
</form>
<a href=""></a>
<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "koperasi_ujikom";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "
<table class='border'>
<tr><th>ID Pinjaman</th><th>ID Anggota</th><th>Besar pinjaman</th><th>Tanggal pinjaman</th><th>Tanggal Pelunasan</th><th>Keterangan</th><th>Lama Cicilan</th><th>Sisa Pinjaman</th><th>Aksi</th></tr>";

// Escape input to prevent SQL Injection
$cari = $conn->real_escape_string($_POST['cari']);

// Perform SQL query
$query = "SELECT id_pinjaman, id_anggota, besar_pinjaman, tanggal_pinjaman, tanggal_pelunasan, keterangan, lama_cicilan, sisa_pinjaman 
          FROM pinjaman 
          WHERE id_anggota LIKE '%$cari%'";
$hasil = $conn->query($query);

if ($hasil === false) {
    echo "Error: " . $conn->error;
} else {
    // Fetch and display results
    while ($h = $hasil->fetch_assoc()) {
        echo "
        <tr>
            <td>{$h['id_pinjaman']}</td>
            <td>{$h['id_anggota']}</td>
            <td>{$h['besar_pinjaman']}</td>
            <td>{$h['tanggal_pinjaman']}</td>
            <td>{$h['tanggal_pelunasan']}</td>
            <td>{$h['keterangan']}</td>
            <td>{$h['lama_cicilan']}</td>
            <td>{$h['sisa_pinjaman']}</td>
            <td><a href='bayar_angsuran.php?id_pinjaman={$h['id_pinjaman']}'>Angsuran</a></td>
        </tr>";
    }
}

echo "</table>";

// Close connection
$conn->close();
?>

</div>

</div>
</div>

</div>

</div>

</body>
</html>