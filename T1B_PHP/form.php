<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üye Kayıt Formu</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: #e9ecef; 
            padding: 30px; 
        }
        .form-kutusu { 
            background: #fff; 
            padding: 25px; 
            width: 100%; 
            max-width: 450px; 
            margin: auto; 
            border: 1px solid #ccc; 
            border-top: 4px solid #007bff;
        }
        h2 { 
            margin-top: 0; 
            color: #333; 
        }
        .satir { 
            margin-bottom: 15px; 
        }
        label { 
            display: block; 
            font-weight: bold; 
            margin-bottom: 5px; 
            color: #555;
            font-size: 14px;
        }
        input[type="text"], select, textarea { 
            width: 100%; 
            padding: 8px; 
            box-sizing: border-box; 
            border: 1px solid #ccc; 
            border-radius: 4px;
        }
        .radyo-grup label {
            display: inline-block;
            margin-right: 15px;
            font-weight: normal;
            font-size: 14px;
        }
        .butonlar { 
            text-align: right; 
            margin-top: 20px;
        }
        button[type="submit"] { 
            padding: 10px 20px; 
            cursor: pointer; 
            background: #28a745; 
            color: #fff; 
            border: none; 
            font-weight: bold;
        }
        button[type="reset"] { 
            padding: 10px 20px; 
            cursor: pointer; 
            background: #dc3545; 
            color: #fff; 
            border: none; 
            font-weight: bold;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<div class="form-kutusu">
    <h2>Üye Kayıt Formu</h2>
    
    <!-- Doğrulamasız, direkt sonuç sayfasına gönderen en basit form yapısı -->
    <form action="form_sonuc.php" method="POST">
        
        <div class="satir">
            <label>TC Kimlik Numaranız:</label>
            <input type="text" name="tc">
        </div>

        <div class="satir">
            <label>Ad Soyad:</label>
            <input type="text" name="ad_soyad">
        </div>

        <div class="satir">
            <label>Bölüm:</label>
            <select name="bolum">
                <option value="Bilgisayar Programcılığı">Bilgisayar Programcılığı</option>
                <option value="Bilgisayar Mühendisliği">Bilgisayar Mühendisliği</option>
                <option value="Yazılım Mühendisliği">Yazılım Mühendisliği</option>
                <option value="Elektrik Elektronik">Elektrik Elektronik</option>
                <option value="Makine Mühendisliği">Makine Mühendisliği</option>
            </select>
        </div>

        <div class="satir">
            <label>Sınıfınız:</label>
            <div class="radyo-grup">
                <label><input type="radio" name="sinif" value="1"> 1. Sınıf</label>
                <label><input type="radio" name="sinif" value="2"> 2. Sınıf</label>
                <label><input type="radio" name="sinif" value="3"> 3. Sınıf</label>
                <label><input type="radio" name="sinif" value="4"> 4. Sınıf</label>
            </div>
        </div>

        <div class="satir">
            <label>İlgili Alanlar (Combobox):</label>
            <select name="ilgili_alan">
                <option value="Web Tasarım">1. Web Tasarım</option>
                <option value="Veritabanı Sistemleri">2. Veritabanı Sistemleri</option>
                <option value="Yapay Zeka">3. Yapay Zeka</option>
                <option value="Siber Güvenlik">4. Siber Güvenlik</option>
                <option value="Mobil Uygulama Geliştirme">5. Mobil Uygulama Geliştirme</option>
                <option value="Oyun Geliştirme">6. Oyun Geliştirme</option>
            </select>
        </div>

        <div class="satir">
            <label>Öz Geçmiş:</label>
            <textarea name="ozgecmis" rows="5"></textarea>
        </div>

        <div class="satir butonlar">
            <button type="reset">Reset</button>
            <button type="submit">Kaydet</button>
        </div>

    </form>
</div>

</body>
</html>
