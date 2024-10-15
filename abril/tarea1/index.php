<?php
// Nombre de la marca aleatorio
$brand_name = "AbrilCaps";

// Procesar formulario
$data_file = 'data.txt';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    $entry = "Name: $name | Email: $email | Message: $message\n";
    
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
    <title><?php echo $brand_name; ?> - Sitio Comercial</title>
    <link rel="stylesheet" href="mapa.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapa en Iframe</title>
    <style>
        #map {
            height: 400px; /* Altura del mapa */
            width: 100%; /* Ancho del mapa */
        }
    </style>
</head>
<body>
    <header>
        <h1>Bienvenido a <?php echo $brand_name; ?></h1>
        <p>El mejor lugar para tus necesidades comerciales.</p>
    </header>

    <section>
        <h2>Contáctanos</h2>
        <form method="POST" action="">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>
            
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
    <center>

        <h3>Mi Mapa</h3>
        <div id="map">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3151.835434509026!2d144.95373531531673!3d-37.81627997975184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad642af0f11c0b1%3A0x5045675218ce6e0!2sFederation%20Square!5e0!3m2!1ses!2sus!4v1616146863557!5m2!1ses!2sus" 
                width="600" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>
    </center>


</body>
</html>