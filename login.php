<?php
require_once 'bbdd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conexion = conexionBD();

    $telefono = $_POST['telefono'];
    $password = $_POST['password'];


    $query = $conexion->prepare("SELECT * FROM usuarios WHERE telefono = ? AND password = ?");
    $query->bind_param('is', $telefono, $password);
    $query->execute();

    $result = $query->get_result();

    if ($result->num_rows == 1) {
        header("Location: index.php");
    } else {
        header("Location: login.php");
        exit();
    }

    $query->close();
    $conexion->close();
}