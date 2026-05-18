<?php

include("../includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    var_dump($_POST);

    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
 

    // Encriptar contraseña
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $sql_check = "SELECT * FROM usuarios WHERE correo = '$correo'";
    $result = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result) > 0) {
        header("Location: ../registro.php?error=correo");
        exit();
    }

    // Insertar usuario
    $sql = "INSERT INTO usuarios (nombre_completo, correo, password)
            VALUES ('$nombre', '$correo', '$passwordHash')";

    if (mysqli_query($conn, $sql)) {
        header("Location: ../index.php?success=1");
        exit();

    }

}
