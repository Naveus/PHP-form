<?php
session_start();

if (empty($_SESSION['rez_data'])) {
    header('Location: rezervasyon.php');
    exit;
}

$veri = $_SESSION['rez_data'];
unset($_SESSION['rez_data']);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervasyon Başarılı</title>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #ffdf00;
            --card-bg: #fff;
            --text: #1a1a1a;
            --border: 4px solid #1a1a1a;
            --shadow: 8px 8px 0px #1a1a1a;
            --accent: #1dd1a1;
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
            text-align: center;
        }

        h1 {
            font-size: 32px;
            font-weight: 700;
            text-transform: uppercase;
            margin: 0 0 20px 0;
            background: var(--accent);
            border: var(--border);
            padding: 10px;
            display: inline-block;
        }

        .ticket {
            border: 3px dashed var(--text);
            padding: 20px;
            margin: 20px 0;
            background: #f1f2f6;
            text-align: left;
        }

        .ticket-row {
            display: flex;
            justify-content: space-between;
            border-bottom: 2px solid #ddd;
            padding: 12px 0;
            font-size: 16px;
        }

        .ticket-row:last-child {
            border-bottom: none;
        }

        .label {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            color: #555;
        }

        .value {
            font-weight: 700;
            font-size: 15px;
        }

        a.btn {
            display: block;
            width: 100%;
            padding: 15px;
            background: #fff;
            color: var(--text);
            border: var(--border);
            font-family: 'Space Grotesk', sans-serif;
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            text-transform: uppercase;
            text-decoration: none;
            box-sizing: border-box;
            transition: all 0.2s;
            margin-top: 20px;
        }

        a.btn:hover {
            background: var(--text);
            color: #fff;
            box-shadow: 6px 6px 0px var(--accent);
            transform: translate(-2px, -2px);
        }
    </style>
</head>
<body>

<div class="booking-card">
    <h1>BİLET ONAYLANDI!</h1>
    <p>Teşekkürler, rezervasyon bilgilerin aşağıdadır.</p>

    <div class="ticket">
        <div class="ticket-row">
            <span class="label">Misafir:</span>
            <span class="value"><?= $veri['ad_soyad'] ?></span>
        </div>
        <div class="ticket-row">
            <span class="label">Tarih Aralığı:</span>
            <span class="value"><?= date('d.m.Y', strtotime($veri['giris'])) ?> - <?= date('d.m.Y', strtotime($veri['cikis'])) ?></span>
        </div>
        <div class="ticket-row">
            <span class="label">Kişi / Oda Tipi:</span>
            <span class="value"><?= $veri['kisi'] ?> Kişi | <?= $veri['oda'] ?> Oda</span>
        </div>
    </div>

    <a href="rezervasyon.php" class="btn">Yeniden Yap</a>
</div>

</body>
</html>
