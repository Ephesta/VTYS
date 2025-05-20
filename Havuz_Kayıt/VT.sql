USE havuz_uyelik_sistemi;
CREATE TABLE uyeler (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ad VARCHAR(50) NOT NULL,
    soyad VARCHAR(50) NOT NULL,
    tc_no VARCHAR(11) UNIQUE NOT NULL,
    dogum_tarihi DATE,
    telefon VARCHAR(20),
    email VARCHAR(100),
    kayit_tarihi DATE DEFAULT CURRENT_TIMESTAMP,
    uyelik_bitis_tarihi DATE,
    uyelik_tipi VARCHAR(20),
    aktif BOOLEAN DEFAULT TRUE
);
CREATE TABLE odemeler (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uye_id INT NOT NULL,
    tutar DECIMAL(10,2) NOT NULL,
    odeme_tarihi DATE DEFAULT CURRENT_TIMESTAMP,
    odeme_tipi VARCHAR(20),
    FOREIGN KEY (uye_id) REFERENCES uyeler(id) ON DELETE CASCADE
);
CREATE TABLE giris_kayitlari (
    id INT AUTO_INCREMENT PRIMARY KEY,
    uye_id INT NOT NULL,
    giris_zamani DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (uye_id) REFERENCES uyeler(id) ON DELETE CASCADE
);
CREATE TABLE personel (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kullanici_adi VARCHAR(50) UNIQUE NOT NULL,
    sifre_hash VARCHAR(255) NOT NULL,
    rol ENUM('yonetici', 'personel') DEFAULT 'personel',
    aktif BOOLEAN DEFAULT TRUE
);
CREATE TABLE uyelik_planlari (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ad VARCHAR(50) NOT NULL,
    aciklama TEXT,
    fiyat DECIMAL(10,2) NOT NULL,
    sure_gun INT NOT NULL
);

