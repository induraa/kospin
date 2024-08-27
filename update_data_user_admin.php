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
<label for="ac-1"><img src="gambar/admin.png">Profile</label>
<article class="artikel-1">
<li><a href="#">Edit Profile</a></li>
</article>
</div>

<div>
<input id="ac-2"  type="checkbox">
<label for="ac-2"><img src="gambar/user.png">Anggota</label>
<article class="artikel-2">
<li><a href="admin-data_admin.php">Input Admin</a></li>
<li><a href="admin-data_petugas.php">Input Petugas</a></li>
<li><a href="admin-data_user_petugas.php">Data Petugas</a></li>
<li><a href="admin-data_anggota.php">Input Anggota</a></li>
<li><a href="admin-data_user_anggota.php">Data Anggota</a></li>
</article>
</div>

<div>
<input id="ac-3"  type="checkbox" >
<label for="ac-3"><img src="gambar/laporan.png">Laporan</label>
<article class="artikel-3">
<li><a href="admin-laporan_simpanan.php">Simpanan</a></li>
<li><a href="admin-laporan_pinjaman.php">Pinjaman</a></li>
<li><a href="admin-laporan_angsuran.php">Angsuran</a></li>

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

$id = $_GET['id'];
$id = $conn->real_escape_string($id); // Sanitize input to prevent SQL injection

// Query to select user data based on id
$sql = "SELECT * FROM user WHERE id = '$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch data as an associative array
    $mfa = $result->fetch_assoc();
} else {
    echo "No user found with ID: " . $id;
}

// Close connection
$conn->close();
?>

<div class="isi">
    <div class="title"><img src="gambar/add_user.png"> Input User</div>
    
    <form method="post" action="form/proses_update_admin.php" enctype="multipart/form-data">
    
        <table>
            <tr>
                <td><span>ID_Admin</span></td><td>:</td><td><input type="text" id="textfield" name="id_admin" value="<?php echo htmlspecialchars($mfa['id']); ?>"></td>
            </tr>
            <tr>
                <td><span>Username</span></td><td>:</td><td><input type="text" id="textfield" name="username" size="35" value="<?php echo htmlspecialchars($mfa['username']); ?>"></td>
            </tr>
            <tr>
                <td><span>Password</span></td><td>:</td><td><input type="password" id="textfield" name="password" size="35" value="<?php echo htmlspecialchars($mfa['password']); ?>"></td>
            </tr>
            <tr>
                <td><span>Level</span></td><td>:</td>
                <td>
                    <select name="level" id="textfield">
                        <option value="admin" <?php if ($mfa['level'] == 'admin') echo 'selected'; ?>>admin</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" id="textfield" value="Simpan"></td>
                <td><input type="submit" id="textfield" value="Cancel"></td>
            </tr>
        </table>
    </form>
</div>



</div>

</div>

</div>

</body>
</html>