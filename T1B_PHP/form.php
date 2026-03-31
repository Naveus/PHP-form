<?php
session_start();

// Yardımcı fonksiyon: gelen veriyi temizle
function temizle($veri) {
    return htmlspecialchars(strip_tags(trim($veri)), ENT_QUOTES, 'UTF-8');
}

$hatalar  = [];
$degerler = [
    'isim'     => '',
    'soyisim'  => '',
    'okul_no'  => '',
    'kampus'   => '',
    'kategori' => '',
    'talep'    => '',
];

// Form gönderildiyse kontrol et
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Verileri al ve temizle
    $degerler['isim']     = temizle($_POST['isim']     ?? '');
    $degerler['soyisim']  = temizle($_POST['soyisim']  ?? '');
    $degerler['okul_no']  = temizle($_POST['okul_no']  ?? '');
    $degerler['kampus']   = temizle($_POST['kampus']   ?? '');
    $degerler['kategori'] = temizle($_POST['kategori'] ?? '');
    $degerler['talep']    = temizle($_POST['talep']    ?? '');

    // Doğrulama
    if ($degerler['isim'] === '') {
        $hatalar['isim'] = 'Ad alanı zorunludur.';
    }

    if ($degerler['soyisim'] === '') {
        $hatalar['soyisim'] = 'Soyad alanı zorunludur.';
    }

    if ($degerler['okul_no'] === '') {
        $hatalar['okul_no'] = 'Öğrenci numarası zorunludur.';
    } elseif (!ctype_digit($degerler['okul_no'])) {
        $hatalar['okul_no'] = 'Öğrenci numarası yalnızca rakamlardan oluşmalıdır.';
    }

    if ($degerler['kampus'] === '') {
        $hatalar['kampus'] = 'Lütfen bir kampüs seçiniz.';
    }

    if ($degerler['kategori'] === '') {
        $hatalar['kategori'] = 'Lütfen bir kategori seçiniz.';
    }

    if ($degerler['talep'] === '') {
        $hatalar['talep'] = 'Talep alanı zorunludur.';
    }

    // Hata yoksa sonuç sayfasına yönlendir
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
    <title>Öğrenci Talep Formu – Bilecik Şeyh Edebali Üniversitesi</title>
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

        label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 4px;
            color: #333;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 7px 9px;
            font-size: 14px;
            border: 1px solid #aaaaaa;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            background-color: #fafafa;
        }

        input[type="text"].hatali,
        textarea.hatali,
        select.hatali {
            border-color: #cc0000;
        }

        .form-group {
            margin-bottom: 14px;
        }

        .form-row {
            display: flex;
            gap: 12px;
        }

        .form-row .form-group {
            flex: 1;
        }

        .hata-mesaji {
            color: #cc0000;
            font-size: 12px;
            margin-top: 3px;
        }

   
        .radio-grup {
            display: flex;
            gap: 20px;
            margin-top: 4px;
        }

        .radio-grup label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-weight: normal;
            cursor: pointer;
        }

        .radio-grup input[type="radio"] {
            width: auto;
            margin: 0;
            cursor: pointer;
        }

        textarea {
            height: 110px;
            resize: vertical;
        }

        .btn-submit {
            background-color: #1a3a6b;
            color: #ffffff;
            border: none;
            padding: 9px 24px;
            font-size: 14px;
            cursor: pointer;
            font-family: Arial, sans-serif;
        }

        .btn-submit:hover {
            background-color: #14305a;
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
    <div class="sayfa-yolu">Ana Sayfa &rsaquo; Öğrenci İşleri &rsaquo; Talep Formu</div>

    <div class="card">
        <h1>&#128203; Öğrenci Talep Formu</h1>
        <p class="alt-baslik">Lütfen aşağıdaki bilgileri eksiksiz ve doğru şekilde doldurunuz.</p>

        <form action="form.php" method="POST">

            <div class="form-row">
                <div class="form-group">
                    <label for="isim">Ad <span style="color:red">*</span></label>
                    <input
                        type="text"
                        id="isim"
                        name="isim"
                        value="<?= $degerler['isim'] ?>"
                        class="<?= isset($hatalar['isim']) ? 'hatali' : '' ?>"
                    >
                    <?php if (isset($hatalar['isim'])): ?>
                        <div class="hata-mesaji"><?= $hatalar['isim'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="soyisim">Soyad <span style="color:red">*</span></label>
                    <input
                        type="text"
                        id="soyisim"
                        name="soyisim"
                        value="<?= $degerler['soyisim'] ?>"
                        class="<?= isset($hatalar['soyisim']) ? 'hatali' : '' ?>"
                    >
                    <?php if (isset($hatalar['soyisim'])): ?>
                        <div class="hata-mesaji"><?= $hatalar['soyisim'] ?></div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="okul_no">Öğrenci Numarası <span style="color:red">*</span></label>
                <input
                    type="text"
                    id="okul_no"
                    name="okul_no"
                    value="<?= $degerler['okul_no'] ?>"
                    class="<?= isset($hatalar['okul_no']) ? 'hatali' : '' ?>"
                >
                <?php if (isset($hatalar['okul_no'])): ?>
                    <div class="hata-mesaji"><?= $hatalar['okul_no'] ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label>Kampüs <span style="color:red">*</span></label>
                <div class="radio-grup">
                    <label>
                        <input type="radio" name="kampus" value="Merkez"
                            <?= $degerler['kampus'] === 'Merkez' ? 'checked' : '' ?>> Merkez
                    </label>
                    <label>
                        <input type="radio" name="kampus" value="Söğüt"
                            <?= $degerler['kampus'] === 'Söğüt' ? 'checked' : '' ?>> Söğüt
                    </label>
                    <label>
                        <input type="radio" name="kampus" value="Pazaryeri"
                            <?= $degerler['kampus'] === 'Pazaryeri' ? 'checked' : '' ?>> Pazaryeri
                    </label>
                </div>
                <?php if (isset($hatalar['kampus'])): ?>
                    <div class="hata-mesaji"><?= $hatalar['kampus'] ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="kategori">Talep Kategorisi <span style="color:red">*</span></label>
                <select id="kategori" name="kategori" class="<?= isset($hatalar['kategori']) ? 'hatali' : '' ?>">
                    <option value="">-- Kategori Seçiniz --</option>
                    <option value="Ders"     <?= $degerler['kategori'] === 'Ders'     ? 'selected' : '' ?>>Ders</option>
                    <option value="Tavsiye"  <?= $degerler['kategori'] === 'Tavsiye'  ? 'selected' : '' ?>>Tavsiye</option>
                </select>
                <?php if (isset($hatalar['kategori'])): ?>
                    <div class="hata-mesaji"><?= $hatalar['kategori'] ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="talep">Talep / Açıklama <span style="color:red">*</span></label>
                <textarea
                    id="talep"
                    name="talep"
                    class="<?= isset($hatalar['talep']) ? 'hatali' : '' ?>"
                ><?= $degerler['talep'] ?></textarea>
                <?php if (isset($hatalar['talep'])): ?>
                    <div class="hata-mesaji"><?= $hatalar['talep'] ?></div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn-submit">Formu Gönder</button>

        </form>
    </div>
</div>

<div class="site-footer">
    &copy; <?= date('Y') ?> Bilecik Şeyh Edebali Üniversitesi &ndash; Öğrenci İşleri Daire Başkanlığı
</div>

</body>
</html>
