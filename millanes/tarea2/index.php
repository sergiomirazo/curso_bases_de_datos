<?php
// Nombre de la marca aleatorio
$brand_name = "BrightWave";

// Procesar formulario
$data_file = 'data.txt';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $phone = htmlspecialchars($_POST['phone']);

    $entry = "Name: $name | Email: $email | Message: $message | Phone: $phone\n";

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
    <title>Sitio Oficial Ley</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
            <h1> Bienvenido a la tienda Ley <?php echo $brand_name; ?></h1>
            <img src="ley.png" alt="ley" />
    </header>

    <section>
        <center><h2>Contáctanos</h2></center>
        <form method="POST">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Mensaje:</label>
            <textarea id="message" name="message" required></textarea>

            <label for="phone">Telefono:</label>
            <textarea id="phone" name="phone" required></textarea>

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
    <footer>
        <p>&copy; 2024 Casa Ley. Todos los derechos reservados.</p>
    </footer>
</body>
</html>