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
            dayNames: [ 'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
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
            events: {
                url:'http://expedientes.reprodynamics.com/welcome/json',
                color: 'yellow',
                textColor: 'black'
            }
        });
    }();

