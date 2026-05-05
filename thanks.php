<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terima Kasih - DigitalBoost Agency</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            color: white;
        }

        .container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            padding: 3rem;
            border-radius: 24px;
            border: 1px rgba(255, 255, 255, 0.1) solid;
            text-align: center;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            max-width: 500px;
            width: 90%;
            animation: fadeIn 0.8s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .icon-box {
            width: 80px;
            height: 80px;
            background: #22c55e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.4);
            animation: scaleIn 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275) 0.3s both;
        }

        @keyframes scaleIn {
            from { transform: scale(0); }
            to { transform: scale(1); }
        }

        .icon-box i {
            font-size: 40px;
            color: white;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 1rem;
            background: linear-gradient(to right, #60a5fa, #a855f7);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p {
            color: #94a3b8;
            line-height: 1.6;
            margin-bottom: 2rem;
        }

        .btn-home {
            display: inline-block;
            padding: 12px 32px;
            background: #3b82f6;
            color: white;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
        }

        .btn-home:hover {
            background: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(59, 130, 246, 0.4);
        }

        /* Dekorasi Tambahan */
        .circle {
            position: absolute;
            width: 300px;
            height: 300px;
            background: rgba(59, 130, 246, 0.1);
            border-radius: 50%;
            z-index: -1;
        }
    </style>
</head>
<body>
    <div class="circle" style="top: -100px; right: -100px;"></div>
    <div class="circle" style="bottom: -100px; left: -100px;"></div>

    <div class="container">
        <!-- Ikon centang hijau Anda tetap di sini -->
        <div class="icon-box">
            <i class="fas fa-check"></i>
        </div>
    
        <h1>Permintaan Terkirim!</h1>
        <p>Terima kasih telah menghubungi kami. Tim kami akan segera meninjau permintaan Anda.</p>

        <div class="input-section">
            <!-- FORM HARUS MENGARAH KE update_pesan.php -->
            <form action="update_pesan.php" method="POST">
                <label for="user_note" style="display: block; text-align: left; margin-bottom: 8px; color: #94a3b8;">
                    Punya keinginan atau kebutuhan khusus?
                </label>
            
                <!-- Pastikan name="catatan_tambahan" -->
                <textarea id="user_note" name="catatan_tambahan" placeholder="Tuliskan tujuan atau kebutuhan Anda di sini..." 
                    style="width: 100%; padding: 12px; border-radius: 12px; border: 1px solid rgba(255, 255, 255, 0.2); background: rgba(255,255,255,0.05); color: white;"></textarea>
            
                <!-- Tombol tetap ungu, tapi sekarang tipenya SUBMIT -->
                <button type="submit" class="btn-home" style="border: none; cursor: pointer; width: 100%; margin-top: 10px; background: #8a2be2; color: white; padding: 10px; border-radius: 12px; font-weight: bold;">
                    Kirim Catatan Tambahan
                </button>
            </form>
        </div>

        <!-- Link kembali tetap di sini -->
        <a href="index.php" style="display: block; color: #94a3b8; text-decoration: none; font-size: 0.8rem; margin-top: 20px; text-align: center;">
            Kembali ke Beranda
        </a>
    </div>
</body>
</html>