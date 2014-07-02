function soloLetrasHead(e) {
					key = e.keyCode || e.which;
					tecla = String.fromCharCode(key).toLowerCase();
					letras = " áéíóúabcdefghijklmnñopqrstuvwxyz1234567890";
					especiales = [8, 37, 39, 46];

					tecla_especial = false
					for(var i in especiales) {
							if(key == especiales[i]) {
									tecla_especial = true;
									break;
							}
					}

					if(letras.indexOf(tecla) == -1 && !tecla_especial)
							return false;
			}

function limpia() {
					var val = document.getElementById("nombre").value;
					var tam = val.length;
					for(i = 0; i < tam; i++) {
							if(!isNaN(val[i]))
									document.getElementById("nombre").value = '';
					}

			}
		
		
function soloLetrasBody(e) {
					key = e.keyCode || e.which;
					tecla = String.fromCharCode(key).toLowerCase();
					letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
					especiales = [8, 37, 39, 46];

					tecla_especial = false
					for(var i in especiales) {
							if(key == especiales[i]) {
									tecla_especial = true;
									break;
							}
					}

					if(letras.indexOf(tecla) == -1 && !tecla_especial)
							return false;
}

function limpia() {
					var val = document.getElementById("nombre").value;
					var tam = val.length;
					for(i = 0; i < tam; i++) {
							if(!isNaN(val[i]))
									document.getElementById("nombre").value = '';
					}

			}
		
function soloNumerosBody(e) {
					key = e.keyCode || e.which;
					tecla = String.fromCharCode(key).toLowerCase();
					letras = " 1234567890";
					especiales = [8, 37, 39, 46];

					tecla_especial = false
					for(var i in especiales) {
							if(key == especiales[i]) {
									tecla_especial = true;
									break;
							}
					}

					if(letras.indexOf(tecla) == -1 && !tecla_especial)
							return false;
			}

function limpia() {
					var val = document.getElementById("nombre").value;
					var tam = val.length;
					for(i = 0; i < tam; i++) {
							if(!isNaN(val[i]))
									document.getElementById("nombre").value = '';
					}

}