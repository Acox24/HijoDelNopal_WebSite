<?php
require_once 'db.php';

$sql = "SELECT * FROM productos WHERE 1=1";

if (isset($_GET['buscar']) && $_GET['buscar'] != '') {
    $buscar = $_GET['buscar'];
    $sql .= " AND nombre LIKE '%$buscar%'";
}

if (isset($_GET['categoria'])) {
    $categoria = $_GET['categoria'];
    $sql .= " AND categoria = '$categoria'";
}

if (isset($_GET['precio'])) {
    $precio = $_GET['precio'];
    if ($precio == '0-100') {
        $sql .= " AND precio BETWEEN 0 AND 100";
    } elseif ($precio == '100-300') {
        $sql .= " AND precio BETWEEN 100 AND 300";
    } elseif ($precio == '300plus') {
        $sql .= " AND precio > 300";
    }
}

if (isset($_GET['popularidad'])) {
    $popularidad = $_GET['popularidad'];
    if ($popularidad == 'mas-vendidos') {
        $sql .= " AND is_best_seller = 1";
    } elseif ($popularidad == 'nuevos') {
        $sql .= " AND is_new = 1";
    }
}

$result = $conn->query($sql);

?>