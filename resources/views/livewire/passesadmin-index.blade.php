<div>
    <div class="flex flex-col overflow-x-auto py-2 ">
        <div class="max-w-7xl mx-auto sm:px-3 lg:px-4">
            <!-- searchc -->
            <div class="my-2">
                <input wire:model="search" type="text" class="rounded w-full md:w-1/2" placeholder="Ingrese Nombre">
            </div>
            <!--datatable -->
            <div class="relative overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="table-fixed min-w-full text-sm text-left text-gray-800">
                    <thead class="text-xs uppercase bg-gray-700 text-white">
                        <tr class="align-center">
                            <th scope="col" class="px-1 py-2">N° Pase</th>
                            <th scope="col" class="px-1 py-2">Nombre</th>
                            <th scope="col" class="px-1 py-2">Motivo</th>
                            <th scope="col" class="px-1 py-2">Lugar</th>
                            <th scope="col" class="px-1 py-2">Tiempo Autorizado</th>
                            <th scope="col" class="px-1 py-2">Fecha</th>
                            <th scope="col" class="px-1 py-2">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($passes as $pass)
                        <tr
                            id="pass_ids{{ $pass->id }}"
                            class="bg-white border-b bg-white-800 border-gray-700"
                        >
                            <td scope="row" class="px-2 py-2 font-medium text-gray-700 whitespace-nowrap">{{ $pass->id }}</td>
                            <td class="py-2">{{ $pass->user->name }}</td>
                            <td class="py-2">{{ $pass->motive }}</td>
                            <td class="py-2">{{ $pass->place }}</td>
                            <td class="py-2">{{ $pass->time->time_permision }}</td>
                            <td class="py-2">{{ $pass->date }}</td>
                            <td class="py-2">
                                <div class=" flex justify-center items-center">
                                    @if ($pass->estado === 3)
                                        <span class="inline-block h-4 w-4 rounded-full bg-green-500"></span>
                                    @elseif ($pass->estado === 2)
                                        <span class="inline-block h-4 w-4 rounded-full bg-blue-500"></span>
                                    @elseif ($pass->estado === 1)
                                        <span class="inline-block h-4 w-4 rounded-full bg-yellow-500"></span>
                                    @elseif ($pass->estado === 0)
                                        <span class="inline-block h-4 w-4 rounded-full bg-red-500"></span>
                                    @endif
                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr class="bg-white border-b bg-white-800 dark:border-gray-700">
                            <td colspan="6">No has creado ningun permiso</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $passes->links() }}
            </div>
        </div>
    </div>

</div>
