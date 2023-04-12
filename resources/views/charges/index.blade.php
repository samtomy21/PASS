<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Cargos del Gobierno Regional
        </h2>
    </x-slot>

    <form action="charges" method="POST" class="flex mb-4">
    @csrf 
    <input type="text" name="name_charge" placeholder="Nuevo Cargo">
    <input type="submit" value="Agregar">
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Cargo</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </thead>

        <tbody>
        @forelse($charges as $charge)
            <tr>
                <td>{{ $charge->id}}</td>
                <td>{{ $charge->name_charge}}</td>

                <td>
                    <a href="{{ route('charges.edit', $charge) }}">Editar</a>
                </td>

                <td>

                    <form action="charges/{{ $charge->id }}" method="POST">
                        @csrf 
                        @method('DELETE')
                        <input type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>

            @empty

            <tr>
                <td colspan="4">
                    No hay Razones
                </td>
            </tr>

            @endforelse
        </tbody>
    </table>
</x-app-layout>
