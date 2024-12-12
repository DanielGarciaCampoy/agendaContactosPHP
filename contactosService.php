<?php

require_once 'bbdd.php';

function getAllContactos() {
    $conexion = conexionBD();

    $sql = "SELECT id, nombre, apellidos, telefono FROM Contactos";
    $resultado = $conexion->query($sql);

    $contactos = [];
    while ($fila = $resultado->fetch_assoc()) {
        $contactos[] = [
            'id' => $fila['id'],
            'nombre' => $fila['nombre'],
            'apellidos' => $fila['apellidos'],
            'telefono' => $fila['telefono'],
        ];
    }

    return $contactos;
}

function getContactoById($id) {
    $conexion = conexionBD();

    $sql = "SELECT id, nombre, apellidos, telefono FROM Contactos WHERE id = ?";
    $query = $conexion->prepare($sql);
    $query->bind_param("i", $id);
    $query->execute();
    $resultado = $query->get_result();

    $contacto = $resultado->fetch_assoc();

    $query->close();
    $conexion->close();

    return $contacto;
}