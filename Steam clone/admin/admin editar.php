<?php
include '../includes/conexion.php';
include '../includes/header.php';

if (!isset($_GET['id'])) {
    echo "<p class='container'>ID no especificado.</p>";
    exit;
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];

    $conn->query("UPDATE juegos SET titulo='$titulo', descripcion='$descripcion', precio=$precio, imagen='$imagen' WHERE id=$id");
    echo "<script>alert('Juego actualizado'); window.location='panel.php';</script>";
}

$juego = $conn->query("SELECT * FROM juegos WHERE id = $id")->fetch_assoc();
?>

<div class="container">
  <h2>Editar Juego</h2>
  <form method="POST">
    <input name="titulo" value="<?= $juego['titulo'] ?>" required><br>
    <textarea name="descripcion"><?= $juego['descripcion'] ?></textarea><br>
    <input type="number" name="precio" step="0.01" value="<?= $juego['precio'] ?>" required><br>
    <input name="imagen" value="<?= $juego['imagen'] ?>"><br>
    <button type="submit">Actualizar</button>
  </form>
</div>

<?php include '../includes/footer.php'; ?>
