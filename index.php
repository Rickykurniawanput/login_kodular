<?php
header('Content-Type: application/json'); // Set output ke JSON
include "Koneksi.php"; // Pastikan K-nya kapital sesuai nama file kamu

if(isset($_GET['username']) && isset($_GET['password'])){
    $username = $_GET['username'];
    $password = $_GET['password'];

    // Perbaikan: tabel diganti menjadi 'users' sesuai database phpMyAdmin
    $sql = "SELECT * FROM users 
            WHERE username = :username 
            AND password = :password";
            
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':password' => $password
    ]);
    
    $data = $stmt->fetch();
    
    if($data){
        // Output JSON sukses beserta datanyas
        echo json_encode([
            "status" => "success",
            "message" => "Login Berhasil!",
            "data" => [
                "username" => $data['username'],
                "nama_lengkap" => $data['nama_lengkap'],
                "email" => $data['email']
            ]
        ]);
    } else {
        // Output JSON jika gagal
        echo json_encode([
            "status" => "error",
            "message" => "Username atau Password salah!"
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Parameter tidak lengkap."
    ]);
}
?>