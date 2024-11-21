<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de contactos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="index">
        <div class="logo">
            <img src="#" alt="logo">
            <h1>WhatsApp 4</h1>
        </div>
        <div class="buscarContactos">
            <input type="text" placeholder="Buscar contactos...">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="botones">
            <a href="#" class="addContacto" title="Añadir contacto">+</a>
            <a href="#" class="usuario" title="Usuario"></a>
        </div>
    </header>
    <div class="container">
        <?php 
        require_once 'contactosService.php';

        $contactos = getAllContactos();

        foreach ($contactos as $contacto): ?>
            <tr>
                <td><?= htmlspecialchars($contacto['nombre']) ?></td>
                <td><?= htmlspecialchars($contacto['apellidos']) ?></td>
                <td><?= htmlspecialchars($contacto['telefono']) ?></td>
            </tr>
        <?php endforeach; ?>
    </div>
</body>
</html>