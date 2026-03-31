<?php
session_start();

function temizle($veri)
{
    return htmlspecialchars(strip_tags(trim($veri)), ENT_QUOTES, 'UTF-8');
}

$hatalar = [];
$degerler = [
    'isim' => '',
    'soyisim' => '',
    'email' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $degerler['isim'] = temizle($_POST['isim'] ?? '');
    $degerler['soyisim'] = temizle($_POST['soyisim'] ?? '');
    $degerler['email'] = temizle($_POST['email'] ?? '');
    $sifre = $_POST['sifre'] ?? '';
    $sifre_tekrar = $_POST['sifre_tekrar'] ?? '';

    if ($degerler['isim'] === '') {
        $hatalar['isim'] = 'İsim alanı zorunludur.';
    }

    if ($degerler['soyisim'] === '') {
        $hatalar['soyisim'] = 'Soyisim alanı zorunludur.';
    }

    if ($degerler['email'] === '') {
        $hatalar['email'] = 'E-posta alanı zorunludur.';
    } elseif (!filter_var($degerler['email'], FILTER_VALIDATE_EMAIL)) {
        $hatalar['email'] = 'Geçerli bir e-posta adresi giriniz.';
    }

    if ($sifre === '') {
        $hatalar['sifre'] = 'Şifre alanı zorunludur.';
    } elseif (strlen($sifre) < 6) {
        $hatalar['sifre'] = 'Şifre en az 6 karakter olmalıdır.';
    }

    if ($sifre_tekrar === '') {
        $hatalar['sifre_tekrar'] = 'Şifre tekrar alanı zorunludur.';
    } elseif ($sifre !== $sifre_tekrar) {
        $hatalar['sifre_tekrar'] = 'Şifreler birbiriyle eşleşmiyor.';
    }

    if (empty($hatalar)) {
        $_SESSION['form_data'] = $degerler;
        header('Location: sonuc.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Üyelik Kaydı</title>
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
            padding: 40px;
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
            animation: fadeIn 0.8s ease-out;
            box-sizing: border-box;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h1 {
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 10px;
            text-align: center;
            background: linear-gradient(to right, #38bdf8, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        p.subtitle {
            text-align: center;
            color: #94a3b8;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-row {
            display: flex;
            gap: 15px;
        }

        .form-row .form-group {
            flex: 1;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #cbd5e1;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 12px 15px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
            font-family: inherit;
            font-size: 14px;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #38bdf8;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.2);
        }

        input.hatali {
            border-color: #ef4444;
        }

        input.hatali:focus {
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2);
        }

        .hata-mesaji {
            color: #f87171;
            font-size: 12px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: linear-gradient(to right, #38bdf8, #6366f1);
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            margin-top: 10px;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(99, 102, 241, 0.4);
        }

        button:active {
            transform: translateY(0);
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Kayıt Ol</h1>
        <p class="subtitle">Premium dünyaya adım atmak için hesabını oluştur.</p>

        <form action="index.php" method="POST">
            <div class="form-row">
                <div class="form-group">
                    <label for="isim">Ad</label>
                    <input type="text" id="isim" name="isim" value="<?= $degerler['isim'] ?>"
                        class="<?= isset($hatalar['isim']) ? 'hatali' : '' ?>" placeholder="Adınız">
                    <?php if (isset($hatalar['isim'])): ?>
                        <div class="hata-mesaji">&#9888; <?= $hatalar['isim'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="soyisim">Soyad</label>
                    <input type="text" id="soyisim" name="soyisim" value="<?= $degerler['soyisim'] ?>"
                        class="<?= isset($hatalar['soyisim']) ? 'hatali' : '' ?>" placeholder="Soyadınız">
                    <?php if (isset($hatalar['soyisim'])): ?>
                        <div class="hata-mesaji">&#9888; <?= $hatalar['soyisim'] ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="email">E-posta Adresi</label>
                <input type="text" id="email" name="email" value="<?= $degerler['email'] ?>"
                    class="<?= isset($hatalar['email']) ? 'hatali' : '' ?>" placeholder="ornek@mail.com">
                <?php if (isset($hatalar['email'])): ?>
                    <div class="hata-mesaji">&#9888; <?= $hatalar['email'] ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="sifre">Şifre</label>
                <input type="password" id="sifre" name="sifre" class="<?= isset($hatalar['sifre']) ? 'hatali' : '' ?>"
                    placeholder="••••••••">
                <?php if (isset($hatalar['sifre'])): ?>
                    <div class="hata-mesaji">&#9888; <?= $hatalar['sifre'] ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="sifre_tekrar">Şifre Tekrar</label>
                <input type="password" id="sifre_tekrar" name="sifre_tekrar"
                    class="<?= isset($hatalar['sifre_tekrar']) ? 'hatali' : '' ?>" placeholder="••••••••">
                <?php if (isset($hatalar['sifre_tekrar'])): ?>
                    <div class="hata-mesaji">&#9888; <?= $hatalar['sifre_tekrar'] ?></div>
                <?php endif; ?>
            </div>

            <button type="submit">Hesabımı Oluştur</button>
        </form>
    </div>

</body>

</html>