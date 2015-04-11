<div class="content-wrapper">

<section class="content-header">
    <h3><i class="fa fa-cloud-upload"></i> Cargar un listado de Beneficiarios</h3>
<ol class="breadcrumb">
<li><a href="main.php?token=<?php echo md5(0); ?>"><i class="fa fa-home"></i> Inicio</a></li>
    <li class="active"> Cargar un listado de Beneficiarios</li>
</ol>
</section>
<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header">
                  <h3 class="box-title">Subir un archivo</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                  <div class="box-body">

                      <form role="form" action="?token=<?php echo md5(8);?>" name="xlsform" id="xlsform" method="post"enctype="multipart/form-data">
              <div class="form-group">
                <label>Cargue su archivo</label>
                <input type="file" name="xlsfile" id="xlsfile">
                <p class="help-block"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> El archivo a cargar deberá ser de las siguientes extensiones <strong> .csv </strong></p>
              </div>
           <div class="form-group">
             <button type="button" class="btn btn-default btn-sm" onclick="enviar_form();">
               <span class="glyphicon glyphicon-save" aria-hidden="true" ></span> Guardar
             </button>
</div>
</form>
                      <p>&nbsp;</p>
                      <div class="callout callout-basic">
                    <h4>Consideraciones archivo CSV</h4>
                    <p>El archivo CSV deberá contener las siguientes columnas en el orden que aqui se especif&iacute;ca:</p>
                      <ul>
                          <li>CURP</li>
                          <li>Apellido Paterno</li>
          <li>Apellido Materno</li>
          <li>Nombre</li>
          <li>Ambito Residencia (*) </li>
          <li>Vialidad Residencia (*)</li>
          <li>Nombre Vialidad</li>
          <li>Numero Exterior</li>
          <li>Numero Interior</li>
          <li>Tipo Asentamiento (*) </li>
          <li>Nombre Asentamiento</li>
          <li>CP</li>
          <li>Localidad (*)</li>
          <li>Municipio (*)</li>
          <li>Estado Civil (*)</li>
          <li>Jefe Familia (*)</li>
          <li>id dependecia (*)</li>
          <li>tipo apoyo (*)</li>
          <li>cantidad</li>
          <li>periodicidad del apoyo (*) </li>
          <li>fecha apoyo</li>
                      </ul>

                  </div>


                  </div>
              </div><!-- /.box -->
              </div></div>

              </section>


</div>


<script type="text/javascript">
function enviar_form(){
  document.xlsform.submit();
}
</script>
