<?php
$hatalar = [];
$basari = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ad    = htmlspecialchars(strip_tags(trim($_POST['ad'] ?? '')));
    $email = htmlspecialchars(strip_tags(trim($_POST['email'] ?? '')));
    $konu  = htmlspecialchars(strip_tags(trim($_POST['konu'] ?? '')));
    $mesaj = htmlspecialchars(strip_tags(trim($_POST['mesaj'] ?? '')));

    if ($ad === '') {
        $hatalar['ad'] = 'Ad alanı zorunludur.';
    }
    if ($email === '') {
        $hatalar['email'] = 'E-posta alanı zorunludur.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $hatalar['email'] = 'Geçerli bir e-posta adresi giriniz.';
    }
    if ($konu === '') {
        $hatalar['konu'] = 'Lütfen bir konu seçiniz.';
    }
    if ($mesaj === '') {
        $hatalar['mesaj'] = 'Mesaj alanı zorunludur.';
    }

    if (empty($hatalar)) {
        $basari = true;
        // Normalde burada e-posta gönderme işlemleri vs. olur
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bize Ulaşın</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f7f6;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .contact-card {
            background: #ffffff;
            width: 100%;
            max-width: 500px;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            box-sizing: border-box;
            animation: slideUp 0.6s ease;
        }
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        h2 {
            margin: 0 0 10px;
            color: #2c3e50;
            font-size: 24px;
        }
        p.desc {
            color: #7f8c8d;
            font-size: 14px;
            margin-bottom: 25px;
        }
        .form-group {
            margin-bottom: 18px;
        }
        label {
            display: block;
            font-size: 13px;
            color: #34495e;
            margin-bottom: 6px;
            font-weight: 600;
        }
        input[type="text"], input[type="email"], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #dcdde1;
            border-radius: 8px;
            font-family: inherit;
            font-size: 14px;
            color: #2c3e50;
            background-color: #fcfdfd;
            box-sizing: border-box;
            transition: all 0.3s;
        }
        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #3498db;
            background-color: #ffffff;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }
        textarea {
            resize: vertical;
            height: 100px;
        }
        .error-msg {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
        }
        .error-input {
            border-color: #e74c3c !important;
        }
        button {
            width: 100%;
            padding: 14px;
            background: #3498db;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s, transform 0.2s;
        }
        button:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }
        .success-box {
            background: #e8f8f5;
            border: 1px solid #1abc9c;
            color: #16a085;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="contact-card">
    <?php if ($basari): ?>
        <div class="success-box">
            <strong>Harika! 🎉</strong><br>
            Mesajınız başarıyla iletildi. En kısa sürede size dönüş yapacağız.
        </div>
        <button onclick="window.location.href='iletisim.php'">Yeni Mesaj Gönder</button>
    <?php else: ?>
        <h2>İletişim Formu</h2>
        <p class="desc">Aklınıza takılan her türlü soru veya öneri için bize ulaşabilirsiniz.</p>
        
        <form action="iletisim.php" method="POST">
            <div class="form-group">
                <label for="ad">Adınız Soyadınız</label>
                <input type="text" id="ad" name="ad" value="<?= htmlspecialchars($_POST['ad'] ?? '') ?>" class="<?= isset($hatalar['ad']) ? 'error-input' : '' ?>" placeholder="Örn: Ahmet Yılmaz">
                <?php if(isset($hatalar['ad'])) echo '<div class="error-msg">'.$hatalar['ad'].'</div>'; ?>
            </div>

            <div class="form-group">
                <label for="email">E-posta Adresiniz</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" class="<?= isset($hatalar['email']) ? 'error-input' : '' ?>" placeholder="ornek@mail.com">
                <?php if(isset($hatalar['email'])) echo '<div class="error-msg">'.$hatalar['email'].'</div>'; ?>
            </div>

            <div class="form-group">
                <label for="konu">Konu</label>
                <select id="konu" name="konu" class="<?= isset($hatalar['konu']) ? 'error-input' : '' ?>">
                    <option value="">Seçiniz</option>
                    <option value="Destek" <?= (($_POST['konu'] ?? '') === 'Destek') ? 'selected' : '' ?>>Teknik Destek</option>
                    <option value="Satis" <?= (($_POST['konu'] ?? '') === 'Satis') ? 'selected' : '' ?>>Satış Öncesi Soru</option>
                    <option value="Oneri" <?= (($_POST['konu'] ?? '') === 'Oneri') ? 'selected' : '' ?>>Öneri ve Şikayet</option>
                </select>
                <?php if(isset($hatalar['konu'])) echo '<div class="error-msg">'.$hatalar['konu'].'</div>'; ?>
            </div>

            <div class="form-group">
                <label for="mesaj">Mesajınız</label>
                <textarea id="mesaj" name="mesaj" class="<?= isset($hatalar['mesaj']) ? 'error-input' : '' ?>" placeholder="Size nasıl yardımcı olabiliriz?"><?= htmlspecialchars($_POST['mesaj'] ?? '') ?></textarea>
                <?php if(isset($hatalar['mesaj'])) echo '<div class="error-msg">'.$hatalar['mesaj'].'</div>'; ?>
            </div>

            <button type="submit">Mesajı Gönder</button>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
