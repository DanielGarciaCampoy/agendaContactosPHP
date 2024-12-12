<?php
require_once 'bbdd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    // $foto = $_POST['photo'] ?? '';
    $id_usuario = $_POST['id_usuario']; 

    $conexion = conexionBD();

    $sql = "INSERT INTO contactos (nombre, apellidos, telefono, id_usuario) VALUES (?, ?, ?, ?)";
    $query = $conexion->prepare($sql);
    $query->bind_param("ssii", $nombre, $apellidos, $telefono, $id_usuario);

    if ($query->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query->error;
    }

    $query->close();
    $conexion->close();
} else {
    header("Location: index.php");
    exit();
}