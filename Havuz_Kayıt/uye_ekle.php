<?php
session_start();
require "db.php";

// Giriş yapan kullanıcının rolü
$giris_rol = $_SESSION['rol'] ?? 'personel';

// Formdan gelen değerler
$ad = $_POST['ad'];
$soyad = $_POST['soyad'];
$tc_no = $_POST['tc_no'];
$dogum_tarihi = $_POST['dogum_tarihi'];
$telefon = $_POST['telefon'];
$email = $_POST['email'];
$uyelik_tipi = $_POST['uyelik_tipi']; // 'uye' veya 'personel'
$paket_suresi = intval($_POST['paket_suresi'] ?? 0);

// YETKİ KONTROLÜ
if ($giris_rol !== 'yonetici' && $uyelik_tipi !== 'uye') {
    die("Yetkiniz yok. Sadece yöneticiler personel kaydı yapabilir.");
}

// Eğer üyelik tipi "uye" ise bitiş tarihi hesapla
if ($uyelik_tipi === 'uye') {
    $bugun = date("Y-m-d");
    $bitis_tarihi = date("Y-m-d", strtotime("+$paket_suresi days"));

    // UYE TABLOSUNA EKLE
    $sql = "INSERT INTO uyeler (ad, soyad, tc_no, dogum_tarihi, telefon, email, uyelik_tipi, uyelik_bitis_tarihi)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $ad, $soyad, $tc_no, $dogum_tarihi, $telefon, $email, $uyelik_tipi, $bitis_tarihi);
} else {
    // PERSONEL TABLOSUNA EKLE (varsayılan şifre belirliyoruz)
    $kullanici_adi = strtolower($ad . $soyad);
    $sifre = '123456'; // geçici, sonra değiştirilir
    $sifre_hash = $sifre; // Gerçek projede: password_hash($sifre, PASSWORD_DEFAULT);

    $sql = "INSERT INTO personel (kullanici_adi, sifre_hash, rol, aktif)
            VALUES (?, ?, ?, 1)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $kullanici_adi, $sifre_hash, $uyelik_tipi);
}

if ($stmt->execute()) {
    echo "Kayıt başarılı! <a href='index.php'>Geri Dön</a>";
} else {
    echo "Hata: " . $stmt->error;
}

?>
