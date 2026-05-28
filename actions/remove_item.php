<?php
session_start();
require_once "../includes/db.php";

if (!isset($_SESSION['user_id'])) {
    die("No autorizado");
}

$user_id = $_SESSION['user_id'];
$item_id = $_GET['id'] ?? null;

if (!$item_id) {
    header("Location: ../user/carrito.php");
    exit;
}

// 🔒 Validar que el item pertenece al usuario
$sql = "SELECT ci.id 
        FROM carrito_item ci
        INNER JOIN carritos c ON ci.carrito_id = c.id
        WHERE ci.id = $item_id 
        AND c.usuario_id = $user_id";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {

    // Eliminar item
    $delete = "DELETE FROM carrito_item WHERE id = $item_id";
    $conn->query($delete);
}

// Redirigir siempre
header("Location: ../user/carrito.php");
exit;