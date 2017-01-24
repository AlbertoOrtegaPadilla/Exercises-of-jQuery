<form id="formulario">
<input type="hidden" id="codigomodificar" value=""><br>
nombre:<input type="text" id="nombremodificar" value=""><br>
Apellido:<input type="text" id="apellidomodificar" value=""><br>
Edad:<input type="text" id="edadmodificar" value=""><br>
Salario:<input type="text" id="salariomodificar" value=""><br>
Comision:<input type="text" id="comisionmodificar" value=""><br>
Codigo Departamento:<select id="codigodepartamentomodificar">
<?php
$consulta2 = "SELECT * FROM departamento";
$resultado2 = $conexion->query($consulta2);
while ($fila2 = $resultado2->fetch_object()){?>
<option value="<?= $fila2->codigo?>"><?= $fila2->nombre?></option>
<?php } ?>
</select>
</form>
