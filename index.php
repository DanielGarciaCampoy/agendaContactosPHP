<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: loginForm.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de contactos</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function abrirDialogForm() {
            document.getElementById('dialogForm').showModal();
        }

        function cerrarDialogForm() {
            document.getElementById('dialogForm').close();
        }

        function submitForm(contactCard) {
            const form = contactCard.querySelector('form');
            if (form) {
                form.submit();
            }
        }
    </script>
</head>

<body>
    <?php
    require_once 'contactosService.php';

    $nombreBuscar = isset($_POST['nombre']) ? $_POST['nombre'] : '';

    $contactos = getAllContactos($nombreBuscar);
    ?>
    <header class="index">
        <div class="logo">
            <img src="img/wasap.jpg" alt="logo">
            <h1>Wasap 4</h1>
        </div>
        <div class="buscarContactos">
            <form action="index.php" method="POST">
                <input type="text" name="nombre" placeholder="Buscar contactos por nombre..."
                    value="<?= htmlspecialchars($nombreBuscar); ?>">
                <button type="submit">Buscar</button>
            </form>
        </div>
        <div class="usuario">
            <p>Sesión iniciada: <?= $_SESSION['usuario'] ?>
                <?php if (!empty($_SESSION['avatar'])): ?>
                    <img src="<?= htmlspecialchars($_SESSION['avatar']); ?>" alt="avatar" class="avatar">
                <?php else: ?>
                    <img src="img/avatar.jpg" alt="avatar" class="avatar">
                <?php endif; ?>
        </div>
        <div class="botones">
            <a onclick="abrirDialogForm()" class="addContacto" title="Añadir contacto">+</a>
            <a href="logout.php" class="cerrarSesion" title="Cerrar sesión">
                <img src="img/cerrarSesion.png" alt="Cerrar sesión">
            </a>
        </div>
    </header>
    <main>
        <?php if (!empty($contactos)): ?>
            <?php foreach ($contactos as $contacto): ?>
                <div class="contactoCard" onclick="submitForm(this)">
                    <div class="contactoImg">
                        <img src="img/user.jpg" alt="Foto de <?= htmlspecialchars($contacto['nombre']); ?>">
                    </div>
                    <div class="contactoInfo">
                        <?= htmlspecialchars($contacto['nombre']); ?>, <?= htmlspecialchars($contacto['apellidos']) ?> <b>
                            <?= htmlspecialchars($contacto['telefono']); ?></b></p>
                    </div>
                    <form action="detalleContacto.php" method="post" class="hiddenForm">
                        <input type="hidden" name="id" value="<?= htmlspecialchars($contacto['id']); ?>">
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="noContacto">
                <h3>No tienes ningún contacto añadido</h3>
                <p>Usa el botón de la barra superior para añadir</p>
            </div>
        <?php endif; ?>
    </main>

    <dialog id="dialogForm">
        <div class="container">
            <h2>Añadir contacto</h2>
            <form action="addContacto.php" method="post">
                <label for="nombre"><b>Nombre:</b></label><br>
                <input type="text" id="nombre" name="nombre" required placeholder="Introduzca el nombre..."><br><br>

                <label for="apellidos"><b>Apellidos:</b></label><br>
                <input type="text" id="apellidos" name="apellidos" required
                    placeholder="Introduzca los apellidos..."><br><br>

                <label for="telefono"><b>Teléfono:</b></label><br>
                <input type="number" id="telefono" name="telefono" required
                    placeholder="Introduzca el num. de teléfono..."><br><br>

                <label for="id_usuario"><b>Id Usuario:</b></label><br>
                <input type="number" id="id_usuario" name="id_usuario" required
                    placeholder="Introduzca el id_usuario..."><br><br>

                <div class="formButtons">
                    <button type="submit">Añadir contacto</button>
                    <button type="button" onclick="cerrarDialogForm()">Cancelar</button>
                </div>
            </form>
        </div>
    </dialog>
</body>

</html>