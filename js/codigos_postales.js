function validar_cp() {
 codigo_postal = document.getElementById('cp').value;
  if(codigo_postal.length < 5){
    alert('error en cp');
    return false;
  }
 for(x=0;x<5;x++){
   c = codigo_postal.substr(x,1);
   if(c == "0" || c=='1' || c=='2' || c=='3' || c=='4' || c=='5' || c=='6' || c=='7' || c=='8' || c=='9'){
     var continuar = true;}else{alert('error en el curp');document.getElementById('cp').value = '';return false;
      }
  }
  if(continuar){
    cargar_municipios(codigo_postal);
  }
 }

function cargar_municipios(code_post){
    eliminar_elementos(code_post);
     clear_asen_info();
      if (code_post.length == 0) {
        document.getElementById("cp").value = "";
        return false;
       } else {
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var contenido = xmlhttp.responseText;
                document.getElementById('direccion').innerHTML += contenido;
                document.getElementById('cp').value = code_post;
            }
        }
        xmlhttp.open("GET", "modulos/getmpio.php?q=" + code_post, true);
        xmlhttp.send();
    }
}

function eliminar_elementos(){
    var cuadro_error = document.getElementById('mensaje_cp');
    var txt_mpio = document.getElementById('nombre_mpio');
    var sel_asentamientos = document.getElementById('asentamientos');
    if (cuadro_error){
		c_e = cuadro_error.parentNode;
		c_e.removeChild(cuadro_error);
	}
  if (txt_mpio){
		t_mpio = txt_mpio.parentNode;
		t_mpio.removeChild(txt_mpio);
	}
     if (sel_asentamientos){
        s_a = sel_asentamientos.parentNode;
		 s_a.removeChild(sel_asentamientos);
	}
    return true;
}

function info_asentamiento(id_code){
    clear_asen_info();
      cp = document.getElementById('cp').value;
      index_sel = document.getElementById('asentamiento').selectedIndex;
       var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var contenido = xmlhttp.responseText;
                document.getElementById('direccion').innerHTML += contenido;
                document.getElementById('cp').value = cp;
                document.getElementById('asentamiento').selectedIndex =  index_sel ;
            }
        }
        xmlhttp.open("GET", "modulos/info_asentamiento.php?q=" + id_code, true);
        xmlhttp.send();
}

function clear_asen_info(){
  var t_as = document.getElementById('tipo_asentamientos');
  var zonas = document.getElementById('zonas');
  var calles = document.getElementById('calles');
  var numext = document.getElementById('num_exterior');
  var numint = document.getElementById('num_interior');
if (t_as){
  t = t_as.parentNode;
  t.removeChild(t_as);
}
if (zonas){
  z = zonas.parentNode;
z.removeChild(zonas);
}
   if (calles){
      c = calles.parentNode;
  c.removeChild(calles);
}
if (numext){
   ne = numext.parentNode;
ne.removeChild(numext);
}
if (numint){
   ni = numint.parentNode;
ni.removeChild(numint);
}
  return true;
}
