function validarCurp(){

var curp = document.getElementById('curp_txt').value;

if (curp == ''){
	alert ('La CURP no debe de estar en blanco');
	return false;
}

if (curp.length != 18){
	alert ('La CURP debe contener 18 caracteres');
	return false;
}

if(curp.match(/^([a-z]{4})([0-9]{6})([a-z]{6})([0-9]{2})$/i)) {
document.curp_form.submit();
}else{
alert('CURP incorrecta!');
return false;
}

    document.curp_form.submit();


}
