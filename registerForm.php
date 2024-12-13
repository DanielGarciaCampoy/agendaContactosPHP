<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="index">
        <div class="logo">
            <img src="img/wasap.jpg" alt="logo">
            <h1>Wasap 4</h1>
        </div>
    </header>
    <main class="login">
        <div class="container login">
            <h1>Registro de Usuario</h1>
            <form action="register.php" method="post">
                <label for="telefono">Teléfono:</label>
                <input type="number" id="telefono" name="telefono" required>
                <br>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
                <br>
                <button type="submit">Registrarse</button>
            </form>
            <div class="registrarse">
                <p>¿Ya tienes una cuenta?</p>
                <a href="loginForm.php"><button class="registrarse">Inicia sesión</button></a>
            </div>
            <?php if (isset($_GET['error'])): ?>
                <?php if ($_GET['error'] == 1): ?>
                    <p style="color: red;">El teléfono ya está registrado. Intenta con otro.</p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </main>
</body>

</html>