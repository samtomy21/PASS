<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Lista de Cargos del Gobierno Regional
        </h2>
    </x-slot>
    <div class="w-full mx-auto lg:w-1/2">
        <div class="max-w-7xl mx-auto ">
            <form action="charges" method="POST" class="flex mb-4 mx-5 mt-10 rounded">
                @csrf
                <input type="text" name="name_charge" class="rounded border-gray-500 pr-auto" placeholder="Nuevo Cargo">
                <input type="submit" value="Agregar" class="bg-green-600 text-white rounded px-4 py-1 mx-5">
            </form>
        </div>
        <div class="relative overflow-hidden shadow-md rounded-lg mx-5">
            <table class="table-fixed min-w-full text-sm text-left text-gray-800">
                <thead class="text-xs text-white uppercase bg-gray-700">
                    <tr>
                        <th scope="col" class="pl-6 py-2">ID</th>
                        <th scope="col" class="px-4 py-2">Cargo</th>
                        <th scope="col" class="px-4 py-2">Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($charges as $charge)
                    <tr class="bg-white border-b bg-white-800 border-gray-700">
                        <th scope="row" class="pl-6 py-2 font-medium text-gray-700 whitespace-nowrap">
                            {{ $charge->id}}
                        </th>
                        <td class="px-4 py-2">{{ $charge->name_charge}}</td>

                        <td class=" flex px-auto py-2">
                            <a href="{{ route('charges.edit', $charge) }}" class="bg-blue-800 text-white rounded px-2 py-1 mx-1">Editar</a>
                            <form action="charges/{{ $charge->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="bg-red-500 text-white rounded px-2 py-1 mx-1" value="Eliminar">
                            </form>
                        </td>
                    </tr>

                    @empty

                    <tr class="bg-white border-b bg-white-800 dark:border-gray-700">
                        <td colspan="4">
                            No hay Razones
                        </td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>