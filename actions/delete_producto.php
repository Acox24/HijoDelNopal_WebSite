<?php
require_once("../includes/db.php"); 

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // 1. Obtener ruta de imagen
    $result = mysqli_query($conn, "SELECT imagen FROM productos WHERE id = $id");

    if ($row = mysqli_fetch_assoc($result)) {

        $rutaImagen = "../" . $row['imagen'];

        // 2. Eliminar imagen si existe
        if (file_exists($rutaImagen)) {
            unlink($rutaImagen);
        }
    }

    // 3. Eliminar producto
    $query = "DELETE FROM productos WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header("Location: ../admin/admin-catalogo.php?deleted=1");
        exit();
    } else {
        echo "Error al eliminar producto";
    }

} else {
    echo "ID no especificado";
}