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

// Prepare an INSERT statement without id_pinjaman
$stmt = $conn->prepare("INSERT INTO pinjaman (nama_pinjaman, id_anggota, besar_pinjaman, tanggal_pengajuan_pinjaman, tanggal_acc_peminjam, tanggal_pinjaman, keterangan, id_kategori_pinjaman, id_petugas, besar_jasa, lama_cicilan, besar_angsuran, sisa_pinjaman) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Check if the prepare statement succeeded
if ($stmt === false) {
    die('MySQL prepare error: ' . $conn->error);
}

// Bind parameters to the statement
$stmt->bind_param("ssssssssssddd", $nama_pinjaman, $id_anggota, $besar_pinjaman, $tanggal_pengajuan_pinjaman, $tanggal_acc_peminjam, $tanggal_pinjaman, $keterangan, $id_kategori_pinjaman, $id_petugas, $besar_jasa, $lama_cicilan, $besar_angsuran, $sisa_pinjaman);

// Set parameter values from $_POST
$nama_pinjaman = $_POST['nama_pinjaman'];
$id_anggota = $_POST['id_anggota'];
$besar_pinjaman = $_POST['besar_pinjaman'];
$tanggal_pengajuan_pinjaman = $_POST['tanggal_pengajuan_pinjaman'];
$tanggal_acc_peminjam = $_POST['tanggal_acc_peminjam'];
$tanggal_pinjaman = $_POST['tanggal_pinjaman'];
$keterangan = $_POST['keterangan'];
$id_kategori_pinjaman = $_POST['id_kategori_pinjaman'];
$id_petugas = $_POST['id_petugas'];
$besar_jasa = $_POST['besar_jasa'];
$lama_cicilan = $_POST['lama_cicilan'];
$besar_angsuran = ($besar_pinjaman + (($besar_pinjaman / 100) * $besar_jasa)) / $lama_cicilan;
$sisa_pinjaman = $besar_pinjaman + (($besar_pinjaman / 100) * $besar_jasa);

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();

// Redirect back to the previous page
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>
