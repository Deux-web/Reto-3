<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>Esto es solo el email</title>
    <meta charset="utf-8">
    <style>
        p {
            margin: 0;
        }

        #link {
            font-size: 200%;
        }

        hr {
            display: block;
            margin: 0.5em auto;
            border-style: inset;
            border-width: 1px;
            color: #dad303;
        }

        ul {
            margin-top: 0;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
@php
    $lugar_arr = explode(',',$incidencia->direccion);
@endphp
<h2>Incidencia asignada</h2>
<p><strong>Código: </strong>{{$incidencia->id}}</p>
<p><strong>Tipo: </strong>{{$incidencia->tipo}}</p>
<p><strong>Título: </strong>{{$incidencia->titulo}}</p>
<p><strong>Descripción: </strong>{{$incidencia->descripcion}}</p>
<hr>
<p><strong>Datos del vehículo: </strong></p>
<ul>
    <li><strong>Matrícula: </strong>{{$coche->matricula}}</li>
    <li><strong>Marca: </strong>{{$coche->marca}}</li>
    <li><strong>Modelo: </strong>{{$coche->modelo}}</li>
    <li><strong>Color: </strong>{{$coche->color}}</li>
    <li><strong>Año: </strong>{{$coche->anyo}}</li>
</ul>
<hr>
<p><strong>Afectado: </strong>{{$afectado->nombre . ' ' . $afectado->apellido_p . ' ' . $afectado->apellido_s}}</p>
<p><strong>Contacto: </strong>{{$afectado->telefono . ' - ' . $afectado->email}}</p>
<p><strong>Estado del afectado: </strong>{{$incidencia->estado_conductor}}</p>
<p><strong>Lugar del incidente:</strong></p>
<ul>
    <li><strong>Zona: </strong>{{$lugar_arr[0]}}</li>
    <li><strong>Provincia: </strong>{{$lugar_arr[1]}}</li>
    @if(sizeof($lugar_arr)>5)
        <li><strong>Tipo de vía: </strong>{{$lugar_arr[2]}}</li>
        <li><strong>Carretera: </strong>{{$lugar_arr[3]}}</li>
        <li><strong>KM: </strong>{{$lugar_arr[4]}}</li>
        <li><strong>Sentido: </strong>{{$lugar_arr[5]}}</li>
        <li><strong>Proximidades: </strong>{{$lugar_arr[6]}}</li>
    @else
        <li><strong>Localidad: </strong>{{$lugar_arr[2]}}</li>
        <li><strong>Calle: </strong>{{$lugar_arr[3]}}</li>
        <li><strong>Portal: </strong>{{$lugar_arr[4]}}</li>
    @endif
</ul>
<p>
    <strong>Requiere taxi: </strong>
    @if($incidencia->taxi===1)
        Sí
    @else
        No
    @endif
</p>
<hr>
<a id="link" href="{{$link_incidencia}}">Ir a la incidencia</a>
</body>
</html>
