@if($eventos)
{{--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>--}}
<script type="text/javascript" src="{{ asset('/js/calendar.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('/css/calendar.css')}}" />
{{--<link href="{{ asset('/css/index.css')}}" rel="stylesheet">--}}

<script>
    $(document).ready(function(){
        //$("#myCalendar").simpleCalendar();
    var container = $("#myCalendar").simpleCalendar();
    let $calendar = container.data('plugin_simpleCalendar');

    let eventos = {!! json_encode($eventos->toArray()) !!};
    
    let data_del_calendario = [];

    eventos.data.forEach(function (evento, index, arr) {
        let anio = String(evento.anio);
        let mes = parseInt( String(evento.fecha).substring(5, 7) ) - 1; //el string se ve asi -> "2022-09-21"
        let dia = String(evento.dia);
        let inicio = parseInt(evento.hora_de_inicio); 
        let inicio_min = parseInt(evento.hora_de_inicio.substring(3, 5)); 
        let fin = parseInt(evento.hora_de_fin); 
        let fin_min = parseInt(evento.hora_de_fin.substring(3, 5)); 
        
        let date_inicial = new Date(anio, mes, dia, inicio, inicio_min, 00, 0);
        let date_final = new Date(anio, mes, dia, fin, fin_min, 00, 0);

        var nuevo_evento = {
            startDate: date_inicial,
            endDate: date_final,
            nombre: evento.nombre,
            tipo: evento.tipo,
            descripcion: evento.descripcion,
            responsable: evento.responsable,
            hora_de_inicio : evento.hora_de_inicio,
            hora_de_fin : evento.hora_de_fin,
            id:evento.id,
        }

        data_del_calendario.push(nuevo_evento);

    });

    
    $calendar.setEvents(data_del_calendario)

    });

</script>


<div id="myCalendar" class=""></div>
@endif