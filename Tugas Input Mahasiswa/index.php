<?php
// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "mahasiswa_db");

// Fungsi tambah data
if (isset($_POST['simpan'])) {
  $no = $_POST['no'];
  $nim = $_POST['nim'];
  $nama = $_POST['nama'];
  $gender = $_POST['gender'];
  $jurusan = $_POST['jurusan'];

  $query = "INSERT INTO mahasiswa (no, nim, nama, gender, jurusan) VALUES ('$no', '$nim', '$nama', '$gender', '$jurusan')";
  mysqli_query($conn, $query);
  header("Location: index.php");
}

// Fungsi hapus data
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $query = "DELETE FROM mahasiswa WHERE id = $id";
  mysqli_query($conn, $query);
  header("Location: index.php");
}

// Ambil data dari database
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Input Data Mahasiswa</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-5">
    <h2 class="text-center mb-4">Form Input Data Mahasiswa</h2>

    <!-- Form Tambah Data -->
    <form action="" method="POST">
      <div class="mb-3">
        <label for="no" class="form-label">No</label>
        <input type="number" class="form-control" id="no" name="no" required>
      </div>
      <div class="mb-3">
        <label for="nim" class="form-label">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" required>
      </div>
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Mahasiswa</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
      </div>
      <div class="mb-3">
        <label for="gender" class="form-label">Gender</label>
        <select class="form-select" id="gender" name="gender" required>
          <option value="" disabled selected>Pilih Gender</option>
          <option value="Laki-Laki">Laki-Laki</option>
          <option value="Perempuan">Perempuan</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <input type="text" class="form-control" id="jurusan" name="jurusan" required>
      </div>
      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
    </form>

    <!-- Tabel Data Mahasiswa -->
    <h3 class="mt-5">Data Mahasiswa</h3>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama Mahasiswa</th>
          <th>Gender</th>
          <th>Jurusan</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?= $row['no']; ?></td>
            <td><?= $row['nim']; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['gender']; ?></td>
            <td><?= $row['jurusan']; ?></td>
            <td>
              <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
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