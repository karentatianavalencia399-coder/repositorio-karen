<?php
session_start();

// Simular usuario logueado (en un caso real vendría de una BD)
$usuarioLogueado = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : null;

if ($usuarioLogueado) {
    echo "<h1>¡Bienvenido de nuevo, {$usuarioLogueado['nombre']}!</h1>";
    echo "<p>Última conexión: {$usuarioLogueado['ultima_conexion']}</p>";
} else {
    // Formulario de login
    echo "<h1>Bienvenido a nuestro sitio</h1>";
    echo '<form method="POST" action="">
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Iniciar sesión</button>
          </form>';
}

// Procesar login
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usuario'])) {
    $_SESSION['usuario'] = [
        'nombre' => $_POST['usuario'],
        'ultima_conexion' => date("d/m/Y H:i:s")
    ];
    header("Refresh:0"); // Recargar página
}
?>