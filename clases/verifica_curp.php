<?php

function revisa_texto($t){
if($t == 'A' or
   $t == 'B' or
   $t == 'C' or
   $t == 'D' or
   $t == 'E' or
   $t == 'F' or
   $t == 'G' or
   $t == 'H' or
   $t == 'I' or
   $t == 'J' or
   $t == 'K' or
   $t == 'L' or
   $t == 'M' or
   $t == 'N' or
   $t == 'O' or
   $t == 'P' or
   $t == 'Q' or
   $t == 'R' or
   $t == 'S' or
   $t == 'T' or
   $t == 'U' or
   $t == 'V' or
   $t == 'W' or
   $t == 'X' or
   $t == 'Y' or
   $t == 'Z'){ $v = 1;}else{$v=0;}
   return $v;
}

function revisa_fecha_nac($a,$b){
    switch($b){
        case '1':
         if($a == '0' or
            $a == '1' or
            $a == '2' or
            $a == '3' or
            $a == '4' or
            $a == '5' or
            $a == '6' or
            $a == '7' or
            $a == '8' or
            $a == '9'){$v = 1; }else{$v=0;}
        break;
        case '2':
         if($a == '0' or
            $a == '1' or
            $a == '2'){$v = 1; }else{$v=0;}
        break;
        default:
         $v=1;
    }
    return $v;

}

function revisa_estado(){
}


function verificar_curp($c){
$c = strtoupper($c);
//verificamos que sea un curp valido
$resultado = false;
if((strlen($c)==18)){
    $resultado = true;
}

//revision de primeras letras de la curp
if($resultado){
 for($x=0;$x<4;$x++){
    $v = revisa_texto(substr($c,$x,1));
    if(!$v){
        $resultado = false;
        break;
    }
 }

}

    //revision  de fecha de nacimiento
    if($resultado){

     for($x=1;$x<7;$x++){
        $p=4;
        $c = revisa_fecha_nac(substr($c,$p,1),$x);
        if(!$c){
          $resultado=false;
          break;
        }
         $p++;
     }
    }

    return $resultado;
}
?>
