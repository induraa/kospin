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
    $id_anggota = $_POST['id_anggota'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $status = $_POST['status'];
    $no_telepon = $_POST['no_telepon'];
    $keterangan = $_POST['keterangan'];

    // Example of inserting data into the database
    $sql = "INSERT INTO anggota (id_anggota, nama, alamat, tanggal_lahir, tempat_lahir, jenis_kelamin, status, no_telepon, keterangan)
            VALUES ('$id_anggota', '$nama', '$alamat', '$tanggal_lahir', '$tempat_lahir', '$jenis_kelamin', '$status', '$no_telepon', '$keterangan')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
