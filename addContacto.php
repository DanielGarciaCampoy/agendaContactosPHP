<?php
require_once 'bbdd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    
    $conexion = conexionBD();

    $sql = "INSERT INTO Contactos (nombre, apellidos, telefono) VALUES (?, ?, ?)";
    $query = $conexion->prepare($sql);
    $query->bind_param("ssi", $nombre, $apellidos, $telefono);

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