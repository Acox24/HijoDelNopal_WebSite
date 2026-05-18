<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Catálogo</title>
    <link rel="stylesheet" href="../css/base.css" />
    <link rel="stylesheet" href="../css/layout.css" />
    <link rel="stylesheet" href="../css/components.css" />
    <link rel="stylesheet" href="../css/pages/catalogo.css" />
  </head>
  <body>
    <header>
      <nav class="navbar">
        <div class="logo">
          <h1>El Hijo del Nopal</h1>
        </div>

        <div class="menu-toggle" id="menu-toggle">☰</div>

        <ul class="nav-links" id="nav-links">
          <li><a href="../index.php">Home</a></li>
          <li><a href="catalogo.php">Catálogo</a></li>
          <li><a href="../login.html">Iniciar Sesión</a></li>
          <li><a href="../registro.html" class="btn-primary">Registrarse</a></li>
        </ul>
      </nav>
    </header>

    <section class="catalogo-header container">
      <h2>Catálogo de Productos</h2>

      <div class="buscador">
        <input type="text" placeholder="Buscar producto..." />
        <button class="btn-primary">Buscar</button>
      </div>
    </section>

    <section class="catalogo container">
      <aside class="filtros">
        <h3>Filtros</h3>

        <div>
          <h4>Categoría</h4>
          <ul>
            <li>Camisas</li>
            <li>Tazas</li>
            <li>Gorras</li>
          </ul>
        </div>

        <div>
          <h4>Precio</h4>
          <ul>
            <li>$0 - $100</li>
            <li>$100 - $300</li>
            <li>$300+</li>
          </ul>
        </div>

        <div>
          <h4>Popularidad</h4>
          <ul>
            <li>Más vendidos</li>
            <li>Nuevos</li>
          </ul>
        </div>
      </aside>

      <div class="productos-catalogo">
        <div class="grid-productos">
          <div class="card">
            <span class="badge">Nuevo</span>
            <img src="img/productos/camisa1.png" />
            <h3>Camisa personalizada</h3>
            <p>$250 MXN</p>
          </div>

          <div class="card">
            <span class="badge">Popular</span>
            <img src="img/productos/taza1.png" />
            <h3>Taza personalizada</h3>
            <p>$120 MXN</p>
          </div>

          <div class="card">
            <img src="img/productos/gorra1.jpg" />
            <h3>Gorra personalizada</h3>
            <p>$180 MXN</p>
          </div>
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
    <script src="../js/main.js"></script>
  </body>
</html>
