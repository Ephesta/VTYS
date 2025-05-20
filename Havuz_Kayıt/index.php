<?php
session_start();
if (!isset($_SESSION['kullanici_id'])) {
    header("Location: login.php");
    exit;
}
$rol = $_SESSION['rol'];
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Üye Ekle</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
    <h1>Havuz Üyelik Sistemi</h1>
    <div class="menu">
    <a href="uyeler.php" class="btn">Üyeleri Görüntüle</a>
    <a href="cikis.php" class="btn">Çıkış Yap</a>
    </div>

</div>

<div class="container">
    <form action="uye_ekle.php" method="post">
        <h2>Yeni Üye</h2>

        <label>Ad:</label>
        <input type="text" name="ad" required>

        <label>Soyad:</label>
        <input type="text" name="soyad" required>

        <label>TC No:</label>
        <input type="text" name="tc_no" required>

        <label>Doğum Tarihi:</label>
        <input type="date" name="dogum_tarihi" required>

        <label>Telefon:</label>
        <input type="text" name="telefon" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <div class="form-group">
            <div>
                <label>Üyelik Tipi:</label>
                <select name="uyelik_tipi" required>
                    <option value="uye">Üye</option>
                    <?php if ($rol === 'yonetici'): ?>
                        <option value="personel">Personel</option>
                    <?php endif; ?>
                </select>
            </div>

            <div>
                <label>Üyelik Paketi:</label>
                <select name="paket_suresi" required>
                    <option value="15">15 Günlük</option>
                    <option value="30">30 Günlük</option>
                    <option value="60">60 Günlük</option>
                </select>
            </div>
        </div>

        <button type="submit">Kaydı Oluştur</button>
    </form>
</div>

</body>
</html>
