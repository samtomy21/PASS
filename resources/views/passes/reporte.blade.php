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
        <table>
            <thead>
                <tr>
                    <th scope="col" class="px-4 py-3">Id</th>
                    <th scope="col" class="px-4 py-3">N° Targeta</th>
                    <th scope="col" class="px-4 py-3">Nombre</th>
                    <th scope="col" class="px-4 py-3">Cargo</th>
                    <th scope="col" class="px-4 py-3">Dependencia</th>
                    <th scope="col" class="px-4 py-3">Motivo</th>
                    <th scope="col" class="px-4 py-3">Lugar</th>
                    <th scope="col" class="px-4 py-3">Tiempo Autorizado</th>
                    <th scope="col" class="px-4 py-3">Hora de Salida</th>
                    <th scope="col" class="px-4 py-3">Hora de Llegada</th>
                    <th scope="col" class="px-4 py-3">Fecha</th>
                </tr>
            </thead>
                <tbody>
                    @forelse($passes as $pass)
                    <tr>
                        <td scope="row">{{ $pass->id }}</td>
                        <td class="px-6 py-4">{{ $pass->user->ncard }}</td>
                        <td class="px-6 py-4">{{ $pass->user->name }}</td>
                        <td class="px-6 py-4">{{ $pass->user->charge->name_charge }}</td>
                        <td class="px-6 py-4">{{ $pass->user->dependence->name_dependence }}</td>
                        <td class="px-6 py-4">{{ $pass->motive }}</td>
                        <td class="px-6 py-4">{{ $pass->place }}</td>
                        <td class="px-6 py-4">{{ $pass->time }}</td>
                        <td class="px-6 py-4">{{ $pass->input }}</td>
                        <td class="px-6 py-4">{{ $pass->output }}</td>
                        <td class="px-6 py-4">{{ $pass->date }}</td>
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