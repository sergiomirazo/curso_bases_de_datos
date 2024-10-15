<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <center>
    <h1>Encuesta de Preferencias</h1>
    <div class="contenedor">
    <form id="surveyForm" method="post" action="">
        <label for="firstName">Nombre:</label>
        <input type="text" id="firstName" name="firstName" required>

        <label for="lastName">Apellido:</label>
        <input type="text" id="lastName" name="lastName" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="favoriteSport">Deporte Favorito:</label>
        <input type="text" id="favoriteSport" name="favoriteSport" required>

        <label for="favoriteFood">Comida Favorita:</label>
        <input type="text" id="favoriteFood" name="favoriteFood" required>

        <label for="favoriteSong">Canción Favorita:</label>
        <input type="text" id="favoriteSong" name="favoriteSong" required>

        <button type="submit">Enviar</button>
    </form>
    </div>
    </center>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Manejo del formulario
        $firstName = htmlspecialchars($_POST['firstName']);
        $lastName = htmlspecialchars($_POST['lastName']);
        $email = htmlspecialchars($_POST['email']);
        $favoriteSport = htmlspecialchars($_POST['favoriteSport']);
        $favoriteFood = htmlspecialchars($_POST['favoriteFood']);
        $favoriteSong = htmlspecialchars($_POST['favoriteSong']);

        // Aquí puedes procesar los datos, por ejemplo, guardarlos en una base de datos

        echo "<h2>Gracias por participar, $firstName!</h2>";
        echo "<p>Nombre: $firstName $lastName</p>";
        echo "<p>Correo: $email</p>";
        echo "<p>Deporte Favorito: $favoriteSport</p>";
        echo "<p>Comida Favorita: $favoriteFood</p>";
        echo "<p>Canción Favorita: $favoriteSong</p>";
    }
    ?>
</body>
</html>