<?php
// Koneksi ke database
require_once("db.php");

// Ambil id dari URL parameter
$id = $_GET['id'];

// Query untuk menghapus data
$sql = "DELETE FROM biodata WHERE id = $id";

// Eksekusi query
if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Data berhasil dihapus! Klik OK jika anda ingin kembali ke halaman Formulir Biodata!'); window.location.href = 'form.php';</script>";
} else {
  echo "Error: ". mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>