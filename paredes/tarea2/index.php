<?php
// Nombre de la marca aleatorio
$brand_name = "Soporte De Games & Fun";

// Definir la ruta del archivo de datos
$data_file = 'data.txt';

// Procesar formulario si se envió
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener y sanitizar los datos del formulario
    $name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $email = isset($_POST['email']) ? htmlspecialchars(trim($_POST['email'])) : '';
    $age = isset($_POST['age']) ? htmlspecialchars(trim($_POST['age'])) : '';
    $problem = isset($_POST['problem']) ? htmlspecialchars(trim($_POST['problem'])) : '';

    // Validación básica
    $errors = [];
    if (empty($name)) $errors[] = 'El nombre es obligatorio.';
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'El email es obligatorio y debe ser válido.';
    if (empty($age)) $errors[] = 'La edad es obligatoria.';
    if (empty($problem)) $errors[] = 'La descripción del problema es obligatoria.';

    if (empty($errors)) {
        $entry = "Nombre: $name | Email: $email | Edad: $age | Problema: $problem\n";

        // Guardar la entrada en el archivo
        if (file_put_contents($data_file, $entry, FILE_APPEND | LOCK_EX) === false) {
            $errors[] = 'No se pudo guardar la entrada en el archivo.';
        } else {
            $success = 'Gracias por tu mensaje. Se ha enviado correctamente.';
        }
    }
}

// Leer datos del archivo
$data_list = file_exists($data_file) ? file($data_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($brand_name); ?> - Sitio Comercial</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Bienvenido a <?php echo htmlspecialchars($brand_name); ?></h1>
        <p>Uno de los mejores emuladores en la nube</p>
    </header>

    <section>
        <h2>Responda el formulario.</h2>
        <form method="POST" action="">
            <?php if (isset($success)): ?>
                <p style="color: green;"><?php echo htmlspecialchars($success); ?></p>
            <?php endif; ?>
            <?php if (!empty($errors)): ?>
                <ul style="color: red;">
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="age">Edad:</label>
            <input type="text" id="age" name="age" required>

            <!-- Nuevo campo para describir el problema -->
            <label for="problem">Describe tu problema:</label>
            <textarea id="problem" name="problem" rows="5" required></textarea>

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
