<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" href="css/layout.css" />
    <link rel="stylesheet" href="css/components.css" />
    <link rel="stylesheet" href="css/pages/home.css" />
    <script src="js/main.js"></script>
  </head>
  <body>
    <header>
      <?php include 'includes/productos_destacados.php'; ?>
      <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
        <div class="alert success">
          Cuenta creada correctamente
        </div>
      <?php endif; ?>

      <nav class="navbar">
        <div class="logo">
          <h1>El Hijo del Nopal</h1>
        </div>

        <div class="menu-toggle" id="menu-toggle">☰</div>

        <ul class="nav-links" id="nav-links">
          <li><a href="index.php">Home</a></li>
          <li><a href="user/catalogo.php">Catálogo</a></li>
          <li><a href="login.php">Iniciar Sesión</a></li>
          <li><a href="registro.php" class="btn-primary">Registrarse</a></li>
        </ul>
      </nav>
    </header>

    <section class="container hero">
      <img src="img/banners/portada.jpg" alt="Portada del negocio" />
    </section>

    <section class="cta">
      <a href="catalogo.html" class="btn-primary">Explorar productos</a>
    </section>

    <section class="container productos">
      <h2>Productos Destacados</h2>

      <div class="grid-productos">

      <?php while ($row = $result->fetch_assoc()): ?>

        <div class="card">

          <?php if ($row['is_new']): ?>
            <span class="badge">Nuevo</span>
          <?php elseif ($row['is_best_seller']): ?>
            <span class="badge">Más vendido</span>
          <?php endif; ?>

          <img src="<?= $row['imagen'] ?>" alt="<?= $row['nombre'] ?>" />
          <h3><?= $row['nombre'] ?></h3>
          <p>$<?= $row['precio'] ?> MXN</p>

        </div>

      <?php endwhile; ?>

      </div>
    </section>

    <footer>
      <div class="footer-content">
        <div>
          <h3>Contacto</h3>
          <p>Email: contacto@elhijodelnopal.com</p>
          <p>Tel: 444-123-4567</p>
        </div>

        <div>
          <h3>Redes Sociales</h3>
          <p>Facebook</p>
          <p>Instagram</p>
          <p>TikTok</p>
        </div>
      </div>

      <p class="copy">© 2026 El Hijo del Nopal</p>
    </footer>
  </body>
</html>
