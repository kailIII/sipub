<?php
$ConsultaDatosUsuario = "SELECT id_usuario,dependencia FROM usuarios WHERE usuario = '$usr' AND clave = '$clave'";
$ResultadoUsuarios = $conexion->query($ConsultaDatosUsuario);
$Resultados = $ResultadoUsuarios->fetch_array();
$_SESSION['id_usuario'] = $Resultados[0];
$_SESSION['dependencia'] = $Resultados[1];
$_SESSION['activo']=true;
?>
