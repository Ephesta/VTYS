<?php session_start(); ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Giriş Yap</h2>
    <?php if (isset($_SESSION['hata'])): ?>
        <p style="color:red;"><?= $_SESSION['hata'] ?></p>
        <?php unset($_SESSION['hata']); ?>
    <?php endif; ?>
    <form action="giris_kontrol.php" method="post">
        <input type="text" name="kullanici_adi" placeholder="Kullanıcı Adı" required>
        <input type="password" name="sifre" placeholder="Şifre" required>
        <button type="submit">Giriş Yap</button>
    </form>
</body>
</html>
