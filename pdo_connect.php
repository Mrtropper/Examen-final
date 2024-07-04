<?php
session_start(); // Iniciar sesión para guardar los datos por mensaje

$servername = "localhost";
$username = "root";
$password = "fabricio0990";
$dataname = "db_restaurante";

try {
    $dsn = "mysql:host=$servername;dbname=$dataname;charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Conexión fallida: " . $e->getMessage());
}

// Si llegas aquí, la conexión fue exitosa
?>