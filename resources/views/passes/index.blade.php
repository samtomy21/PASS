<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Papeletas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <p class="text-right mb-4">
                    <a 
                        href="{{ route('passes.create') }}" 
                        class="bg-blue-500 text-white font-bold py-2 px-4 rounded-xs"
                    >
                        Agregar Nueva Papeleta
                    </a>
                </p>

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
                                <td>{{ $pass->charge->name_charge }}</td>
                                <td>{{ $pass->dependence->name_dependence }}</td>
                                <td>{{ $pass->motive }}</td>
                                <td>{{ $pass->place }}</td>
                                <td>{{ $pass->observation }}</td>
                                <td>{{ $pass->time }}</td>
                                <td>{{ $pass->input }}</td>
                                <td>{{ $pass->output }}</td>
                                <td>{{ $pass->date }}</td>
                                <td>
                                    <a href="{{ route('passes.show', $pass) }}">Ver</a>
                                </td>

                                <td>
                                    <a href="{{ route('passes.edit', $pass) }}">Editar</a>
                                </td>
                                
                                <td>
                                    <form action="{{ route('passes.destroy', $pass) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Eliminar">
                                    </form>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="12">No has creado ningun permiso</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
