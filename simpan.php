<?php
// Konfigurasi koneksi database
$host = "localhost"; // Ganti dengan host database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$database = "absensi"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mendapatkan data dari formulir
$nama = $_POST['nama'];
$nomor = $_POST['nomor'];
$link = $_POST['link'];

// Mencegah serangan SQL Injection
$nama = $conn->real_escape_string($nama);
$nomor = $conn->real_escape_string($nomor);
$link = $conn->real_escape_string($link);

// Query untuk menyimpan data ke tabel
$sql = "INSERT INTO absensi (nama, nomor, link) VALUES ('$nama', '$nomor', '$link')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
