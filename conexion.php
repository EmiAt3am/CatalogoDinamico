<?php
$servidor = "sql107.infinityfree.com"; 
$usuario = "if0_42064795";       
$contraseña = "RjImUhjzgRpl8g"; 
$basedatos = "if0_42064795_contacto"; 
$puerto = 3306; 

// Conexion
$conexion = new mysqli($servidor, $usuario, $contraseña, $basedatos, $puerto);

if ($conexion->connect_error) {
    die("Conexion fallida: " . $conexion->connect_error);
}
?>