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
<label for="ac-1"><img src="gambar/admin.png">Profile</label>
<article class="artikel-1">
<li><a href="#">Edit Profile</a></li>
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
<li><a href="simpanan.php">Pinjaman</a></li>
</article>
</div>

<div>
<input id="ac-5"  type="checkbox" >
<label for="ac-5"><img src="gambar/angsuran.png">Angsuran</label>
<article class="artikel-5">
<li><a href="simpanan.php">Angsuran</a></li>
</article>
</div>

<div>
<input id="ac-6"  type="checkbox" >
<label for="ac-6"><img src="gambar/laporan.png">Laporan</label>
<article class="artikel-6">
<p> </p>
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
mysql_connect("localhost","root","");
mysql_select_db("koperasi_ujikom");
$id=$_GET['id'];
$query=mysql_query("select * from user where id='$id'");
$mfa=mysql_fetch_array($query);
?>
<div class="isi">
<div class="title"><img src="gambar/member.png">Data Anggota</div>

<form method="post" action="form/proses_update_user.php" enctype="multipart/form-data">
<table>
<tr>
<td><span>ID_Anggota</span></td><td>:</td><td><input type="text" id="textfield" name="id_anggota" size="25" value="<?php echo $mfa['id'];?>"></td>
</tr>
<tr><td><span>Nama</span></td><td>:</td><td><input type="text" id="textfield" name="nama" size="40" disabled></td></tr>
<tr><td><span>Alamat</span></td><td>:</td><td><textarea name="alamat"  id="textfield" rows="5" cols="20" disabled></textarea></td></tr>
<tr><td><span>Tanggal Lahir</span></td><td>:</td><td><input type="date" id="textfield" name="tanggal_lahir" size="25" disabled></td></tr>
<tr><td><span>Tempat Lahir</span></td><td>:</td><td><input type="text" id="textfield" name="tempat_lahir" size="25" disabled></td></tr>
<tr><td><span>Jenis Kelamin</span></td><td>:</td><td><input type="radio" id="textfield" name="jenis_kelamin" disabled value="laki-laki">Laki-Laki
                                        <input type="radio" id="textfield" name="jenis_kelamin" value="perempuan" disabled>Perempuan</td></tr>
<tr><td><span>Status</span></td><td>:</td><td><select id="textfield" name="status" disabled><option>Menikah</option>
                                                       <option>Belum Menikah</option></select></td>
</tr>
<tr><td><span>No_Telepon</span></td><td>:</td><td><input  id="textfield" type="text" name="no_telepon" size="25" disabled ></td></tr>
<tr><td><span>Keterangan</span></td><td>:</td><td><input id="textfield" type="text" name="keterangan" size="35" disabled></td></tr>

</table>


</div>
<div class="isi">
<div class="title"><img src="gambar/add_user.png">Input User</div>


<table>
<tr>
<td><span>Username</span></td><td>:</td><td><input type="text" id="textfield" name="username" size="35" value="<?php echo $mfa['username'];?>"></td></tr>
<tr><td><span>Password</span></td><td>:</td><td><input type="password" id="textfield" name="password" size="35" value="<?php echo $mfa['password'];?>"></td></tr>
<tr><td><span>Level</span></td><td>:</td><td><select name="level" id="textfield" value="<?php echo $mfa['level'];?>">
                                                 
                                                 <option>anggota</option></select></td>
												 </tr>
												<tr><td><input type="submit" id="textfield" value="Simpan"></td></tr>
												</table>
</form>
</div>

<div class="isi">
<div class="title"><img src="gambar/add_user.png">Daftar User</div>


<?php
mysql_connect("localhost","root","");
mysql_select_db("koperasi_ujikom");

echo"
<table class='border' align='center'>
<tr><th>Username</th><th>Level</th><th>ID</th><th>Aksi</th></tr>
";
$selek=mysql_query("SELECT * FROM user
WHERE level = 'anggota'");

while($array=mysql_fetch_array($selek)){
echo"

<tr><td>$array[username]</td><td>$array[level]</td><td>$array[id]</td><td><a href='update_petugas.php?id=$array[id]'><input type='image' src='gambar/edit.jpg' width='40px' height='30px'></a><img src='gambar/slash.png' height='20' width='20'><a href='form/delete_petugas.php?id=$array[id]'><input type='image' src='gambar/delete.jpg' width='40px' height='30px'></a></tr>
";
}
?>
</div>

</div>

</div>

</div>

</body>
</html>