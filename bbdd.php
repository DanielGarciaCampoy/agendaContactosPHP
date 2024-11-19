<?php

function conexionBD() {
    $host = 'localhost';
    $basededatos = 'agendaContactos';
    $usuario = 'root';
    $password = '';

    $conexion = new mysqli($host, $usuario, $password, $basededatos);

    if ($conexion->connect_error) {
        die("error " . $conexion->connect_error);
    }

    return $conexion;
}