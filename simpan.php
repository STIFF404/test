<?php
$nama = $_POST['nama'];
$nomor = $_POST['nomor'];
$link = $_POST['link'];

// Path ke file CSV (di luar direktori web)
$file = 'absensi.csv'; // Atau 'data/absensi.csv' jika disimpan di subdirektori

// Data yang akan disimpan
$data = array($nama, $nomor, $link);

// Buka file CSV untuk ditambahkan
$fp = fopen($file, 'a');

// Masukkan data ke dalam file CSV
fputcsv($fp, $data);

// Tutup file
fclose($fp);

echo "Data berhasil disimpan.";
?>
	