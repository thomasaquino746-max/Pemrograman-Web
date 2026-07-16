CREATE DATABASE IF NOT EXISTS db_tanaman_hias;
USE db_tanaman_hias;

CREATE TABLE tanaman (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_tanaman VARCHAR(100) NOT NULL,
    jenis VARCHAR(50) NOT NULL,
    harga INT NOT NULL,
    stok INT NOT NULL,
    tanggal_masuk DATE NOT NULL
);

INSERT INTO tanaman (nama_tanaman, jenis, harga, stok, tanggal_masuk) VALUES
('Monstera Deliciosa', 'Indoor', 150000, 10, '2026-07-01'),
('Lidah Mertua', 'Indoor', 85000, 15, '2026-07-05'),
('Bougenville', 'Outdoor', 120000, 8, '2026-07-08'),
('Palem Kuning', 'Outdoor', 175000, 6, '2026-07-10');