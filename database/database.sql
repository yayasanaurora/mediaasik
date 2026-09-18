CREATE DATABASE IF NOT EXISTS dpp_cakra CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE dpp_cakra;

CREATE TABLE users (
 id INT AUTO_INCREMENT PRIMARY KEY,
 username VARCHAR(50) NOT NULL UNIQUE,
 password VARCHAR(255) NOT NULL,
 nama VARCHAR(100) NOT NULL,
 role VARCHAR(30) NOT NULL DEFAULT 'admin',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE berita (
 id INT AUTO_INCREMENT PRIMARY KEY,
 judul VARCHAR(255) NOT NULL,
 gambar VARCHAR(255) DEFAULT NULL,
 isi LONGTEXT NOT NULL,
 penulis VARCHAR(100) NOT NULL,
 tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 status ENUM('draft','published') NOT NULL DEFAULT 'draft'
);

-- Password awal: Admin123!
INSERT INTO users(username,password,nama,role)
VALUES ('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC4cHhQJYQh5QX4Y9k5m', 'Administrator', 'admin');
