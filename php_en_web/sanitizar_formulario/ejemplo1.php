<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar entradas
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Validar que los campos no estén vacíos
    if (empty($usuario) || empty($password)) {
        echo "Todos los campos son obligatorios.";
    } else {
        // Si está todo bien, escapa las salidas antes de mostrarlas o utilizarlas
        $usuario_safe = htmlspecialchars($usuario, ENT_QUOTES, 'UTF-8');
        $password_safe = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

        // Aquí va el código de validación de credenciales
        echo "Usuario: $usuario_safe<br>";
        echo "Contraseña: $password_safe";
    }
}
?>

<form method="post" action="">
    Usuario: <input type="text" name="usuario"><br>
    Contraseña: <input type="password" name="password"><br>
    <input type="submit" value="Iniciar sesión">
</form>
