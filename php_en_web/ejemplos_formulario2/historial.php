<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Historial de Inversiones</title>
</head>
<body>
    <div class="container">
        <h1>Historial de Inversiones</h1>
        <pre><?php readfile('data.txt'); ?></pre>
        <form action="index.php">
            <button type="submit">Volver</button>
        </form>
    </div>
</body>
</html>