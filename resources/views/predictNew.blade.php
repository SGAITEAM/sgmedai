<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Yapay Zeka Hastalık Tahmin Asistanı</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
        <link rel="stylesheet" href="css/spinkit.css">
        <link rel="stylesheet" href="/css/default.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    </head>
    <body class="">
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
                            <a class="nav-link active" href="/predict">Teşhis</a>
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
        <!-- HERO -->
        {{-- <section class="hero py-4 text-white" style="background:#0d47a1;">
            <div class="container text-center">
                <h2 class="fw-bold">Yapay Zekâ Tabanlı Teşhis</h2>
                <p class="mt-2" style="opacity:0.9;">
                    Hastalık türünü seçin ve görüntüyü yükleyerek yapay zekâ tabanlı inceleme başlatın.
                </p>
            </div>
        </section> --}}
        <!-- FORM ALANI -->
        <div class="container py-3">

            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="card shadow-sm p-4">
                        <h5 class="fw-bold mb-3 text-center text-primary">
                            YZ ile Teşhis için Görsel Yükleyin
                        </h5>

                        <!-- Timer -->
                        <div class="text-center mb-3" id="timer" style="display:none;">
                            <span id="dakika">00</span> :
                            <span id="saniye">00</span> :
                            <span id="salise">00</span>
                        </div>

                        <form method="POST" enctype="multipart/form-data" id="image-upload" action="javascript:void(0)">

                            <div class="row g-3">

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Hastalık Türü</label>
                                    <select name="type" id="type" class="form-select" required>
                                        <option value="0">Seçin</option>
                                        <option value="skin">Cilt Hastalıkları</option>
                                        <option value="dr">Diyabetik Retinopati</option>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Görüntü Yükle</label>
                                    <input type="file" name="image" id="image" class="form-control" required>
                                </div>

                                <div class="col-12 mt-3">
                                    <button type="submit" class="btn btn-primary w-100 fw-bold">
                                        İncele
                                    </button>
                                </div>
                            </div>

                            {{ csrf_field() }}
                        </form>

                    </div>

                </div>
            </div>


            <!-- Loader -->
            <div class="row mt-4 justify-content-center" id="loader" style="display:none;">
                {{-- <div class="col-auto text-center">
                    <div class="spinner-border text-primary" role="status"></div>
                    <div class="mt-2 fw-bold text-primary">Yapay zeka tahmini çalışıyor...</div>
                </div> --}}
                <div class="col-1">
                    <div class="sk-grid">
                    <div class="sk-grid-cube"></div>
                    <div class="sk-grid-cube"></div>
                    <div class="sk-grid-cube"></div>
                    <div class="sk-grid-cube"></div>
                    <div class="sk-grid-cube"></div>
                    <div class="sk-grid-cube"></div>
                    <div class="sk-grid-cube"></div>
                    <div class="sk-grid-cube"></div>
                    <div class="sk-grid-cube"></div>
                </div>
                </div>
            </div>

            

            <!-- Sonuç -->
            <div class="row mt-4" id="res" style="display:none;">
                <div class="col-lg-4 mb-3" id="imageBox">
                    <img src="" class="img-thumbnail rounded shadow-md" alt="">
                </div>

                <div class="col-lg-8">
                    <div class="card shadow-sm p-3">
                        <h5 class="fw-bold text-primary mb-3">Sonuçlar</h5>
                        <div class="list-group" id="resultList"></div>
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
<script>
    let saliseEkran = document.querySelector('#salise')
    let saniyeEkran = document.querySelector('#saniye')
    let dakikaEkran = document.querySelector('#dakika')
    let what = 0
    let salise = 00, saniye = 00, dakika = 00
    let sayac
    function start(){
        saliseEkran.innerHTML = '00';
        saniyeEkran.innerHTML = '00';
        dakikaEkran.innerHTML = '00';
        salise = 0;
        saniye = 0; 
        dakika = 0;
        sayac = setInterval(function(){
        salise++
        if(salise == 60){
            salise = 00
            saniye++
            if(saniye == 60){
                saniye = 00
                dakika++
                dakikaEkran.innerHTML = dakika < 10 ? ('0' + dakika) : dakika
            }
            saniyeEkran.innerHTML = saniye < 10 ? ('0' + saniye) : saniye
        }
        saliseEkran.innerHTML = salise < 10 ? ('0' + salise) : salise
        }, 16.6666666666666667)   
    }

    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var _token = $('input[name="_token"]').val();

        $('#image').change(function(){
            let reader = new FileReader();
            // reader.onload = (e) => { 
            //     $('#preview-image-before-upload').attr('src', e.target.result); 
            // }
            reader.readAsDataURL(this.files[0]); 
        });

        $('#image-upload').submit(function(e) {
            e.preventDefault(); 

            let diseaseType = $('#type').val();
            if (!diseaseType || diseaseType === "0") {
                Swal.fire({
                    icon: 'warning',
                    title: 'Uyarı',
                    text: 'Lütfen hastalık türünü seçiniz!',
                });
                return;
            }

            let apiUrl = "";
            if (diseaseType === "skin") {
                apiUrl = "{{ route('predictSkin') }}";
            } else if (diseaseType === "dr") {
                apiUrl = "{{ route('predictDr') }}";
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Geçersiz seçim',
                    text: 'Tanı tipi geçersiz!',
                });
                return;
            }

            var formData = new FormData(this);
            $.ajax({
                type:'POST',
                url: apiUrl,
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('#loader').css('display', 'grid');
                    $('#timer').css('display', 'block');
                    $('#res').css('display', 'none'); 
                    start();
                },
                success: (datas) => {
                    clearInterval(sayac);
                    e.target.reset();
                    $('#loader').css('display', 'none');
                    console.log(datas);

                    let imgUrl = datas[0];
                    let data = datas[1];
                    let result = Object.keys(data).map((key) => parseFloat(data[key]));

                    // 🔹 Tahminleri sırala
                    let indices = result.map((val, idx) => idx);
                    indices.sort((a, b) => result[b] - result[a]);

                    // 🔹 Etiket isimleri dinamik olarak belirle
                    let labels = [];
                    if (diseaseType === "dr") {
                        labels = ["Sağlıklı", "Hafif Derece Diyabetik Retinopati", "Orta Derece Diyabetik Retinopati", "Şiddetli Diyabetik Retinopati", "Proliferatif Diyabetik Retinopati"];
                    } else if (diseaseType === "skin") {
                        labels = ["İnfeksiyöz Deri Hastalığı", "Ekzama", "Akne", "Pigmente Bağlı Deri Hastalığı", "İyi Huylu Deri Tümörü", "Kötü Huylu Deri Tümörü"];
                    }

                    // 🔹 Sonuçları yüzdeye çevir
                    let resultListHtml = '';
                    for (let i = 0; i < indices.length; i++) {
                        let idx = indices[i];
                        let label = labels[idx] || `Sınıf ${idx}`;
                        let percent = (result[idx] * 100).toFixed(2);
                        resultListHtml += `
                            <a href="#" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 style="font-size: 1.2em" class="mb-1">${label}</h5>
                                    <small style="font-size: 1.2em">% ${percent}</small>
                                </div>
                            </a>`;
                    }

                    // 🔹 Görsel ve sonuçları ekle
                    $('#imageBox').html(`<img src="${imgUrl}" class="img-thumbnail" style="min-width: 100%; min-height: 100%;">`);
                    $('#resultList').html(resultListHtml);
                    $('#res').css('display', 'flex');
                },
                error: function(err){
                    console.log(err);
                    Swal.fire({
                        icon: 'error',
                        title: 'Hata!',
                        text: 'Tahmin işlemi sırasında bir hata oluştu.',
                    });
                }
            });
        });


        // SHELL TEST
        /*
            $(document).on('click', '#check', function(){ 
                $.ajax({
                    url:"{{ route('predictRun') }}",
                    method:"POST",
                    data:{
                        _token:_token
                    },
                    beforeSend: function() {
                        $('#loader').css('display', 'block');
                    },
                    success:function(data){
                        $('#loader').css('display', 'none');
                        var result = Object.keys(data).map((key) => parseFloat(data[key]));
                        console.log(result)
                        var len = result.length;
                        var indices = new Array(len);
                        for (var i = 0; i < len; ++i) indices[i] = i;
                        indices.sort(function (a, b) { return result[a] < result[b] ? -1 : result[a] > result[b] ? 1 : 0; });
                        
                        result[0] = Number(result[0]).toFixed(5)
                        result[1] = Number(result[1]).toFixed(5)
                        result[2] = Number(result[2]).toFixed(5)
                        result[3] = Number(result[3]).toFixed(5)
                        result[4] = Number(result[4]).toFixed(5)
                        result[5] = Number(result[5]).toFixed(5)
                        
                        result.sort();
                        result.reverse();
                        indices.reverse();
                        for(let i=0; i<=5 ; i++){
                            if(indices[i] == 0) indices[i] = "İnfeksiyöz Deri Hastalığı"
                            else if(indices[i] == 1) indices[i] = "Ekzama"
                            else if(indices[i] == 2) indices[i] = "Akne"
                            else if(indices[i] == 3) indices[i] = "Pigment"
                            else if(indices[i] == 4) indices[i] = "İyi Huylu Deri Tümörü"
                            else if(indices[i] == 5) indices[i] = "Kötü Huylu Deri Tümörü"
                        }
                        
                        

                        $('#oneName').html(`${indices[0]}`)
                        $('#onePred').html(`% ${Number(result[0]) * 100}`)

                        $('#twoName').html(`${indices[1]}`)
                        $('#twoPred').html(`% ${Number(result[1]) * 100}`)

                        $('#threeName').html(`${indices[2]}`)
                        $('#threePred').html(`% ${Number(result[2]) * 100}`)

                        $('#fourName').html(`${indices[3]}`)
                        $('#fourPred').html(`% ${Number(result[3]) * 100}`)
                        
                        $('#fiveName').html(`${indices[4]}`)
                        $('#fivePred').html(`% ${Number(result[4])* 100}`)

                        $('#sixName').html(`${indices[5]}`)
                        $('#sixPred').html(`% ${Number(result[5])* 100}`)

                        $('#res').css('display', 'flex'); 

                        console.log(indices);
                        console.log(result);
                        
                        
                        // $('#res').html(data)
                    }
                });
            });
        */

    })
</script>



</html>

