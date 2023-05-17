<div>
    <!-- <x-buttonR wire:click="$set('open', true)"> -->
        <a href="#" class="bg-blue-800 text-white rounded px-2 py-1.5" wire:click="$set('open', true)">Editar</a>
    <!-- </x-buttonR> -->
    <x-dialog-modal wire:model="open">
        <!-- <x-slot name="title">
            Papeleta {{ $pass->id }}
        </x-slot>
        <x-slot name="content">
            <div class="max-w-7xl mx-auto py-5">
                <div class="mx-auto md:flex md:justify-between p-5 bg-white shadow-xl sm:rounded-lg">                
                    <div class="pl-2 w-72 text-gray-800">
                    <label class="block text-s font-semibold w-full">Nombre: </label>{{ $pass->user->name }}
                    <label class="block text-s font-semibold w-full">Codigo: </label>{{ $pass->user->ncard }}
                    <label class="block text-s font-semibold w-full">Cargo: </label>{{ $pass->charge->name_charge }}
                    <label class="block text-s font-semibold w-full">Dependencia: </label>{{ $pass->dependence->name_dependence }}
                        <label class="block text-s font-semibold w-full">Motivo de salida: </label>{{ $pass->motive }}
                    </div>
                    <div class="pl-2 w-72 text-gray-800">
                        <label class="block text-s font-semibold w-full">Lugar: </label>{{ $pass->place }}
                        <label class="block text-s font-semibold w-full">Tiempo autorizado: </label>{{ $pass->time }}
                        <label class="block text-s font-semibold w-full">Hora de Salida Registrada: </label>{{ $pass->input }}
                        <label class="block text-s font-semibold w-full">Hora de ingreso registros: </label>{{ $pass->output }}
                        <label class="block text-s font-semibold w-full">Fecha: </label>{{ $pass->date }}
                    </div>
                    <div class="pl-2 w-80 text-gray-800 border rounded-lg border-gray-900">
                        <label class="block text-s font-semibold w-full">Observaciones: </label>{{ $pass->observation }}
                    </div>                
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
        <a href="{{ route('passes.print', $pass) }}" class="bg-yellow-500 text-white rounded px-2 py-1 mx-1">Imprimir</a>
        </x-slot> -->
        <x-slot name="title">
            Papeleta {{ $pass->id }}
        </x-slot>
        <x-slot name="content">
        <div class="max-w-7xl mx-auto py-5">
            <div class="bg-white pt-5 px-4 overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('passes.update', $pass) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @if ($errors->any())
                    <ul class="list-none p-4 mb-4 bg-red-100 text-red-500">
                        @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                        @endforeach
                    </ul>
                    @endif
                    <label class="text-s font-semibold">Cargo:</label>
                    <select name="charge_id" class="rounded py-1 w-full border-gray-400 disabled">
                        @foreach ($charges as $charge)
                        <option value="{{ $charge->id }}">
                            {{ $charge->name_charge }}
                        </option>
                        @endforeach
                    </select>
                    <label class="text-s font-semibold">Dependencia:</label>
                    <select name="dependence_id" class="rounded py-1 w-full border-gray-400">
                        @foreach ($dependences as $dependence)
                        <option value="{{ $dependence->id }}">
                            {{ $dependence->name_dependence }}
                        </option>
                        @endforeach
                    </select>
                    <label class="text-s font-semibold">Motivo de Salida:</label>
                    <input type="text" class="rounded py-1 w-full border-gray-400" name="motive" value="{{ $pass->motive }}">

                    <label class="text-s font-semibold">Lugar de Salida:</label>
                    <input type="text" class="rounded py-1 w-full border-gray-400" name="place" value="{{ $pass->place }}">

                    <div class="opacity-80 h-px mt-4 md:mb-4" style="background: linear-gradient(to right, rgba(200, 200, 200, 0) 0%, rgba(200, 200, 200, 1) 30%, rgba(200, 200, 200, 1) 70%, rgba(200, 200, 200, 0) 100%);"></div>
                    <div class="container px-5 gap-5 md:flex md:w-full">
                        <div class="container w-full">
                            <label class="text-s font-semibold">Tiempo Autorizado:</label>
                            <input type="time" class="rounded py-1 w-full border-gray-400" name="time" value="{{ $pass->time }}">

                            <label class="text-s font-semibold">Hora de Salida Registrada:</label>
                            <input type="time" class="rounded py-1 w-full border-gray-400 text-gray-500" name="input" value="{{ $pass->input}}">

                            <label class="text-s font-semibold">Hora de ingreso registros:</label>
                            <input type="time" class="rounded py-1 w-full border-gray-400 text-gray-500" name="output" value="{{ $pass->output }}">
                        </div>
                        <div class="container">
                            <label class="text-s font-semibold">Observaciones:</label>
                            <textarea name="observation" class="rounded py-1 w-full border-gray-400" id="" cols="20" rows="6" type="text">{{ $pass->motive }}</textarea>
                        </div>

                    </div>
                    <div class="opacity-80 h-px mt-4 md:mb-4" style="background: linear-gradient(to right, rgba(200, 200, 200, 0) 0%, rgba(200, 200, 200, 1) 30%, rgba(200, 200, 200, 1) 70%, rgba(200, 200, 200, 0) 100%);"></div>
                    <div class="flex px-5 justify-between items-center pb-5">
                        <div class="w-1/2">
                            <label class="text-s font-semibold">Fecha</label>
                            <input type="date" class="md:rounded py-1 w-1/2 border-gray-400" name="date" value="{{ $pass->date }}">
                        </div>
                        <div class="justify-end">
                            <input type="submit" class="bg-green-600 text-white rounded px-4 py-1" value="Guardar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </x-slot>
        <x-slot name="footer">
        <a href="{{ route('passes.print', $pass) }}" class="bg-yellow-500 text-white rounded px-2 py-1 mx-1">Imprimir</a>
        </x-slot>
    </x-dialog-modal>

</div>