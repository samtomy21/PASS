<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Passes</title>
    <link rel="stylesheet" href="{{ public_path('css/pdf.css') }}">
</head>

<body>
    <div id="header">
        <img class="imgheader" src="{{ public_path('images/LOGO-GORE.png') }}" height="100" width="100">

        <div class="infoheader">
            <h3>GOBIERNO REGIONAL DE PUNO - este es del edit</h3>
            <h4>Sistema de Papeletas de Salida - PASS</h4>
        </div>
    </div>

    <div id="footer">
        <div class="textfooter">
            <p>Trabajando por un Futuro Mejor</p>
            <p>Derechos Reservados - 2023</p>
        </div>
    </div>

    <div class="main">
        <div class="dato">
            <label>Codigo de Personal:</label>
            <div class="dato-contenido">{{ $pass->user->ncard }}</div>
            <label>Numero de Pase:</label>
            <div class="dato-contenido">{{ $pass->id }}</div>
        </div>
        <div class="dato">
            <label>Nombre:</label>
            <div class="dato-contenido">{{ $pass->user->name }}</div>
        </div>
        <div class="dato">
            <label>Cargo:</label>
            <div class="dato-contenido">{{ $pass->user->charge->name_charge }}</div>
        </div>
        <div class="dato">
            <label>Dependencia:</label>
            <div class="dato-contenido">{{ $pass->user->dependence->name_dependence }}</div>
        </div>

        <div class="dato">
            <label>Motivo de salida:</label>
            <div class="dato-contenido">{{ $pass->motive }}</div>
        </div>

        <div class="dato">
            <label>Lugar:</label>
            <div class="dato-contenido">{{ $pass->place }}</div>
        </div>
        <div class="dato">
            <label>Tiempo autorizado:</label>
            <div class="dato-contenido">{{ $pass->time->time_permision }}</div>

            <label>Hora de Salida:</label>
            <div class="dato-contenido">{{ $pass->departure_time->hour_departure }}</div>

            <label>Hora de ingreso:</label>
            <div class="dato-contenido">{{ $pass->return_time->hour_return }}</div>
        </div>
        <div class="dato">
            <label>Fecha:</label>
            <div class="dato-contenido">Puno, {{ $pass->date }}</div>
        </div>
        <div class="dato">
            <label>Observaciones:</label>
            <div class="dato-contenido">{{ $pass->return_time->observation }}</div>
        </div>

        <div class="dato">
            <label>Estado:</label>
            <div class="dato contenido">
                    @if ($pass->estado === 4)
                        <div class="sky">Archivado</div>
                    @endif
                </div>
            </div>
        </div>

    </div>


</body>

</html>
