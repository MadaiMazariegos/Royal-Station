<?php
$servidor = "localhost";
$usuario = "root";
$password = "";
$baseDatos = "royal_station"; // Asegúrate de que este sea el nombre real de tu base de datos en phpMyAdmin

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos;charset=utf8mb4", $usuario, $password);
    // Configurar el modo de error de PDO para que nos avise si algo falla
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>