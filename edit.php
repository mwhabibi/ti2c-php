<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Biodata</title>
  <link rel="stylesheet" href="./Style/styleEdit.css">
</head>
<body>
  <div class="container">
    <h1>Edit Biodata</h1>
    <?php
    // Koneksi ke database
    require_once("db.php");

    // Ambil data dari URL
    $id = $_GET['id'];

    // Query untuk mendapatkan data berdasarkan id
    $query = "SELECT * FROM biodata WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Ambil data dari form
      $nama = $_POST['nama'];
      $nim = $_POST['nim'];
      $alamat = $_POST['alamat'];
      $ttl = $_POST['ttl'];
      $jk = $_POST['jk'];
      $usia = $_POST['usia'];

      // Query untuk update data
      $query = "UPDATE biodata SET nama = '$nama', nim = '$nim', alamat = '$alamat', ttl = '$ttl', jk = '$jk', usia = '$usia' WHERE id = $id";

      // Eksekusi query
      if (mysqli_query($conn, $query)) {
        echo "<p>Data berhasil diupdate!</p>";
        // Redirect back to biodata.php after updating
        header("Location: biodata.php");
        exit();
      } else {
        echo "Error: ". mysqli_error($conn);
      }
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id=$id");?>">
      <div class="form-group">
        <label for="nama" class="label">Nama:</label>
        <input type="text" id="nama" name="nama" class="input" value="<?php echo $row['nama']; ?>" required>
      </div>
      
      <div class="form-group">
        <label for="nim" class="label">NIM:</label>
        <input type="text" id="nim" name="nim" class="input" value="<?php echo $row['nim']; ?>" required>
      </div>

      <div class="form-group">
        <label for="alamat" class="label">Alamat:</label>
        <textarea id="alamat" name="alamat" class="textarea" required><?php echo $row['alamat']; ?></textarea>
      </div>

      <div class="form-group">
        <label for="ttl" class="label">Tempat Tanggal Lahir:</label>
        <input type="text" id="ttl" name="ttl" class="input" value="<?php echo $row['ttl']; ?>" required>
      </div>

      <div class="form-group">
        <label for="jk" class="label">Jenis Kelamin:</label>
        <select id="jk" name="jk" class="select" required>
          <option value="Laki-laki" <?php if ($row['jk'] == 'Laki-laki') echo 'selected'; ?>>Laki-laki</option>
          <option value="Perempuan" <?php if ($row['jk'] == 'Perempuan') echo 'selected'; ?>>Perempuan</option>
        </select>
      </div>

      <div class="form-group">
        <label for="usia" class="label">Usia:</label>
        <input type="number" id="usia" name="usia" class="input" min="1" value="<?php echo $row['usia']; ?>" required>
      </div>

      <button type="submit" class="button" onclick="confirm('Apakah anda sudah yakin ingin menyimpan data ini?')">Simpan</button>
    </form>
  </div>
</body>
</html>
