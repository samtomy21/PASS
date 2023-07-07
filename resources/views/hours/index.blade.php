<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            GUARDIANIA: ASIGNAR SALIDA RETORNO Y OBSERVACIONES DE LAS PAPELETAS
        </h2>
    </x-slot>

    <div class="flex flex-col overflow-x-auto py-2 ">
        <div class="max-w-7xl mx-auto sm:px-3 lg:px-4">
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
                                </div>
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
                            <td class="py-2">
                                @if($pass->departure_time)
                                    {{ $pass->departure_time->hour_departure }}
                                @else
                                    Sin Marcar Salida
                                @endif
                            </td>

                            <td class="py-2">
                                @if($pass->return_time)
                                    {{ $pass->return_time->hour_return }}
                                @else
                                    Sin Marcar Regreso
                                @endif
                            </td>

                            <td class="py-2">
                                @if($pass->return_time)
                                    {{ $pass->return_time->observation }}
                                @else
                                    Sin Observacion
                                @endif
                            </td>



                            <td class="flex px-auto py-4 mb-2 items-center">
                                <a href="{{ route('hours.asignarHoraSalida', $pass) }}" class="bg-yellow-900 text-white rounded px-2 py-1 mx-1">Marcar Salida</a>
                                <a href="{{ route('hours.asignarHoraRetorno', $pass) }}" class="bg-yellow-900 text-white rounded px-2 py-1 mx-1">Marcar Regreso</a>
                                <a href="{{ route('passes.archivar', $pass) }}" class="bg-sky-900 text-white rounded  px-2 py-1 mx-1">Archivar</a>
                            </td>
                        </tr>
                        @empty
                        <tr class="bg-white border-b bg-white-800 dark:border-gray-700">
                            <td colspan="13">No has creado ningun permiso</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
        $(function(e){

            $("#select_all_ids").click(function(){
                $('.checkbox_ids').prop('checked', $(this).prop('checked'));
            });

            $('#deleteAllSelectedRecord').click(function(e){
                e.preventDefault();
                var all_ids = [];
                $('input:checkbox[name=ids]:checked').each(function(){
                    all_ids.push($(this).val());
                });

                $.ajax({
                    url:"{{ route('passes.deleteAll') }}",
                    type:"DELETE",
                    data:{
                        ids:all_ids,
                        _token:'{{ csrf_token() }}'
                    },
                    success:function(response){
                        $.each(all_ids, function(key,val){
                            $('#pass_ids'+val).remove();
                        })
                    }

                });

            });
        });
</script>
