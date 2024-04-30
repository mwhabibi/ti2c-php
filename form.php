<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Formulir Biodata</title>
  <link rel="stylesheet" href="./Style/styleForm.css"> 
  <script>
    function confirmSubmit() {
      return confirm("Apakah Anda yakin ingin menyimpan data?");
    }
  </script>
</head>
<body>
  <div class="container">
    <h1>Formulir Biodata</h1>
    <form action="create.php" method="post" onsubmit="return confirmSubmit()">
      <div class="form-group">
        <label for="nama" class="label">Nama:</label>
        <input type="text" id="nama" name="nama" class="input" required>
      </div>
      
      <div class="form-group">
        <label for="nim" class="label">NIM:</label>
        <input type="text" id="nim" name="nim" class="input" required>
      </div>

      <div class="form-group">
        <label for="alamat" class="label">Alamat:</label>
        <textarea id="alamat" name="alamat" class="textarea" required></textarea>
      </div>

      <div class="form-group">
        <label for="ttl" class="label">Tempat Tanggal Lahir:</label>
        <input type="text" id="ttl" name="ttl" class="input" required>
      </div>

      <div class="form-group">
        <label for="jk" class="label">Jenis Kelamin:</label>
        <select id="jk" name="jk" class="select" required>
          <option value="Laki-laki">Laki-laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>

      <div class="form-group">
        <label for="usia" class="label">Usia:</label>
        <input type="number" id="usia" name="usia" class="input" min="1" required>
      </div>

      <button type="submit" class="button">Simpan</button>
    </form>
  </div>
</body>
</html>
