
#  Yapay Zekâ Tabanlı Çoklu Hastalık Teşhis ve Klinik Karar Asistanı

Bu proje Sakarya İl Sağlık Müdürlüğü tarafından düzenlenen "Sağlıkta İnovasyon" yarışması için,
**Eskişehir Sabiha Gökçen Mesleki ve Teknik Anadolu Lisesi** 
Öğrencileri ***Esila Tuğba Giderbaş, Sude Tekinkoca, Berkay Karaman ve Gönül Ceren Sine*** tarafından hazırlanmıştır. 

## Özet 
Bu proje, sağlık hizmetlerinde yapay zekâ destekli erken tanıyı kolaylaştırmak amacıyla geliştirilen yapay zekâ tabanlı teşhis ve karar destek asistanının prototipini sunmaktadır. Platform; kullanıcı veya uzman hekimlerin görüntü yükleyerek anında sonuç almasını sağlayan modern bir ara yüz ve bir REST API altyapısı üzerine kurulmuştur. Sistemin yeteneklerini göstermek ve gerçek kullanım senaryolarını modellemek amacıyla iki kritik hastalık alanı, cilt hastalıkları ve diyabetik retinopati (DR) örnek uygulama olarak seçilmiştir. Deri hastalıkları ve DR, erken tanı konulmadığında bireylerin yaşam kalitesini önemli ölçüde azaltan yaygın sağlık sorunlarıdır. Deri hastalıkları psikolojik ve sosyal etkiler yaratabilirken, DR ise yetişkinlerde geri dönüşsüz görme kaybının en önemli nedenlerinden biri olarak kabul edilmektedir. Dünya genelinde görülen her üç kanser vakasından birinin cilt kanseri olduğunu bilinmektedir (WHO, 2023). Ayrıca Birben (2018), çocuk hastalarda deri hastalıklarına başvurularda 2014–2017 yılları arasında %91 artış olduğunu belirtmiştir. Öte yandan DR, küresel körlük nedenleri arasında üst sıralarda yer almakta; 37 milyon görme kaybı vakasının yaklaşık 1,8 milyonunun diyabete bağlı olduğu ifade edilmektedir (Shrestha, Kaiti, & Shyangbo, 2022). İnan (2014), diyabet hastalarında görme kaybı riskinin normal popülasyona kıyasla 25 kat daha yüksek olduğunu vurgulamaktadır.

Bu iki hastalığın seçilmesinin temel nedeni, hem toplum sağlığı açısından kritik olmaları hem de görüntü tabanlı yapay zekâ modellerine uygun veri yapıları sunmalarıdır. Cilt hastalıkları modeli %82 doğruluk, DR modeli ise TPU kullanarak geliştirilen model ile %84 doğruluk ile başarılı bir performans sergilemiştir. Ayrıca TPU’nun GPU’ya kıyasla yaklaşık dört kat daha hızlı çalıştığı ancak doğruluk, duyarlılık ve F1 skorlarında anlamlı bir fark oluşturmadığı görülmüştür (p > 0,05). Geliştirilen yapay zekâ asistanı, bu derin öğrenme modellerini yalnızca teorik bir çalışma olarak bırakmak yerine, http://medai.sgaiteam.com.tr/ adresinde çalışan bir web uygulaması ve API ile erişilebilir kılmakta, e-Nabız gibi ulusal sağlık platformlarına entegrasyon potansiyeli taşımaktadır. Bu proje, farklı hastalık modellerinin kolayca entegre edilebileceği yerli ve ölçeklenebilir bir yapay zekâ teşhis platformunu için somut bir Ar-Ge ürünü ortaya koymaktadır.

## Kullanılan Teknolojiler
* Projenin model geliştirme aşaması Kaggle platformunda Tesla P100 GPU ve T3 TPU ile TensorFlow ve Keras kütüphaneleri kullanılarak gerçekleştirilmiştir.

* Geliştirilen model kaydedilerek dışarı aktarılmış ve sonrasında API ve web uygulamasına entegrasyonu sağlanmıştır. 

* Web uygulaması Laravel 8 Framework'ü kullanılarak geliştirilmiştir.

* Kullanıcıdan alınan jpg formatın resim dosyası sunucu üzerine kaydedilmekte ve Flask API'ına tahmin için HTTP isteğinde bulunulmaktadır. 

* Flask ile geliştirilen tahmin API'ı yanıt olarak 2 hastalığın alt sınıflarına ait yüzdesel tahmin sonuçlarını döndürmektedir.

* PHP dönen tahmin sonucunu önyüze aktarmaktadır.

* Önyüzde alınan tahmin sonuçları JavaScript ile büyükten küçüğe doğru sıralanarak kullanıcıya sonuç olarak gösterilmektedir.

* Ayrıca uzman veri girişine imkan sağlanmaktadır, bu ekranda uzman hekimlerin teşhis koydukları görseller veri tabanına kaydedilmekte böylelikle veri setinin gelişimine katkı sağlanması amaçlanmaktadır.


## Veri Seti
* Cilt Hastalıkları Veri Setleri: 
- [Skin diseases image dataset](https://www.kaggle.com/datasets/ismailpromus/skin-diseases-image-dataset)
- [DermNet](https://dermnetnz.org/images)
- [Dermatology Atlas](https://www.atlasdermatologico.com.br/browse.jsf)

* Diyabetik Retinopati Veri Setleri: 
- [Resized 2015 & 2019 Blindness Detection Images](https://www.kaggle.com/datasets/benjaminwarner/resized-2015-2019-blindness-detection-images)
- [Messidor-2](https://www.kaggle.com/datasets/mariaherrerot/messidor2preprocess)
- [Aptos 2019 Gaussian Filtered](https://www.kaggle.com/datasets/sovitrath/diabetic-retinopathy-224x224-gaussian-filtered)

# Uygulama

Projenin Web Uygulaması ve API'a buradan ulaşabilirsiniz: [Uygulamanın Yayında Olan Versiyonu](http://medai.sgaiteam.com.tr)

## API EndPoint Listesi

### 1. Resim Dosyası ile Tahmin (predictWithImage)
#### Request (İstek)

`POST /api/predict-dr/` ve `POST /api/predict-skin/` 

    const data = new FormData();
    data.append("image", "../IMG_4895_2.jpg");

    const xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function () {
        if (this.readyState === this.DONE) {
            console.log(this.responseText);
        }
    });

    xhr.open("POST", "http://medai.sgaiteam.com.tr/api/predict-dr");
    xhr.setRequestHeader("Authorization", "Bearer ...");

    xhr.send(data);

#### Response (Yanıt)

    {
        "image": "..\/img\/preds\/api_date_25-05-2023_21-17-01-559948419.jpg",
        "predicts": {
            "0 - No DR": 0.8316075801849365,
            "1 - Hafif": 0.0025978132616728544,
            "2 - Orta": 0.0003459408471826464,
            "3 - Şiddetli": 0.0003996501909568906,
            "4 - Proliferatif": 0.16152003407478333
        }
    }

### 2. Base64 Veri ile Tahmin (predictBase64)
#### Request (İstek)

`POST /api/predict-base64-dr/` ve `POST /api/predict-base64-skin/`

const data = new FormData();
data.append("image", "data:image/jpeg;base64,...");

const xhr = new XMLHttpRequest();
xhr.withCredentials = true;

xhr.addEventListener("readystatechange", function () {
  if (this.readyState === this.DONE) {
    console.log(this.responseText);
  }
});

xhr.open("POST", "http://medai.sgaiteam.com.tr/api/predict-base64-dr");
xhr.setRequestHeader("Accept", "application/json");
xhr.setRequestHeader("Authorization", "Bearer ...");

xhr.send(data);

#### Response (Yanıt)

    {
        "image": "..\/img\/preds\/api_base64_date_25-05-2023_22-29-19-391309081.jpeg",
        "predicts": {
            "0 - No DR": 0.8316075801849365,
            "1 - Hafif": 0.0025978132616728544,
            "2 - Orta": 0.0003459408471826464,
            "3 - Şiddetli": 0.0003996501909568906,
            "4 - Proliferatif": 0.16152003407478333
        }
    }




