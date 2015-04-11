<?php
if(isset($_GET['m'])){
$mpio = $_GET['m'];
}
if ($mpio !== "") {
    $conexion = new mysqli('localhost','root','tr15t4n14','padron_beneficiarios');
    $conexion->query("SET NAMES utf8");
    $consulta = "select
	id, localidad FROM localidades
    where id_municipio = '$mpio' ";
    $ex_consulta = $conexion->query($consulta);
    while($r = $ex_consulta->fetch_assoc()){
	   $opciones .= "<option value='".$r['id']."'>".$r['localidad']."</option>";
 	}
	$conexion->close();
	$return_value = "<div class='form-group' id='localidades'>
<label for='localidad' class='control-label col-xs-2'>Localidad</label>
<div class='col-xs-6'>
<select id='localidad' name='localidad' class='form-control'>
<option value='0'>-Seleccione-</option>
$opciones
</select>
</div>
</div>

<div class='form-group' id='cp_input'>
<label for='cp' class='control-label col-xs-2'>C.P.</label>
<div class='col-xs-6'>
<div class='input-group'>
<input type='text' class='form-control' name='cp' maxlength='5' id='cp'>
<span class='input-group-addon' style='background-color:#edffe5;'>
<a href='javascript:validar_cp();' class='text-success'>
<span class='glyphicon glyphicon-search' aria-hidden='true'></span>
</a>
</span>
</div>
</div>
</div>";
echo $return_value;
}
?>
