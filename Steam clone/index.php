<?php
include 'includes/conexion.php';
include 'includes/header.php';

$resultado = $conn->query("SELECT * FROM juegos");
?>

<div class="container">
  <h2 class="titulo">Tienda de Juegos</h2>
  <div class="juegos">
    <?php while ($juego = $resultado->fetch_assoc()) { ?>
      <div class="juego">
        <img src="imagenes/<?= $juego['imagen'] ?>" alt="<?= $juego['titulo'] ?>">
        <h3><?= $juego['titulo'] ?></h3>
        <p><?= $juego['descripcion'] ?></p>
        <p class="precio">$<?= $juego['precio'] ?></p>
        <button onclick="agregarCarrito(<?= $juego['id'] ?>)">Agregar al carrito</button>
      </div>
    <?php } ?>
  </div>
</div>

<script src="js/carrito.js"></script>
<?php include 'includes/footer.php'; ?>
