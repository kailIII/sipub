<?php

$q = $_REQUEST["q"];
$hint = "";

if ($q !== "") {
    $conexion = new mysqli('localhost','root','tr15t4n14','padron_beneficiarios');
    $conexion->query("SET NAMES utf8");
    $consulta = "select
asent.asentamiento as asentamiento,
cp.zona as zona
From codigos_postales cp
inner join asentamientos asent on(cp.tipo_asentamiento = asent.id_asentamiento)
where cp.id = '$q'";

    $ex_consulta = $conexion->query($consulta);
    $res = $ex_consulta->fetch_assoc();
    $asentamiento = $res['asentamiento'];
    $zona = $res['zona'];

    $hint = "<div class='form-group' id='tipo_asentamientos'>
<label for='t_asentamiento' class='control-label col-xs-2'>Tipo de Asentamiento</label>
<div class='col-xs-6'>
<input type='text' class='form-control' disabled='disabled' value='$asentamiento' name='t_asentamiento'>
</div>
</div>

<div class='form-group' id='zonas'>
<label for='zonas' class='control-label col-xs-2'>Zona</label>
<div class='col-xs-6'>
<input type='text' class='form-control' disabled='disabled' value='$zona' name='zona'>
</div>
</div>

<div class='form-group' id='calles'>
<label for='calle' class='control-label col-xs-2'>Calle</label>
<div class='col-xs-6'>
<input type='text' class='form-control' name='calle' required>
</div>
</div>


<div class='form-group' id='num_exterior'>
<label for='exterior' class='control-label col-xs-2'>Num Ext.</label>
<div class='col-xs-6'>
<input type='text' class='form-control' name='exterior' required>
</div>
</div>

<div class='form-group' id='num_interior'>
<label for='interior' class='control-label col-xs-2'>Num Int</label>
<div class='col-xs-6'>
<input type='text' class='form-control' name='interior'>
</div>
</div>

";

echo $hint;
}
?>
