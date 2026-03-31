# PHP Form Assignment - Öğrenci Talep Formu

Bu proje, Bilecik Şeyh Edebali Üniversitesi konseptiyle hazırlanmış, veri doğrulama ve güvenlik işlemlerini barındıran PHP tabanlı bir öğrenci talep formudur. Bir üniversite veya kurs ödevi/projesi olarak tasarlanmıştır.

## 🚀 Özellikler

* **Güvenli Veri İşleme:** Kullanıcıdan alınan veriler `htmlspecialchars()`, `strip_tags()` ve `trim()` fonksiyonlarıyla temizlenerek XSS (Cross-Site Scripting) saldırılarına karşı korunmuştur.
* **Sunucu Taraflı Doğrulama :** * Zorunlu alan (ad, soyad, talep vb.) kontrolleri.
    * Öğrenci numarasının sadece rakamlardan oluşması için `ctype_digit()` kontrolü.
    * Kampüs (Radio Button) ve Kategori (Select Box) seçimlerinin doğrulanması.
* **Veri Kaybını Önleme :** Form gönderildiğinde bir hata çıkarsa, sayfa yenilendiğinde kullanıcının daha önce girdiği doğru veriler silinmez, inputların içinde kalır.
* **Hata Yönetimi:** Hatalı girilen alanların altında spesifik hata mesajları gösterilir ve ilgili input alanının çerçevesi kızarır (`.hatali` CSS sınıfı ile).
* **Session Yönetimi:** Form başarıyla ve hatasız bir şekilde doldurulduğunda, veriler `$_SESSION` dizisine aktarılır ve kullanıcı `sonuc.php` sayfasına yönlendirilir.
* **Temiz Arayüz :** Harici bir kütüphane kullanılmadan, saf HTML ve CSS ile kurumsal bir üniversite sayfası görünümü elde edilmiştir.

## 🛠️ Kullanılan Teknolojiler

* PHP (Veri işleme, doğrulama, session yönetimi)
* HTML5 (Form yapısı)
* CSS3 (Tasarım ve hata durumlarının görselleştirilmesi)
