<?php
// 1. CONEXIÓN A LA BASE DE DATOS CON TU CONTRASEÑA
$servidor = "sql212.infinityfree.com"; 
$usuario = "if0_43399383";           
$password = "Ny-mos;)"; 
$baseDatos = "if0_43399383_Royal_Station"; 

$conexion = new mysqli($servidor, $usuario, $password, $baseDatos);

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// 2. CONSULTAR LAS ENCUESTAS GUARDADAS
$sql = "SELECT id, nombre, calificacion, recomendacion, comentario FROM encuestas ORDER BY id DESC";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="stylesheet" href="Admin.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet"> 
        <title>Entrada de Administrador</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>

        <header class="header">
            <div class="logo">
                <img src="Img/LogoImg.png" alt="Logo" width="100">
                <img src="Img/Logo.png" alt="Royal Station" width="300">
            </div>

            <nav class="menu">
                <a href="index.html"> Volver al inicio </a>
            </nav>
        </header>

        <main class="Contenedor">

            <section id="SQL">
                <h2>Encuestas recibidas</h2>

                <div class="Tabla">
                    <table class="Info">
                        <tr>
                            <th>ID</th>
                            <th>Pasajero</th>
                            <th>Calificación</th>
                            <th>Recomendación</th>
                            <th>Comentario</th>
                        </tr>

                        <?php
                        // 3. MOSTRAR LOS DATOS DE SQL DINÁMICAMENTE EN LA TABLA
                        if ($resultado && $resultado->num_rows > 0) {
                            while($row = $resultado->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["nombre"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["calificacion"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["recomendacion"]) . "</td>";
                                echo "<td>" . htmlspecialchars($row["comentario"]) . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' style='text-align:center;'>No hay encuestas registradas todavía.</td></tr>";
                        }
                        $conexion->close();
                        ?>

                    </table>
                </div>

            </section>

            <section>
                <button type="button" class="Boton" onclick="location.href='index.html'">
                    Salir
                </button>
            </section>

        </main>

    </body>
</html>