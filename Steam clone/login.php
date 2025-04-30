<?php
session_start();
include 'includes/conexion.php';
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = $_POST['correo'];
    $clave = $_POST['clave'];

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 1) {
        $usuario = $res->fetch_assoc();
        if (password_verify($clave, $usuario['contraseña'])) {
            $_SESSION['usuario'] = $usuario['nombre_usuario'];
            $_SESSION['rol'] = $usuario['rol'];
            header("Location: index.php");
            exit;
        } else {
            echo "<p class='container'>Contraseña incorrecta</p>";
        }
    } else {
        echo "<p class='container'>Correo no registrado</p>";
    }
}
?>

<div class="form-box">
  <h2>Iniciar Sesión</h2>
  <form method="POST">
    <input type="email" name="correo" placeholder="Correo electrónico" required>
    <input type="password" name="clave" placeholder="Contraseña" required>
    <button type="submit">Ingresar</button>
  </form>
</div>

<?php include 'includes/footer.php'; ?>
