<?php
include '../includes/conexion.php';

if (!isset($_GET['id'])) {
    echo "<p class='container'>ID no especificado.</p>";
    exit;
}

$id = $_GET['id'];
$conn->query("DELETE FROM juegos WHERE id = $id");

echo "<script>alert('Juego eliminado'); window.location='panel.php';</script>";
?>
