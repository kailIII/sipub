<?php
$_SESSION['curp'] = $_GET['curp'];
$_SESISON['reg_ben'] = true;
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>Nuevo Beneficiario<br>
<small>Agregar un nuevo beneficiario con CURP</small>
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
<li><a href="#">Beneficiario Individual</a></li>
<li class="active">con CURP</li>
</ol>
</section>
<!-- Main content -->
<section class="content">
<form class="form-horizontal">
<div class='row'>
  <div class='col-xs-12'>
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
         <li class="active"><a href="#datos" data-toggle="tab">Informaci&oacute;n Personal</a></li>
         <li><a href="#direccion" data-toggle="tab">Direcci&oacute;n de Residencia</a></li>
         <li><a href="#estudio" data-toggle="tab">Estudio Socioecon&oacute;mico</a></li>
         <li><a href="#apoyos" data-toggle="tab">Apoyos</a></li>
       </ul>
       <div class="tab-content">

<!-------------------- datos info_personal ------------------------------->
<div class="tab-pane active" id="datos" >

<div class="form-group">
<label for="inputcurp" class="control-label col-xs-2">CURP:</label>
<div class="col-xs-6">
<input type="text" class="form-control"  name="inputcurp" value = "<?php  print(strtoupper($_SESSION['curp'])); ?>" disabled="disabled">
<input type="hidden" name="curp" id= "curp" value="<?php echo $_SESSION['curp']; ?>">
</div>
</div>

<div class="form-group">
<label for="inputFirst" class="control-label col-xs-2">Primer apellido:</label>
<div class="col-xs-6">
<input type="text" class="form-control" placeholder="Primer apellido" name="FirstA" id= "FirstA" required>
</div>
</div>

<div class="form-group">
<label for="inputSecond" class="control-label col-xs-2">Segundo Apellido:</label>
<div class="col-xs-6">
<input type="text" class="form-control" placeholder="Segundo apellido" name="SecondA" id= "SecondA">
</div>
</div>

<div class="form-group">
<label for="inputNombre" class="control-label col-xs-2">Nombre(s):</label>
<div class="col-xs-6">
<input type="name" class="form-control" placeholder="Nombre(s)" name="Nombre" id= "Nombre" required>
</div>
</div>

<div class='form-group'>
<label for='identificacion' class='control-label col-xs-2'>Identificaci&oacute;n</label>
<div class='col-xs-6'>
<select class='form-control' name='identificacion' id='identificacion'>
<option value='0'>-Seleccione-</option>
<?php
$cons_id = "SELECT id_identificacion,identificacion FROM identificaciones WHERE activo = 1";
$ex_consulta_id = $conexion->query($cons_id);
while($r_con_id = $ex_consulta_id->fetch_assoc()){
	echo "<option value='".$r_con_id['id_identificacion']."'>".$r_con_id['identificacion']."</option>";
}
?>
</select>
</div>
</div>

</div>


<!-- ------------------------------- Dirección ---------------------------->
<div class="tab-pane" id="direccion">

<div class="form-group">
<label for="inputFirst" class="control-label col-xs-2">Estado</label>
<div class="col-xs-6">
<input type="text" class="form-control" disabled="disabled" value="Zacatecas">
<input type="hidden" value="32" id="estado">
</div>
</div>

<div class='form-group'>
<label for='municipio' class='control-label col-xs-2'>Municipio</label>
<div class='col-xs-6'>
<select class='form-control' name='municipio' id='municipio' onChange="carga_localidad(this.value);">
<option value='0'>-Seleccione-</option>
<?php
$cons_mpio = "SELECT id_municipio,municipio FROM municipios WHERE id_estado = 32 ORDER by id_municipio ASC";
$ex_consulta_mpio = $conexion->query($cons_mpio);
while($r_con_mpio = $ex_consulta_mpio->fetch_assoc()){
	echo "<option value='".$r_con_mpio['id_municipio']."'>".$r_con_mpio['municipio']."</option>";
}
?>
</select>
</div>
</div>

</div>

<!------------------------------------ Estudio Socioeconomico --------------------------------->
<div class="tab-pane" id="estudio">

<div class='form-group'>
<label for='estudio_dep' class='control-label col-xs-2'>Estudio demográfico</label>
<div class="col-lg-6">
<div class="input-group">
<span class="input-group-addon">
<input type="checkbox" name='e_demografico'>
</span>
<input type="text" class="form-control" value="Estudio demográfico por parte de la dependencia" disabled="disabled">
</div>
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Perfil Sociodemografico</label>
<div class="col-xs-6">
<input type="text" class="form-control" name='perfil_socio'>
</div>
</div>

<div class='form-group'>
<label for='edo_civil' class='control-label col-xs-2'>Estado Civil</label>
<div class='col-xs-6'>
<select class='form-control' name='edo_civil'>
<option value='0'>-Seleccione-</option>
<?php
$cons_edo_civil = "SELECT id_estado_civil,estado_civil FROM estado_civil WHERE activo = '1'";
$ex_consulta_edo = $conexion->query($cons_edo_civil);
while($r_con_edo = $ex_consulta_edo->fetch_assoc()){
	echo "<option value='".$r_con_edo['id_estado_civil']."'>".$r_con_edo['estado_civil']."</option>";
}
unset($cons_edo_civil);
unset($r_con_edo);
$ex_consulta_edo->free();
unset($ex_consulta_edo);
?>
</select>
</div>
</div>

<div class='form-group'>
<label for='estudio_dep' class='control-label col-xs-2'>Jefe de Familia</label>
<div class="col-lg-6">
<div class="input-group">
<span class="input-group-addon">
<input type="checkbox" name='jefe_familia'>
</span>
<input type="text" class="form-control" value="Identificar si es jefe de familia" disabled="disabled">
</div>
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Tipo de trabajo</label>
<div class="col-xs-6">
<input type="text" class="form-control" name="tipo_trabajo">
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Ingreso mensual</label>
<div class="input-group col-xs-6">
<span class="input-group-addon">$</span>
<input type="text" class="form-control" name='ingreso'>
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Integrantes Familia</label>
<div class="col-xs-6">
<input type="text" class="form-control" name="integrantes">
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Dependientes familiares</label>
<div class="col-xs-6">
<input type="text" class="form-control" name="dependientes">
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Tipo de vivienda</label>
<div class="col-xs-6">
<select class='form-control' name='tipo_vivienda'>
<option value='0'>-Seleccione-</option>
<?php
$cons_tipo_vivienda = "SELECT id_vivienda,vivienda FROM tipo_vivienda WHERE activo = '1'";
$ex_tipo_vivienda = $conexion->query($cons_tipo_vivienda);
while($r_tipo_vivienda = $ex_tipo_vivienda->fetch_assoc()){
	echo "<option value='".$r_tipo_vivienda['id_vivienda']."'>".$r_tipo_vivienda['vivienda']."</option>";
}
?>
</select>
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Num. habitantes vivienda</label>
<div class="col-xs-6">
<input type="text" class="form-control" name="habitantes_vivienda">
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Servicios Básicos</label>
<div class="col-xs-6">
<div class="row">
<div class="col-xs-4">
<div class="checkbox">
<label>
<input type="checkbox" name='luz'>
Luz
</label>
</div>
<div class="checkbox">
<label>
<input type="checkbox" name="agua">
Agua
</label>
</div>
</div>
<div class="col-xs-4">
<div class="checkbox">
<label>
<input type="checkbox" name="drenaje">
Drenaje
</label>
</div>
<div class="checkbox">
<label>
<input type="checkbox" name="gas">
Tanque de Gas
</label>
</div>
</div>
<div class="col-xs-4">
<div class="checkbox">
<label>
<input type="checkbox" name="tel">
Telefono
</label>
</div>
<div class="checkbox">
<label>
<input type="checkbox" name="internet">
Internet
</label>
</div>
</div>
</div>
</div>
</div>

<div class="form-group">
<label for="nivel_estudios" class="control-label col-xs-2">Nivel de Estudios</label>
<div class="col-xs-6">
<select class='form-control' name='tipo_estudios'>
<option value='0'>-Seleccione-</option>
<?php
$cons_estudios = "SELECT id_estudios,estudios FROM nivel_estudios WHERE activo = '1'";
$ex_estudios = $conexion->query($cons_estudios);
while($r_tipo_estudio = $ex_estudios->fetch_assoc()){
	echo "<option value='".$r_tipo_estudio['id_estudios']."'>".$r_tipo_estudio['estudios']."</option>";
}
?>
</select>
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Tipo de seguridad Social</label>
<div class="col-xs-6">
<select class='form-control' name='tipo_seguridad'>
<option value='0'>-Seleccione-</option>
<?php
$cons_seguridad = "SELECT id_salud,salud FROM tipo_seguridad WHERE activo = '1'";
$ex_seguridad = $conexion->query($cons_seguridad);
while($r_tipo_seguridad = $ex_seguridad->fetch_assoc()){
	echo "<option value='".$r_tipo_seguridad['id_salud']."'>".$r_tipo_seguridad['salud']."</option>";
}
?>
</select>
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Discapacidad</label>
<div class="col-xs-6">
<div class="input-group">
<span class="input-group-addon">
<input type="checkbox" name="discapacidad">
</span>
<input type="text" class="form-control" name="tipo_discapacidad">
</div>
</div>
</div>

</div>

<!------------- apoyos ----------------------->
<div class="tab-pane" id="apoyos">

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Dependencia</label>
<div class="col-xs-6">
<input type="text" class="form-control" value="<?php echo $_SESSION['dependencia']; ?>" disabled>
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Programa</label>
<div class="col-xs-6">
<input type="text" class="form-control">
</div>
</div>


<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Subprograma</label>
<div class="col-xs-6">
<input type="text" class="form-control">
</div>
</div>


<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Clave Presupuestal</label>
<div class="col-xs-6">
<input type="text" class="form-control">
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Tipo de Apoyo</label>
<div class="col-xs-6">
<select name="tipo_apoyo" id='tipo_apoyo'class="form-control" onchange="caracteristicas_apoyos(this.value);">
  <?php
  $cons_tipo_apoyo = "SELECT * FROM tipo_apoyo";
  $ex_tipo_apoyo = $conexion->query($cons_tipo_apoyo);
  echo "<option value='0'> - seleccione - </option>";
 while($r_tipo_apoyo = $ex_tipo_apoyo->fetch_assoc()){
   echo "<option value='".$r_tipo_apoyo['id_tipo_apoyo']."'>".$r_tipo_apoyo['tipo_apoyo']."</option>";
 }

?>
</select>
</div>
</div>


<div class="form-group" id="caracterisitca_apoyo_div">

</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Importe del Apoyo</label>
<div class="col-xs-6">
<input type="text" class="form-control">
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">No de Apoyos</label>
<div class="col-xs-6">
<input type="text" class="form-control">
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Fecha del apoyo</label>
<div class="col-xs-6">
<input type="text" class="form-control">
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Periodicidad</label>
<div class="col-xs-6">
<input type="text" class="form-control">
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Grupo</label>
<div class="col-xs-6">
<input type="text" class="form-control">
</div>
</div>

  <div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Beneficiario Colectivo</label>
<div class="col-xs-6">
<input type="text" class="form-control">
</div>
</div>


<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Origen del Recurso</label>
<div class="col-xs-6">
<input type="text" class="form-control">
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">email</label>
<div class="col-xs-6">
<input type="text" class="form-control">
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">Telefono</label>
<div class="col-xs-6">
<input type="text" class="form-control">
</div>
</div>

<div class="form-group">
<label for="perfil_s" class="control-label col-xs-2">&nbsp;</label>
<div class="col-xs-6">
<button type="submit" class="form-control btn btn-default" aria-label="Left Align">
  <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
</button>


</div>
</div>

</div>

</div><!-- /.tab-content -->
</div><!-- /.nav-tabs-custom -->
</div><!-- /.col -->
</div></form><!-- /.row -->
</section><!-- /.content -->
 <!-- /.content-wrapper -->
</div><!-- ./wrapper -->
<script src="js/direccion_residencia.js"></script>


<script type="text/javascript">
  function caracteristicas_apoyos(v){
  var tipo_apoyo_v = document.getElementById('tipo_apoyo').selectedIndex;
  if (tipo_apoyo == 0) {
    alert('seleccione un tipo de apoyo');
    var car_apoyo_sel = document.getElementById('caracteristica_apoyo');
    if(car_apoyo_sel){
	   l=car_apoyo_sel.parentNode;
	   l.removeChild(car_apoyo_sel);
  	}

    return false;
  }

   var car_apoyo_sel = document.getElementById('caracteristica_apoyo');
    if(car_apoyo_sel){
	   l=car_apoyo_sel.parentNode;
	   l.removeChild(car_apoyo_sel);
  	}

  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      var contenido = xmlhttp.responseText;
      document.getElementById('caracterisitca_apoyo_div').innerHTML += contenido;
      document.getElementById('tipo_apoyo').selectedIndex = tipo_apoyo_v;
    }
  }

  var url = "modulos/getapoyos.php?a=" + v;
  xmlhttp.open("GET", url, true);
  xmlhttp.send();

  }
</script>
