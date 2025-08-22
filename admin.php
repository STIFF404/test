<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Path ke file CSV
$file = 'absensi.csv'; // Atau 'data/absensi.csv' jika disimpan di subdirektori

// Baca data dari file CSV
$data = array();
if (($handle = fopen($file, "r")) !== FALSE) {
    while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $data[] = $row;
    }
    fclose($handle);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Absensi</title>
</head>
<body>
    <h2>Data Absensi</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nomor</th>
                <th>Link</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row[0]); ?></td>
                    <td><?php echo htmlspecialchars($row[1]); ?></td>
                    <td><?php echo htmlspecialchars($row[2]); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>
