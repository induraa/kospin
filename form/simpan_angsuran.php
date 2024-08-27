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

// Calculate remaining loan amount
$s = $_POST['sisa_pinjaman'] - $_POST['besar_angsuran'];

// Fetch the latest installment number
$result = $conn->query("SELECT * FROM angsuran WHERE id_pinjaman = '{$_POST['id_pinjaman']}'");
$mfa = $result->fetch_assoc();
$ak = $mfa['angsuran_ke'] + 1;

// Insert new installment record
$stmt = $conn->prepare("INSERT INTO angsuran (id_angsuran, id_kategori, id_anggota, angsuran_ke, besar_angsuran, keterangan, id_pinjaman)
                        VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $_POST['id_angsuran'], $_POST['id_kategori'], $_POST['id_anggota'], $ak, $_POST['besar_angsuran'], $_POST['keterangan'], $_POST['id_pinjaman']);
$stmt->execute();

// Update loan status if fully paid
if ($s == 0) {
    $conn->query("UPDATE pinjaman SET sisa_pinjaman = '0', keterangan = 'lunas' WHERE id_pinjaman = '{$_POST['id_pinjaman']}'");
    $conn->query("UPDATE angsuran SET keterangan = 'lunas' WHERE id_pinjaman = '{$_POST['id_pinjaman']}'");
} else {
    $conn->query("UPDATE pinjaman SET sisa_pinjaman = '$s' WHERE id_pinjaman = '{$_POST['id_pinjaman']}'");
}

// Update installment number
if ($ak >= 1) {
    $conn->query("UPDATE angsuran SET angsuran_ke = '$ak' WHERE id_pinjaman = '{$_POST['id_pinjaman']}'");
}

// Close statement and connection
$stmt->close();
$conn->close();

// Redirect to the previous page
header('location:../petugas_cari_angsuran.php');
?>
