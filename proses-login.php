<?php
session_start();

// Membuat koneksi ke database
$connection = mysqli_connect("localhost", "root", "", "koperasi_ujikom");

// Memeriksa koneksi
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Mengamankan input pengguna dengan mysqli_real_escape_string
$username = mysqli_real_escape_string($connection, $_POST['username']);
$password = mysqli_real_escape_string($connection, $_POST['password']);

// Menjalankan query untuk memeriksa login
$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($connection, $query);

// Memeriksa jumlah baris yang ditemukan
$check = mysqli_num_rows($result);

if ($check == 0) {
    header('location:index.php');
} else {
    // Mengambil array hasil query
    $array = mysqli_fetch_array($result);

    // Menyimpan data pengguna dalam sesi
    $_SESSION['username'] = $array['username'];
    $_SESSION['level'] = $array['level'];
    $_SESSION['id'] = $array['id'];

    // Mengarahkan pengguna berdasarkan level
    if ($_SESSION['level'] == 'petugas') {
        header('location:petugas.php');
    } elseif ($_SESSION['level'] == 'anggota') {
        header('location:anggota.php');
    }
}

// Menutup koneksi
mysqli_close($connection);
?>
