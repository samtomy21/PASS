<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Asignar Hora de salida
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-3 lg:px-4">
        <div class=" flex justify-between items-center max-w-7xl">

            <p class="mb-4 mx-5 mt-5 rounded text-left m-4">

                <a href="{{ route('passes.reporte') }}" class="bg-blue-500 text-white text-xs font-bold py-2 px-4 rounded">
                    Imprimir
                </a>
            </p>
        </div>

        <div class="max-w-7xl">
            <p class="flex mb-4 mx-5 mt-1 rounded text-left">
                <a href="#" id="deleteAllSelectedRecord" class="bg-red-500 text-white font-bold py-1 px-4 rounded">
                    Eliminar Seleccionados
                </a>
            </p>
        </div>
    </div>
    <div class="flex flex-col overflow-x-auto py-2 ">
        <div class="max-w-7xl mx-auto sm:px-3 lg:px-4">
            <div class="relative overflow-x-auto bg-white shadow-md rounded-lg">
                <table class="table-fixed min-w-full text-sm text-left text-gray-800">
                    <thead class="text-xs uppercase bg-gray-700 text-white">
                        <tr class="align-center">
                            <th scope="col" class="px-2 py-2">
                                <input type="checkbox" name="" id="select_all_ids" class="rounded">
                            </th>
                            <th scope="col" class="px-1 py-2">Id</th>
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
                            <td class="px-2 py-2">
                                <input type="checkbox" class="checkbox_ids rounded" name="ids" value="{{ $pass->id }}">
                            </td>
                            <td scope="row" class="px-2 py-2 font-medium text-gray-700 whitespace-nowrap">{{ $pass->id }}</td>
                            <td class="py-2">{{ $pass->user->ncard }}</td>
                            <td class="py-2">{{ $pass->user->name }}</td>
                            <td class="py-2">{{ $pass->user->dependence->name_dependence }}</td>
                            <td class="py-2">{{ $pass->motive }}</td>
                            <td class="py-2">{{ $pass->place }}</td>
                            <td class="py-2">{{ $pass->time->time_permision }}</td>
                            <td class="py-2">{{ $pass->date }}</td>
                            <td class="py-2">{{ $pass->estado }}</td>
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
