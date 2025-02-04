<?php
$host = "localhost";
$user = "root"; // Sesuaikan dengan user MySQL-mu
$pass = "";     // Masukkan password jika ada
$dbname = "the_bloomnest";

$conn = new mysqli($host, $user, $pass, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>