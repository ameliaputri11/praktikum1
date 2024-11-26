<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';

$query = "SELECT a.*, p.nama FROM absensi a JOIN pegawai p ON a.pegawai_id = p.id";
$result = mysqli_query($conn, $query);
?>

<h1>Data Absensi</h1>
<table border="1">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama']; ?></td>
        <td><?= $row['tanggal']; ?></td>
        <td><?= $row['status']; ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
            <a href="delete.php?id=<?= $row['id']; ?>" onclick="return confirm('Hapus data?');">Hapus</a>
        </td>
    </tr>
    <?php } ?>
</table>
<a href="tambah.php">Tambah Absensi</a>
<a href="logout.php">Logout</a>