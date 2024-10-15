<?php
// Nombre de la marca aleatorio
$brand_name = "Televisiones";

// Procesar formulario
$data_file = 'data.txt';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $apellidop = htmlspecialchars($_POST['apellidop']);
    $apellidom = htmlspecialchars($_POST['apellidom']);
    $edad = htmlspecialchars($_POST['edad']);
    $direccion = htmlspecialchars($_POST['direccion']);
    $numero = htmlspecialchars($_POST['numero']);
    $email = htmlspecialchars($_POST['email']);
    $messague = htmlspecialchars($_POST['messague']);



    $entry = "Name: $name | apellidop: $apellidop | apellidom: $apellidom | edad: $edad | direccion: $direccion | numero $numero | email: $email | massague: $messague ";
     
     


    
    // Guardar la entrada en el archivo
    file_put_contents($data_file, $entry, FILE_APPEND | LOCK_EX);
}

// Leer datos del archivo
$data_list = file_exists($data_file) ? file($data_file) : [];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $brand_name; ?> - Trailers by desing</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Bienvenido a <?php echo $brand_name; ?></h1>
        <p>la mejor compra televsiones.</p>
    </header>

    <section>
        <h2>Contáctanos</h2>
        <form method="POST" action="">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>

            <label for="apellido p">apellido p:</label>
            <input type="apellido p" id="apellido p" name="apellido p" required>

            <label for="apellido m">apellido p:</label>
            <input type="apellido m" id="apellido m" name="apellido m" required>


            <label for="edad">Edad:</label>
            <input type="edad" id="edad" name="edad" requiered>
            
            <label for="direccion">direccion:</label>
            <input type="direccion" id="direccion" name="direccion" requiered>

            <label for="numero">numero:</label>
            <input type="numero" id="numero" name="numero" requiered>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            

            <label for="message">Mensaje:</label>
            <textarea id="message" name="message" required></textarea>
            
            <button type="submit">Enviar</button>
        </form>
    </section>

    <section>
        <h2>Mensajes Recibidos</h2>
        <ul>
            <?php foreach ($data_list as $entry): ?>
                <li><?php echo htmlspecialchars($entry); ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
</body>
        </ul>
    </section>
</body>
</html>
