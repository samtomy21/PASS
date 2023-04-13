<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Cargos del Gobierno Regional
        </h2>
    </x-slot>

    <form action="dependences" method="POST" class="flex mb-4">
    @csrf 
    <input type="text" name="name_dependence" placeholder="Nueva Dependencia">
    <input type="submit" value="Agregar">
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Dependencia</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>

        <tbody>
        @forelse($dependences as $dependence)
            <tr>
                <td>{{ $dependence->id}}</td>
                <td>{{ $dependence->name_dependence}}</td>

                <td>
                    <a href="{{ route('dependences.edit', $dependence) }}">Editar</a>
                </td>

                <td>
                    <!-- vomo botton -->
                    <form action="dependences/{{ $dependence->id }}" method="POST">
                        @csrf 
                        @method('DELETE')
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>

            @empty

            <tr>
                <td colspan="4">
                    No hay dependencias
                </td>
            </tr>

            @endforelse
        </tbody>
    </table>
</x-app-layout>
