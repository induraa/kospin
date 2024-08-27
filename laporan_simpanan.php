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
<div class="title"><img src="gambar/laporan.png">Laporan Simpanan </div>
<div id="data_user_wrap">
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
<table class='border' align='center'>
<tr><th>Tanggal Simpanan</th><th>ID Simpanan</th><th>Nama Simpanan</th><th>ID Anggota</th><th>Jenis Kelamin</th><th>Besar Simpanan</th></tr>";

// Perform SQL query
$query = "SELECT
            simpanan.tanggal_simpanan,
            simpanan.id_simpanan,
            simpanan.nama_simpanan,
            simpanan.id_anggota,
            anggota.jenis_kelamin,
            simpanan.besar_simpanan
          FROM
            simpanan
          INNER JOIN anggota ON simpanan.id_anggota = anggota.id_anggota
          GROUP BY simpanan.tanggal_simpanan";
$hasil = $conn->query($query);

if ($hasil === false) {
    echo "Error: " . $conn->error;
} else {
    // Fetch and display results
    while ($array = $hasil->fetch_assoc()) {
        echo "
        <tr>
            <td>{$array['tanggal_simpanan']}</td>
            <td>{$array['id_simpanan']}</td>
            <td>{$array['nama_simpanan']}</td>
            <td>{$array['id_anggota']}</td>
            <td>{$array['jenis_kelamin']}</td>
            <td>{$array['besar_simpanan']}</td>
        </tr>";
    }
}

echo "</table>";

// Close connection
$conn->close();
?>

</div>
<div id="posisi"><button style="margin-left:5%" onClick="print_d()"><img src="gambar/print.png" width="50" height="50"></button></div>
 <script>
 function print_d(){
 window.open("print_simpanan.php","_blank");
 }
 </script>

</div>
</div>

</div>

</div>

</body>
</html>