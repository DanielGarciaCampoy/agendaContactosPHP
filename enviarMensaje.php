<?php
require_once 'bbdd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idContacto = intval($_POST['id_contacto']);
    $mensaje = trim($_POST['mensaje']);

    $conexion = conexionBD();

    $sql = "INSERT INTO mensajes (id_contacto, texto, fecha_envio) VALUES (?, ?, NOW())";
    $query = $conexion->prepare($sql);

    $query->bind_param("is", $idContacto, $mensaje);
    $query->execute();

    if ($query->affected_rows > 0) {
        $query->close();
        $conexion->close();
        header("Location: detalleContacto.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
