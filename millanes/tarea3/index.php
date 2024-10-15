<?php
// Nombre de la marca aleatorio
$brand_name = "BrightWave";

// Procesar formulario
$data_file = 'data.txt';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $apellido = htmlspecialchars($_POST['apellido']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);
    $servicios = htmlspecialchars($_POST['servicios']);
    $finding = htmlspecialchars($_POST['finding']);
   

    $entry = "Name: $name | Apellido: $apellido | Email: $email | Phone: $phone | ¿Que marca prefieres?: $servicios\n";

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
    <title>Formularioo</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
   
    <div class="container">
            <div class="row">
                <div class="col-12">
                        <center><h1>Contactanos!</h1></center>
                     <form method="POST">
                            <label for="name">Nombre:</label>
                            <input type="text" id="name" name="name" required>

                            <label for="apellido">Apellido:</label>
                            <input type="text" id="apellido" name="apellido" required>
                
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                
                            <label for="phone">Telefono:</label>
                            <textarea id="phone" name="phone" required></textarea>
                        <div class="form-group">
                            <label for="servicios">¿Que marca prefieres?:</label>
                            <select class="form-control" id="servicios" name="servicios">
                                <option>iPhone</option>
                                <option>Motorola</option>
                                <option>Samsung</option>
                                <option>Nokia</option>
                                <option>Xiami</option>
                                <option>LG</option>
                            </select>
                        </div>

                        <button type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
        <section>
                <h2>Mensajes Recibidos</h2>
                <ul>
                    <?php foreach ($data_list as $entry): ?>
                    <li><?php echo htmlspecialchars($entry); ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>
</body>
</html>