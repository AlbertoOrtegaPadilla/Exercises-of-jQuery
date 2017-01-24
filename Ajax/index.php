<?php include_once "conexion.php"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Listado Empleados</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
        <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1.custom/jquery-ui.structure.css"/>
        <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1.custom/jquery-ui.theme.css"/>
        <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1.custom/jquery-ui.css"/>
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="js/ajax.js"></script>
    </head>
    <body>

<?php include "inmueble_cabecera.php" ?>
<div id="contenedor">
<?php include "inmueble_lista_tabla.php" ?>
</div>

<!-- CAPA DE DIALOGO MODIFICAR -->
<div id="dialogomodificar" title="Modificar Inmueble">
<?php include "inmueble_formulario_modificar.php"?>
</div>

<!-- CAPA DE DIALOGO ELIMINAR -->
<div id="dialogoborrar" title="Eliminar Inmueble">
  <p>¿Esta seguro que desea eliminar el inmueble?</p>
</div>


</body>
</html>
