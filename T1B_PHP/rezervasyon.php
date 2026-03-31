<?php
session_start();

$hatalar = [];
$degerler = [
    'ad_soyad' => '',
    'giris'    => '',
    'cikis'    => '',
    'kisi'     => '',
    'oda'      => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $degerler['ad_soyad'] = htmlspecialchars(strip_tags(trim($_POST['ad_soyad'] ?? '')));
    $degerler['giris']    = htmlspecialchars(trim($_POST['giris'] ?? ''));
    $degerler['cikis']    = htmlspecialchars(trim($_POST['cikis'] ?? ''));
    $degerler['kisi']     = htmlspecialchars(trim($_POST['kisi'] ?? ''));
    $degerler['oda']      = htmlspecialchars(trim($_POST['oda'] ?? ''));

    if ($degerler['ad_soyad'] === '') {
        $hatalar['ad_soyad'] = 'Ad Soyad zorunludur.';
    }
    if ($degerler['giris'] === '') {
        $hatalar['giris'] = 'Giriş tarihi zorunludur.';
    }
    if ($degerler['cikis'] === '') {
        $hatalar['cikis'] = 'Çıkış tarihi zorunludur.';
    } elseif ($degerler['giris'] !== '' && strtotime($degerler['giris']) >= strtotime($degerler['cikis'])) {
        $hatalar['cikis'] = 'Çıkış tarihi, giriş tarihinden sonra olmalıdır.';
    }
    if ($degerler['kisi'] === '') {
        $hatalar['kisi'] = 'Kişi sayısı seçiniz.';
    }
    if ($degerler['oda'] === '') {
        $hatalar['oda'] = 'Oda tipi seçiniz.';
    }

    if (empty($hatalar)) {
        $_SESSION['rez_data'] = $degerler;
        header('Location: rezervasyon_sonuc.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sıra Dışı Rezervasyon</title>
    <!-- Modern Bold Font -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #ffdf00;
            --card-bg: #fff;
            --text: #1a1a1a;
            --border: 4px solid #1a1a1a;
            --shadow: 8px 8px 0px #1a1a1a;
            --accent: #ff4757;
        }

        body {
            font-family: 'Space Grotesk', sans-serif;
            background-color: var(--bg);
            background-image: radial-gradient(#1a1a1a 1px, transparent 1px);
            background-size: 20px 20px;
            color: var(--text);
            margin: 0;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;
        }

        .booking-card {
            background-color: var(--card-bg);
            border: var(--border);
            box-shadow: var(--shadow);
            padding: 40px;
            max-width: 500px;
            width: 100%;
            border-radius: 0; 
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .booking-card:hover {
            transform: translate(-4px, -4px);
            box-shadow: 12px 12px 0px #1a1a1a;
        }

        h1 {
            font-size: 36px;
            font-weight: 700;
            text-transform: uppercase;
            margin: 0 0 10px 0;
            border-bottom: var(--border);
            padding-bottom: 15px;
            line-height: 1.1;
        }

        .badge {
            background: var(--text);
            color: #fff;
            padding: 5px 10px;
            font-size: 14px;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .two-col {
            display: flex;
            gap: 20px;
        }

        .two-col .form-group {
            flex: 1;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 15px;
            text-transform: uppercase;
        }

        input, select {
            width: 100%;
            padding: 12px;
            border: var(--border);
            background: #fff;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 15px;
            font-weight: 600;
            color: var(--text);
            box-sizing: border-box;
            transition: all 0.2s;
        }

        input:focus, select:focus {
            outline: none;
            background: #f1f2f6;
            box-shadow: 4px 4px 0px var(--accent);
            transform: translate(-2px, -2px);
        }

        .error-msg {
            color: #fff;
            background-color: var(--accent);
            font-size: 13px;
            font-weight: 600;
            padding: 5px 8px;
            margin-top: 5px;
            border: 2px solid #1a1a1a;
            display: inline-block;
        }

        button {
            width: 100%;
            padding: 18px;
            background: var(--text);
            color: #fff;
            border: var(--border);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            text-transform: uppercase;
            transition: all 0.2s;
            margin-top: 10px;
        }

        button:hover {
            background: var(--accent);
            color: #1a1a1a;
            box-shadow: 6px 6px 0px #1a1a1a;
            transform: translate(-2px, -2px);
        }
    </style>
</head>
<body>

<div class="booking-card">
    <div class="badge">NeoHotel - İstanbul</div>
    <h1>Odanı Ayırt!</h1>

    <form action="rezervasyon.php" method="POST">
        
        <div class="form-group">
            <label for="ad_soyad">Ad Soyad</label>
            <input type="text" id="ad_soyad" name="ad_soyad" value="<?= $degerler['ad_soyad'] ?>" placeholder="Neo Anderson">
            <?php if(isset($hatalar['ad_soyad'])) echo "<div class='error-msg'>{$hatalar['ad_soyad']}</div>"; ?>
        </div>

        <div class="two-col">
            <div class="form-group">
                <label for="giris">Giriş Tarihi</label>
                <input type="date" id="giris" name="giris" value="<?= $degerler['giris'] ?>">
                <?php if(isset($hatalar['giris'])) echo "<div class='error-msg'>{$hatalar['giris']}</div>"; ?>
            </div>
            
            <div class="form-group">
                <label for="cikis">Çıkış Tarihi</label>
                <input type="date" id="cikis" name="cikis" value="<?= $degerler['cikis'] ?>">
                <?php if(isset($hatalar['cikis'])) echo "<div class='error-msg'>{$hatalar['cikis']}</div>"; ?>
            </div>
        </div>

        <div class="two-col">
            <div class="form-group">
                <label for="kisi">Kişi Sayısı</label>
                <select id="kisi" name="kisi">
                    <option value="">Seç...</option>
                    <option value="1" <?= $degerler['kisi']==='1'?'selected':'' ?>>1 Kişi</option>
                    <option value="2" <?= $degerler['kisi']==='2'?'selected':'' ?>>2 Kişi</option>
                    <option value="3" <?= $degerler['kisi']==='3'?'selected':'' ?>>3 Kişi</option>
                    <option value="4+" <?= $degerler['kisi']==='4+'?'selected':'' ?>>4+ Kişi</option>
                </select>
                <?php if(isset($hatalar['kisi'])) echo "<div class='error-msg'>{$hatalar['kisi']}</div>"; ?>
            </div>

            <div class="form-group">
                <label for="oda">Oda Tipi</label>
                <select id="oda" name="oda">
                    <option value="">Seç...</option>
                    <option value="Standart" <?= $degerler['oda']==='Standart'?'selected':'' ?>>Standart</option>
                    <option value="Suite" <?= $degerler['oda']==='Suite'?'selected':'' ?>>Suite</option>
                    <option value="Penthouse" <?= $degerler['oda']==='Penthouse'?'selected':'' ?>>Penthouse</option>
                </select>
                <?php if(isset($hatalar['oda'])) echo "<div class='error-msg'>{$hatalar['oda']}</div>"; ?>
            </div>
        </div>

        <button type="submit">REZERVASYON YAP</button>

    </form>
</div>

</body>
</html>
