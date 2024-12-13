<?php
require_once 'contactosService.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['id'])) {
    header('Location: index.php');
    exit();
}

$id = intval($_POST['id']);
$contacto = getContactoById($id);

require_once 'mensajesService.php';
$mensajes = getMensajesByContactoId($id);

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Contacto</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="index">
        <div class="logo">
            <img src="img/user.jpg" alt="">
            <h2><?= $contacto['nombre'] . ' ' . $contacto['apellidos'] . ', ' . $contacto['telefono'];;?></h2>
        </div>
        <div class="botones">
        <div class="usuario">
            <p>Sesión iniciada: <?= $_SESSION['usuario'] ?>
                <?php if (!empty($_SESSION['avatar'])): ?>
                    <img src="<?= htmlspecialchars($_SESSION['avatar']); ?>" alt="avatar" class="avatar" style="width: 50px;">
                <?php else: ?>
                    <img src="img/user.jpg" alt="avatar" class="avatar" style="width: 50px;">
                <?php endif; ?>
        </div>
            <a href="index.php" class="usuario" title="Volver">
                <img src="img/volver.png" alt="">
            </a>
        </div>
    </header>
    <main>
    <?php if (!empty($mensajes)): ?>
            <?php foreach ($mensajes as $mensaje): ?>
                <div class="mensajeCard">
                    <div class="mensajeInfo">
                        <p><?= $mensaje['texto']; ?></p>
                        <p><?= $mensaje['fecha_envio']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="noContacto">
                <h3>No has iniciado una conversación todavia</h3>
                <p>Usa la barra de abajo para escribir</p>
            </div>
        <?php endif; ?>
    </main>
</body>

<footer class="mensaje">
    <form action="enviarMensaje.php" method="POST" class="mensajeForm">
        <input type="hidden" name="id_contacto" value="<?= htmlspecialchars($id); ?>">
        <input type="text" name="mensaje" placeholder="Escribe un mensaje..." required>
        <button type="submit">Enviar</button>
    </form>
</footer>

</html>