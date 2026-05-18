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
        <div class="card">
          <span class="badge">Nuevo</span>
          <img src="img/productos/camisa1.png" alt="Camisa personalizada" />
          <h3>Camisa personalizada</h3>
          <p>$250 MXN</p>
        </div>

        <div class="card">
          <span class="badge">Más vendido</span>
          <img src="img/productos/taza1.png" alt="Taza personalizada" />
          <h3>Taza personalizada</h3>
          <p>$120 MXN</p>
        </div>

        <div class="card">
          <span class="badge">Popular</span>
          <img src="img/productos/gorra1.jpg" alt="Gorra personalizada" />
          <h3>Gorra personalizada</h3>
          <p>$180 MXN</p>
        </div>

        <div class="card">
          <span class="badge">Nuevo</span>
          <img src="img/productos/sudadera1.jpg" alt="Sudadera personalizada" />
          <h3>Sudadera personalizada</h3>
          <p>$400 MXN</p>
        </div>
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
