<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "barang_db");

// Fungsi tambah data
if (isset($_POST['simpan'])) {
  $no = $_POST['no'];
  $nama_merek = $_POST['nama_merek'];
  $warna = $_POST['warna'];
  $jumlah = $_POST['jumlah'];

  $query = "INSERT INTO barang (no, nama_merek, warna, jumlah) VALUES ('$no', '$nama_merek', '$warna', '$jumlah')";
  mysqli_query($conn, $query);
  header("Location: index.php");
}

// Fungsi hapus data (opsional)
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $query = "DELETE FROM barang WHERE id = $id";
  mysqli_query($conn, $query);
  header("Location: index.php");
}

// Ambil data untuk ditampilkan
$result = mysqli_query($conn, "SELECT * FROM barang");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Tambah Data Barang</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Form Tambah Data Barang</h2>

    <!-- Form Tambah Data -->
    <form action="" method="POST">
      <div class="mb-3">
        <label for="no" class="form-label">No</label>
        <input type="number" class="form-control" id="no" name="no" required>
      </div>
      <div class="mb-3">
        <label for="nama_merek" class="form-label">Nama Merek</label>
        <input type="text" class="form-control" id="nama_merek" name="nama_merek" required>
      </div>
      <div class="mb-3">
        <label for="warna" class="form-label">Warna</label>
        <input type="text" class="form-control" id="warna" name="warna" required>
      </div>
      <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah</label>
        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
      </div>
      <div class="d-flex justify-content-between">
        <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
        <button type="reset" class="btn btn-secondary">Ulangi</button>
        <a href="#" class="btn btn-danger">Kembali</a>
      </div>
    </form>

    <!-- Tabel Data Barang -->
    <h3 class="mt-5">Daftar Barang</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Merek</th>
          <th>Warna</th>
          <th>Jumlah</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?= $row['no']; ?></td>
            <td><?= $row['nama_merek']; ?></td>
            <td><?= $row['warna']; ?></td>
            <td><?= $row['jumlah']; ?></td>
            <td>
              <a href="index.php?delete=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>