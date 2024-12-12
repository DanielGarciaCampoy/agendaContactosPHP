<?php
require_once 'bbdd.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conexion = conexionBD();

    $telefono = $_POST['telefono'];
    $password = $_POST['password'];


    $query = $conexion->prepare("SELECT * FROM Usuarios WHERE telefono = ? AND password = ?");
    $query->bind_param('is', $telefono, $password);
    $query->execute();

    $result = $query->get_result();

    if ($result->num_rows == 1) {
        $_SESSION['usuario'] = $telefono;
        header("Location: index.php");
        exit();
    } else {
        header("Location: loginForm.php?error=1");
        exit();
    }

    $query->close();
    $conexion->close();
}