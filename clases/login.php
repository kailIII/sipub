<?php
function encriptar(){
  //encriptamos la clave usando sha, despues una palabra que no este en diccionario, y por ultimo guadamos todo en md5
   $cve = sha1($_POST['clave']);
   $cve = $cve."7436nfoifjhsdSDSDFSOD9873#&&9.ls;lo";
   $cve = md5($cve);
   return($cve);
}
//mandamos llamar la función para encriptar
$clave = encriptar();
//consultamos que el usuario este en la base de datos
$ConsultarUsuario = "SELECT count(*) FROM usuarios WHERE usuario = '$usr' AND clave = '$clave'";
$Resultado = $conexion->query($ConsultarUsuario);
$row = $Resultado->fetch_array();
//si encuentra un usuario registramos las variables de sesion y abrimos el FrontEnd

if($row[0]){
 require_once 'registro_variables.php';
 header("location:main.php");
 $conexion->close();
}else{
//si no encuentra nada cierra conexión, destruye variables y sesiones y regresa a la pagina principal mosando mensaje de error
 $conexion->close();
 unset($_SESSION);
 session_destroy();
 header("location:index.php?mensaje=1");
 exit();
}
?>
