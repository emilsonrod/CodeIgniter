var Script = function () {

    $().ready(function() {
        
        $("#frmcalendar").validate({
            rules: {
                startdate: {
                    required : true,
                    "dateITA": true,  
                },
                enddate: {
                    required : true,
                    "dateITA": true,
                },
                url: {
                    required : false,
                    url      : true,
                },
                starthour: {
                    required: function(element) {
                      return $("input:radio[name=allday]:checked").val() == '0';
                    },
                    "time"  : true,
                },
                endhour: {
                    required: function(element) {
                      return $("input:radio[name=allday]:checked").val() == '0';
                    },
                    "time"  : true,
                },
                event: {
                    required : true
                },
            },
            messages: {
                startdate: {
                    required : "La fecha no puede estar vacía",
                    "dateITA": 'La fecha no es correcta'
                },
                enddate: {
                    required : "La fecha no puede estar vacía",
                    "dateITA": 'La fecha no es correcta'
                },
                url: {
                    url: 'La url no es correcta'
                },
                starthour: {
                    required : 'Obligatorio si no elegimos todo el día',
                    "time" : 'Por favor introduzca una hora entre 00:00 y 23:59'
                },
                endhour: {
                    required : 'Obligatorio si no elegimos todo el día',
                    "time" : 'Por favor introduzca una hora entre 00:00 y 23:59'
                },
                event: {
                    required : "La descripción del evento no puede estar vacía"
                }
            }
        });
    });
}();
