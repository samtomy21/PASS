<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 text-xl text-gray-800 leading-tight">
            Lista de Papeletas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-24 lg:px-24">
            <div class="bg-white pt-5 overflow-hidden shadow-xl sm:rounded-lg">
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
                
                <div class="container px-5">
                    <label class="text-s font-semibold text-gray-800">Codigo de Personal:</label>
                    <input class="rounded py-1 w-full border-gray-400 text-gray-600" type="text" name="ncard" value="{{ $pass->ncard }}">

                    <label class="text-s font-semibold text-gray-800">Nombre del Interesado:</label>
                    <input class="rounded py-1 w-full border-gray-400 text-gray-600" type="text" name="name" value="{{ $pass->name }}">


                    <label class="text-s font-semibold text-gray-800" for="">Cargo:</label>
                    <select name="charge_id" class="rounded py-1 w-full border-gray-400 text-gray-600">
                        @foreach ($charges as $charge)
                            <option value="{{ $charge->id }}">{{ $charge->name_charge }}</option>
                        @endforeach
                    </select>

                    <label class="text-s font-semibold text-gray-800" for="">Dependencia:</label>
                    <select name="dependence_id" class="rounded py-1 w-full border-gray-400 text-gray-600">
                        @foreach ($dependences as $dependence)
                            <option value="{{ $dependence->id }}">
                                {{ $dependence->name_dependence }}
                            </option>
                        @endforeach
                    </select>

                    <label class="text-s font-semibold text-gray-800">Motivo de Salida:</label>
                    <input type="text" class="rounded py-1 w-full border-gray-400 text-gray-600" name="motive" value="{{ $pass->motive }}">
                    
                    <label class="text-s font-semibold text-gray-800">Lugar de Salida:</label>
                    <input type="text" class="rounded py-1 w-full border-gray-400 text-gray-600" name="place" value="{{ $pass->place }}">
                </div>
                <div class="opacity-80 h-px mt-4 md:mb-4" style="background: linear-gradient(to right, rgba(200, 200, 200, 0) 0%, rgba(200, 200, 200, 1) 30%, rgba(200, 200, 200, 1) 70%, rgba(200, 200, 200, 0) 100%);"></div>
                <div class="container px-5 gap-5 md:flex md:w-full">
                    <div class="container w-full">
                        <label class="text-s font-semibold text-gray-800">Tiempo Autorizado:</label>
                        <input type="time" class="rounded py-1 w-full border-gray-400 text-gray-600" name="time" value="{{ $pass->time }}">
                        
                        <label class="text-s font-semibold text-gray-800">Hora de Salida Registrada:</label>
                        <input type="time" class="rounded py-1 w-full border-gray-400 text-gray-600" name="input" value="{{ $pass->input }}">
                        
                        <label class="text-s font-semibold text-gray-800">Hora de ingreso registrado:</label>
                        <input type="time" class="rounded py-1 w-full border-gray-400 text-gray-600" name="output" value="{{ $pass->output }}">
                    </div>
                    <div class="container">
                        <label class="text-s font-semibold text-gray-800">Observaciones:</label>
                        <textarea name="Observation" class="rounded py-1 w-full border-gray-400 text-gray-600" id="" cols="20" rows="6" type="text" value="observation">
                            {{ $pass->observation }}
                        </textarea>
                    </div>
                </div>
                <div class="opacity-80 h-px mt-4 md:mb-4" style="background: linear-gradient(to right, rgba(200, 200, 200, 0) 0%, rgba(200, 200, 200, 1) 30%, rgba(200, 200, 200, 1) 70%, rgba(200, 200, 200, 0) 100%);"></div>
                <div class="flex px-5 justify-between items-center pb-5">
                    <div class="w-1/2">
                        <label class="text-s font-semibold text-gray-800">Fecha</label>
                        <input type="date" name="date" class="md:rounded py-1 w-1/2 border-gray-400" value="{{ $pass->date }}">
                    </div>
                    <div class="justify-end">
                        <input type="submit" class="bg-green-600 text-white rounded px-4 py-1" value="Editar">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
