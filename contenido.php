<?php
if(isset($_GET['token'])){
$ruta = $_GET['token'];
}
else{$ruta = md5(0);}
switch ($ruta){
    case md5(0):
        include('modulos/principal.php');
        break;
    case md5(1):
        include('modulos/ben_cc.php');
        break;
     case md5(2):
        include('modulos/info_beneficiario.php');
        break;
   //Beneficiarios con Curp Formulario
    case md5(3):
        include('modulos/nuevo_beneficiario.php');
        break;
     case md5(4):
        include('modulos/nuevo_beneficiario_p2.php');
        break;
    case md5(5):
        include('modulos/nuevo_beneficiario_p3.php');
        break;
    case md5(6):
        include('modulos/nuevo_beneficiario_p4.php');
        break;

    //Carga de Archivo CSV
    case md5(7):
        include('modulos/csv_upload.php');
        break;
    case md5(8):
        include('modulos/csv_save.php');
        break;


    default:
     include('modulos/error404.html');
     break;

}
?>
