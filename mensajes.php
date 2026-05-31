<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Mensajes | Emilie</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <header>
        <h1>Catálogo Dinámico de Mensajes</h1>
        <nav>
            <ul>
                <li><a href="index.php">Inicio</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="mensajes.php">Ver Mensajes</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Mensajes Almacenados</h2>
            <p>A continuación se muestran los mensajes capturados desde el formulario:</p>

            <?php
            require_once 'conexion.php';

            $sql = "SELECT id, nombre, correo, mensaje, fecha_envio FROM mensajes_contacto ORDER BY fecha_envio DESC";
            $resultado = $conexion->query($sql);

            if ($resultado->num_rows > 0) {
                echo "<table class='tabla-mensajes'>";
                echo "<thead>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nombre</th>";
                echo "<th>Correo</th>";
                echo "<th>Mensaje</th>";
                echo "<th>Fecha de Envío</th>";
                echo "</tr>";
                echo "<tbody>";

            
                while($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila['id'] . "</td>";
                    
                    echo "<td>" . htmlspecialchars($fila['nombre']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['correo']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['mensaje']) . "</td>";
                    echo "<td>" . $fila['fecha_envio'] . "</td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                echo "<div class='alerta' style='background-color: #e2e3e5; color: #383d41; margin-top: 20px;'>";
                echo "Aún no hay mensajes registrados. ¡Sé el primero en enviar uno desde la página de contacto!";
                echo "</div>";
            }

            $conexion->close();
            ?>
        </section>
    </main>

</body>
</html>