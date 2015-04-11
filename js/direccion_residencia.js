function carga_localidad(municipio) {
  var mpio = document.getElementById('municipio').selectedIndex;
  if (mpio === 0) {
    alert('seleccione un municipio');
    limpiar_localidad_combo();
    return false;
  }
  limpiar_localidad_combo();
  limpiar_asentamientos();
  limpiar_info_asentamientos();
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      var contenido = xmlhttp.responseText;
      document.getElementById('direccion').innerHTML += contenido;
      document.getElementById('municipio').selectedIndex = mpio;
    }
  }
  var url = "modulos/getlocalidades.php?m=" + municipio;
  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}
// ----------------------  Validar cp  ----------------- //

function validar_cp() {
  codigo_postal = document.getElementById('cp').value;
  if(codigo_postal.length < 5){
    alert('error en cp');
    return false;
  }
  for(x=0;x<5;x++){
    c = codigo_postal.substr(x,1);
    if(c == "0" || c=='1' || c=='2' || c=='3' || c=='4' || c=='5' || c=='6' || c=='7' || c=='8' || c=='9'){
      var continuar = true;}else{alert('error en el curp');
      document.getElementById('cp').value = '';return false;
    }
  }
  if(continuar){
    cargar_asentamientos(codigo_postal);
  }
}

// ---------------------- Cargar asentamientos usando el CP ----------------- //
function cargar_asentamientos(cp){
  mun = document.getElementById('municipio').value;
  mpio = document.getElementById('municipio').selectedIndex;
  localidad = document.getElementById('localidad').selectedIndex;
  limpiar_asentamientos();
  limpiar_info_asentamientos();
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      var contenido = xmlhttp.responseText;
      document.getElementById('direccion').innerHTML += contenido;
      document.getElementById('municipio').selectedIndex = mpio;
      document.getElementById('localidad').selectedIndex = localidad;
      document.getElementById('cp').value = cp;
    }
  }
  xmlhttp.open("GET", "modulos/getasentamientos.php?c=" + cp + "&m=" + mun, true);
  xmlhttp.send();
}

// ------------------------- Cargar info del asentamiento -------------------------- //

function consulta_info_asentamiento(id_cp){
  mpio = document.getElementById('municipio').selectedIndex;
  localidad = document.getElementById('localidad').selectedIndex;
	cp = document.getElementById('cp').value;
  asentamiento = document.getElementById('asentamiento').selectedIndex;
  limpiar_info_asentamientos();
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {

        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                var contenido = xmlhttp.responseText;
                document.getElementById('direccion').innerHTML += contenido;
                document.getElementById('municipio').selectedIndex = mpio;
                document.getElementById('localidad').selectedIndex = localidad;
                document.getElementById('cp').value = cp;
                document.getElementById('asentamiento').selectedIndex = asentamiento;

            }
        }
        xmlhttp.open("GET", "modulos/getasentamientos.php?a=" + id_cp, true);
        xmlhttp.send();

}

//---limpieza de elementos html ------------------- //

function limpiar_localidad_combo(){
	var localidad = document.getElementById('localidades');
  var cp = document.getElementById('cp_input');
    if(localidad){
	   l=localidad.parentNode;
	   l.removeChild(localidad);
  	}
   if(cp){
      c=cp.parentNode;
      c.removeChild(cp);
    }
}

function limpiar_asentamientos(){
   var asentamientos = document.getElementById('asentamientos');
   if(asentamientos){
    a=asentamientos.parentNode;
    a.removeChild(asentamientos);
   }


}


function limpiar_info_asentamientos(){
  var t_asentamiento = document.getElementById('tipo_asentamiento');
  var zona = document.getElementById('zona');
  var t_vial = document.getElementById('tipo_vialidad');
  var calle = document.getElementById('calle');
  var calle2 = document.getElementById('entre_calles');
  var ne = document.getElementById('num_ext');
  var ni = document.getElementById('num_int');
  var descripciones2 = document.getElementById('descripciones');



  if(t_asentamiento){
    n=t_asentamiento.parentNode;
    n.removeChild(t_asentamiento);
  }
  if(zona){
    n=zona.parentNode;
    n.removeChild(zona);
  }

  if(t_vial){
    n=t_vial.parentNode;
    n.removeChild(t_vial);
  }

  if(calle){
    n=calle.parentNode;
    n.removeChild(calle);
  }

   if(calle2){
    n=calle2.parentNode;
    n.removeChild(calle2);
  }

  if(ne){
    n=ne.parentNode;
    n.removeChild(ne);
  }
  if(ni){
    n=ni.parentNode;
    n.removeChild(ni);
  }
  if(descripciones2){
    n=descripciones2.parentNode;
    n.removeChild(descripciones2);
  }
}
