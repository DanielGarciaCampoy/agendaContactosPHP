<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            <h1>Iniciar Sesión</h1>
            <form action="login.php" method="POST">
                <label for="telefono">Teléfono:</label>
                <input type="number" id="telefono" name="telefono" placeholder="Número de teléfono..." required>
                <br>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" placeholder="Contraseña..." required>
                <br>
                <button type="submit">Ingresar</button>
            </form>
            <div class="registrarse">
                <p>¿No tienes cuenta?</p>
                <a href="registerForm.php"><button class="registrarse">Registrarse</button></a>
            </div>
            <?php if (isset($_GET['success'])): ?>
                <?php if ($_GET['success'] == 1): ?>
                    <p style="color: black; font-weight: bold">Cuenta creada con éxito, ahora inicie sesión</p>
                <?php endif; ?>
            <?php endif; ?>
            <?php if (isset($_GET['error'])): ?>
                <?php if ($_GET['error'] == 1): ?>
                    <p style="color: red;">Teléfono o contraseña introducida incorrecta</p>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </main>
</body>

</html>