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
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .contenedor {
    width: 100%;
    height: 400px; /* Corregido '400x' a '400px' */
}

body {
    background-color: rgb(21, 77, 85);
    padding: 100px;
    font-family: Arial, sans-serif; /* Añadido para mejorar la tipografía */
    color: rgb(0, 0, 0); /* Color de texto general para mejor contraste */
}

h1 {
    color: rgb(18, 158, 233);
    border-radius: 0.8rem;
    border: 2px solid rgb(23, 196, 196);
    padding: 0.8rem 4rem;
    text-align: center; /* Centrando el título */
}

p {
    color: rgb(16, 187, 240);
    font-size: 1rem; /* Aumentado el tamaño de fuente para mejor legibilidad */
    text-align: justify; /* Corregido 'Justify' a 'justify' */
    line-height: 2.5; /* Mejorado el interlineado */
    margin: 1rem 0; /* Añadido margen para separación */
}

img {
    filter: sepia(100%);
    border-radius: 1.2rem;
    max-width: 100%; /* Asegura que las imágenes no excedan el contenedor */
    height: auto; /* Mantiene la proporción de la imagen */
}

        header {
            background-color: #232c36;
            color: #3281a6;
            padding: 20px;
            text-align: center;
        }
        .imagenes {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin: 20px 0;
        }
        .imagenes img {
            width: 100px; /* Ajusta el tamaño de las imágenes */
            height: auto;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        section {
            background: #3281a6;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
        }
        input, textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background-color: #232c36;
            color: #3281a6;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
        }
        h2 {
            margin-top: 20px;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #FFFFFF;
            margin: 5px 0;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
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
