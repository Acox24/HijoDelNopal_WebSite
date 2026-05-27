<?php
session_start();

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
    header("Location: ../login.php");
    exit();
}
?>

<?php
require_once '../includes/db.php';

$sql = "SELECT * FROM productos";
$result = mysqli_query($conn, $sql);
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Admin - Productos</title>

  <link rel="stylesheet" href="../css/base.css">
  <link rel="stylesheet" href="../css/layout.css">
  <link rel="stylesheet" href="../css/components.css">
  <link rel="stylesheet" href="../css/pages/catalogo.css">
  <script src="../js/main.js"></script>
</head>

<body>

<header>
  <nav class="navbar">
    <h1>Panel Admin</h1>

    <ul class="nav-links">
          <li><a>Catálogo</a></li>
          <li>Hola, <?= $_SESSION['user_email'] ?></li>
          <li><a href="../logout.php">Cerrar sesión</a></li>
    </ul>
  </nav>
</header>

<section class="container">
  <h2>Gestión de Productos</h2>

  <div class="registro-form">
    <h3>Agregar producto</h3>

    <form action="../actions/add_producto.php" method="POST" enctype="multipart/form-data">
      
      <input type="text" name="nombre" placeholder="Nombre" required>
      <input type="number" name="precio" placeholder="Precio" required>

      <select name="categoria">
        <option value="CAMISA">Camisas</option>
        <option value="TAZA">Tazas</option>
        <option value="GORRA">Gorras</option>
        <option value="SUDADERA">Sudaderas</option>
      </select>

      <input type="file" name="imagen" accept="image/*" required>

      <select name="etiqueta">
        <option value="">Sin etiqueta</option>
        <option value="nuevo">Nuevo</option>
        <option value="popular">Popular</option>
      </select>

      <button type="submit" class="btn-primary">Agregar</button>
    </form>
  </div>

  <div class="productos-catalogo">
  <h3>Productos actuales</h3>

  <div class="grid-productos">

    <?php while($row = mysqli_fetch_assoc($result)): ?>

      <div class="card">
        <div class="card-actions">
          <button onclick="abrirModal(<?= $row['id'] ?>, '<?= $row['nombre'] ?>', <?= $row['precio'] ?>, '<?= $row['categoria'] ?>', '<?= $row['etiqueta'] ?>')">Editar</button>
          
          <a href="../actions/delete_producto.php?id=<?= $row['id'] ?>" 
             class="btn-delete"
             onclick="return confirm('¿Eliminar este producto?');">
             🗑️
          </a>
        </div>

        <?php if ($row['etiqueta']): ?>
          <span class="badge"><?= $row['etiqueta'] ?></span>
        <?php endif; ?>

        <img src="../<?= $row['imagen'] ?>" alt="">
        <h3><?= $row['nombre'] ?></h3>
        <p>$<?= $row['precio'] ?> MXN</p>

      </div>

    <?php endwhile; ?>

  </div>
</div>

</section>

<script src="../js/main.js"></script>
<?php include '../views/editar_producto.php'; ?>
</body>
</html>