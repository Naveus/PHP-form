<?php
session_start();


if (empty($_SESSION['form_data'])) {
    header('Location: form.php');
    exit;
}


$isim     = $_SESSION['form_data']['isim'];
$soyisim  = $_SESSION['form_data']['soyisim'];
$okul_no  = $_SESSION['form_data']['okul_no'];
$kampus   = $_SESSION['form_data']['kampus'];
$kategori = $_SESSION['form_data']['kategori'];
$talep    = $_SESSION['form_data']['talep'];


unset($_SESSION['form_data']);

$tarih = date('d.m.Y - H:i');
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talep Alındı – Bilecik Şeyh Edebali Üniversitesi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ececec;
            margin: 0;
            padding: 0;
        }

        .site-header {
            background-color: #1a3a6b;
            color: #ffffff;
            padding: 14px 20px;
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .site-header .logo-circle {
            width: 52px;
            height: 52px;
            background-color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            flex-shrink: 0;
        }

        .site-header .header-text h2 {
            font-size: 17px;
            margin: 0;
            font-weight: bold;
        }

        .site-header .header-text p {
            font-size: 12px;
            margin: 2px 0 0;
            opacity: 0.8;
        }

        .page-content {
            max-width: 560px;
            margin: 30px auto;
            padding: 0 15px 40px;
        }

        .sayfa-yolu {
            font-size: 12px;
            color: #666;
            margin-bottom: 14px;
        }

        .card {
            background-color: #ffffff;
            border: 1px solid #cccccc;
            border-top: 3px solid #1a3a6b;
            padding: 24px;
        }

        .card h1 {
            font-size: 18px;
            color: #1a3a6b;
            margin: 0 0 4px;
        }

        .card .alt-baslik {
            font-size: 13px;
            color: #777;
            margin: 0 0 20px;
            padding-bottom: 14px;
            border-bottom: 1px solid #e5e5e5;
        }

        .basari-mesaj {
            background-color: #e8f5e9;
            border: 1px solid #a5d6a7;
            color: #2e7d32;
            padding: 8px 12px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        table th,
        table td {
            border: 1px solid #cccccc;
            padding: 8px 10px;
            text-align: left;
            vertical-align: top;
        }

        table th {
            background-color: #f0f4fa;
            color: #1a3a6b;
            width: 150px;
            font-size: 13px;
        }

        table td {
            color: #444444;
            word-break: break-word;
        }

        .tarih {
            font-size: 12px;
            color: #999;
            margin-top: 12px;
        }

        a.geri {
            display: inline-block;
            margin-top: 16px;
            font-size: 13px;
            color: #1a3a6b;
            text-decoration: none;
        }

        a.geri:hover {
            text-decoration: underline;
        }

        .site-footer {
            text-align: center;
            font-size: 11px;
            color: #999;
            padding: 16px;
            border-top: 1px solid #ddd;
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>

<div class="site-header">
    <div class="logo-circle">🏛️</div>
    <div class="header-text">
        <h2>Bilecik Şeyh Edebali Üniversitesi</h2>
        <p>Öğrenci İşleri Daire Başkanlığı</p>
    </div>
</div>

<div class="page-content">
    <div class="sayfa-yolu">Ana Sayfa &rsaquo; Öğrenci İşleri &rsaquo; Talep Formu &rsaquo; Sonuç</div>

    <div class="card">
        <h1>Talep Özeti</h1>
        <p class="alt-baslik">Talebiniz sisteme kaydedilmiştir. Aşağıda girdiğiniz bilgiler yer almaktadır.</p>

        <div class="basari-mesaj">&#10003; Talebiniz başarıyla alınmıştır.</div>

        <table>
            <tr>
                <th>Ad Soyad</th>
                <td><?= $isim . ' ' . $soyisim ?></td>
            </tr>
            <tr>
                <th>Öğrenci Numarası</th>
                <td><?= $okul_no ?></td>
            </tr>
            <tr>
                <th>Kampüs</th>
                <td><?= $kampus ?> Kampüsü</td>
            </tr>
            <tr>
                <th>Talep Kategorisi</th>
                <td><?= $kategori ?></td>
            </tr>
            <tr>
                <th>Talep / Açıklama</th>
                <td><?= nl2br($talep) ?></td>
            </tr>
        </table>

        <p class="tarih">Gönderilme tarihi: <?= $tarih ?></p>

        <a href="form.php" class="geri">&larr; Yeni talep oluştur</a>
    </div>
</div>

<div class="site-footer">
    &copy; <?= date('Y') ?> Bilecik Şeyh Edebali Üniversitesi &ndash; Öğrenci İşleri Daire Başkanlığı
</div>

</body>
</html>
