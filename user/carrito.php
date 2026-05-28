<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require_once "../includes/get_cart.php";
$cart_items = require_once "../includes/get_cart_items.php";

if (isset($_SESSION['success_message'])): ?>

    <div class="alert-success">
        <?= $_SESSION['success_message'] ?>
    </div>

    <?php unset($_SESSION['success_message']); ?>

<?php endif; ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="../css/base.css" />
    <link rel="stylesheet" href="../css/layout.css" />
    <link rel="stylesheet" href="../css/components.css" />
    <link rel="stylesheet" href="../css/pages/carrito.css" />
</head>
<body>

    <nav class="navbar">
        <div class="logo">
          <h1>El Hijo del Nopal</h1>
        </div>

        <div class="menu-toggle" id="menu-toggle">☰</div>

        <ul class="nav-links" id="nav-links">
          <li><a href="../index.php">Home</a></li>
          <li><a href="catalogo.php">Catálogo</a></li>
        </ul>
      </nav>
    </header>

    <section class="carrito container">

    <div class="carrito-header">
        <h2>Carrito de Compras</h2>
        <p>Revisa los productos que has agregado a tu carrito.</p>

        <a href="catalogo.php" class="btn-primary">Seguir comprando</a>
    </div>

    <div class="carrito-items">

    <?php if (!empty($cart_items)): ?>

        <?php foreach ($cart_items as $item): ?>

            <div class="card-carrito">

                <img src="../<?= $item['imagen'] ?>" alt="producto">

                <div class="info">
                    <h3><?= $item['nombre'] ?></h3>
                    <p>$<?= $item['precio'] ?> MXN</p>
                    <p>Cantidad: <?= $item['cantidad'] ?></p>
                </div>

                <div class="acciones">
                    <a href="../actions/remove_item.php?id=<?= $item['id'] ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar este artículo?');">🗑️</a>
                </div>

            </div>

        <?php endforeach; ?>

    <?php else: ?>

        <p class="empty-cart">Tu carrito está vacío</p>

    <?php endif; ?>

</div>

    <!-- DERECHA: RESUMEN -->
    <div class="carrito-summary">

      <?php
          $subtotal = 0;

          foreach ($cart_items as $item) {
              $subtotal += $item['precio'] * $item['cantidad'];
          }

          $cargos = $subtotal * 0.10;
          $total = $subtotal + $cargos;
      ?>

        <div class="card-total">
            <span>Subtotal</span>
            <span>$<?= number_format($subtotal, 2) ?></span>
        </div>

        <div class="card-total">
            <span>Cargos (10%)</span>
            <span>$<?= number_format($cargos, 2) ?></span>
        </div>

        <div class="card-total total-final">
            <span>Total</span>
            <span>$<?= number_format($total, 2) ?></span>
        </div>

        <form action="../actions/checkout.php" method="POST">
            <button class="btn-primary btn-full">
                Proceder al pago
            </button>
        </form>

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