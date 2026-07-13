<?php
// koneksi.php

// Konfigurasi Database - SESUAIKAN DENGAN INFINITYFREE LU
$host     = "sql312.infinityfree.com"; // Ganti dengan MySQL Hostname dari cPanel
$dbname   = "if0_42247704_db_login";    // Ganti dengan Nama Database lengkap lu
$username = "if0_42247704";             // Ganti dengan MySQL Username dari cPanel
$password = "20Juli05";        // Ganti dengan password akun InfinityFree lu


try {
    $conn = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
    );
    // Mode error PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Mode fetch default
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
    // Aktifkan ini dulu buat ngetes di awal, kalau udah sukses baru kasih komentar (//) lagi
    echo "Database terkoneksi"; 
} catch (PDOException $e) {
    // Jika gagal koneksi
    die("Koneksi database gagal: " . $e->getMessage());
}
?>