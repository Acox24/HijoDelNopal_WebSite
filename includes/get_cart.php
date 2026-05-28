<?php
require_once "db.php";

$user_id = $_SESSION['user_id'] ?? null;

if (!$user_id) {
    die("Usuario no autenticado");
}

// Buscar carrito activo
$sql = "SELECT * FROM carritos 
        WHERE usuario_id = $user_id 
        AND status = 'activo' 
        LIMIT 1";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $carrito = $result->fetch_assoc();
} else {
    // Crear carrito si no existe
    $sql_insert = "INSERT INTO carritos (usuario_id, status) 
                   VALUES ($user_id, 'activo')";
    $conn->query($sql_insert);

    $carrito_id = $conn->insert_id;

    $carrito = [
        'id' => $carrito_id,
        'usuario_id' => $user_id
    ];
}