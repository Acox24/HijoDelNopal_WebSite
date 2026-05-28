<?php
require_once "db.php";

$cart_items = [];

if (!isset($carrito['id'])) {
    return $cart_items;
}

$carrito_id = $carrito['id'];

$sql = "SELECT 
            ci.id,
            ci.cantidad,
            p.nombre,
            p.precio,
            p.imagen
        FROM carrito_item ci
        INNER JOIN productos p ON ci.producto_id = p.id
        WHERE ci.carrito_id = $carrito_id";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $cart_items[] = $row;
    }
}

return $cart_items;