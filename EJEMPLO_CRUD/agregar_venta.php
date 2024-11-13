<?php
// agregar_venta.php
require 'config.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_cliente = $_POST['nombre_cliente'];
    $cita_agendada = $_POST['cita_agendada'];
    $fecha_venta = $_POST['fecha_venta'];
    $productos_seleccionados = $_POST['productos'];

    if (empty($productos_seleccionados)) {
        die("Debe seleccionar al menos un producto.");
    }

    // Preparar datos de productos
    $productos = [];
    foreach ($productos_seleccionados as $producto_id) {
        // Puedes agregar aquí la lógica para la cantidad si es necesario
        $productos[] = ['id' => $producto_id, 'cantidad' => 1];
    }

    $productos_json = json_encode($productos);

    // Insertar en la tabla ventas
    $stmt = $pdo->prepare("INSERT INTO ventas (usuario_id, nombre_cliente, cita_agendada, fecha_venta, productos) VALUES (?, ?, ?, ?, ?)");
    try {
        $stmt->execute([$_SESSION['usuario_id'], $nombre_cliente, $cita_agendada, $fecha_venta, $productos_json]);
        header("Location: dashboard.php");
        exit;
    } catch (Exception $e) {
        die("Error al guardar la venta: " . $e->getMessage());
    }
} else {
    header("Location: dashboard.php");
    exit;
}
?>