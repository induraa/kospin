



<html>
<head>
<title>Report</title>
</head>
<link rel="stylesheet" type="text/css" href="css/rpt.css">
<body>

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
<tr><th>Tanggal Pinjaman</th><th>Tanggal Pelunasan</th><th>ID Pinjaman</th><th>Nama Pinjaman</th><th>Besar Pinjaman</th><th>Keterangan</th><th>ID Kategori Pinjaman</th><th>Besar Jasa</th><th>Lama Cicilan</th><th>Sisa Pinjaman</th><th>ID Anggota</th></tr>";

// Perform SQL query
$query = "SELECT
            pinjaman.tanggal_pinjaman,
            pinjaman.tanggal_pelunasan,
            pinjaman.id_pinjaman,
            pinjaman.nama_pinjaman,
            pinjaman.besar_pinjaman,
            pinjaman.keterangan,
            pinjaman.id_kategori_pinjaman,
            pinjaman.besar_jasa,
            pinjaman.lama_cicilan,
            pinjaman.sisa_pinjaman,
            pinjaman.id_anggota
          FROM
            pinjaman
          INNER JOIN anggota ON pinjaman.id_anggota = anggota.id_anggota
          GROUP BY pinjaman.id_pinjaman";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo "Error: " . mysqli_error($conn);
} else {
    // Fetch and display results
    while ($array = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo "
        <tr>
            <td>{$array['tanggal_pinjaman']}</td>
            <td>{$array['tanggal_pelunasan']}</td>
            <td>{$array['id_pinjaman']}</td>
            <td>{$array['nama_pinjaman']}</td>
            <td>{$array['besar_pinjaman']}</td>
            <td>{$array['keterangan']}</td>
            <td>{$array['id_kategori_pinjaman']}</td>
            <td>{$array['besar_jasa']}</td>
            <td>{$array['lama_cicilan']}</td>
            <td>{$array['sisa_pinjaman']}</td>
            <td>{$array['id_anggota']}</td>
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