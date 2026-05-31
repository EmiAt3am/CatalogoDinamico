<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto | Emilie</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>

    <header>
        <h1>Formulario de Contacto</h1>
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
            <h2>Envíame un mensaje</h2>
            <p style="margin-bottom: 20px;">Llena los siguientes campos para ponerte en contacto conmigo. Todos los campos son obligatorios.</p>
            
            <form action="procesar.php" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre Completo:</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" required placeholder="Ej. Juan Pérez">
                </div>

                <div class="form-group">
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" id="correo" name="correo" class="form-control" required placeholder="Ej. juan@example.com">
                </div>

                <div class="form-group">
                    <label for="mensaje">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" class="form-control" rows="5" required placeholder="Escribe tu mensaje aquí..."></textarea>
                </div>

                <button type="submit" class="btn">Enviar Mensaje</button>
            </form>
        </section>
    </main>
</body>
</html>