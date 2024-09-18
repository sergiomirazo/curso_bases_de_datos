<?php
// Nombre de la marca aleatorio
$brand_name = "StrideStyle";

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
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <header>
        <h1>Bienvenido a Calzados Únicos <?php echo $brand_name; ?></h1>
        <p>El mejor lugar para tus gustos en zapatos.</p>
    </header>

    <center><h2>Tienda en Línea</h2></center>
    <center><h3>zapatos de marca</h3></center>
    <br>
    <br>

    <div class="container fluid dflex justify-content-center">
    <img src="zapatos.jpg" width="400" heigth="100">
    <p>Marca: Nike
    <br>
    Precio: $3,600
    <br>
    Medida: M 8.5 / W 10
    
    <hr>
    </div>
    
    
    <br>
    <br>
    <div class=".contenedor">
    <img src="zapatos 2.png" width="400" heigth="100">
    </div>
    
    <p>Marca: Jordan
    <br>
    Precio: $3,400
    <br>
    Medida: M 9 / W 10.5
    
    <hr>
    
    <br>
    <br>
    <div class=".contenedor">
    <img src="zapatos 3.jpg" width="400" heigth="100">
    </div>
    
    <p>Marca: Adidas
    <br>
    Precio: $1,300
    <br>
    Medida: M 9 / W 10.5
    </p>
    
    <hr>
    
    <br>
    <br>
    <div class=".contenedor">
    <img src="zapatos 4.webp" width="400" heigth="100">
    </div>
    
    <p>Marca: New Balance
    <br>
    Precio: $1,200
    <br>
    Medida: M 11 / W 9.5
    </p>
    
    <hr>
    
    <br>
    <br>
    <div class=".contenedor">
    <img src="zapatos 5.webp" width="400" heigth="100">
    </div>
    
    <p>Marca: Converse
    <br>
    Precio: $1,800
    <br>
    Medida: M 10 / W 11.6
    </p>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <hr>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>