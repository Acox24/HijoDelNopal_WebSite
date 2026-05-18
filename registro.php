<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
     <link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" href="css/layout.css" />
    <link rel="stylesheet" href="css/components.css" />
    <link rel="stylesheet" href="css/pages/registro.css" />
    <script src="js/main.js"></script>
</head>
<body>

    <header>
      <nav class="navbar">
        <div class="logo">
          <h1>El Hijo del Nopal</h1>
        </div>

        <div class="menu-toggle" id="menu-toggle">☰</div>

        <ul class="nav-links" id="nav-links">
          <li><a href="index.php">Home</a></li>
          <li><a href="user/catalogo.php">Catálogo</a></li>
          <li><a href="#">Contacto</a></li>
        </ul>
      </nav>
    </header>

     <section class="registro container">

        <div class="registro-form">
            <h2>Crear Cuenta</h2>

            <?php if (isset($_GET['error']) && $_GET['error'] == 'correo'): ?>
              <div class="alert failure">
                Este correo ya está registrado
              </div>
            <?php endif; ?>

            <form action="actions/register_action.php" method="POST">

                <label>Nombre completo</label>
                <input type="text" placeholder="Tu nombre completo" name="nombre" required>

                <label>Correo electrónico</label>
                <input type="email" placeholder="ejemplo@correo.com" name="correo" required>

                <label>Contraseña</label>
                <input type="password" placeholder="********" id="password" name="password" required>

                <label>Confirmar contraseña</label>
                <input type="password" placeholder="********" id="confirm_password" name="confirm_password" required>

                <p id="mensaje-error" style="color:red;"></p>

                <div class="registro-actions">
                    <a href="login.php">¿Ya tienes cuenta? Inicia sesión</a>
                    <button id="registro-btn" type="submit" class="btn-primary">Registrarse</button>
                </div>

            </form>
        </div>

    </section>

     <section class="legal container">
      <a href="#">Términos y condiciones</a>
      <a href="#">Política de privacidad</a>
      <a href="#">Contacto</a>
    </section>
    
</body>
</html>