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
				
</div></div>

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
<div class="title"><img src="gambar/laporan.png">Laporan Angsuran</div>
<div id="data_user_wrap">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "koperasi_ujikom";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "
<table class='border' align='center'>
<tr><th>ID Angsuran</th><th>ID Kategori</th><th>ID Anggota</th><th>Tanggal Pembayaran</th><th>Angsuran Ke-</th><th>Besar Angsuran</th><th>Keterangan</th><th>ID Pinjaman</th><th>Sisa Pinjaman</th></tr>";

// SQL query
$query = "SELECT
            angsuran.id_angsuran,
            angsuran.id_kategori,
            angsuran.tanggal_pembayaran,
            angsuran.angsuran_ke,
            angsuran.besar_angsuran,
            angsuran.keterangan,
            angsuran.id_pinjaman,
            angsuran.id_anggota,
            anggota.nama,
            pinjaman.sisa_pinjaman
          FROM
            angsuran
          INNER JOIN pinjaman ON angsuran.id_pinjaman = pinjaman.id_pinjaman
          INNER JOIN anggota ON angsuran.id_anggota = anggota.id_anggota
          GROUP BY angsuran.id_pinjaman";

$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
} else {
    // Fetch and display data
    while ($array = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "
        <tr>
            <td>{$array['id_angsuran']}</td>
            <td>{$array['id_kategori']}</td>
            <td>{$array['id_anggota']}</td>
            <td>{$array['tanggal_pembayaran']}</td>
            <td>{$array['angsuran_ke']}</td>
            <td>{$array['besar_angsuran']}</td>
            <td>{$array['keterangan']}</td>
            <td>{$array['id_pinjaman']}</td>
            <td>{$array['sisa_pinjaman']}</td>
        </tr>";
    }
}

echo "</table>";

// Close connection
mysqli_close($conn);
?>


<div id="posisi"><button style="margin-left:5%" onClick="print_d()"><img src="gambar/print.png" width="50" height="50"></button></div>

 <script>
 function print_d(){
 window.open("print_angsuran.php","_blank");
 }
 </script>
<br />
</div>

</div>
</div>

</div>

</div>

</body>
</html>