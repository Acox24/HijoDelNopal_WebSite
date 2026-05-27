<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("../includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    $etiqueta = $_POST['etiqueta'];

    // Mapear etiquetas
    $is_new = 0;
    $is_best_seller = 0;

    if (!empty($_FILES["imagen"]["name"])) {

    $directorio = "../img/productos/";
    $nombreArchivo = basename($_FILES["imagen"]["name"]);

    // Ruta física (para guardar archivo)
    $rutaServidor = $directorio . $nombreArchivo;

    // Ruta para la BD (para mostrar en HTML)
    $rutaBD = "img/productos/" . $nombreArchivo;

    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaServidor)) {

        $query = "UPDATE productos 
                  SET nombre='$nombre', 
                      precio='$precio', 
                      categoria='$categoria', 
                      is_new=$is_new, 
                      is_best_seller=$is_best_seller, 
                      imagen='$rutaBD'
                  WHERE id=$id";

    } else {
        echo "Error al subir imagen";
        exit();
    }

} else {

    // SIN imagen → no tocar campo imagen
    $query = "UPDATE productos 
              SET nombre='$nombre', 
                  precio='$precio', 
                  categoria='$categoria', 
                  is_new=$is_new, 
                  is_best_seller=$is_best_seller
              WHERE id=$id";
}


    if (mysqli_query($conn, $query)) {
        header("Location: ../admin/admin-catalogo.php?msg=actualizado");
    } else {
        echo "Error al actualizar: " . mysqli_error($conn);
    }
}
