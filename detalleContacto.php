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

</html>