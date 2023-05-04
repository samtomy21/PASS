<div>
    
    <div>
        <!-- search -->
        <div>
            <input wire:model="search" type="text" placeholder="Ingrese Nombre o email">
        </div>

        @if($users->count())
            <!-- table data -->
            <div>
                <table>
                    <thead>
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
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->ncard }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user) }}" class="bg-yellow-500 text-white rounded px-2 py-1 mx-1">Editar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- paginate -->
            <div>
                {{ $users->links() }}
            </div>

        @else

            <div>
                <strong>No existen Registros</strong>
            </div>

        @endif
    </div>

</div>
