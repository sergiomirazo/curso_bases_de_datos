<?php
// Configuración
$brand_name = "BrightWave";
$data_file = 'data.txt';

// Función para sanitizar y validar entradas
function sanitize_input($data) {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Procesar formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitize_input($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = sanitize_input($_POST['message']);

    if ($name && $email && $message) {
        $entry = sprintf("Name: %s | Email: %s | Message: %s\n", $name, $email, $message);
        
        // Intentar guardar la entrada en el archivo
        if (file_put_contents($data_file, $entry, FILE_APPEND | LOCK_EX) === false) {
            $error_message = "No se pudo guardar el mensaje. Intenta nuevamente.";
        }
    } else {
        $error_message = "Datos no válidos. Por favor, verifica tu entrada.";
    }
}

// Leer datos del archivo
$data_list = file_exists($data_file) ? file($data_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BarberShop</title>

    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <iframe
 iframe src="https://www.google.com/maps/embed?pb=!4v1726515423436!6m8!1m7!1srUpGi0lB0euzXjNxPRvvWg!2m2!1d17.28334379450644!2d-97.67091704000597!3f146.1926166219458!4f-2.847468870204324!5f3.325193203789971">

    </iframe>
   
    
    <header>
        <h1>Bienvenido a BARBERIA LA LLUVIA <?php echo htmlspecialchars($brand_name, ENT_QUOTES, 'UTF-8'); ?></h1>
        <p>El mejor lugar para venir a darte tus gustitos </p>
        <img src="2.jpeg" >
    </header>

    <section>
        <h2>Contáctanos</h2>
        <?php if (!empty($error_message)): ?>
            <p class="error"><?php echo htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?></p>
        <?php endif; ?>
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
                <li><?php echo htmlspecialchars($entry, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
</body>
</html>