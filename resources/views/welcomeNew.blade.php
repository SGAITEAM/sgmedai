<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Yapay Zekâ Destekli Çoklu Hastalık Teşhis Platformu</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">

</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-0 navbar-advanced">
        <div class="container">
            <a class="navbar-brand mt-0 pt-1 mb-0 pb-1" href="{{ url('/') }}">
                <img src="img/logo3.png" alt="SG AI TEAM" width="80">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="/predict">Teşhis</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/docs">Dökümantasyon</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/abstract">Hakkında</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/api-doc/api-doc.html">API</a>
                    </li>

                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/home">Panel</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Giriş</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Kayıt</a>
                                </li>
                            @endif
                        @endauth
                    @endif

                </ul>

            </div>
        </div>
    </nav>


    <!-- HERO SECTION -->
    <section class="hero pb-5 pt-5">
        <div class="container">
            <div class="row align-items-center">
                <!-- TEXT -->
                <div class="col-lg-8">
                    <h1>Yapay Zekâ Tabanlı Çoklu Hastalık  
                        <br>Teşhis ve Klinik Karar Asistanı</h1>
                    <p style="text-align: justify;">
                        {{-- Cilt hastalıkları ve diyabetik retinopati için derin öğrenme tabanlı hızlı ve güvenilir teşhis sistemi. --}}
                        Bu proje <i>Sakarya İl Sağlık Müdürlüğü tarafından düzenlenen "Sağlıkta İnovasyon"</i> yarışması için 
                        <b>Eskişehir Sabiha Gökçen MTAL </b>öğrencileri tarafından geliştirilmiştir. 
                        Evrişimli sinir ağları ile açık kaynak veritabanlarında bulunan görüntülerle eğitilmiş yapay zeka modelleri ile çalışan bir sağlık karar destek uygulamasıdır. 
                    </p>
                    <a href="/predict" class="btn btn-light btn-lg mt-3 fw-bold">
                        Teşhis Yap <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
                <!-- IMAGE -->
                <div class="col-lg-4 text-center mt-4 mt-lg-0 d-none d-md-block">
                    <img src="/img/header.jpg" class="img-fluid" alt="Eskişehir Sabiha Gökçen MTAL - Medical AI">
                </div>
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <div class="container py-3">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-card shadow-sm">
                    <div class="feature-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <h5 class="fw-bold">AI Teşhis</h5>
                    <p class="text-muted mt-2">
                        Cilt ve retina görüntülerini analiz ederek erken teşhis sağlar.
                    </p>
                    <a href="/predict" class="btn btn-primary">Git</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card shadow-sm">
                    <div class="feature-icon">
                        <i class="bi bi-clipboard-data"></i>
                    </div>
                    <h5 class="fw-bold">Uzman Paneli</h5>
                    <p class="text-muted mt-2">
                        Uzmanların veri yükleyebildiği ve sistemi geliştirdiği yönetim paneli.
                    </p>
                    <a href="/home" class="btn btn-primary">Git</a>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card shadow-sm">
                    <div class="feature-icon">
                        <i class="bi bi-journal-text"></i>
                    </div>
                    <h5 class="fw-bold">Dökümantasyon</h5>
                    <p class="text-muted mt-2">
                        Sistem kullanımı için kapsamlı açıklamalar ve rehberler.
                    </p>
                    <a href="/docs" class="btn btn-primary">Git</a>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3">
                <div class="feature-card shadow-sm">
                    <div class="feature-icon">
                        <i class="bi bi-info-circle"></i>
                    </div>
                    <h5 class="fw-bold">Hakkında</h5>
                    <p class="text-muted mt-2">
                        Yapay zeka modeli ve proje hakkında detaylı bilgi.
                    </p>
                    <a href="/abstract" class="btn btn-primary">Git</a>
                </div>
            </div>
            
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="text-center py-1 text-muted small">
        Yapay Zekâ Destekli Hastalık Teşhis Sistemi — v1.0  
        <br> (PHP {{ PHP_VERSION }} — Python 3.9)
        <div class="mt-3">
            <a href="https://github.com/SGAITEAM/sgmedai" target="_blank" class="me-2">
                <i class="bi bi-github fs-3"></i>
            </a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

<style>
    body {
        font-family: 'Nunito', sans-serif;
        background: #f5f7fa;
    }

    .hero {
        background: #0d47a1;
        padding: 80px 0;
        color: white;
    }

    .hero h1 {
        font-size: 2.7rem;
        font-weight: 900;
        line-height: 1.2;
    }

    .hero p {
        font-size: 1.2rem;
        opacity: 0.9;
        margin-top: 15px;
    }

    .feature-card {
        border-radius: 16px;
        padding: 25px;
        background: white;
        border: none;
        transition: 0.25s;
    }

    .feature-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }

    .feature-icon {
        font-size: 2.5rem;
        background: #e3f2fd;
        color: #0d47a1;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 15px;
        display: inline-block;
    }

    .navbar-advanced {
        /* background: linear-gradient(90deg, #0d47a1, #1976d2); */
        padding: 12px 0;
        box-shadow: 0 4px 12px rgba(0,0,0,0.18);
    }

    .navbar-advanced .navbar-brand {
        color: #0d47a1 !important;
        font-weight: 800;
        letter-spacing: 0.5px;
    }

    .navbar-advanced .nav-link {
        color: #1976d2 !important;
        /* font-weight: 600; */
        margin-left: 10px;
        padding-bottom: 4px;
        transition: 0.2s;
        border-bottom: 2px solid transparent;
    }

    .navbar-advanced .nav-link:hover {
        color: #f652a0 !important;
        border-bottom: 2px solid #f652a0;
    }

    .navbar-advanced .nav-link.active {
        color: #f652a0 !important;
        border-bottom: 2px solid #f652a0;
    }

    .navbar-toggler {
        border-color: rgba(255,255,255,0.5);
    }
    .navbar-toggler-icon {
        filter: brightness(100);
    }
</style>
</html>
