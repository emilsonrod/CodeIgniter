var Script = function () {

//    calender

    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        timeFormat: {
            agenda: 'h(:mm)t{ - h(:mm)t}',
            '': 'h(:mm)t{-h(:mm)t }'
        },
        monthNames: ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ], 
        monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
        dayNames: [ 'Domingo', 'Lunes', 'Martes', 'MiÃ©rcoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
        firstDay: 1,
        weekends: true,
        buttonText: {
            today: 'hoy',
            month: 'mes',
            week: 'semana',
            day: 'día'
           },
        editable: true,
        events: './fullcalendarcontrol/json',
        
        eventResize: function(event, dayDelta, minuteDelta, revertFunc, jsEvent)
        {
            $params = {
                'event'         : event.id,
                'daystart'      : $.fullCalendar.formatDate( event.start, 'yyyy-MM-dd HH:mm:ss'),
                'dayend'        : $.fullCalendar.formatDate( event.end, 'yyyy-MM-dd HH:mm:ss'),
            };
            
            $.ajax({
                url     : './fullcalendarcontrol/resize',
                cache   : true,
                type    : 'POST',
                data    : $params,

                beforeSend: function()
                {
                    alert('se va a activar el evento Resize');
                },
                complete: function(response)
                {
                    alert(response.responseText);
                }

            });
        },
        
        eventDrop: function(event, dayDelta, minuteDelta, revertFunc, jsEvent)
        {
            $params = {
                'event'         : event.id,
                'daystart'      : $.fullCalendar.formatDate( event.start, 'yyyy-MM-dd HH:mm:ss'),
                'dayend'        : $.fullCalendar.formatDate( event.end, 'yyyy-MM-dd HH:mm:ss'),
            };
            
            $.ajax({
                url     : './fullcalendarcontrol/drop_event/',
                type    : 'POST',
                data    : $params,
                
                beforeSend: function()
                {
                    alert('se va a activar el evento EventDrop');
                },
                complete: function(response)
                {
                    alert(response.responseText);
                }
            });
        },
        
        eventClick: function(event, dayDelta, minuteDelta, revertFunc, jsEvent) {
            var decision = confirm("¿Deseas Borrar eliminar este evento? "+event.title); 
            if (decision) { 
                $params = {
                    'event'         : event.id,
                };
            
                $.ajax({
                    url     : './fullcalendarcontrol/delete_event',
                    type    : 'POST',
                    data    : $params,
                    complete: function(response)
                    {
                        alert(response.responseText);
                    }
                });
                $('#calendar').fullCalendar('removeEvents', event.id);

            } else {
                alert('has decidido no borrar '+event.title+' perfecto');
            }
        }
        
    }); // end $calendar
}();