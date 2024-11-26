<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pegawai_id = $_POST['pegawai_id'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $query = "INSERT INTO absensi (pegawai_id, tanggal, status) VALUES ('$pegawai_id', '$tanggal', '$status')";
    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php");
    } else {
        $error = "Gagal menambah data.";
    }
}

$queryPegawai = "SELECT * FROM pegawai";
$resultPegawai = mysqli_query($conn, $queryPegawai);
?>

<form method="POST" action="">
    <select name="pegawai_id" required>
        <option value="">Pilih Pegawai</option>
        <?php while ($pegawai = mysqli_fetch_assoc($resultPegawai)) { ?>
            <option value="<?= $pegawai['id']; ?>"><?= $pegawai['nama']; ?></option>
        <?php } ?>
    </select>
    <input type="date" name="tanggal" required>
    <select name="status" required>
        <option value="Hadir">Hadir</option>
        <option value="Izin">Izin</option>
        <option value="Sakit">Sakit</option>
        <option value="Alfa">Alfa</option>
    </select>
    <button type="submit">Simpan</button>
</form>