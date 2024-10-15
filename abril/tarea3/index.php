<?php
// Nombre de la marca aleatorio
$brand_name = "Conociendonos";

// Procesar formulario
$data_file = 'data.txt';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $fsport = htmlspecialchars($_POST['fsport']);
    $ffood = htmlspecialchars($_POST['ffood']);
    $fmusic = htmlspecialchars($_POST['fmusic']);
    $hobbies = htmlspecialchars(string: $_POST['hobbies']);
    
    $entry = "Nombre: $name | Apellido: $lastname | Correo: $email | Deporte favorito: $fsport | Comida favorita: $ffood | Música favorita: $fmusic | Pasatiempos: $hobbies\n";

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
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Bienvenido a <?php echo $brand_name; ?></h1>
        <p>El mejor lugar para conocer personas.</p>
    </header>

    <section>
        <h2>Contáctanos</h2>
        <form method="POST" action="">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <br>

            <label for="lastname">Apellido:</label>
            <input type="text" id="lastname" name="lastname" required>
            <br>
            <br>
            
            <label for="email">Correo electrónico:</label>
            <input type="text" id="email" name="email" required>
            <br>
            <br>

            <label for="fsport">Deporte favorito:</label>
            <input type="text" id="fsport" name="fsport" required>
            <br>
            <br>

            <label for="ffood">Comida favorita:</label>
            <input type="text" id="ffood" name="ffood" required>
            <br>
            <br>

            <label for="fmusic">Música favorita:</label>
            <input type="text" id="fmusic" name="fmusic" required>
            <br>
            <br>

            <label for="hobbies">¿Qué te gusta hacer?</label>
            <textarea type="hobbies" id="hobbies" name="hobbies" required></textarea>
            <br>
            <br>
            
            
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
</html>