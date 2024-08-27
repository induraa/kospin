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
<div class="title"><img src="gambar/simpanan.png">Data Simpanan</div>
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

// Query to get the maximum ID from simpanan table
$h = $conn->query("SELECT MAX(id_simpanan) AS id_simpanan FROM simpanan");
$data = $h->fetch_assoc();
$no = $data['id_simpanan'];
$nourut = (int) substr($no, 2, 2);
$nourut++;
$char = "SI";
$idbaru = $char . sprintf("%02s", $nourut);
?>

<form method="post" action="form/input-data-simpanan.php" enctype="multipart/form-data">
    <table>
        <tr>
            <td><span>ID_Simpanan</span></td><td>:</td><td><input type="text" readonly="true" value="<?php echo $idbaru; ?>" id="textfield" name="id_simpanan" size="25"></td>
        </tr>
        <tr><td><span>Nama_Simpanan</span></td><td>:</td><td><select name="nama_simpanan" id="textfield">
            <option>Simpanan Pokok</option>
            <option>Simpanan Sukarela</option>
            <option>Simpanan Wajib</option>
        </select></td></tr>
        <tr><td><span>ID_Petugas</span></td><td>:</td><td><input type="text" id="textfield" name="id_petugas" size="25" readonly="true" value="<?php echo $_SESSION['id']; ?>"> </td></tr>
        <tr><td><span>ID_Anggota</span></td><td>:</td><td><select name="id_anggota" id="textfield">
        <?php 
        // Query to select IDs from anggota table
        $mq = $conn->query("SELECT * FROM anggota"); 
        echo "<option>~ Pilih Id ~</option>"; 
        while ($mfa = $mq->fetch_assoc()) {
            echo "<option>" . $mfa['id_anggota'] . "</option>";
        }
        ?>
        </select></td></tr>
        <tr><td><span>Tanggal Simpanan</span></td><td>:</td><td><input type="date" id="textfield" name="tanggal_simpanan" size="25"></td></tr>
        <tr><td><span>Besar Simpanan</span></td><td>:</td><td><input type="text" id="textfield" name="besar_simpanan"></td></tr>
        <tr><td><span>Keterangan</span></td><td>:</td><td><textarea id="textfield" name="keterangan" rows="5" cols="20"></textarea></td></tr>
        <tr>
            <td><input type="submit" id="textfield" value="Simpan"></td>
        </tr>
    </table>
</form>

<tulisan>*Periksa Kembali sebelum klik tombol simpan karena data tidak bisa di edit</tulisan><br /><br />

<div class="data_user">
    <div class="title"><img src="gambar/data.png">Data Simpanan</div>
    <div id="data_user_wrap">
    <?php
    // Query to select data from simpanan table
    $selek = $conn->query("SELECT * FROM simpanan");
    echo "<table class='border'>
        <tr><th>ID Simpanan</th><th>Nama Simpanan</th><th>ID Petugas</th><th>ID Anggota</th><th>Tanggal Simpanan</th><th>Besar Simpanan</th><th>Keterangan</th></tr>";
    while ($array = $selek->fetch_assoc()) {
        echo "<tr><td>{$array['id_simpanan']}</td><td>{$array['nama_simpanan']}</td><td>{$array['id_petugas']}</td><td>{$array['id_anggota']}</td><td>{$array['tanggal_simpanan']}</td><td>{$array['besar_simpanan']}</td><td>{$array['keterangan']}</td></tr>";
    }
    echo "</table>";
    ?>
    </div>
</div>

<?php
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