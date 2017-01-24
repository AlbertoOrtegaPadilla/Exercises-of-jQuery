<?php include "conexion.php"; ?>

<h3 class="left">Listado Empleados:
	<span id="carga"><img src="img/ajax-loader.gif" id="cargando" /></span>
        <select id="codigo">
<option value="" >------</option>
<?php
$consulta2 = "SELECT codigo, nombre
			FROM empleado
			ORDER BY nombre";
$resultado2 = $conexion->query($consulta2);
while ($fila2 = $resultado2->fetch_object()){?>
<option value="<?=$fila2->codigo?>"
<?php if (!empty($_POST["codigo"]) && $_POST["codigo"]==$fila2->codigo) echo ' selected="selected" '?>
><?=$fila2->nombre?></option>
<?php } ?>
</select>
        <input id="filtrar" type="button" value="filtrar" class="btn" />
<h3 class="right">Fecha DatePicker: <input type="text" placeholder="Fecha aaaa-mm-dd" id="datepicker"></h3><br><br><br><br>
<h3 class="left">Apellido: <input type="text" id="buscaapellido" value=""></h3><br>
<img src="img/nuevo.png" width="50" height="50" id="nuevo" title="Nuevo Inmueble" class="right">

</h3>
