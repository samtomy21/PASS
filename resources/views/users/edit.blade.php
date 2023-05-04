<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Asignar un rol
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                @if (session('info'))
                    <div>
                        <strong>{{ session('info') }}</strong>
                    </div>
                @endif
                <div>
                    <div>
                        <p>Nombre</p>
                        <p>{{$user->name}}</p>
                        <h2>Listado de Roles</h2>
                        {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put']) !!}
                            @foreach ($roles as $role)
                                <div>
                                    <label>
                                        {!! Form::checkbox('roles[]', $role->id, null, ) !!}
                                        {{ $role->name }}
                                    </label>
                                </div>
                            @endforeach

                            {!! Form::submit('Asignar Rol', ['class' => 'bg-blue-500']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
