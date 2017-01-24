<?php
include "conexion.php";


$consulta ="DELETE FROM empleado 
			WHERE codigo = ". $_GET["empleado"];
			

$conexion->query($consulta);
?>
