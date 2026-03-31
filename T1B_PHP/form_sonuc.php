<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sonuç</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            background: #e9ecef; 
            padding: 30px; 
        }
        .sonuc-kutusu { 
            background: #fff; 
            padding: 25px; 
            width: 100%; 
            max-width: 450px; 
            margin: auto; 
            border: 1px solid #ccc; 
            border-top: 4px solid #17a2b8;
        }
        h2 { 
            margin-top: 0; 
            color: #333; 
            margin-bottom: 20px;
        }
        .bilgi { 
            margin-bottom: 12px; 
            border-bottom: 1px dashed #ddd; 
            padding-bottom: 12px;
            font-size: 15px;
            color: #444;
        }
        .bilgi:last-child {
            border-bottom: none;
        }
        .bilgi span.baslik { 
            font-weight: bold; 
            display: block;
            color: #000;
            margin-bottom: 4px;
        }
        .geri-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 8px 15px;
            background: #6c757d;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="sonuc-kutusu">
    <h2>Kaydınız Alındı</h2>

    <!-- İstenen Sırayla Çıktılar -->
    
    <div class="bilgi">
        <span class="baslik">İsim Soyisim:</span>
        <?php echo isset($_POST['ad_soyad']) ? $_POST['ad_soyad'] : ''; ?>
    </div>

    <div class="bilgi">
        <span class="baslik">Öz Geçmiş:</span>
        <?php echo isset($_POST['ozgecmis']) ? nl2br($_POST['ozgecmis']) : ''; ?>
    </div>

    <div class="bilgi">
        <span class="baslik">Sınıf:</span>
        <?php echo isset($_POST['sinif']) ? $_POST['sinif'] . ". Sınıf" : ''; ?>
    </div>

    <div class="bilgi">
        <span class="baslik">Bölüm:</span>
        <?php echo isset($_POST['bolum']) ? $_POST['bolum'] : ''; ?>
    </div>

    <div class="bilgi">
        <span class="baslik">Geri Kalan Bilgiler:</span>
        <strong>TC Kimlik Nu:</strong> <?php echo isset($_POST['tc']) ? $_POST['tc'] : ''; ?><br>
        <strong>İlgili Alan:</strong> <?php echo isset($_POST['ilgili_alan']) ? $_POST['ilgili_alan'] : ''; ?>
    </div>

    <a href="form.php" class="geri-btn">Geri Dön</a>
</div>

</body>
</html>
