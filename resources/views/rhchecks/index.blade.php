<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Papeletas
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-3 lg:px-4">
        <div class=" flex justify-between items-center max-w-7xl">
            <!-- <a href="{{ route('passes.create') }}" class="bg-blue-500 text-white text-xs font-bold py-2 px-4 rounded">
                Nuevo Registro
            </a> -->

            @livewire('create-modal')

            <p class="mb-4 mx-5 mt-5 rounded text-left m-4">

                <a href="{{ route('passes.reporte') }}" class="bg-blue-500 text-white text-xs font-bold py-2 px-4 rounded">
                    Imprimir
                </a>
            </p>
        </div>

        <div class="max-w-7xl">
            <p class="flex mb-4 mx-5 mt-1 rounded text-left">
                <a href="#" id="deleteAllSelectedRecord" class="bg-red-500 text-white font-bold py-2 px-4 rounded">
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
                        <tr>
                            <th scope="col" class="px-2 py-2">
                                <input type="checkbox" name="" id="select_all_ids" class="rounded">
                            </th>
                            <th scope="col" class="px-4 py-3">Id</th>
                            <th scope="col" class="px-4 py-3">N° Targeta</th>
                            <th scope="col" class="px-4 py-3">Nombre</th>
                            <th scope="col" class="px-4 py-3">Cargo</th>
                            <th scope="col" class="px-4 py-3">Dependencia</th>
                            <th scope="col" class="px-4 py-3">Motivo</th>
                            <th scope="col" class="px-4 py-3">Lugar</th>
                            <th scope="col" class="px-4 py-3">Tiempo Autorizado</th>
                            <th scope="col" class="px-4 py-3">Fecha</th>
                            <th scope="col" class="px-4 py-3">Estado</th>
                            <th scope="col" class="px-4 py-3 border-slate-200">Opciones</th>
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
                            <td scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">{{ $pass->id }}</td>
                            <td class="px-6 py-4">{{ $pass->user->ncard }}</td>
                            <td class="px-6 py-4">{{ $pass->user->name }}</td>
                            <td class="px-6 py-4">{{ $pass->user->charge->name_charge }}</td>
                            <td class="px-6 py-4">{{ $pass->user->dependence->name_dependence }}</td>
                            <td class="px-6 py-4">{{ $pass->motive }}</td>
                            <td class="px-6 py-4">{{ $pass->place }}</td>
                            <td class="px-6 py-4">{{ $pass->time->time_permision }}</td>
                            <td class="px-6 py-4">{{ $pass->date }}</td>
                            <td class="px-6 py-4">{{ $pass->estado }}</td>
                            <td class="flex px-auto py-4 mb-2 items-center">
                                <a href="{{ route('passes.firmarrh', $pass) }}" class="bg-sky-900 text-white rounded px-2 py-1 mx-1">Firmar</a>
                                @livewire('edit-modal', ['pass' => $pass], key($pass->id))
                                <form action="{{ route('passes.destroy', $pass) }}" method="POST">  <!--onsubmit="return confirm('{{ trans('Estas seguro que desea eliminar? ') }}'); "> -->
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="bg-red-500 text-white rounded px-2 py-1 mx-1" value="Eliminar">
                                </form>
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
