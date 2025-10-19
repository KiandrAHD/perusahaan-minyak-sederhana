<?php
$servername = "localhost";
$username = "root"; // default user XAMPP
$password = ""; // default XAMPP tidak punya password
$dbname = "perusahaan_minyak";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
