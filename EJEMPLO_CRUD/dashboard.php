<?php
// dashboard.php
require 'config.php';

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit;
}

// Obtener inventario
$stmt = $pdo->query("SELECT * FROM inventario");
$inventario = $stmt->fetchAll();

// Obtener ventas
$stmt = $pdo->prepare("SELECT ventas.*, usuarios.username FROM ventas JOIN usuarios ON ventas.usuario_id = usuarios.id ORDER BY ventas.id DESC");
$stmt->execute();
$ventas = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/estilos.css">
</head>
<body>
    <h2>Dashboard</h2>
    <p>Bienvenido, <?php echo $_SESSION['usuario_id']; ?>. <a href="logout.php">Cerrar sesión</a></p>

    <h3>Agregar Venta</h3>
    <form method="post" action="agregar_venta.php">
        <label>Nombre del Cliente:</label><br>
        <input type="text" name="nombre_cliente" required><br><br>

        <label>Cita Agendada:</label><br>
        <input type="datetime-local" name="cita_agendada" required><br><br>

        <label>Fecha de la Venta:</label><br>
        <input type="date" name="fecha_venta" required><br><br>

        <label>Seleccionar Productos:</label><br>
        <?php foreach($inventario as $producto): ?>
            <input type="checkbox" name="productos[]" value="<?php echo $producto['id']; ?>">
            <?php echo htmlspecialchars($producto['nombre_producto']) . " - $" . number_format($producto['precio'], 2); ?><br>
        <?php endforeach; ?>
        <br>
        <button type="submit">Guardar Venta</button>
    </form>

    <h3>Lista de Ventas</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Cliente</th>
            <th>Cita Agendada</th>
            <th>Fecha de Venta</th>
            <th>Productos</th>
            <th>Acciones</th>
        </tr>
        <?php foreach($ventas as $venta): ?>
            <tr>
                <td><?php echo $venta['id']; ?></td>
                <td><?php echo htmlspecialchars($venta['username']); ?></td>
                <td><?php echo htmlspecialchars($venta['nombre_cliente']); ?></td>
                <td><?php echo $venta['cita_agendada']; ?></td>
                <td><?php echo $venta['fecha_venta']; ?></td>
                <td>
                    <?php 
                        $productos = json_decode($venta['productos'], true);
                        foreach($productos as $producto){
                            // Obtener nombre y precio del producto
                            $stmt = $pdo->prepare("SELECT nombre_producto, precio FROM inventario WHERE id = ?");
                            $stmt->execute([$producto['id']]);
                            $prod = $stmt->fetch();
                            echo htmlspecialchars($prod['nombre_producto']) . " - $" . number_format($prod['precio'],2) . " x " . $producto['cantidad'] . "<br>";
                        }
                    ?>
                </td>
                <td>
                    <a href="editar_venta.php?id=<?php echo $venta['id']; ?>">Editar</a> | 
                    <a href="eliminar_venta.php?id=<?php echo $venta['id']; ?>" onclick="return confirm('¿Seguro que quieres eliminar esta venta?');">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>