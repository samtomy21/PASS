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
            <label>Nombre:</label>
            <div class="dato-contenido">{{ $pass->user->name }}</div>
            
            <label>Codigo de Personal:</label>
            <div class="dato-contenido">{{ $pass->user->ncard }}</div>
            
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

            <label>Lugar:</label>
            <div class="dato-contenido">{{ $pass->place }}</div>
        </div>
        <div class="dato">
            <label>Tiempo autorizado:</label>
            <div class="dato-contenido">{{ $pass->time->time_permision }}</div>
        
            <label>Hora de Salida:</label>
            <div class="dato-contenido">{{ $pass->input }}</div>
        
            <label>Hora de ingreso:</label>
            <div class="dato-contenido">{{ $pass->output }}</div>
        </div>
        <div class="dato">
            <label>Fecha:</label>
            <div class="dato-contenido">{{ $pass->date }}</div>
        
            <label>Observaciones:</label>
            <div class="dato-contenido">{{ $pass->observation }}</div>
        </div>
    </div>


</body>

</html>