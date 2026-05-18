<?php
session_start();
require_once '../includes/db.php';

$email = $_POST['email'];
$password = $_POST['password'];

// 1. Buscar usuario
$sql = "SELECT * FROM usuarios WHERE correo = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    
    $user = mysqli_fetch_assoc($result);

    // 2. Verificar contraseña
    if (password_verify($password, $user['password'])) {
        
        // 3. Crear sesión
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['rol'];

        // 4. Redirigir
        header("Location: ../index.php");
        exit();

    } else {
        header("Location: ../login.php?error=pass");
        exit();
    }

} else {
    header("Location: ../login.php?error=user");
    exit();
}