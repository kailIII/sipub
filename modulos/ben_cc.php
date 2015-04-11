<?php
if(isset($_POST['curp_txt'])){
    $curp = $_POST['curp_txt'];
    $letra = substr($curp,0,1);
    $tabla = "beneficiarios_".$letra;
    $consulta = "SELECT count(*) FROM $tabla WHERE curp = '$curp'";
    $ex_consulta = $conexion->query($consulta);
    $r = $ex_consulta->fetch_array();
    if($r[0]==1){
       $url = "main.php?token=".md5(2)."&curp=$curp";
    echo "<script type='text/javascript'>
       window.location='$url';
    </script>";
    }else{
       $url = "main.php?token=".md5(3)."&curp=$curp";
           echo "<script type='text/javascript'>
        window.location='$url';
    </script>";
    }
}
unset($_POST);
?>
<div class="content-wrapper">
<section class="content-header">
<h3><span class="glyphicon glyphicon-user"></span>&nbsp;Registro de beneficiario con CURP</h3>
<ol class="breadcrumb">
<li><i class="fa fa-home"></i> <a href="main.php?token=<?php echo md5(0); ?>"> Inicio</a></li>
<li class="active">Bneficiario Individual</li>
</ol>
</section>
<section class="content">
<div class="box box-danger">
<div class="panel-body">
Para poder registrar un nuevo beneficiario primeramente ingrese la CURP del beneficario, esto para verificar que NO se encuentre registrado y continuar con el proceso de registro, en caso de estar registrado se mostrará la información del beneficiario para cotejamiento de la información.
<br>
<br>Ingrese la CURP:&nbsp;
<form  method="post" id="curp_form" name="curp_form" role="form" action="?token=<?php print(md5(1)); ?>">
<div class="form-group input-group col-lg-4 has-success">
<input type="text" class="form-control text-success" placeholder="CURP" name="curp_txt" id="curp_txt">
<span class="input-group-btn">
<button class="btn btn-default" type="button" onclick="validarCurp();">
<i class="fa fa-search"></i>
</button>
</span>
</div>
</form>
</div>
</div>
</section>
</div>
<script type="text/javascript" src="js/validarCurp.js"></script>
