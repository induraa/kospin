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

// Example of retrieving POST data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_simpanan = $_POST['id_simpanan'];
    $nama_simpanan = $_POST['nama_simpanan'];
    $id_petugas = $_POST['id_petugas'];
    $id_anggota = $_POST['id_anggota'];
    $tanggal_simpanan = $_POST['tanggal_simpanan'];
    $besar_simpanan = $_POST['besar_simpanan'];
    $keterangan = $_POST['keterangan'];

    // Example of inserting data into the database
    $sql = "INSERT INTO simpanan (id_simpanan, nama_simpanan, id_petugas, id_anggota, tanggal_simpanan, besar_simpanan, keterangan)
            VALUES ('$id_simpanan', '$nama_simpanan', '$id_petugas', '$id_anggota', '$tanggal_simpanan', '$besar_simpanan', '$keterangan')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
