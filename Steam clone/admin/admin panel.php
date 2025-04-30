<?php
session_start();
include '../includes/conexion.php';
include '../includes/header.php';

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'admin') {
    echo "<p class='container'>Acceso denegado</p>";
    exit;
}

$juegos = $conn->query("SELECT * FROM juegos");
?>

<div class="container">
  <h2>Panel Admin</h2>
  <a href="agregar.php">Agregar juego</a>
  <table border="1">
    <tr><th>ID</th><th>Título</th><th>Precio</th><th>Acciones</th></tr>
    <?php while ($juego = $juegos->fetch_assoc()) { ?>
      <tr>
        <td><?= $juego['id'] ?></td>
        <td><?= $juego['titulo'] ?></td>
        <td><?= $juego['precio'] ?></td>
        <td>
          <a href="editar.php?id=<?= $juego['id'] ?>">Editar</a> |
          <a href="eliminar.php?id=<?= $juego['id'] ?>">Eliminar</a>
        </td>
      </tr>
    <?php } ?>
  </table>
</div>

<?php include '../includes/footer.php'; ?>
