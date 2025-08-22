<?php
// Mulai session (untuk autentikasi)
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect ke halaman login jika belum
    exit();
}

// Konfigurasi koneksi database (sama seperti simpan.php)
$host = "localhost";
$username = "admin";
$password = "admin123";
$database = "absensi";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil semua data dari tabel
$sql = "SELECT * FROM absensi";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Absensi (Admin)</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Data Absensi</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Nomor</th>
                <th>Tautan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $noUrut = 1; // Inisialisasi nomor urut
            if ($result->num_rows > 0) {
                // Output data setiap baris
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $noUrut . "</td>"; // Menampilkan nomor urut
                    echo "<td>" . $row["id"]. "</td>";
                    echo "<td>" . $row["nama"]. "</td>";
                    echo "<td>" . $row["nomor"]. "</td>";
                    echo "<td>" . $row["link"]. "</td>";
                    echo "<td>" . $row["tanggal"]. "</td>";
                    echo "</tr>";
                    $noUrut++; // Increment nomor urut
                }
            } else {
                echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <br>
    <a href="logout.php">Logout</a>
</body>
</html>

<?php
$conn->close();
?>
