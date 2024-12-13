<?php
require_once 'bbdd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = conexionBD();

    $telefono = $_POST['telefono'];
    $password = $_POST['password'];
    $avatar = $_POST['avatar'];

    $query = $conexion->prepare("SELECT * FROM usuarios WHERE telefono = ?");
    $query->bind_param('i', $telefono);
    $query->execute();
    $result = $query->get_result();

    if ($result->num_rows > 0) {
        header("Location: registerForm.php?error=1");
        exit();
    }

    if ($avatar) {
        $query = $conexion->prepare("INSERT INTO Usuarios (telefono, password, avatar) VALUES (?, ?, ?)");
        $query->bind_param('iss', $telefono, $password, $avatar);
    } else {
        $query = $conexion->prepare("INSERT INTO Usuarios (telefono, password) VALUES (?, ?)");
        $query->bind_param('is', $telefono, $password);
    }

    if ($query->execute()) {
        header("Location: loginForm.php?success=1");
    }

    $query->close();
    $conexion->close();
}