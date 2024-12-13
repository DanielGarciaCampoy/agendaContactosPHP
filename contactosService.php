<?php

require_once 'bbdd.php';

function getAllContactos($nombreBuscar = '') {
    $conexion = conexionBD();

    $sql = "SELECT id, nombre, apellidos, telefono FROM contactos";
    
    if (!empty($nombreBuscar)) {
        $sql .= " WHERE nombre LIKE ?";
    }

    $query = $conexion->prepare($sql);

    if (!empty($nombreBuscar)) {
        $nombreBuscar = '%' . $nombreBuscar . '%';
        $query->bind_param("s", $nombreBuscar);
    }

    $query->execute();
    $resultado = $query->get_result();

    $contactos = [];
    while ($fila = $resultado->fetch_assoc()) {
        $contactos[] = [
            'id' => $fila['id'],
            'nombre' => $fila['nombre'],
            'apellidos' => $fila['apellidos'],
            'telefono' => $fila['telefono'],
        ];
    }

    $query->close();
    $conexion->close();

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