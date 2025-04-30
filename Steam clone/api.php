<?php
include 'includes/conexion.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT id, titulo, precio FROM juegos WHERE id = $id");
    $juego = $result->fetch_assoc();
    echo json_encode($juego);
}
?>
