<?php
$host     = "db";
$user     = "user_marketing";
$password = "pass_marketing";
$database = "db_marketing";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>