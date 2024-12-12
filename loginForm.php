<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form action="login.php" method="POST">
        <label for="telefono">Teléfono:</label>
        <input type="number" id="telefono" name="telefono" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Ingresar</button>
    </form>
    <a href="registerForm.php"><button>Registrarse</button></a>
    <?php if (isset($_GET['success'])): ?>
        <?php if ($_GET['success'] == 1): ?>
            <p style="color: green;">Cuenta creada con éxito, ahora inicie sesión</p>
        <?php endif; ?>
    <?php endif; ?>
    <?php if (isset($_GET['error'])): ?>
        <?php if ($_GET['error'] == 1): ?>
            <p style="color: red;">Teléfono o contraseña introducida incorrecta</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>