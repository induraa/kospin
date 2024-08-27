



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
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "
<table class='border' align='center'>
<tr><th>Tanggal Simpanan</th><th>ID Simpanan</th><th>Nama Simpanan</th><th>ID Anggota</th><th>Jenis Kelamin</th><th>Besar Simpanan</th></tr>";

// Perform SQL query
$query = "SELECT
            simpanan.tanggal_simpanan,
            simpanan.id_simpanan,
            simpanan.nama_simpanan,
            simpanan.id_anggota,
            anggota.jenis_kelamin,
            simpanan.besar_simpanan
          FROM
            simpanan
          INNER JOIN anggota ON simpanan.id_anggota = anggota.id_anggota
          GROUP BY simpanan.tanggal_simpanan";
$result = $conn->query($query);

if ($result === false) {
    echo "Error: " . $conn->error;
} else {
    // Fetch and display results
    while ($array = $result->fetch_assoc()) {
        echo "
        <tr>
            <td>{$array['tanggal_simpanan']}</td>
            <td>{$array['id_simpanan']}</td>
            <td>{$array['nama_simpanan']}</td>
            <td>{$array['id_anggota']}</td>
            <td>{$array['jenis_kelamin']}</td>
            <td>{$array['besar_simpanan']}</td>
        </tr>";
    }
}

echo "</table>";

// Close connection
$conn->close();
?>


 <script>
 window.load = print_d();
 function print_d(){
 window.print();
 }
 </script>
</body>
</html>