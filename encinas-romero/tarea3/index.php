<?php
// Nombre de la marca aleatorio
$brand_name = "Flexicredi Autos";

// Procesar formulario
$data_file = 'data.txt';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $edad = htmlspecialchars($_POST['edad']);
    $direccion = htmlspecialchars($_POST['direccion']);
    $numero_folio = htmlspecialchars($_POST['numero_folio']);
    $mensaje = htmlspecialchars($_POST['mensaje']);
    
    $entry = "Name: $name | Email: $email | Edad: $edad | Direccion: $direccion | Numero folio: $numero_folio | Mensaje: $mensaje\n";
    
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
    <title><?php echo $brand_name; ?> - Flexicredi Autos</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Bienvenido a <?php echo $brand_name; ?></h1>
        <p>Página para coches de la mejor calidad.</p>
    </header>

    <section>
        <h2>Contáctanos</h2>
        <form method="POST" action="">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required>
            <br>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>
            <br>
            <label for="numero_folio">Número folio:</label>
            <input type="number" id="numero_folio" name="numero_folio" required>
            <br>
            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" required></textarea>
            <br>
            <button type="submit">Enviar</button>
        </form>
    </section>

    
</body>
</html>
