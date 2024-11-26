<?php
session_start();
include 'koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM absensi WHERE id='$id'";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $query = "UPDATE absensi SET tanggal='$tanggal', status='$status' WHERE id='$id'";
    if (mysqli_query($conn, $query)) {
        header("Location: dashboard.php");
    } else {
        $error = "Gagal mengupdate data.";
    }
}
?>

<form method="POST" action="">
    <input type="date" name="tanggal" value="<?= $data['tanggal']; ?>" required>
    <select name="status" required>
        <option value="Hadir" <?= $data['status'] == 'Hadir' ? 'selected' : ''; ?>>Hadir</option>
        <option value="Izin" <?= $data['status'] == 'Izin' ? 'selected' : ''; ?>>Izin</option>
        <option value="Sakit" <?= $data['status'] == 'Sakit' ? 'selected' : ''; ?>>Sakit</option>
        <option value="Alfa" <?= $data['status'] == 'Alfa' ? 'selected' : ''; ?>>Alfa</option>
    </select>
    <button type="submit">Update</button>
</form>
