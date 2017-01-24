<?php
require_once("constantes.php");
$conexion = new mysqli(HOST, USUARIO_DB,CLAVE_DB);

if ($conexion->connect_errno > 0) {
        echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
        die ("Error: " . $conexion->connect_error);
} else {
        $conexion->select_db(NOMBRE_DB);
        $conexion->set_charset("utf8");
}
?>