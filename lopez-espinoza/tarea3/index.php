<?php
// Nombre de la marca aleatorio
$brand_name = "Trailers by Design";

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
    $message = htmlspecialchars($_POST['message']);

    $entry = "Nombre: $name | Apellido P: $apellidop | Apellido M : $apellidom | Edad: $edad | Dirección: $direccion | Número: $numero | Email: $email | Mensaje: $message\n";

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
    <title><?php echo $brand_name; ?> - Trailers by Design</title>
    <link rel="stylesheet" href="styles.css">
    
</head>
<body>
    <header>
        <h1>Bienvenido a <?php echo $brand_name; ?></h1>
        <p>La mejor compra y venta de los mejores trailers.</p>
        <div class="imagenes">
            <img src="https://i.pinimg.com/736x/b9/4c/c7/b94cc7e2ff6e94d8ac50fa547ec7d55b.jpg" alt="Imagen 1">
            <img src="https://wp.tyt.com.mx/wp-content/uploads/2018/10/volvo-eficiencia-1-1024x597.jpg" alt="Imagen 2">
            <img src="https://i0.wp.com/blog.ritchiebros.com/wp-content/uploads/2023/04/2013-PETERBILT-379-6x4-Long-Nose-Truck-Tractor.jpg?resize=800%2C445&ssl=1" alt="Imagen 3">
        </div>
    </header>

    <section>
        <h2>Contáctanos</h2>
        <form method="POST" action="">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>

            <label for="apellidop">Apellido P:</label>
            <input type="text" id="apellidop" name="apellidop" required>

            <label for="apellidom">Apellido M:</label>
            <input type="text" id="apellidom" name="apellidom" required>

            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad" required>

            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>

            <label for="numero">Número:</label>
            <input type="tel" id="numero" name="numero" required>

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
                <li><?php echo nl2br(htmlspecialchars($entry)); ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
</body>
</html>
