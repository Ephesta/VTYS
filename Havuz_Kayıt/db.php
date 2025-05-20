<?php
$host = "localhost";
$db = "havuz_uyelik_sistemi";
$user = "root"; // phpMyAdmin kullanıcı adın
$pass = "";     // şifre varsa buraya yaz

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}
?>
