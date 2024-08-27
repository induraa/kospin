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
<table align="right" class="table">
<tr>
<td><tulisan><h4>Welcome ,(<?php session_start(); echo $_SESSION['username'] ; ?>)</h4></tulisan></td><td><a href="logout.php"><h3>Logout</h3></a></td>
</tr>
</table>

</div>

<div class="isi_konten">

<div class="isi">
<div class="title"><img src="gambar/member.png">Data Anggota</div>
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

// Query to get the maximum id_anggota
$sql = "SELECT MAX(id_anggota) AS id_anggota FROM anggota";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $no = $row['id_anggota'];
    $nourut = (int) substr($no, 3); // Assuming the numeric part starts after "AGT"
    $nourut++;
    $char = "AGT";
    $idbaruuu = $char . sprintf("%02d", $nourut); // Adjusted to format the number properly
} else {
    $idbaruuu = "AGT01"; // Default if no records found
}

// Close connection
$conn->close();
?>
<form method="post" action="form/input_anggota.php" enctype="multipart/form-data">
<table>
<tr>
<td><span>ID_Anggota</span></td><td>:</td><td><input type="text" id="textfield" name="id_anggota"  value="<?php echo"$idbaruuu"; ?>" size="25"></td>
</tr>
<tr><td><span>Nama</span></td><td>:</td><td><input type="text" id="textfield" name="nama" size="40"></td></tr>
<tr><td><span>Alamat</span></td><td>:</td><td><textarea name="alamat"  id="textfield" rows="5" cols="20"></textarea></td></tr>
<tr><td><span>Tanggal Lahir</span></td><td>:</td><td><input type="date" id="textfield" name="tanggal_lahir" size="25"></td></tr>
<tr><td><span>Tempat Lahir</span></td><td>:</td><td><input type="text" id="textfield" name="tempat_lahir" size="25"></td></tr>
<tr><td><span>Jenis Kelamin</span></td><td>:</td><td><input type="radio" id="textfield" name="jenis_kelamin" value="laki-laki">Laki-Laki
                                        <input type="radio" id="textfield" name="jenis_kelamin" value="perempuan">Perempuan</td></tr>
<tr><td><span>Status</span></td><td>:</td><td><select id="textfield" name="status"><option>Menikah</option>
                                                       <option>Belum Menikah</option></select></td>
</tr>
<tr><td><span>No_Telepon</span></td><td>:</td><td><input  id="textfield" type="text" name="no_telepon" size="25"></td></tr>
<tr><td><span>Keterangan</span></td><td>:</td><td><input id="textfield" type="text" name="keterangan" size="35"></td></tr>

</table>


</div>
<div class="isi">
<div class="title"><img src="gambar/add_user.png">Input User</div>


<table>
<tr>
<td><span>Username</span></td><td>:</td><td><input type="text" id="textfield" name="username" size="35"></td></tr>
<tr><td><span>Password</span></td><td>:</td><td><input type="password" id="textfield" name="password" size="35"></td></tr>
<tr><td><span>Level</span></td><td>:</td><td><select name="level" id="textfield">
                                                 
                                                 <option>anggota</option></select></td>
												 </tr>
												<tr><td><input type="submit" id="textfield" value="Simpan"></td></tr>
												</table>
</form>
</div>

<div class="isi">
<div class="title"><img src="gambar/add_user.png">Daftar User</div>


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
<tr><th>Username</th><th>Level</th><th>ID</th><th>Aksi</th></tr>
";

// Query to select users where level is 'anggota'
$sql = "SELECT * FROM user WHERE level = 'anggota'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "
        <tr>
            <td>".$row['username']."</td>
            <td>".$row['level']."</td>
            <td>".$row['id']."</td>
            <td><a href='update_data_user_anggota.php?id=".$row['id']."'><img src='gambar/edit.jpg' width='40px' height='30px'></a></td>
        </tr>";
    }
} else {
    echo "<tr><td colspan='4'>0 results</td></tr>";
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