<?php
session_start();

// Proteksi Halaman: Jika belum login, tendang ke login.php
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';
// Mengambil data terbaru dari tabel leads
$result = mysqli_query($conn, "SELECT * FROM leads ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control Center | DigitalBoost Admin</title>
    
    <!-- Bootstrap 5 & Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700&family=Poppins:wght@300;400&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --dark-bg: #0a0a0c;
            --card-bg: #151518;
            --accent-color: #8a2be2;
            --text-secondary: #a0a0a0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark-bg);
            color: #ffffff;
            padding-top: 50px;
        }

        h2 { font-family: 'Space Grotesk', sans-serif; letter-spacing: 1px; }

        .admin-card {
            background: var(--card-bg);
            border: 1px solid rgba(255,255,255,0.05);
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }

        .table {
            color: #ffffff;
            border-color: #2d2d35;
        }

        .table thead {
            background-color: rgba(138, 43, 226, 0.1);
            color: var(--accent-color);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(255,255,255,0.02);
            color: #ffffff;
        }

        .badge-service {
            background: linear-gradient(135deg, #8a2be2 0%, #4b0082 100%);
            border: none;
            padding: 8px 15px;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .status-indicator {
            width: 10px;
            height: 10px;
            background: #00ff88;
            border-radius: 50%;
            display: inline-block;
            margin-right: 10px;
            box-shadow: 0 0 10px #00ff88;
        }

        .btn-back {
            color: var(--text-secondary);
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-back:hover { color: var(--accent-color);
        }
        .btn-logout {
            color: #ff4d4d;
            border: 1px solid #ff4d4d;
            padding: 5px 15px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 0.75rem;
            transition: 0.3s;
        }
        .btn-logout:hover {
            background: #ff4d4d;
            color: white;
        }
        .btn-reply {
            background: #22c55e;
            color: white;
            padding: 5px 12px;
            border-radius: 50px;
            text-decoration: none;
            font-size: 0.7rem;
            font-weight: bold;
            transition: 0.3s;
            border: none;
            display: inline-block;
        }

        .btn-reply:hover {
            background: #16a34a;
            color: white;
            box-shadow: 0 0 10px rgba(34, 197, 94, 0.5);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <a href="index.php" class="btn-back small">← KEMBALI KE TERMINAL UTAMA</a>
            <h2 class="fw-bold mt-2"><span class="status-indicator"></span>LEADS CONTROL CENTER</h2>
        </div>
        <div class="col-md-6 text-md-end">
            <span class="text-secondary small">SISTEM AKTIF: 2026.v3</span>
            <!-- Tombol Logout -->
            <a href="logout.php" class="btn-logout">LOGOUT ACCESS</a>
        </div>
    </div>

    <div class="admin-card">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th class="border-0">ID</th>
                        <th class="border-0">CLIENT NAME</th>
                        <th class="border-0">EMAIL</th>
                        <th class="border-0">STRATEGY</th>
                        <th class="border-0">BUSINESS DETAIL</th>
                        <th class="border-0">TIMESTAMP</th>
                        <th class="border-0">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)) : ?>
                    <tr style="border-bottom: 1px solid #2d2d35;">
                        <td class="fw-bold text-secondary">#<?= $row['id']; ?></td>
                        <td><?= htmlspecialchars($row['nama']); ?></td>
                        <td class="text-secondary"><?= htmlspecialchars($row['email']); ?></td>
                        <td><span class="badge badge-service text-uppercase"><?= htmlspecialchars($row['layanan']); ?></span></td>
                        <td class="small"><?= htmlspecialchars($row['pesan']); ?></td>
                        <td class="small text-secondary"><?= $row['tanggal']; ?></td>
                        <td>
                            <a href="mailto:<?= $row['email']; ?>?subject=Balasan DigitalBoost Agency&body=Halo <?= htmlspecialchars($row['nama']); ?>," class="btn-reply">
                            REPLY
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        
        <?php if(mysqli_num_rows($result) == 0) : ?>
            <div class="text-center py-5">
                <p class="text-secondary">BELUM ADA DATA MASUK KE SISTEM.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>