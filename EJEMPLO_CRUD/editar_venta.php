<?php
// editar_venta.php
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

// Obtener la venta
$stmt = $pdo->prepare("SELECT * FROM ventas WHERE id = ?");
$stmt->execute([$venta_id]);
$venta = $stmt->fetch();

if (!$venta) {
    die("Venta no encontrada.");
}

// Obtener inventario
$stmt = $pdo->query("SELECT * FROM inventario");
$inventario = $stmt->fetchAll();

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
        $productos[] = ['id' => $producto_id, 'cantidad' => 1];
    }

    $productos_json = json_encode($productos);

    // Actualizar la venta
    $stmt = $pdo->prepare("UPDATE ventas SET nombre_cliente = ?, cita_agendada = ?, fecha_venta = ?, productos = ? WHERE id = ?");
    try {
        $stmt->execute([$nombre_cliente, $cita_agendada, $fecha_venta, $productos_json, $venta_id]);
        header("Location: dashboard.php");
        exit;
    } catch (Exception $e) {
        die("Error al actualizar la venta: " . $e->getMessage());
    }
}

// Obtener productos seleccionados
$productos_actuales = json_decode($venta['productos'], true);
$productos_ids = array_column($productos_actuales, 'id');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Venta</title>
    <link rel="stylesheet" href="assets/estilos.css">
</head>
<body>
    <h2>Editar Venta</h2>
    <form method="post" action="">
        <label>Nombre del Cliente:</label><br>
        <input type="text" name="nombre_cliente" value="<?php echo htmlspecialchars($venta['nombre_cliente']); ?>" required><br><br>

        <label>Cita Agendada:</label><br>
        <input type="datetime-local" name="cita_agendada" value="<?php echo date('Y-m-d\TH:i', strtotime($venta['cita_agendada'])); ?>" required><br><br>

        <label>Fecha de la Venta:</label><br>
        <input type="date" name="fecha_venta" value="<?php echo $venta['fecha_venta']; ?>" required><br><br>

        <label>Seleccionar Productos:</label><br>
        <?php foreach($inventario as $producto): ?>
            <input type="checkbox" name="productos[]" value="<?php echo $producto['id']; ?>" <?php if(in_array($producto['id'], $productos_ids)) echo 'checked'; ?>>
            <?php echo htmlspecialchars($producto['nombre_producto']) . " - $" . number_format($producto['precio'], 2); ?><br>
        <?php endforeach; ?>
        <br>
        <button type="submit">Actualizar Venta</button>
    </form>
    <br>
    <a href="dashboard.php">Volver al Dashboard</a>
</body>
</html>