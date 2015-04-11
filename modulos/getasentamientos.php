<?php
if (isset($_GET['c'])) {
$cp = $_GET['c'];
$mun = $_GET['m'];
$conexion = new mysqli('localhost','root','tr15t4n14','padron_beneficiarios');
$conexion->query("SET NAMES utf8");
$consulta = "SELECT id,cp.n_asentamiento as asentamiento FROM codigos_postales cp where codigo_postal = '$cp' and municipio = '$mun'";
$ex_consulta = $conexion->query($consulta);
while($r = $ex_consulta->fetch_assoc()){
$encontrados = 1;
$opciones .= "<option value='".$r['id']."'>".$r['asentamiento']."</option>";
}
$conexion->close();
if($encontrados){
$return_value = "<div class='form-group' id='asentamientos'>
<label for='asentamiento' class='control-label col-xs-2'>Asentamiento</label>
<div class='col-xs-6'>
<select id='asentamiento' name='asentamiento' class='form-control' onChange='consulta_info_asentamiento(this.value);'>
<option value='0'>-Seleccione-</option>
$opciones
</select>
</div>
</div>";
}else{
$return_value = "<div class='form-group' id='asentamientos'>
<label for='asentamiento' class='control-label col-xs-2'>Asentamiento</label>
<div class='col-xs-6'>
<div class='callout callout-danger'>
<h4>Error en C.P.</h4>
<p>Es probable que el codigo postal no corresponda al municipio seleccionado, si el problema persiste contacte con la coordinación de informatica de la UPLA</p>
</div>
</div></div>";
unset($_GET);    }
echo $return_value;
}


if(isset($_GET['a'])){
$id_cp = $_GET['a'];
$conexion = new mysqli('localhost','root','tr15t4n14','padron_beneficiarios');
$conexion->query("SET NAMES utf8");
$consulta = "SELECT
ta.tipo_asentamiento as tipo,
cp.zona as zona
FROM codigos_postales cp
inner join tipo_asentamiento ta on(cp.tipo_asentamiento = ta.id_tipo)
where cp.id = '$id_cp'";
$ex_consulta = $conexion->query($consulta);
$res = $ex_consulta->fetch_assoc();

$consulta_vialidad = "SELECT id_tipo,tipo FROM tipo_vialidad WHERE activo = '1'";
$ex_cons_vialidad = $conexion->query($consulta_vialidad);
$vialidad = "<option value='0'>-seleccione-</option>";
while($res_vial = $ex_cons_vialidad->fetch_assoc()){
$vialidad.="<option value='".$res_vial['id_tipo']."'>".$res_vial['tipo']."</option>";
}




$conexion->close();
$return_value = "<div class='form-group' id='tipo_asentamiento'>
<label for='tipo_asentamiento_txt' class='control-label col-xs-2'>Tipo de Asentamiento</label>
<div class='col-xs-6'>
<input type='text' name='tipo_asentamiento_txt' class='form-control' disabled='disabled' value='".$res['tipo']."'>
<input type='hidden' name='t_asentamiento' value='".$res['tipo']."'>
</div>
</div>
<div class='form-group' id='zona'>
<label for='zona_txt' class='control-label col-xs-2'>Ambito</label>
<div class='col-xs-6'>
<input type='text' name='zona_txt' class='form-control' disabled='disabled' value='".$res['zona']."'>
<input type='hidden' name='i_zona' value='".$res['zona']."'>
</div>
</div>


<div class='form-group' id='tipo_vialidad'>
<label for='tipo_vialidad_sel' class='control-label col-xs-2'>Tipo Vialidad</label>
<div class='col-xs-6'>
<select class='form-control' name='tipo_vial'>
".$vialidad."
</select>
</div>
</div>

<div class='form-group' id='calle'>
<label for='calle_txt' class='control-label col-xs-2'>Calle/Vialidad</label>
<div class='col-xs-6'>
<input type='text' name='n_vialidad' class='form-control' required>
</div>
</div>

<div class='form-group' id='entre_calles'>
<label for='entre_calles_txt' class='control-label col-xs-2'>Entre Calles</label>
<div class='col-xs-6'>
<input type='text' name='entre_vial' class='form-control'>
</div>
</div>

<div class='form-group' id='num_ext'>
<label for='ne_txt' class='control-label col-xs-2'>Num Ext.</label>
<div class='col-xs-6'>
<input type='text' name='ne_txt' class='form-control'>
</div>
</div>


<div class='form-group' id='num_int'>
<label for='ni_txt' class='control-label col-xs-2'>Num Int.</label>
<div class='col-xs-6'>
<input type='text' name='ni_txt' class='form-control'>
</div>
</div>

<div class='form-group' id='descripciones'>
<label for='descripcion' class='control-label col-xs-2'>Descripción de la ubicación</label>
<div class='col-xs-6'>
<input type='text' name='descripcion_ubicacion' class='form-control'>
</div>
</div>
";
unset($_GET);
echo $return_value;
}
