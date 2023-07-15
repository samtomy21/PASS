<div>
    <div class="flex flex-col overflow-x-auto py-2 ">
        <div class="max-w-7xl mx-auto sm:px-3 lg:px-4">
            <!-- searchc -->
            <div class="my-2">
                <input wire:model="search" type="text" class="rounded w-full md:w-1/2" placeholder="Ingrese Nombre ">
            </div>
            <!-- datable -->
            <div class="relative overflow-x-auto bg-white shadow-md rounded-lg">

                <table class="table-fixed min-w-full text-sm text-left text-gray-800">
                    <thead class="text-xs uppercase bg-gray-700 text-white">
                        <tr class="align-center">

                            <th scope="col" class="px-1 py-2">N° Pase</th>
                            <th scope="col" class="px-1 py-2">N° Targeta</th>
                            <th scope="col" class="px-1 py-2">Nombre</th>
                            <th scope="col" class="px-1 py-2">Dependencia</th>
                            <th scope="col" class="px-1 py-2">Motivo</th>
                            <th scope="col" class="px-1 py-2">Lugar</th>
                            <th scope="col" class="px-1 py-2">Tiempo Autorizado</th>
                            <th scope="col" class="px-1 py-2">Fecha</th>
                            <th scope="col" class="px-1 py-2">Estado</th>
                            <th scope="col" class="px-1 py-2">Hora de Salida</th>
                            <th scope="col" class="px-1 py-2">Hora de Regreso</th>
                            <th scope="col" class="px-1 py-2">Observación</th>
                            <th scope="col" class="px-1 py-2">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($passes as $pass)
                        <tr
                            id="pass_ids{{ $pass->id }}"
                            class="bg-white border-b bg-white-800 border-gray-700"
                        >
                            <td scope="row" class="px-2 py-2 font-medium text-gray-700 whitespace-nowrap">{{ $pass->id }}</td>
                            <td class="py-2">{{ $pass->user->ncard }}</td>
                            <td class="py-2">{{ $pass->user->name }}</td>
                            <td class="py-2">{{ $pass->user->dependence->name_dependence }}</td>
                            <td class="py-2">{{ $pass->motive }}</td>
                            <td class="py-2">{{ $pass->place }}</td>
                            <td class="py-2">{{ $pass->time->time_permision }}</td>
                            <td class="py-2">{{ $pass->date }}</td>
                            <td class="py-2">
                                <div class=" flex justify-center items-center">
                                    <!-- {{$pass->estado}} -->
                                    @if ($pass->estado === 4)
                                        <div class="inline-block text-white text-center text-xs px-1 rounded bg-gray-400">Archivado</div>
                                    @elseif ($pass->estado === 3)
                                        <div class="inline-block text-white text-center text-xs px-1 rounded bg-green-400">Firmado por RRHH</div>
                                    @elseif ($pass->estado === 2)
                                        <div class="inline-block text-white text-center text-xs px-1 rounded bg-blue-400">Firmado por Jefe</div>
                                    @elseif ($pass->estado === 1)
                                        <div class="inline-block text-white text-center text-xs px-1 rounded bg-yellow-400">Firmado por Solicitante</div>
                                    @elseif ($pass->estado === 0)
                                        <div class="inline-block text-white text-center text-xs px-1 rounded bg-red-400">Sin firmar</div>
                                    @endif
                                </div>

                            </td>
                            <td class="py-2">{{$pass->departure_time->hour_departure}}</td>
                            <td class="py-2">{{$pass->return_time->hour_return}}</td>
                            <td class="py-2">{{$pass->return_time->observation}}</td>
                            <td class="flex px-auto py-5 mb-2 justify-center items-center flex-col text-center md:flex-row">
                            <a href="{{ route('archived.show', $pass) }}" class="bg-sky-900 text-white rounded px-2 py-1 mx-1 my-auto md:mt-3 mb-3">Ver</a>
                            <a href="{{ route('archived.print', $pass) }}" class="bg-sky-900 text-white rounded px-2 py-1 mx-1 my-auto md:mt-3 mb-3">Imprimir</a>
                            </td>
                        </tr>
                        @empty
                        <tr class="bg-white border-b bg-white-800 dark:border-gray-700">
                            <td colspan="13">No has creado ningun permiso</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $passes->links() }}
            </div>
        </div>
    </div>
</div>
