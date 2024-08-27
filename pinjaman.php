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
<div class="title"><img src="gambar/simpanan.png">Data Pinjaman</div>
<tulisan>*Periksa Kembali sebelum klik tombol simpan karena data tidak bisa di edit</tulisan><br /><br />

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

// Query to get the maximum id_pinjaman
$query = "SELECT MAX(id_pinjaman) AS max_id FROM pinjaman";
$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $max_id = $row['max_id'];
    if ($max_id === null) {
        // If no records found, start with PJ01
        $idbaru = "PJ01";
    } else {
        $nourut = (int) substr($max_id, 2, 2);
        $nourut++;
        $char = "PJ";
        $idbaru = $char . sprintf("%02s", $nourut);
    }
} else {
    // If query fails or no records found, handle accordingly
    $idbaru = "PJ01";
}

// Close MySQL connection
$conn->close();
?>

<!-- HTML Form -->
<script language="javascript">
    function ot() {
        var kp = document.form1.id_kategori_pinjaman.value;
        var lama = document.form1.lama_cicilan.value = Number(kp);
        var bunga = document.form1.besar_jasa.value = Number(kp);
    }
</script>
<form method="post" action="form/input-data-pinjaman.php" name="form1">

    <table>
        <tr>
            <td><span>ID</span></td>
            <td>:</td>
            <td><input type="text" id="textfield" readonly="true" name="id_pinjaman" size="25" value="<?php echo $idbaru; ?>"></td>
        </tr>
        <tr>
            <td><span>Nama_Pinjaman</span></td>
            <td>:</td>
            <td><input type="text" id="textfield" name="nama_pinjaman" size="25"></td>
        </tr>
        <tr>
            <td><span>ID_Anggota</span></td>
            <td>:</td>
            <td>
                <select name="id_anggota" id="textfield">
                    <?php
                    // Reconnect to get list of anggota (members)
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    
                    $query_anggota = "SELECT * FROM anggota";
                    $result_anggota = $conn->query($query_anggota);
                    
                    if ($result_anggota && $result_anggota->num_rows > 0) {
                        while ($row_anggota = $result_anggota->fetch_assoc()) {
                            echo "<option value='" . $row_anggota['id_anggota'] . "'>" . $row_anggota['nama'] . "</option>";
                        }
                    }
                    $conn->close();
                    ?>
                </select>
            </td>
        </tr>
        <!-- Other form fields -->
        <tr>
            <td><input type="submit" value="Simpan"></td>
        </tr>
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

$h = $conn->query("select max(id_pinjaman) as id_pinjaman from pinjaman");
$data = $h->fetch_assoc();
$no = $data['id_pinjaman'];
$nourut = (int) substr($no, 2, 2);
$nourut++;
$char = "PJ";
$idbaru = $char . sprintf("%02s", $nourut);
?>

<script language="javascript">
    function ot() {
        var kp = document.form1.id_kategori_pinjaman.value;
        var lama = document.form1.lama_cicilan.value = Number(kp);
        var bunga = document.form1.besar_jasa.value = Number(kp);
    }
</script>

<form method="post" action="form/input-data-pinjaman.php" name="form1">

    <table>
        <tr>
            <td><span>ID</span></td>
            <td>:</td>
            <td><input type="text" readonly="true" name="id_pinjaman" size="25" value="<?php echo "$idbaru" ?>"></td>
        </tr>
        <tr>
            <td><span>Nama_Pinjaman</span></td>
            <td>:</td>
            <td><input type="text" id="textfield" name="nama_pinjaman" size="25"></td>
        </tr>
        <tr>
            <td><span>ID_Anggota</span></td>
            <td>:</td>
            <td>
                <select name="id_anggota" id="textfield">
                    <?php
                    $mq = $conn->query("select * from anggota");
                    echo "<option>~ Pilih Id ~</option>";
                    while ($mfa = $mq->fetch_assoc()) {
                        echo "<option>" . $mfa['id_anggota'] . "</option>";
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><span>Besar_pinjaman</span></td>
            <td>:</td>
            <td><input type="text" id="textfield" name="besar_pinjaman" size="25"></td>
        </tr>
        <tr>
            <td><span>Tanggal Pengajuan</span></td>
            <td>:</td>
            <td><input type="date" id="textfield" name="tanggal_pengajuan_pinjaman" size="25"></td>
        </tr>
        <tr>
            <td><span>Tanggal Acc</span></td>
            <td>:</td>
            <td><input type="date" id="textfield" name="tanggal_acc_peminjam"></td>
        </tr>
        <tr>
            <td><span>Tanggal Pinjaman</span></td>
            <td>:</td>
            <td><input type="date" id="textfield" name="tanggal_pinjaman" size="20"></td>
        </tr>
        <tr>
            <td><span>Keterangan</span></td>
            <td>:</td>
            <td><input type="text" id="textfield" name="keterangan" value="belum lunas"></td>
        </tr>
        <tr>
            <td><span>ID Kategori</span></td>
            <td>:</td>
            <td>
                <select name="id_kategori_pinjaman" id="textfield" onchange="ot()">
                    <option value="12">Pinjaman Jangka Pendek</option>
                    <option value="24">Pinjaman Jangka Menengah</option>
                    <option value="36">Pinjaman Jangka Panjang</option>
                </select>
            </td>
        </tr>
        <tr>
            <td><span>ID_Petugas</span></td>
            <td>:</td>
            <td><input type="text" id="textfield" name="id_petugas" value="<?php echo $_SESSION['id']; ?>" readonly="true"></td>
        </tr>
        <tr>
            <td><span>Besar Bunga</span></td>
            <td>:</td>
            <td><input type="text" id="textfield" name="besar_jasa"></td>
        </tr>
        <tr>
            <td><span>Lama Cicilan</span></td>
            <td>:</td>
            <td><input type="text" id="textfield" name="lama_cicilan"></td>
        </tr>
        <tr>
            <td><input type="submit" id="textfield" value="Simpan"></td>
        </tr>
    </table>
</form>

</div>

<div class="data_user">
    <div class="title"><img src="gambar/data.png">Data Pinjaman</div>
    <div id="data_user_wrap">
        <?php
        echo "<table class='border'>
            <tr><th>ID Pinjaman</th><th>Nama Pinjaman</th><th>ID Anggota</th><th>Besar pinjaman</th><th>Tanggal Pengajuan</th><th>Tanggal Acc Peminjam</th><th>Tanggal pinjaman</th><th>Keterangan</th><th>ID kategori</th><th>ID Petugas</th><th>Besar Bunga</th><th>Lama Cicilan</th><th>Besar Angsuran</th><th>Sisa Pinjaman</th></tr>";

        $selek = $conn->query("select * from pinjaman");
        while ($array = $selek->fetch_assoc()) {
            echo "<tr>
                <td>{$array['id_pinjaman']}</td>
                <td>{$array['nama_pinjaman']}</td>
                <td>{$array['id_anggota']}</td>
                <td>{$array['besar_pinjaman']}</td>
                <td>{$array['tanggal_pengajuan_pinjaman']}</td>
                <td>{$array['tanggal_acc_peminjam']}</td>
                <td>{$array['tanggal_pinjaman']}</td>
                <td>{$array['keterangan']}</td>
                <td>{$array['id_kategori_pinjaman']}</td>
                <td>{$array['id_petugas']}</td>
                <td>{$array['besar_jasa']}</td>
                <td>{$array['lama_cicilan']}</td>
                <td>{$array['besar_angsuran']}</td>
                <td>{$array['sisa_pinjaman']}</td>
            </tr>";
        }
        ?>
    </div>
</div>


</div>

</div>
</div>

</div>

</div>

</body>
</html>