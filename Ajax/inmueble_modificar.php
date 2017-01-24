<?php
include "conexion.php";

$consulta = "UPDATE empleado SET
			codigo = " . $_POST["codigomodificar"] .",
			nombre = \"" . $_POST["nombremodificar"] . "\",
			apellido = \"" . $_POST["apellidomodificar"] . "\",
			edad = " . $_POST["edadmodificar"] .",
			salario = " . $_POST["salariomodificar"] . ",
			comision = " . $_POST["comisionmodificar"] . ",
			codigoDepartamento = " . $_POST["codigodepartamentomodificar"] ."
			WHERE codigo = " . $_POST["codigomodificar"];

$conexion->query($consulta);

include "inmueble_lista_tabla.php";
?>
