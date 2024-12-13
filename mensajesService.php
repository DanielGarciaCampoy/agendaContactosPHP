<?php

require_once 'bbdd.php';

function getMensajesByContactoId($contactoId) {
    $conexion = conexionBD();

    $sql = "SELECT id, texto, fecha_envio, id_contacto FROM Mensajes WHERE id_contacto = ?";
    $query = $conexion->prepare($sql);
    $query->bind_param("i", $contactoId);
    $query->execute();
    $resultado = $query->get_result();

    $mensajes = [];
    while ($fila = $resultado->fetch_assoc()) {
        $mensajes[] = [
            'id' => $fila['id'],
            'texto' => $fila['texto'],
            'fecha_envio' => $fila['fecha_envio'],
        ];
    }

    return $mensajes; 
}