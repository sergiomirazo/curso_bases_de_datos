<?php
// eliminar_venta.php
require 'config.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

if (!isset($_GET['id'])) {
    header("Location: dashboard.php");
    exit;
}

$venta_id = $_GET['id'];

// Eliminar la venta
$stmt = $pdo->prepare("DELETE FROM ventas WHERE id = ?");
try {
    $stmt->execute([$venta_id]);
    header("Location: dashboard.php");
    exit;
} catch (Exception $e) {
    die("Error al eliminar la venta: " . $e->getMessage());
}
?>