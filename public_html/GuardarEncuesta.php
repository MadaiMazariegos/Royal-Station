<?php
// Mostrar errores para depurar
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servidor = "localhost";
$usuario = "root";
$password = "Ny-mos;)";
$baseDatos = "Royal_Station";

$conexion = new mysqli($servidor, $usuario, $password, $baseDatos);

if ($conexion->connect_error) {
    die(json_encode(["exito" => false, "mensaje" => "Error de conexión: " . $conexion->connect_error]));
}

// Recibir datos del formulario
$nombre = $_POST["nombre"] ?? "";
$calificacion = $_POST["calificacion"] ?? "";
$puntualidad = $_POST["puntualidad"] ?? "";
$aspectos = $_POST["aspectos"] ?? [];
$atencion = $_POST["atencion_personal"] ?? "";
$recomendacion = $_POST["recomendacion"] ?? "";
$comentario = $_POST["comentario"] ?? "";

$aspectosTexto = implode(", ", $aspectos);

// Insertar en la base de datos
$sql = "INSERT INTO encuestas (nombre, calificacion, puntualidad, aspectos, atencion_personal, recomendacion, comentario) 
        VALUES ('$nombre', '$calificacion', '$puntualidad', '$aspectosTexto', '$atencion', '$recomendacion', '$comentario')";

if ($conexion->query($sql) === TRUE) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(["exito" => true, "mensaje" => "Guardado correctamente"]);
} else {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(["exito" => false, "mensaje" => "Error en SQL: " . $conexion->error]);
}

$conexion->close();
?>