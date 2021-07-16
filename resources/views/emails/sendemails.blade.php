@component('mail::message')
# RECORDATORIO DE CUMPLEAÑEROS DIARIOS


Algunos de tus clientes cumpleaños este mes.
Verifica la lista aquí abajo y aprovecha para felicitarlos personalmente.

¡Gracias!



@component('mail::table')
| Nombre        | Fecha de cumpleaños      | Email(s)      | Télefono(s)  |
| ------------- | :-------------:          | :-------------:| --------:|
@foreach($parametros['usuarios'] as $i)
| {{$i['nombre_cliente']}}   | {{date('Y-m-d')}}    | {{$i['correo_personal']}} {{$i['correo_oficina']}}  {{$i['correo_otro']}}  | {{$i['telefono_movil']}} {{$i['telefono_casa']}} {{$i['telefono_oficina']}} |
@endforeach


@endcomponent


@endcomponent
