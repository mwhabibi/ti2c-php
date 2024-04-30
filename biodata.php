<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"href="./Style/styleBiodata.css">
  <title>List Biodata</title>
</head>
<body>
<table border="1">
  <tr>
    <th>No</th>
    <th>Nama</th>
    <th>NIM</th>
    <th>Alamat</th>
    <th>Tempat, Tanggal Lahir</th>
    <th>Jenis-kelamin</th>
    <th>Usia</th>
    <th>Edit</th>
    <th>Delete</th>
  </tr>
  <?php
  require_once("db.php");

  $result = mysqli_query($conn, "SELECT * FROM biodata");

  while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['nama'] . "</td>";
    echo "<td>" . $row['nim'] . "</td>";
    echo "<td>" . $row['alamat'] . "</td>";
    echo "<td>" . $row['ttl'] . "</td>";
    echo "<td>" . $row['jk'] . "</td>";
    echo "<td>" . $row['usia'] . "</td>";
    echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a></td>";
    echo "<td><a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Apakah kamu yakin ingin menghapus data ini?')\">Delete</a></td>";
    echo "</tr>";
  }

  mysqli_close($conn);
  ?>
</table>
</body>
</html>