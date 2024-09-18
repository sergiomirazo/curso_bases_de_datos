# Guía de Sanitización y Validación de Datos en PHP

Esta guía te ayudará a proteger tu aplicación PHP contra vulnerabilidades comunes como **inyección SQL**, **XSS** y **ejecución remota de código**, sanitizando y validando los datos de entrada de formularios.

## 1. Funciones para Sanitizar en PHP

PHP proporciona varias funciones para limpiar y sanitizar datos que provienen del usuario, dependiendo del tipo de dato esperado.

### a. `filter_input()`

La función `filter_input()` permite obtener y sanitizar datos de entrada de manera segura. Es ideal para formularios.

```php
$variable = filter_input(INPUT_POST, 'nombre_campo', FILTER_SANITIZE_STRING);
Ejemplos de filtros:
FILTER_SANITIZE_STRING: Elimina etiquetas HTML y caracteres especiales.
FILTER_SANITIZE_EMAIL: Elimina caracteres no válidos en un correo electrónico.
FILTER_SANITIZE_URL: Elimina caracteres no válidos en una URL.
FILTER_SANITIZE_NUMBER_INT: Elimina todo lo que no sean dígitos, signos más o menos.
```

### Ejemplo de uso en un formulario de login:
```php

$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
b. htmlspecialchars()
```

Evita la ejecución de código HTML o JavaScript transformando caracteres especiales en entidades HTML.

```php
$usuario = htmlspecialchars($_POST['usuario'], ENT_QUOTES, 'UTF-8');
c. filter_var()
```

Sirve para sanitizar o validar variables ya obtenidas.

```php
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
```

## 2. Validación de Datos

Además de sanitizar, es importante validar los datos para asegurarse de que tengan el formato correcto.

### Validar email:
```php
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
if ($email === false) {
    echo "Email no válido.";
}
```
### Validar entero:

```php
$edad = filter_input(INPUT_POST, 'edad', FILTER_VALIDATE_INT);
if ($edad === false) {
    echo "Edad no válida.";
}
```

## 3. Escapando las Salidas

Es importante escapar las salidas cuando los datos del usuario se muestran en la página o se insertan en el HTML.

```php
echo htmlspecialchars($usuario, ENT_QUOTES, 'UTF-8');
```

## 4. Ejemplo Completo de Sanitización y Validación en un Formulario

Este es un ejemplo de cómo sanitizar y validar los datos de un formulario de login:

```php
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitizar entradas
    $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Validar que los campos no estén vacíos
    if (empty($usuario) || empty($password)) {
        echo "Todos los campos son obligatorios.";
    } else {
        // Escapar las salidas
        $usuario_safe = htmlspecialchars($usuario, ENT_QUOTES, 'UTF-8');
        $password_safe = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

        // Aquí iría el código de validación de credenciales
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
```

## 5. Consideraciones Adicionales

### a. Hashing de Contraseñas
Las contraseñas deben almacenarse de forma segura utilizando hashes. Usa password_hash() para crear el hash y password_verify() para comprobarlo.

```php
// Crear hash
$hash = password_hash($password, PASSWORD_DEFAULT);

// Verificar hash
if (password_verify($password, $hash)) {
    echo "Contraseña correcta.";
} else {
    echo "Contraseña incorrecta.";
}
```

### b. Límite de Longitud

Limita la longitud de las entradas para evitar ataques de denegación de servicio (DoS).

```php
if (strlen($usuario) > 50) {
    echo "El nombre de usuario es demasiado largo.";
}
```

