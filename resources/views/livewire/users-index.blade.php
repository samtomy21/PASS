<div>
    
    <div>
        <!-- search -->
        <div class="m-2">
            <input wire:model="search" type="text" class="rounded" placeholder="Ingrese Nombre o email">
        </div>

        @if($users->count())
            <!-- table data -->
            <div class="relative overflow-x-auto bg-white rounded-lg">
                <table class="table-fixed min-w-full text-sm text-left text-gray-800">
                    <thead class="text-xs uppercase bg-gray-700 text-white">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>ncard</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td scope="col" class="px-1 py-1">{{ $user->id }}</td>
                                <td scope="col" class="px-1 py-1">{{ $user->name }}</td>
                                <td scope="col" class="px-1 py-1">{{ $user->ncard }}</td>
                                <td scope="col" class="px-1 py-1">{{ $user->email }}</td>
                                <td scope="col" class="px-1 py-1">
                                    <a href="{{ route('users.edit', $user) }}" class="bg-yellow-500 text-white rounded px-2 py-1 mx-1">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- paginate -->
            <div class="opacity-80 h-px my-2" style="background: linear-gradient(to right, rgba(200, 200, 200, 0) 0%, rgba(200, 200, 200, 1) 30%, rgba(200, 200, 200, 1) 70%, rgba(200, 200, 200, 0) 100%);"></div>
            <div class="px-3">
                {{ $users->links() }}
            </div>

        @else

            <div>
                <strong>No existen Registros</strong>
            </div>

        @endif
    </div>

</div>
