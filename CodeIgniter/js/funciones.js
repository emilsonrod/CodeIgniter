$(document).ready(function(){
        	//al pulsar en un campo del calendario
            $("#calendario .dia").click(function(){

            	//obtenemos el número del día
                var num_dia = $(this).find('.num_dia').html();

                //detectamos si es hoy
                var hoy = $(this).find('.highlight').html();

                //si es hoy podemos hacer otras cosas
                if(hoy)
                {
                	$( "<div>Hoy no puedes escribir</div>" ).dialog({
				      title: 'Hoy no se escribe',
				      height: 300,
				      width: 350,
				      modal: true,
				      buttons: {
				        "Aceptar": function() {
				        	$(this).dialog('close');
				         }
				      }

				    });     
                	return false;
                }

                //obtenemos el año a través del campo oculto del formulario
                var year = $(".year").val();

                //obtenemos el mes a través del campo oculto del formulario
                var month = $(".month").val();


                //obtenemos el mes a través del campo oculto del formulario
                //y le restamos uno porque en javascript los meses igual que
                //los días empiezan en 0, si es enero debe ser 0 y no 1
                var monthjs = $(".month").val() - 1;

                //anteponemos el 0 si es un sólo número para poder trabajar
                //correctamente la fecha
                if(num_dia.lenght == 1)
                {
                	num_dia = '0'+num_dia;
                }

                //anteponemos el 0 si es un sólo número para poder trabajar
                //correctamente la fecha
                if(month.lenght == 1)
                {
                	month = '0'+month;
                }

                //creamos la fecha sobre la que el usuario ha pulsado
                var fecha = new Date(year,monthjs,num_dia);
				
				//si es sábado no dejamos insertar, ¡sólo trabajamos hasta el viernes! :D
				if(fecha.getDay() == 6) 
				{
					$( "<div>Hoy es sábado</div>" ).dialog({
				      title: 'Hoy no se escribe por qué es sábado',
				      height: 300,
				      width: 500,
				      modal: true,
				      buttons: {
				        "Aceptar": function() {
				        	$(this).dialog('close');
				         }
				      }

				    });     
                	return false;
				}

				//si es domingo menos! (; dodmingo es el día 0 de la semana en javascript
				if(fecha.getDay() == 0) 
				{
					$( "<div>Hoy es domingo</div>" ).dialog({
				      title: 'Hoy no se escribe por qué es domingo',
				      height: 300,
				      width: 500,
				      modal: true,
				      buttons: {
				        "Aceptar": function() {
				        	$(this).dialog('close');
				         }
				      }

				    });     
                	return false;
				}

				//si es distinto de nulo significa que hemos pulsado en un cuadro
				//del calendario que tiene número
                if(num_dia != null)
                {

                   $("<div id='formul' class='miform'><form name='formu' class='formu'"+ 
                   	"method='POST' action='http://localhost/calendario_ci/calendario/calen'>"+
                   	"<input type='hidden' value="+num_dia+" name='dia' />"+
                   	"<input type='hidden' value="+month+" name='month' />"+
                   	"<input type='hidden' value="+year+" name='year' />"+
                   	"<input type='text' name='comentario' /></form></div>").dialog({
				      title: 'Guardar evento',
				      height: 300,
				      width: 350,
				      modal: true,
				      buttons: {
				        "Guardar": function() {      	
				        	$.ajax({
		                        url : $(".formu").attr('action'),
		                        type: 'POST',
		                        data: $(".formu").serialize(),

		                        success: function(data){        	
		                        	$('#formul').dialog('close');
		                            $('<div class="hecho">El evento se ha guardado</div>').dialog({
									      title: 'Hecho',
									      height: 300,
									      width: 350,
									      modal: true,									      
									});
									setTimeout(function() {
		                                window.location.href = "http://localhost/calendario_ci/calendario/cal/"+year+"/"+month;
		                            }, 2000);
		                        }
		                    });
				         },
				         "Cerrar": function() {
				         	$(".miform").dialog('close');
				         }
				      }

				    });

                }

            })
		            
        });