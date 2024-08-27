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

<div class="isi_konten">


<div class="isi">
<div class="title"><img src="gambar/add_user.png">Data Anggota</div>
<form method="post" action="anggota_cari.php">
<table align="right">
<tr><td><input type="text" id="textfield" name="cari" size="30" placeholder="Cari Anggota"></td><td><input type="submit" id="textfield" value="Cari"></td></tr>

</table>

</form>

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

echo "<table class='border'>
<br />
<tr bgcolor='#009999'><th>ID Anggota</th><th>Nama Anggota</th><th>Alamat Anggota</th><th>Tanggal Lahir</th><th>Tempat Lahir</th><th>Jenis Kelamin</th><th>Status</th><th>No Telepon</th><th>Keterangan</th><th>Aksi</th></tr>
";

// Query to select all data from anggota table
$sql = "SELECT * FROM anggota";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['id_anggota']."</td>
                <td>".$row['nama']."</td>
                <td>".$row['alamat']."</td>
                <td>".$row['tanggal_lahir']."</td>
                <td>".$row['tempat_lahir']."</td>
                <td>".$row['jenis_kelamin']."</td>
                <td>".$row['status']."</td>
                <td>".$row['no_telepon']."</td>
                <td>".$row['keterangan']."</td>
                <td><a href='petugas-update_anggota.php?id_anggota=".$row['id_anggota']."'><img src='gambar/edit.jpg' width='40px' height='30px'></a></td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='10'>0 results</td></tr>";
}

echo "</table>";

// Close connection
$conn->close();
?>



</div>

</div>

</div>

</div>

</body>
</html>