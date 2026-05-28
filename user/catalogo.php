<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
session_start();
require_once '../includes/get_proucts.php';
?>

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
    <script src="../js/main.js"></script>
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

    <?php if (isset($_SESSION['user_id'])): ?>

        <li><a href="carrito.php">Carrito</a></li>

        <li>Hola, <?= $_SESSION['user_email'] ?></li>
        <li><a href="../logout.php">Cerrar sesión</a></li>

    <?php else: ?>

        <li><a href="../login.php">Iniciar sesión</a></li>
        <li><a href="../registro.php">Registrarse</a></li>

    <?php endif; ?>

  </ul>
</nav>
    </header>

    <section class="catalogo-header container">
      <h2>Catálogo de Productos</h2>

      <form method="GET" class="buscador">
        <input type="text" name="buscar" placeholder="Buscar producto..." />
        <button type="submit" class="btn-primary">Buscar</button>
      </form>
    </section>

    <section class="catalogo container">
      <aside class="filtros">
        <h3>Filtros</h3>

        <div>
          <h4>Categoría</h4>
          <ul>
            <li><a href="?categoria=CAMISA">Camisas</a></li>
            <li><a href="?categoria=TAZA">Tazas</a></li>
            <li><a href="?categoria=GORRA">Gorras</a></li>
            <li><a href="?categoria=SUDADERA">Sudaderas</a></li>
          </ul>
        </div>

        <div>
          <h4>Precio</h4>
          <ul>
            <li><a href="?precio=0-100">$0 - $100</a></li>
            <li><a href="?precio=100-300">$100 - $300</a></li>
            <li><a href="?precio=300plus">$300+</a></li>
          </ul>
        </div>

        <div>
          <h4>Popularidad</h4>
          <ul>
            <li><a href="?popularidad=mas-vendidos">Más vendidos</a></li>
            <li><a href="?popularidad=nuevos">Nuevos</a></li>
          </ul>
        </div>
      </aside>

      <div class="productos-catalogo">
        <div class="grid-productos">

            <?php while ($row = $result->fetch_assoc()): ?>

              <div class="card">

                <?php if ($row['is_new']): ?>
                  <span class="badge">Nuevo</span>
                <?php elseif ($row['is_best_seller']): ?>
                  <span class="badge">Más vendido</span>
                <?php endif; ?>

                <img src="../<?= $row['imagen'] ?>" alt="<?= $row['nombre'] ?>" />
                <h3><?= $row['nombre'] ?></h3>
                <p>$<?= $row['precio'] ?> MXN</p>

                <button class="btn-carrito"
                  onclick="<?php if(isset($_SESSION['user_id'])): ?>
                      abrirModalCarrito(
                        <?= $row['id'] ?>,
                        '<?= $row['nombre'] ?>',
                        <?= $row['precio'] ?>
                      )
                  <?php else: ?>
                      window.location.href = '../login.php'
                  <?php endif; ?>">
                  🛒
                </button>

              </div>
            <?php endwhile; ?>
            <?php include '../views/añadir_producto_carrito.php'; ?>

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
