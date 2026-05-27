<?php
require_once '../includes/db.php';

$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$imagen = $_POST['imagen'];
$etiqueta = $_POST['etiqueta'];

$sql = "INSERT INTO productos (nombre, precio, categoria, imagen, etiqueta)
        VALUES ('$nombre', '$precio', '$categoria', '$imagen', '$etiqueta')";

if (mysqli_query($conn, $sql)) {
    header("Location: ../admin/admin-catalogo.php?success=1");
} else {
    echo "Error: " . mysqli_error($conn);
}