<?php
session_start();
include 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM absensi WHERE id='$id'";

if (mysqli_query($conn, $query)) {
    header("Location: dashboard.php");
} else {
    echo "Gagal menghapus data.";
}
?>
