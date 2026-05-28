<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once "../includes/db.php";

if (!isset($_SESSION['user_id'])) {
    die("No autorizado");
}

$user_id = $_SESSION['user_id'];

// 🔍 Buscar carrito activo
$sql = "SELECT id FROM carritos 
        WHERE usuario_id = $user_id 
        AND status = 'activo' 
        LIMIT 1";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {

    $carrito = $result->fetch_assoc();
    $carrito_id = $carrito['id'];

    // Marcar como comprado
    $update = "UPDATE carritos 
               SET status = 'COMPRADO', fecha = NOW()
               WHERE id = $carrito_id";

    $conn->query($update);

    // Guardar mensaje en sesión
    $_SESSION['success_message'] = "¡Gracias por tu compra! 🎉";

}

// Redirigir
header("Location: ../user/carrito.php");
exit;