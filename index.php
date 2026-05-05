<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigitalBoost Agency | Next-Gen Marketing Terminal</title>
    
    <!-- Bootstrap 5 & Google Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;500;700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- AOS Library (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- TAMBAHAN: Library Typed.js untuk Efek Tulisan Berjalan -->
    <script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #8a2be2 0%, #4b0082 100%);
            --glass-bg: rgba(255, 255, 255, 0.05);
            --dark-body: #0a0a0c;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark-body);
            color: #ffffff;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        h1, h2, h3, h4 { font-family: 'Space Grotesk', sans-serif; }

        /* Navbar Glassmorphism */
        .navbar {
            background: rgba(10, 10, 12, 0.8);
            backdrop-filter: blur(15px);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        /* Hero Section */
        .hero-section {
            height: 100vh;
            display: flex;
            align-items: center;
            background: radial-gradient(circle at top right, rgba(138, 43, 226, 0.15), transparent),
                        radial-gradient(circle at bottom left, rgba(75, 0, 130, 0.15), transparent);
        }

        .hero-title {
            font-size: clamp(2.5rem, 8vw, 4.5rem);
            font-weight: 700;
            background: linear-gradient(to right, #fff, #8a2be2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            min-height: 1.2em; /* Menjaga tinggi agar tidak goyang saat mengetik */
        }

        /* Style Baru untuk Tulisan Berjalan di Navigasi */
        #typed-nav {
            color: #8a2be2;
            font-size: 0.85rem;
            font-weight: 600;
            margin-right: 15px;
            letter-spacing: 1px;
        }

        /* Service Cards Futuristik */
        .service-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 24px;
            padding: 40px;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            cursor: pointer;
        }

        .service-card:hover {
            background: rgba(255,255,255,0.08);
            transform: translateY(-12px);
            border-color: #8a2be2;
            box-shadow: 0 0 40px rgba(138, 43, 226, 0.25);
        }

        /* Form Control Center */
        .card-form {
            background: #121215;
            border-radius: 30px;
            border: 1px solid rgba(255,255,255,0.08);
        }

        /* Memperbaiki input agar tidak kuning dan estetik */
        .form-control, .form-select, textarea {
            background: #1c1c21 !important;
            border: 1px solid #2d2d35 !important;
            color: #fff !important;
            border-radius: 12px !important;
            padding: 14px !important;
        }

        .form-control:focus {
            background: #25252b !important;
            border-color: #8a2be2 !important;
            box-shadow: 0 0 10px rgba(138, 43, 226, 0.3) !important;
        }

        /* Tombol Canggih */
        .btn-tech {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 16px 40px;
            border-radius: 50px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: 0.4s;
        }

        .btn-tech:hover {
            box-shadow: 0 0 25px rgba(138, 43, 226, 0.5);
            transform: scale(1.02);
            color: white;
        }

        .modal-content {
            background: #0f0f12;
            border: 1px solid rgba(138, 43, 226, 0.3);
            border-radius: 25px;
        }

        .bg-blob {
            position: absolute;
            width: 400px;
            height: 400px;
            background: #8a2be2;
            filter: blur(180px);
            z-index: -1;
            opacity: 0.2;
        }
    </style>
</head>
<body>

<?php if(isset($_GET['status']) && $_GET['status'] == 'sukses'): ?>
    <script>
        alert("Terima kasih! Catatan tambahan Anda telah berhasil diperbarui di database.");
    </script>
    <?php endif; ?>

    <!-- Navigasi -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-3" href="#">DIGITAL<span style="color: #8a2be2;">BOOST</span></a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link px-3" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link px-3" href="#services">Technology</a></li>
    
                    <!-- Navigasi yang diperbaiki agar tombol tidak bergerak -->
                    <li class="nav-item ms-lg-3 d-flex align-items-center">
                        <span id="typed-nav" style="color: #8a2be2; font-weight: 600; font-size: 0.9rem; display: inline-block; width: 140px; 
                    
                        /*Memberikan ruang tetap agar tombol di kanannya tidak geser*/
                        text-align: right; 
                    
                        /* Menjaga jarak tetap dengan tombol Mulai Project */
                        margin-right: 15px;">
                        </span>
                        <a class="btn btn-outline-light rounded-pill px-4 btn-sm" href="#form-section">Mulai Project</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
 
    <div class="bg-blob" style="top: 15%; right: 10%;"></div>
    <div class="bg-blob" style="bottom: 10%; left: 10%;"></div>

    <!-- Hero Section -->
    <header id="home" class="hero-section text-center">
        <div class="container" data-aos="zoom-out" data-aos-duration="1200">
            <!-- INOVASI: Judul Utama Berjalan -->
            <h1 class="hero-title mb-4">
                <span id="typed-hero"></span>
            </h1>
            <p class="lead text-secondary mb-5 fs-5">Kami merancang masa depan bisnis Anda melalui<br>akselerasi data dan teknologi pemasaran tercanggih.</p>
            <a href="#about" class="btn btn-tech">Eksplorasi Profil</a>
        </div>
    </header>

    <!-- Section Profil Agency (About) -->
    <section id="about" class="py-5" style="background: linear-gradient(to bottom, #0a0a0c, #121215);">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h6 class="text-primary fw-bold text-uppercase mt-2">Tentang DigitalBoost</h6>
                    <h2 class="display-5 fw-bold mb-4">Arsitek Pertumbuhan Digital Anda</h2>
                    <p class="text-secondary mb-4" style="text-align: justify;">
                        DigitalBoost bukan sekadar agensi pemasaran biasa. Kami adalah tim ahli teknologi dan kreatif yang berdedikasi untuk mentransformasi bisnis Anda menjadi pemimpin pasar di era digital. 
                    </p>
                    <div class="row g-3 mb-4">
                        <div class="col-6">
                            <div class="p-3 border border-secondary rounded-3 bg-dark">
                                <h4 class="fw-bold text-primary mb-0">99%</h4>
                                <small class="text-secondary">Kepuasan Klien</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="p-3 border border-secondary rounded-3 bg-dark">
                                <h4 class="fw-bold text-primary mb-0">500+</h4>
                                <small class="text-secondary">Proyek Sukses</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0 text-center" data-aos="fade-left">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600" class="img-fluid rounded-5 shadow-lg" alt="Tim DigitalBoost">
                </div>
            </div>
        </div>
    </section>

    <!-- Section Teknologi (Technology) -->
    <section id="services" class="py-5">
        <div class="container py-5">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-5 fw-bold mb-3">Teknologi Kami</h2>
                <div style="width: 60px; height: 3px; background: #8a2be2; margin: 0 auto;"></div>
            </div>
            
            <div class="row g-4 text-center">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card h-100" data-bs-toggle="modal" data-bs-target="#modalSEO">
                        <div class="fs-1 mb-3">⚡</div>
                        <h4 class="mb-3">AI-Powered SEO</h4>
                        <p class="text-secondary small mb-4">Algoritma cerdas yang mempelajari pola pencarian secara real-time.</p>
                        <span class="text-primary small fw-bold">KLIK UNTUK ANALISA &rarr;</span>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card h-100" data-bs-toggle="modal" data-bs-target="#modalAds">
                        <div class="fs-1 mb-3">🎯</div>
                        <h4 class="mb-3">Precision Ads</h4>
                        <p class="text-secondary small mb-4">Targeting mikro yang memetakan perilaku konsumen secara presisi.</p>
                        <span class="text-primary small fw-bold">KLIK UNTUK DATA &rarr;</span>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card h-100" data-bs-toggle="modal" data-bs-target="#modalContent">
                        <div class="fs-1 mb-3">🎬</div>
                        <h4 class="mb-3">Viral Engine</h4>
                        <p class="text-secondary small mb-4">Produksi konten berbasis data emosional untuk jangkauan maksimal.</p>
                        <span class="text-primary small fw-bold">KLIK UNTUK PROFIL &rarr;</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Form (Lengkap dengan Kolom Permintaan) -->
    <section id="form-section" class="py-5">
        <div class="container py-5">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0" data-aos="fade-right">
                    <h2 class="display-4 fw-bold mb-4">Ready to Innovate?</h2>
                    <p class="text-secondary fs-5 mb-4">Sampaikan visi bisnis Anda. Biarkan teknologi kami yang bekerja mewujudkannya.</p>
                </div>
                <div class="col-lg-6 offset-lg-1" data-aos="fade-left">
                    <div class="card card-form p-5 shadow-lg">
                        <form action="simpan.php" method="POST">
                            <div class="mb-4">
                                <label class="form-label text-secondary small fw-bold">NAMA LENGKAP</label>
                                <input type="text" name="nama" class="form-control" placeholder="John Doe" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-secondary small fw-bold">EMAIL BISNIS</label>
                                <input type="email" name="email" class="form-control" placeholder="john@agency.com" required>
                            </div>
                            <div class="mb-4">
                                <label class="form-label text-secondary small fw-bold">PILIH LAYANAN</label>
                                <select name="layanan" class="form-select">
                                    <option value="AI SEO">AI SEO Engine</option>
                                    <option value="Precision Ads">Data-Driven Ads</option>
                                    <option value="Viral Engine">Viral Engine</option>
                                </select>
                            </div>
                            <!-- TAMBAHAN: Kolom Permintaan Pengunjung -->
                            <div class="mb-4">
                                <label class="form-label text-secondary small fw-bold">PERMINTAAN ATAU VISI ANDA</label>
                                <textarea name="pesan" class="form-control" rows="4" placeholder="Tuliskan tujuan Anda di sini..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-tech w-100" onclick="this.disabled=true;this.form.submit();">Kirim Brief Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 border-top border-secondary mt-5">
        <div class="container text-center">
            <p class="text-secondary small">© 2026 DIGITALBOOST NEXT-GEN AGENCY. ALL RIGHTS RESERVED.</p>
        </div>
    </footer>

    <!-- MODAL PORTFOLIO (Contoh) -->
    <div class="modal fade" id="modalSEO" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body p-5">
                    <div class="row align-items-center text-center text-md-start">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <img src="https://images.unsplash.com/photo-1432888498266-38ffec3eaf0a?w=600" class="img-fluid rounded-4 shadow" alt="SEO Analysis">
                        </div>
                        <div class="col-md-6">
                            <h3 class="fw-bold text-primary mb-3">AI SEO RESULTS</h3>
                            <p class="text-secondary">Peningkatan trafik sebesar 200% untuk klien e-commerce melalui optimasi berbasis AI.</p>
                            <button type="button" class="btn btn-outline-light rounded-pill btn-sm mt-3" data-bs-dismiss="modal">Tutup Terminal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inisialisasi AOS (Animasi Scroll)
        AOS.init({ once: true, duration: 1000 });

        // INOVASI: Script untuk Teks Berjalan Utama (Hero)
        var typedHero = new Typed('#typed-hero', {
            strings: ['Accelerate Your Digital Legacy', 'Lead Your Digital Market', 'Innovate Your Business'],
            typeSpeed: 50,
            backSpeed: 30,
            loop: true
        });

        // INOVASI: Script untuk Teks Berjalan di Navigasi (Samping Tombol)
        var typedNav = new Typed('#typed-nav', {
            strings: ['Ready to Start?', 'Join Our Tech', 'Let\'s Scale!'],
            typeSpeed: 70,
            backSpeed: 50,
            loop: true,
            showCursor: false
        });
    </script>
    <!-- MODAL PRECISION ADS -->
    <div class="modal fade" id="modalAds" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background: #0f0f12; border: 1px solid rgba(138, 43, 226, 0.3); border-radius: 25px;">
                <div class="modal-body p-5">
                    <div class="row align-items-center text-center text-md-start">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=600" class="img-fluid rounded-4 shadow" alt="Ads Analysis">
                        </div>
                        <div class="col-md-6">
                            <h3 class="fw-bold" style="color: #8a2be2;">PRECISION ADS DATA</h3>
                            <p class="text-secondary">Sistem periklanan kami menggunakan targeting mikro yang memetakan perilaku konsumen secara presisi untuk konversi maksimal.</p>
                            <button type="button" class="btn btn-outline-light rounded-pill btn-sm mt-3" data-bs-dismiss="modal">Tutup Terminal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL VIRAL ENGINE -->
    <div class="modal fade" id="modalContent" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="background: #0f0f12; border: 1px solid rgba(138, 43, 226, 0.3); border-radius: 25px;">
                <div class="modal-body p-5">
                    <div class="row align-items-center text-center text-md-start">
                        <div class="col-md-6 mb-4 mb-md-0">
                            <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?w=600" class="img-fluid rounded-4 shadow" alt="Viral Engine">
                        </div>
                        <div class="col-md-6">
                            <h3 class="fw-bold" style="color: #8a2be2;">VIRAL ENGINE PROFILE</h3>
                            <p class="text-secondary">Produksi konten berbasis data emosional yang dirancang untuk mendapatkan jangkauan organik maksimal secara masif.</p>
                            <button type="button" class="btn btn-outline-light rounded-pill btn-sm mt-3" data-bs-dismiss="modal">Tutup Terminal</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>