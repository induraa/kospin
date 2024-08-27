



<html>
<head>
<title>Report</title>
</head>
<link rel="stylesheet" type="text/css" href="css/rpt.css">
<body>
<br />
<br />
<br />
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "koperasi_ujikom";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "
<table class='border' align='center'>
<tr><th>ID Angsuran</th><th>ID Kategori</th><th>ID Anggota</th><th>Tanggal Pembayaran</th><th>Angsuran Ke-</th><th>Besar Angsuran</th><th>Keterangan</th><th>ID Pinjaman</th></tr>";

// SQL query
$query = "SELECT
            id_angsuran,
            id_kategori,
            id_anggota,
            tanggal_pembayaran,
            angsuran_ke,
            besar_angsuran,
            keterangan,
            id_pinjaman
          FROM
            angsuran";

$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
} else {
    // Fetch and display data
    while ($array = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "
        <tr>
            <td>{$array['id_angsuran']}</td>
            <td>{$array['id_kategori']}</td>
            <td>{$array['id_anggota']}</td>
            <td>{$array['tanggal_pembayaran']}</td>
            <td>{$array['angsuran_ke']}</td>
            <td>{$array['besar_angsuran']}</td>
            <td>{$array['keterangan']}</td>
            <td>{$array['id_pinjaman']}</td>
        </tr>";
    }
}

echo "</table>";

// Close connection
mysqli_close($conn);
?>

 <script>
 window.load = print_d();
 function print_d(){
 window.print();
 }
 </script>
</body>
</html>