<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Lista de Tiempos del Gobierno Regional
        </h2>
    </x-slot>
    <div class="w-full mx-auto lg:w-1/2">
        <div class="max-w-7xl">
            <form action="times" method="POST" class="flex mb-4 mx-5 mt-10 rounded">
                @csrf
                <input type="text" name="name_charge" class="rounded border-gray-500 pr-auto" placeholder="Nuevo Cargo">
                <input type="submit" value="Agregar" class="bg-green-600 text-white rounded px-4 py-1 mx-5">
            </form>
        </div>
        <div class="relative overflow-hidden shadow-md rounded-lg mx-5">
            <table class="table-fixed min-w-full text-sm text-left text-gray-800">
                <thead class="text-xs text-white uppercase bg-gray-700">
                    <tr>
                        <th scope="col" class="pl-6 py-3">ID</th>
                        <th scope="col" class="pl-2 py-3">Tiempo Autorizado</th>
                        <th scope="col" class="pl-2 py-3 border-slate-200">Opciones</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($times as $time)
                    <tr class="bg-white border-b bg-white-800 border-gray-700">
                        <th scope="row" class="pl-6 py-2 font-medium text-gray-700 whitespace-nowrap">
                            {{ $time->id }}
                        </th>
                        <td class="pl-6 py-4">{{ $time->time_permision}}</td>

                        <td class=" flex py-2">
                            <a href="{{ route('times.edit', $time) }}" class="bg-blue-800 text-white rounded px-2 py-1 mx-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                            </svg>
                            </a>
                            <form action="times/{{ $time->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="bg-red-500 text-white rounded px-2 py-1 mx-1" value="Eliminar">                                
                            </form>
                        </td>
                    </tr>

                    @empty

                    <tr class="bg-white border-b bg-white-800 dark:border-gray-700">
                        <td colspan="4">
                            No hay Tiempos Creados
                        </td>
                    </tr>

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
