<?php

require_once 'bbdd.php';

function getAllContactos() {
    $conexion = conexionBD();

    $sql = "SELECT nombre, apellidos, telefono FROM Contactos";
    $resultado = $conexion->query($sql);

    $contactos = [];
    while ($fila = $resultado->fetch_assoc()) {
        $contactos[] = [
            'nombre' => $fila['nombre'],
            'apellidos' => $fila['apellidos'],
            'telefono' => $fila['telefono'],
        ];
    }

    return $contactos;
}