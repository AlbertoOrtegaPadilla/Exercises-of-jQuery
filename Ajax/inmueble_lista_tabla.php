<?php
include "conexion.php";

//Solo en el caso de que se pulse para buscar por idtipo se duerme un segundo el servidor
if (!empty($_POST["codigo"])  && empty($_POST["nombre"]) ) sleep(1);

//Consulta general del listado de inmuebles
$consulta = "
SELECT e.codigo, e.nombre, e.apellido, e.edad, e.salario, e.comision, e.codigoDepartamento, d.nombre as nombreDep
    FROM empleado e, departamento d
    WHERE e.codigoDepartamento = d.codigo";

//Consulta en función de dirección
if (!empty($_GET["busquedaapellido"])){
$consulta.= " AND e.apellido LIKE '%" . $_GET["busquedaapellido"] . "%' ";
}

//Si llega el parametro ordenar se ordena por ese campo
if (!empty($_POST["codigo"]))
	$consulta .= " AND e.codigo = " . $_POST["codigo"];

$resultado = $conexion->query($consulta);

	?>

<table id="tabladatos" align="center" class="container">
    <tr align="center">
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Salario</th>
            <th>Comision</th>
            <th>Nombre Departamento</th>
    </tr>
<?php
while ($fila = $resultado->fetch_object()){?>
<tr id="empleado_<?=$fila->codigo?>" align="center" data-empleado="<?=$fila->codigo?>">
                <td class="nombre"><?=$fila->nombre?></td>
                <td class="apellido"><?=$fila->apellido;?></td>
                <td class="edad"><?=$fila->edad;?></td>
                <td class="salario"><?=$fila->salario;?></td>
                <td class="comision"><?=$fila->comision;?></td>
                <td class="codigodepartamento" name="<?=$fila->nombreDep?>"><?=$fila->nombreDep;?></td>
        <td> <img class="borrar" src="img/borrar.png" width="20" height="20" alt="Borrar">
    &nbsp;<img class="modificar" src="img/lapiz.png" width="20" height="20" alt="Modificar">
   	</td>
</tr>
<?php }//while ?>
</table>
<?php //} //if  ?>
