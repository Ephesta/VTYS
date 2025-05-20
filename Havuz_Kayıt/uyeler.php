<?php
require "db.php";

$result = $conn->query("SELECT * FROM uyeler ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Üye Listesi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Üye Listesi</h2>
    <table>
        <tr>
            <th>Ad Soyad</th>
            <th>Telefon</th>
            <th>Email</th>
            <th>Üyelik Tipi</th>
            <th>Bitiş</th>
        </tr>
        <?php while($uye = $result->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($uye['ad'] . " " . $uye['soyad']) ?></td>
            <td><?= htmlspecialchars($uye['telefon']) ?></td>
            <td><?= htmlspecialchars($uye['email']) ?></td>
            <td><?= htmlspecialchars($uye['uyelik_tipi']) ?></td>
            <td><?= htmlspecialchars($uye['uyelik_bitis_tarihi']) ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="index.php">Yeni Üye Ekle</a>
</body>
</html>

