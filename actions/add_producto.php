<?php

session_start();
require_once "../includes/db.php";

// Verificar método
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recibir datos
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    $etiqueta = $_POST['etiqueta'];

    // Mapear etiquetas
    $is_new = 0;
    $is_best_seller = 0;

    if ($etiqueta === "nuevo") {
        $is_new = 1;
    } elseif ($etiqueta === "popular") {
        $is_best_seller = 1;
    }

    $directorio = "../img/productos/";
    $nombreArchivo = basename($_FILES["imagen"]["name"]);
    $rutaFinal = $directorio . $nombreArchivo;

    // Mover archivo al servidor
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaFinal)) {
        // Se subió correctamente
    } else {
        // echo "Error al subir la imagen";
        // exit();
        var_dump($_FILES);
        exit();
    }

    $imagen = "img/productos/" . $nombreArchivo;

    // Insertar con prepared statement
    $sql = "INSERT INTO productos 
            (nombre, precio, categoria, imagen, is_new, is_best_seller) 
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdssii", $nombre, $precio, $categoria, $imagen, $is_new, $is_best_seller);

    // if ($stmt->execute()) {
    //     // Éxito
    //     header("Location: ../admin/admin-catalogo.php?success=1");
    // } else {
    //     // Error
    //     header("Location: ../admin/admin-catalogo.php?error=1");
    // }

    if ($stmt->execute()) {
        header("Location: ../admin/admin-catalogo.php?success=1");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
