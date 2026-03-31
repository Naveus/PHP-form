<?php
session_start();

if (empty($_SESSION['form_data'])) {
    header('Location: form.php');
    exit;
}

$isim    = $_SESSION['form_data']['isim'];
$soyisim = $_SESSION['form_data']['soyisim'];
$email   = $_SESSION['form_data']['email'];

unset($_SESSION['form_data']);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Başarılı</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f172a, #1e293b, #334155);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
        }

        .container {
            width: 100%;
            max-width: 450px;
            padding: 50px 40px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            text-align: center;
            animation: fadeIn 0.8s ease-out;
            box-sizing: border-box;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: rgba(52, 211, 153, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: #34d399;
            font-size: 40px;
            box-shadow: 0 0 20px rgba(52, 211, 153, 0.4);
            animation: bounceIn 1s cubic-bezier(0.2, 0.8, 0.2, 1);
        }

        @keyframes bounceIn {
            0% { transform: scale(0); opacity: 0; }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); opacity: 1; }
        }

        h1 {
            font-weight: 700;
            font-size: 26px;
            margin-bottom: 10px;
            color: #fff;
        }

        p.message {
            color: #94a3b8;
            font-size: 15px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .user-info {
            background: rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 30px;
            text-align: left;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .info-row:last-child {
            margin-bottom: 0;
        }

        .info-label {
            color: #94a3b8;
        }

        .info-value {
            font-weight: 600;
            color: #fff;
        }

        a.btn {
            display: inline-block;
            text-decoration: none;
            width: calc(100% - 30px);
            padding: 14px 15px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s;
            border: 1px solid rgba(255,255,255,0.1);
        }

        a.btn:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="success-icon">&#10003;</div>
    <h1>Hoş Geldin, <?= $isim ?>!</h1>
    <p class="message">Hesabın başarıyla oluşturuldu. Artık tüm ayrıcalıklardan faydalanabilirsin.</p>

    <div class="user-info">
        <div class="info-row">
            <span class="info-label">Ad Soyad:</span>
            <span class="info-value"><?= $isim . ' ' . $soyisim ?></span>
        </div>
        <div class="info-row">
            <span class="info-label">E-posta:</span>
            <span class="info-value"><?= $email ?></span>
        </div>
    </div>

    <a href="form.php" class="btn">Geri Dön</a>
</div>

</body>
</html>
