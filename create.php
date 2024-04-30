<?php
// Koneksi ke database
include("db.php");

// Check connection
if (!$conn) {
  die("Connection failed: ". mysqli_connect_error());
}

// Query untuk membuat tabel biodata
$query = "CREATE TABLE IF NOT EXISTS biodata (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(50) NOT NULL,
  nim VARCHAR(20) NOT NULL,
  alamat TEXT NOT NULL,
  ttl VARCHAR(50) NOT NULL,
  jk ENUM('Laki-laki', 'Perempuan') NOT NULL,
  usia INT(3) NOT NULL
)";

// Eksekusi query
if (mysqli_query($conn, $query)) {
  echo "Tabel biodata berhasil dibuat & ";
} else {
  echo "Error: ". mysqli_error($conn);
}

// Ambil data dari form
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$alamat = $_POST['alamat'];
$ttl = $_POST['ttl'];
$jk = $_POST['jk'];
$usia = $_POST['usia'];

// Query untuk insert data ke database
$query = "INSERT INTO biodata (nama, nim, alamat, ttl, jk, usia) VALUES ('$nama', '$nim', '$alamat', '$ttl', '$jk', '$usia')";

// Eksekusi query
if (mysqli_query($conn, $query)) {
    echo "<script>alert('Data berhasil disimpan! Klik OK jika anda ingin melihat data anda!'); window.location.href = 'biodata.php';</script>";
} else {
  echo "Error: ". mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>