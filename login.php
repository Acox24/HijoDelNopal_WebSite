<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inciar Sesión</title>
    <link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" href="css/layout.css" />
    <link rel="stylesheet" href="css/components.css" />
    <link rel="stylesheet" href="css/pages/login.css" />
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

    <section class="login container">
      <div class="login-info">
        <h2>Iniciar Sesión</h2>
        <p>Por favor, ingresa tus credenciales para acceder a tu cuenta.</p>
      </div>

      <div class="login-form" id="login-form">
        <form action="actions/login_action.php" method="POST">
          <label>Correo electrónico</label>
          <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" />

          <label>Contraseña</label>
          <input type="password" id="password" name="password" placeholder="********" />

          <?php if (isset($_GET['error']) && $_GET['error'] == 'pass'): ?>
             <div class="alert failure">❌ Contraseña incorrecta</div>
          <?php endif; ?>

          <?php if (isset($_GET['error']) && $_GET['error'] == 'user'): ?>
             <div class="alert failure">❌ Correo no encontrado</div>
          <?php endif; ?>

          <div class="login-actions">
            <a href="registro.php">¿Aún no tienes cuenta?</a>
            <button id="login-btn" type="submit" class="btn-primary">Ingresar</button>
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
