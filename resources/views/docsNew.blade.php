<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Proje Sunumu</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="icon" type="image/x-icon" href="/img/favicon.ico">


<link rel="stylesheet" href="/css/default.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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
                            <a class="nav-link active" href="/docs">Dökümantasyon</a>
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

        

        <!-- FORM ALANI -->
        <div class="container py-3">

            <div class="row justify-content-center">
                Proje sunumu eklenecek...
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

</style>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




</html>

