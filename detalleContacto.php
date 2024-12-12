<?php
require_once 'contactosService.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['id'])) {
    header('Location: index.php');
    exit();
}

$id = intval($_POST['id']);
$contacto = getContactoById($id);

if (!$contacto) {
    echo "<h2>Contacto no encontrado</h2>";
    echo "<a href='index.php'>Volver a la lista de contactos</a>";
    exit();
}
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
        
    </main>
</body>

</html>