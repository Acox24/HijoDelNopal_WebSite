<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
     <link rel="stylesheet" href="css/base.css" />
    <link rel="stylesheet" href="css/layout.css" />
    <link rel="stylesheet" href="css/components.css" />
    <link rel="stylesheet" href="css/pages/carrito.css" />
</head>
<body>

    <nav class="navbar">
        <div class="logo">
          <h1>El Hijo del Nopal</h1>
        </div>

        <div class="menu-toggle" id="menu-toggle">☰</div>

        <ul class="nav-links" id="nav-links">
          <li><a href="index.html">Home</a></li>
          <li><a href="catalogo.html">Catálogo</a></li>
        </ul>
      </nav>
    </header>

    <section class="carrito-header container">
        <h2>Carrito de Compras</h2>
        <p>Revisa los productos que has agregado a tu carrito.</p>

        <a href="catalogo.html" class="btn-primary">Seguir comprando</a>
    </section>

    <section class="carrito container">

        <div class="carrito-resumen">

            <button class="btn-primary btn-full">Proceder al pago</button>
        </div>

        <div class="carrito-totales">

            <div class="card-total">
                <h4>Subtotal</h4>
            </div>

            <div class="card-total">
                <h4>Cargos adicionales</h4>
            </div>

            <div class="card-total total-final">
                <h4>Total</h4>
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
    <script src="js/main.js"></script>
    
</body>
</html>