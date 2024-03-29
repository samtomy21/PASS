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
            <h3>GOBIERNO REGIONAL DE PUNO</h3>
            <h4>Sistema de Papeletas de Salida - PASS</h4>
        </div>
    </div>

    <div id="footer">
        <div class="textfooter">
            <p>Trabajando por un Futuro Mejor</p>
            <p>Derechos Reservados - 2023</p>
        </div>
    </div>

    <div>
        <table class="tabla">
            <thead>
                <tr>
                    <th scope="col" class="encabezado py-2">Id</th>
                    <th scope="col" class="encabezado py-2">N° Targeta</th>
                    <th scope="col" class="encabezado py-2">Nombre</th>
                    <th scope="col" class="encabezado py-2">Dependencia</th>
                    <th scope="col" class="encabezado py-2">Motivo</th>
                    <th scope="col" class="encabezado py-2">Lugar</th>
                    <th scope="col" class="encabezado py-2">Tiempo Autorizado</th>
                    <th scope="col" class="encabezado py-2">Hora Salida</th>
                    <th scope="col" class="encabezado py-2">Hora Retorno</th>
                    <th scope="col" class="encabezado py-2">Observacion</th>
                    <th scope="col" class="encabezado py-2">Estado</th>
                    <th scope="col" class="encabezado py-2">Fecha</th>
                </tr>
            </thead>
                <tbody>
                    @forelse($passes as $pass)
                    <tr>
                        <td scope="row" class="fila">{{ $pass->id }}</td>
                        <td class="fila py-2">{{ $pass->user->ncard }}</td>
                        <td class="fila py-2">{{ $pass->user->name }}</td>
                        <td class="fila py-2">{{ $pass->user->dependence->name_dependence }}</td>
                        <td class="fila py-2">{{ $pass->motive }}</td>
                        <td class="fila py-2">{{ $pass->place }}</td>
                        <td class="fila py-2">{{ $pass->time->time_permision }}</td>
                        <td class="fila py-2">{{ $pass->departure_time->hour_departure }}</td>
                        <td class="fila py-2">{{ $pass->return_time->hour_return }}</td>
                        <td class="fila py-2">{{ $pass->return_time->observation }}</td>
                        <td class="fila py-2">
                                <div class=" flex justify-center items-center">
                                    @if ($pass->estado === 4)
                                        <div class="sky">Archivado</div>
                                    @endif
                                </div>
                            </td >
                        <td class="fila py-2">{{ $pass->date }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="12">No has creado ningun permiso</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
