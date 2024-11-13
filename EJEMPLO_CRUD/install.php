<?php
// install.php
// Este script ayuda a crear el usuario administrador y meter al inventario productos aleatorios.
require 'config.php';

// Crear un usuario admin
$username = 'admin';
$password = password_hash('admin123', PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO usuarios (username, password) VALUES (?, ?)");
try {
    $stmt->execute([$username, $password]);
    echo "Usuario admin creado.<br>";
} catch (Exception $e) {
    echo "Error al crear usuario: " . $e->getMessage() . "<br>";
}

// Poblar inventario con productos aleatorios
$productos = [
    ['nombre' => 'Producto A', 'precio' => 10.50],
    ['nombre' => 'Producto B', 'precio' => 20.00],
    ['nombre' => 'Producto C', 'precio' => 15.75],
    ['nombre' => 'Producto D', 'precio' => 7.30],
    ['nombre' => 'Producto E', 'precio' => 12.00],
];

$stmt = $pdo->prepare("INSERT INTO inventario (nombre_producto, precio) VALUES (?, ?)");

foreach ($productos as $producto) {
    try {
        $stmt->execute([$producto['nombre'], $producto['precio']]);
        echo "Producto {$producto['nombre']} agregado.<br>";
    } catch (Exception $e) {
        echo "Error al agregar producto: " . $e->getMessage() . "<br>";
    }
}
?>