<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Papeletas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>N° Targeta</th>
                            <th>Nombre</th>
                            <th>Cargo</th>
                            <th>Dependencia</th>
                            <th>Motivo</th>
                            <th>Lugar</th>
                            <th>Tiempo Autorizado</th>
                            <th>Hora de Salida</th>
                            <th>Hora de Llegada</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($passes as $pass)
                            <tr>
                                <td>{{ $pass->id }}</td>
                                <td>{{ $pass->ncard }}</td>
                                <td>{{ $pass->name }}</td>
                                <td>{{ $pass->charge_id }}</td>
                                <td>{{ $pass->dependence_id }}</td>
                                <td>{{ $pass->motive }}</td>
                                <td>{{ $pass->place }}</td>
                                <td>{{ $pass->time }}</td>
                                <td>{{ $pass->input }}</td>
                                <td>{{ $pass->output }}</td>
                                <td>{{ $pass->date }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="11">No has creado ningun permiso</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
