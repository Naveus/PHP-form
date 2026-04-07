<!DOCTYPE html>
<html>
<head>
    <title>Basit Kayıt Formu</title>
</head>
<body>
    <h2>Kayıt Formu</h2>
    <form method="POST" action="" enctype="multipart/form-data">
        1. <label for="ad">Ad Soyad (Text):</label> <input type="text" id="ad" name="ad"><br><br>
        
        2. <label for="sifre">Şifre (Password):</label> <input type="password" id="sifre" name="sifre"><br><br>
        
        3. <label for="email">E-posta (Email):</label> <input type="email" id="email" name="email"><br><br>
        
        4. <label for="yas">Yaş (Number):</label> <input type="number" id="yas" name="yas"><br><br>
        
        5. Cinsiyet (Radio): 
           <input type="radio" id="erkek" name="cinsiyet" value="Erkek"> <label for="erkek">Erkek</label>
           <input type="radio" id="kadin" name="cinsiyet" value="Kadın"> <label for="kadin">Kadın</label><br><br>
        
        6. Hobiler (Checkbox):
           <input type="checkbox" id="kitap" name="hobiler[]" value="Kitap"> <label for="kitap">Kitap</label>
           <input type="checkbox" id="spor" name="hobiler[]" value="Spor"> <label for="spor">Spor</label><br><br>
        
        7. <label for="ulke">Ülke (Select):</label> 
           <select id="ulke" name="ulke">
               <option value="">Seçiniz...</option>
               <option value="Turkiye">Türkiye</option>
               <option value="Amerika">Amerika</option>
               <option value="Almanya">Almanya</option>
           </select><br><br>
        
        8. <label for="dogum">Doğum Tarihi (Date):</label> <input type="date" id="dogum" name="dogum"><br><br>

        9. <label for="saat">Tercih Edilen Saat (Time):</label> <input type="time" id="saat" name="saat"><br><br>
        
        10. <label for="ay">Kayıt Ayı (Month):</label> <input type="month" id="ay" name="ay"><br><br>

        11. <label for="renk">Favori Renk (Color):</label> <input type="color" id="renk" name="renk"><br><br>
        
        12. <label for="memnuniyet">Memnuniyet Derecesi (Range):</label> <input type="range" id="memnuniyet" name="memnuniyet" min="1" max="10"><br><br>
        
        13. <label for="dosya">Profil Fotoğrafı (File):</label> <input type="file" id="dosya" name="dosya"><br><br>
        
        14. <label for="mesaj">Hakkınızda (Textarea):</label><br>
            <textarea id="mesaj" name="mesaj" rows="4" cols="30"></textarea><br><br>
            
        15. <input type="submit" value="Formu Gönder (Submit)" name="gonder">
    </form>

    <hr>

    <?php
    if (isset($_POST['gonder'])) {
        echo "<h3>Gönderilen Bilgiler:</h3>";
        echo "<strong>Ad:</strong> " . htmlspecialchars($_POST['ad'] ?? '') . "<br>";
        echo "<strong>Şifre:</strong> " . htmlspecialchars($_POST['sifre'] ?? '') . "<br>";
        echo "<strong>Email:</strong> " . htmlspecialchars($_POST['email'] ?? '') . "<br>";
        echo "<strong>Yaş:</strong> " . htmlspecialchars($_POST['yas'] ?? '') . "<br>";
        echo "<strong>Cinsiyet:</strong> " . htmlspecialchars($_POST['cinsiyet'] ?? '') . "<br>";
        
        $hobiler = $_POST['hobiler'] ?? [];
        echo "<strong>Hobiler:</strong> " . htmlspecialchars(implode(", ", $hobiler)) . "<br>";
        
        echo "<strong>Ülke:</strong> " . htmlspecialchars($_POST['ulke'] ?? '') . "<br>";
        echo "<strong>Doğum Tarihi:</strong> " . htmlspecialchars($_POST['dogum'] ?? '') . "<br>";
        echo "<strong>Saat:</strong> " . htmlspecialchars($_POST['saat'] ?? '') . "<br>";
        echo "<strong>Ay:</strong> " . htmlspecialchars($_POST['ay'] ?? '') . "<br>";
        echo "<strong>Favori Renk:</strong> " . htmlspecialchars($_POST['renk'] ?? '') . "<br>";
        echo "<strong>Memnuniyet:</strong> " . htmlspecialchars($_POST['memnuniyet'] ?? '') . "<br>";
        
        $dosyaAdi = (isset($_FILES['dosya']['name']) && $_FILES['dosya']['name'] != '') ? $_FILES['dosya']['name'] : 'Dosya seçilmedi';
        echo "<strong>Dosya:</strong> " . htmlspecialchars($dosyaAdi) . "<br>";
        
        echo "<strong>Hakkında:</strong> " . nl2br(htmlspecialchars($_POST['mesaj'] ?? '')) . "<br>";
    }
    ?>
</body>
</html>
