<?php
require_once 'config/db.php'; // Pastikan Anda memiliki koneksi ke database dalam file ini

class User {
    public static function login($data) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $data['username']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($data['password'], $user['password'])) {
            return $user;
        }
        return false;
    }

    public static function register($data) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO users (nama, umur, username, password) VALUES (:nama, :umur, :username, :password)");
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);
        return $stmt->execute([
            'nama' => $data['nama'],
            'umur' => $data['umur'],
            'username' => $data['username'],
            'password' => $hashedPassword,
            ]);
            }
            }
            ?>