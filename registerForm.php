<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <form action="register.php" method="post">
        <label for="telefono">Teléfono:</label>
        <input type="text" id="telefono" name="telefono" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Registrarse</button>
    </form>
    <p>¿Ya tienes una cuenta? <a href="loginForm.php">Inicia sesión aquí</a>.</p>
</body>
</html>