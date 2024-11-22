<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir contacto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="index">
        <div class="logo">
            <img src="#" alt="logo">
            <h1>Wasap 4</h1>
        </div>
        <div>
            <h2>Contacto nuevo</h2>
        </div>
        <div class="botones">
            <a href="index.php" class="usuario" title="Usuario">
                <img src="img/volver.png" alt="">
            </a>
        </div>
    </header>
    <main class="addContacto">
        <div class="container">
            <h2>Añadir contacto</h2>
            <form action="add" action="post">
                <label for="nombre"><b>Nombre:</b></label><br>
                <input type="text" id="nombre" name="nombre" placeholder="Introduzca el nombre..."><br><br>

                <label for="nombre"><b>Apellidos:</b></label><br>
                <input type="text" id="apellidos" name="apellidos" placeholder="Introduzca los apellidos..."><br><br>

                <label for="nombre"><b>Telefono:</b></label><br>
                <input type="text" id="telefono" name="telefono" placeholder="Introduzca el num. de teléfono..."><br><br>

                <button type="submit">Añadir contacto</button>
            </form>
        </div>
    </main>
</body>
</html>