<?php
session_start(); // TAMBAHKAN DI SINI (Baris 2)
include 'koneksi.php';

// Menambahkan fungsi mysqli_real_escape_string...
$nama    = mysqli_real_escape_string($conn, $_POST['nama']);
$email   = mysqli_real_escape_string($conn, $_POST['email']);
$layanan = mysqli_real_escape_string($conn, $_POST['layanan']);
$pesan   = mysqli_real_escape_string($conn, $_POST['pesan']);

$query = "INSERT INTO leads (nama, email, layanan, pesan) VALUES ('$nama', '$email', '$layanan', '$pesan')";
$simpan = mysqli_query($conn, $query);

if($simpan) {
    $_SESSION['last_id'] = mysqli_insert_id($conn); // TAMBAHKAN DI SINI (Baris 14)
    // Mengalihkan ke halaman khusus sukses (thanks.php)...
    header("Location: thanks.php");
} else {
    echo "Galat: " . mysqli_error($conn);
}
?>