<?php
include '../includes/conexion.php';
include '../includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $desc = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];

    $conn->query("INSERT INTO juegos (titulo, descripcion, precio, imagen) VALUES ('$titulo', '$desc', $precio, '$imagen')");
    echo "<script>alert('Juego agregado'); window.location='panel.php';</script>";
}
?>

<div class="container">
  <h2>Agregar Juego</h2>
  <form method="POST">
    <input name="titulo" placeholder="Título" required><br>
    <textarea name="descripcion" placeholder="Descripción"></textarea><br>
    <input type="number" name="precio" step="0.01" required><br>
    <input name="imagen" placeholder="URL Imagen"><br>
    <button type="submit">Guardar</button>
  </form>
</div>

<?php include '../includes/footer.php'; ?>
