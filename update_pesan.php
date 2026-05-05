<?php
// Menyambungkan ke database
include 'koneksi.php';

// Cek apakah ada data yang dikirim dari form thanks.php
if (isset($_POST['catatan_tambahan'])) {
    $catatan = mysqli_real_escape_string($conn, $_POST['catatan_tambahan']);
    
    // Mencari ID terakhir yang masuk ke tabel 'leads' secara otomatis
    $res = mysqli_query($conn, "SELECT id FROM leads ORDER BY id DESC LIMIT 1");
    $row = mysqli_fetch_assoc($res);
    $id_terakhir = $row['id'];

    if ($id_terakhir) {
        // Gabungkan pesan lama dengan catatan tambahan baru
        $query = "UPDATE leads SET pesan = CONCAT(pesan, ' | Tambahan: ', '$catatan') WHERE id = '$id_terakhir'";
        
        if (mysqli_query($conn, $query)) {
            // Jika berhasil, munculkan alert lalu balik ke beranda
            echo "<script>
                    alert('Berhasil! Catatan tambahan Anda telah tersimpan.');
                    window.location.href='index.php';
                    </script>";
            exit;
        } else {
            // Jika ada error database
            echo "Gagal Update: " . mysqli_error($conn);
        }
    } else {
        echo "Error: Data tidak ditemukan di database.";
    }
} else {
    // Jika mencoba akses file ini secara langsung tanpa klik tombol
    header("Location: index.php");
    exit;
}
?>