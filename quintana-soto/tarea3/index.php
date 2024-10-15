<?php
// Nombre de la marca aleatorio
$brand_name = "new era";

// Procesar formulario
$data_file = 'data.txt';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    $cap_style = htmlspecialchars($_POST['cap_style']);
    $quantity = htmlspecialchars($_POST['quantity']);
    
    $entry = "Name: $name | Email: $email | Message: $message | Cap Style: $cap_style | Quantity: $quantity\n";
    
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
        <p>El mejor lugar especializado en gorras.</p>
    </header>

    <section>
        <h2>Contáctanos</h2>
        <form method="POST" action="">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="message">Pedidos:</label>
            <textarea id="message" name="message" required></textarea>
            
            <label for="cap_style">Estilo de gorra:</label>
            <input type="text" id="cap_style" name="cap_style" required>
            
            <label for="quantity">Cantidad:</label>
            <input type="number" id="quantity" name="quantity" required>
            
            <button type="submit">Enviar</button>
        </form>
    </section>
    

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11130766.690316793!2d-102.09570531472966!3d35.906894454031324!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d3124c01116ddb%3A0x97705e8ed195b42f!2sNew%20Era%20Flagship%20Store%20-%20Buffalo!5e0!3m2!1ses-419!2smx!4v1727163017408!5m2!1ses-419!2smx"
    width="100%" 
    height="450"
     style="border:0;"
      allowfullscreen=""
       loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"
        ></iframe>

    <section>
        <h2>Pedidos Recibidos</h2>
        <ul>
            <?php foreach ($data_list as $entry): ?>
                <li><?php echo htmlspecialchars($entry); ?></li>
            <?php endforeach; ?>
        </ul>
    </section>
</body>
</html>
