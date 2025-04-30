<?php
include 'includes/conexion.php';
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $correo = $_POST['correo'];
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre_usuario, correo, contraseña) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $usuario, $correo, $clave);

    if ($stmt->execute()) {
        echo "<p class='container'>Registro exitoso. <a href='login.php'>Iniciar sesión</a></p>";
    } else {
        echo "<p class='container'>Error: " . $stmt->error . "</p>";
    }
}
?>

<div class="form-box">
  <h2>Crear Cuenta</h2>
  <form method="POST">
    <input type="text" name="usuario" placeholder="Nombre de usuario" required>
    <input type="email" name="correo" placeholder="Correo electrónico" required>
    <input type="password" name="clave" placeholder="Contraseña" required>
    <button type="submit">Registrarse</button>
  </form>
</div>

<?php include 'includes/footer.php'; ?>
