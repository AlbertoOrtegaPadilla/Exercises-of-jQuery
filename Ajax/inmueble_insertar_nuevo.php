<?php 
include "conexion.php";

$consulta = "INSERT INTO empleado (nombre,apellido,edad,salario,comision,codigoDepartamento) 
			VALUES(\"" . $_POST["nombrenuevo"] . "\",\"" . 
			$_POST["apellidonuevo"] . "\"," .
                        $_POST["edadnuevo"] . "," .
                        $_POST["salarionuevo"] . "," .
                        $_POST["comisionnuevo"] . "," .
			$_POST["codigodepartamentonuevo"] . ")";

$conexion->query($consulta);			

include "inmueble_lista_tabla.php";
?>

