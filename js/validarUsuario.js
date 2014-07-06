$(document).ready(function() {
	//variables
	var u1 = $('[name=u1]');
	var u2 = $('[name=u2]');
    var u3 = $('[name=u3]');
	
	//función que comprueba las dos contraseñas
	function coincideUsuario(){
	var valor1 = u1.val();
	var valor2 = u2.val();
	var valor3 = u3.val();
	//condiciones dentro de la función
	if(valor3.length!=0 && valor3==valor2){
		alert("Los usuarios #3 y #2 son iguales");
	}
	if(valor3.length!=0 && valor1==valor3){
	   alert("Los usuarios #1 y #3 son iguales");        
	}
	if(valor2.length!=0 && valor1==valor2){
	   alert("Los usuarios #1 y #2 son iguales");        
	}
        
	}
	//ejecuto la función al soltar la tecla
	u2.keyup(function(){
	   coincideUsuario();
	});
    u3.keyup(function(){
        coincideUsuario();
    });
});
 
function validar(){
    var u1=document.RegistrarGrupo.u1.value;
    var u2=document.RegistrarGrupo.u2.value;
    var u3=document.RegistrarGrupo.u3.value;
    
    if(u1!=u2 && u1!=u3 && u2!=u3){
        return true;
    }else{
        alert("Los usuarios no deben repetirse");
        return false; }
}