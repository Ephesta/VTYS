<?php
session_start();
require "db.php";

$kullanici_adi = $_POST['kullanici_adi'];
$sifre = $_POST['sifre'];


$sql = "SELECT * FROM personel WHERE kullanici_adi = ? AND aktif = 1 LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $kullanici_adi);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $kullanici = $result->fetch_assoc();

    if ($sifre === $kullanici['sifre_hash']) { 
        $_SESSION['kullanici_id'] = $kullanici['id'];
        $_SESSION['kullanici_adi'] = $kullanici_adi;
        $_SESSION['rol'] = $kullanici['rol'];

        header("Location: index.php");
        exit;
    }
}

$_SESSION['hata'] = "Geçersiz kullanıcı adı veya şifre!";
header("Location: login.php");
exit;
