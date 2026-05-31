<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesando Mensaje | Emilie</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <header>
        <h1>Estado del Envío</h1>
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
            <?php
            require_once 'conexion.php';

            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
            
                $nombre = trim($_POST['nombre']);
                $correo = trim($_POST['correo']);
                $mensaje = trim($_POST['mensaje']);

            
                $errores = [];

                if (empty($nombre) || empty($correo) || empty($mensaje)) {
                    $errores[] = "Todos los campos son obligatorios.";
                }

                if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                    $errores[] = "El formato del correo electrónico no es válido.";
                }

                
                if (!empty($errores)) {
                    echo "<div class='alerta alerta-error'>";
                    foreach ($errores as $error) {
                        echo "<p>❌ $error</p>";
                    }
                    echo "</div>";
                    echo "<a href='contacto.php' class='btn'>Volver al formulario</a>";
                } else {
                    
                    $sql = "INSERT INTO mensajes_contacto (nombre, correo, mensaje) VALUES (?, ?, ?)";
                    
                    if ($stmt = $conexion->prepare($sql)) {
                    
                        $stmt->bind_param("sss", $nombre, $correo, $mensaje);
                        
                        if ($stmt->execute()) {
                        
                            echo "<div class='alerta alerta-exito'>";
                            echo "<h3>¡Mensaje enviado con éxito!</h3>";
                            echo "<p>Gracias <strong>" . htmlspecialchars($nombre) . "</strong>, tu mensaje ha sido registrado correctamente en nuestra base de datos.</p>";
                            echo "</div>";
                            echo "<a href='mensajes.php' class='btn'>Ver el catálogo de mensajes</a>";
                        } else {
                            echo "<div class='alerta alerta-error'>❌ Error al guardar el mensaje: " . $stmt->error . "</div>";
                        }
                        $stmt->close();
                    } else {
                        echo "<div class='alerta alerta-error'>❌ Error en la preparación de la consulta: " . $conexion->error . "</div>";
                    }
                }
            } else {
                echo "<div class='alerta alerta-error'>❌ Acceso no permitido.</div>";
            }

            $conexion->close();
            ?>
        </section>
    </main>
</body>
</html>