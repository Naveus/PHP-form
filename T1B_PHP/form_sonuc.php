<!DOCTYPE html>
<html>
<head>
    <title>Sonuç</title>
</head>
<body>
    <h2>Kayıt Bilgileri</h2>
    
    <b>İsim Soyisim:</b> <?php echo $_POST['ad_soyad'] ?? ''; ?> <br><br>
    
    <b>Öz Geçmiş:</b> <?php echo nl2br($_POST['ozgecmis'] ?? ''); ?> <br><br>
    
    <b>Sınıf:</b> <?php echo $_POST['sinif'] ?? ''; ?>. Sınıf <br><br>
    
    <b>Bölüm:</b> <?php echo $_POST['bolum'] ?? ''; ?> <br><br>
    
    <b>DİĞER BİLGİLER</b><br>
    TC No: <?php echo $_POST['tc'] ?? ''; ?><br>
    İlgili Alan: <?php echo $_POST['ilgili_alan'] ?? ''; ?><br><br>

    <a href="form.php">Geri Dön</a>
</body>
</html>
