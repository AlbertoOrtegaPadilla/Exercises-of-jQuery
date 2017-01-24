<?php include "conexion.php"?>
<tr id="filanueva" align="center">
    <td><input type="text" id="nombrenuevo" value=""></td>
    <td><input type="text" id="apellidonuevo" value=""></td>
    <td><input type="text" id="edadnuevo" value=""></td>
    <td><input type="text" id="salarionuevo" value=""></td>
    <td><input type="text" id="comisionnuevo" value=""></td>
    <td>
        <select placeholder="Tipo" id="codigodepartamentonuevo">
        <?php
            $consulta2 = "SELECT codigo, nombre 
                                FROM departamento
                                ORDER BY nombre";
            $resultado2 = $conexion->query($consulta2);
            while ($fila2 = $resultado2->fetch_object()){?>
            <option value="<?php echo $fila2->codigo?>"><?php echo $fila2->nombre?></option>
        <?php } //while ?>
        </select>
    </td>
    <td>
        <img id="guardarnuevo" src="img/floppy.png" width="20" height="20" alt="Guardar">
        &nbsp;&nbsp;
        <img id="cancelarnuevo" src="img/borrar.png" width="20" height="20" alt="Cancelar">
    </td>
</tr>