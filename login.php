<?php
require_once 'bbdd.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $conexion = conexionBD();

    $telefono = $_POST['telefono'];
    $password = $_POST['password'];

    $query = $conexion->prepare("SELECT telefono, avatar FROM Usuarios WHERE telefono = ? AND password = ?");
    $query->bind_param('is', $telefono, $password);
    $query->execute();

    $result = $query->get_result();

    if ($result->num_rows == 1) {
        $usuario = $result->fetch_assoc();

        $_SESSION['usuario'] = $usuario['telefono'];
        $_SESSION['avatar'] = $usuario['avatar'] ?? '';

        header("Location: index.php");
        exit();
    } else {
        header("Location: loginForm.php?error=1");
        exit();
    }
}