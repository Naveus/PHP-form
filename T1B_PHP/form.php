<!DOCTYPE html>
<html>
<head>
    <title>Üye Kayıt</title>
</head>
<body>
    <h2>Üye Kayıt Formu</h2>
    
    <form action="form_sonuc.php" method="POST">
        TC Kimlik Nu:<br>
        <input type="text" name="tc"><br><br>
        
        Ad Soyad:<br>
        <input type="text" name="ad_soyad"><br><br>
        
        Bölüm:<br>
        <select name="bolum">
            <option>Bilgisayar Programcılığı</option>
            <option>Makine</option>
            <option>Elektrik</option>
            <option>Muhasebe</option>
        </select><br><br>

        Sınıf:<br>
        <input type="radio" name="sinif" value="1"> 1. Sınıf
        <input type="radio" name="sinif" value="2"> 2. Sınıf
        <input type="radio" name="sinif" value="3"> 3. Sınıf
        <input type="radio" name="sinif" value="4"> 4. Sınıf<br><br>

        İlgili Alanlar:<br>
        <select name="ilgili_alan">
            <option>Web Tasarım</option>
            <option>Veritabanı</option>
            <option>Yapay Zeka</option>
            <option>Siber Güvenlik</option>
            <option>Mobil Uygulama</option>
            <option>Oyun</option>
        </select><br><br>

        Öz Geçmiş:<br>
        <textarea name="ozgecmis" rows="4" cols="30"></textarea><br><br>

        <input type="reset" value="Reset">
        <input type="submit" value="Kaydet">
    </form>
</body>
</html>
