<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Formulario de Inversión</title>
</head>
<body>
    <div class="container">
        <h1>Calculadora de Inversión</h1>
        <form method="POST">
            <label for="name">Nombre Completo:</label>
            <input type="text" id="name" name="name" required>

            <label for="amount">Cantidad a Invertir:</label>
            <input type="range" id="amount" name="amount" min="100" max="200000" oninput="this.nextElementSibling.value = this.value">
            <output>100</output> <!-- Muestra el valor seleccionado del slider -->

            <label for="term">Plazo de Inversión:</label>
            <select id="term" name="term">
                <option value="3">3 meses</option>
                <option value="6">6 meses</option>
                <option value="12">12 meses</option>
                <option value="24">24 meses</option>
            </select>

            <button type="submit" name="submit">Enviar</button>
        </form>

        <form action="historial.php" method="get">
            <button type="submit">Ver Historial</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $nombre = $_POST['name'];
            $cantidad = $_POST['amount'];
            $plazo = $_POST['term'];
            $interes = 1.015; // Interés compuesto mensual del 1.5%

            $ganancia = $cantidad * pow($interes, $plazo);

            echo "<p>$nombre, al invertir $$cantidad en un plazo de $plazo meses, obtendrás $$ganancia.</p>";

            // Guardar en archivo
            $data = "$nombre invirtió $$cantidad por $plazo meses y obtuvo $$ganancia.\n";
            file_put_contents('data.txt', $data, FILE_APPEND);
        }
        ?>
    </div>
</body>
</html>