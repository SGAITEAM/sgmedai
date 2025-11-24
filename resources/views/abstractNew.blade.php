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
                            <a class="nav-link " href="/docs">Dökümantasyon</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="/abstract">Hakkında</a>
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
                <h1 class="text-center mt-3">Yapay Zekâ Tabanlı Çoklu Hastalık Teşhis ve Klinik Karar Asistanı</h1>
               <p class="mt-1 text-justify" style="line-height:1.6; text-align: justify;">
                    Bu proje, sağlık hizmetlerinde yapay zekâ destekli erken tanıyı kolaylaştırmak amacıyla geliştirilen yapay zekâ tabanlı teşhis ve karar destek asistanının prototipini sunmaktadır. 
                Platform; kullanıcı veya uzman hekimlerin görüntü yükleyerek anında sonuç almasını sağlayan modern bir ara yüz ve bir REST API altyapısı üzerine kurulmuştur. 
                Sistemin yeteneklerini göstermek ve gerçek kullanım senaryolarını modellemek amacıyla iki kritik hastalık alanı, cilt hastalıkları ve diyabetik retinopati (DR) örnek uygulama olarak seçilmiştir. 
                Deri hastalıkları ve DR, erken tanı konulmadığında bireylerin yaşam kalitesini önemli ölçüde azaltan yaygın sağlık sorunlarıdır. 
                Deri hastalıkları psikolojik ve sosyal etkiler yaratabilirken, DR ise yetişkinlerde geri dönüşsüz görme kaybının en önemli nedenlerinden biri olarak kabul edilmektedir. 
                Dünya genelinde görülen her üç kanser vakasından birinin cilt kanseri olduğunu bilinmektedir (WHO, 2023). Ayrıca Birben (2018), çocuk hastalarda deri hastalıklarına başvurularda 2014–2017 yılları arasında %91 artış olduğunu belirtmiştir. 
                Öte yandan DR, küresel körlük nedenleri arasında üst sıralarda yer almakta; 37 milyon görme kaybı vakasının yaklaşık 1,8 milyonunun diyabete bağlı olduğu ifade edilmektedir 
                (Shrestha, Kaiti, & Shyangbo, 2022). İnan  (2014), diyabet hastalarında görme kaybı riskinin normal popülasyona kıyasla 25 kat daha yüksek olduğunu vurgulamaktadır.
               </p>
                <p class="text-justify" style="line-height:1.6; text-align: justify;">
                        Bu iki hastalığın seçilmesinin temel nedeni, hem toplum sağlığı açısından kritik olmaları hem de görüntü tabanlı yapay zekâ modellerine uygun veri yapıları sunmalarıdır. 
                    Cilt hastalıkları modeli %82 doğruluk, DR modeli ise TPU kullanarak geliştirilen model ile %84 doğruluk ile başarılı bir performans sergilemiştir. 
                    Ayrıca TPU’nun GPU’ya kıyasla yaklaşık dört kat daha hızlı çalıştığı ancak doğruluk, duyarlılık ve F1 skorlarında anlamlı bir fark 
                    oluşturmadığı görülmüştür (p > 0,05). Geliştirilen yapay zekâ asistanı, bu derin öğrenme modellerini yalnızca teorik bir çalışma olarak 
                    bırakmak yerine, <a href="http://medai.sgaiteam.com.tr/">http://medai.sgaiteam.com.tr/</a> adresinde çalışan bir web uygulaması ve API ile erişilebilir kılmakta, 
                    e-Nabız gibi ulusal sağlık platformlarına entegrasyon potansiyeli taşımaktadır. Bu proje, farklı hastalık modellerinin kolayca 
                    entegre edilebileceği yerli ve ölçeklenebilir bir yapay zekâ teşhis platformunu için somut bir Ar-Ge ürünü ortaya koymaktadır.
                </p>

                <p class="text-justify" style="line-height:1.6; text-align: justify;">
                    <h3 class="text-center">Hazırlayanlar</h3>
                    <ul class="list-group list-group-horizontal ">
                        <li class="list-group-item w-25 text-center"><i class="bi bi-person-square"></i> Esila Tuğba Giderbaş <br> <small>Öğrenci</small></li>
                        <li class="list-group-item w-25 text-center"><i class="bi bi-person-square"></i> Sude Tekinkoca <br> <small>Öğrenci</small></li>
                        <li class="list-group-item w-25 text-center"><i class="bi bi-person-square"></i> Berkay Karaman <br> <small>Öğrenci</small></li>
                        <li class="list-group-item w-25 text-center"><i class="bi bi-person-square"></i> Gönül Ceren Sine <br> <small>Öğrenci</small></li>
                    </ul>
                    <ul class="list-group list-group-horizontal mt-3">
                        <li class="list-group-item w-100 text-center"><i class="bi bi-person-square"></i> Abdullah Serkan Canipek <br> <small>Danışman Öğretmen</small></li>
                    </ul>
                </p>
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

