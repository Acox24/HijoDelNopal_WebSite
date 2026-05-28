<?php
session_start();
require_once "../includes/db.php";

// Verificar login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$producto_id = intval($_GET['id']);
$cantidad = intval($_GET['cantidad']);

if ($cantidad <= 0) {
    $cantidad = 1;
}

# Buscar carrito ACTIVO del usuario

$sql = "SELECT id FROM carritos 
        WHERE usuario_id = $user_id AND status = 'activo' 
        LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows == 0) {

    // crear carrito
    $conn->query("
        INSERT INTO carritos (usuario_id, status)
        VALUES ($user_id, 'activo')
    ");

    $carrito_id = $conn->insert_id;

} else {
    $row = $result->fetch_assoc();
    $carrito_id = $row['id'];
}


# Ver si el producto ya está en carrito

$sql = "SELECT id, cantidad FROM carrito_item 
        WHERE carrito_id = $carrito_id 
        AND producto_id = $producto_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

    // actualizar cantidad
    $row = $result->fetch_assoc();
    $nuevaCantidad = $row['cantidad'] + $cantidad;

    $conn->query("
        UPDATE carrito_item 
        SET cantidad = $nuevaCantidad
        WHERE id = {$row['id']}
    ");

} else {

    // insertar nuevo item
    $conn->query("
        INSERT INTO carrito_item (carrito_id, producto_id, cantidad)
        VALUES ($carrito_id, $producto_id, $cantidad)
    ");
}


# Regresar

header("Location: ../user/catalogo.php?added=1");
exit();
?>