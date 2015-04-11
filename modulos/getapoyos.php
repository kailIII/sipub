<?php

$a = $_GET['a'];
$conexion= new mysqli("localhost","root","tr15t4n14","padron_beneficiarios");
$conexion->query("SET NAMES utf8");
$consulta = "SELECT * FROM caracteristicas_apoyo WHERE id_tipo_apoyo = '$a'";
$ex_consulta = $conexion->query($consulta);
$opciones = "<option value='0'> -Seleccione- </option>";
while($r=$ex_consulta->fetch_assoc()){
 $opciones.="<option value='".$r['id_caracteristica']."'>".$r['caracteristica']."</option>";
}
$return = "<div id='caracteristica_apoyo'>
<label for='perfil_s' class='control-label col-xs-2'>Caracteristica del apoyo</label>
<div class='col-xs-6'>
<select name='tipo_apoyo' id='tipo_apoyo' class='form-control'>".$opciones."</select>
</div></div>";
echo $return;

?>
