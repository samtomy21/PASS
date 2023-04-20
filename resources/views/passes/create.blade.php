<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Papeletas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-24 lg:px-24">
            <div class="bg-white pt-5 overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('passes.store') }}" method="POST">
                    @csrf
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
                        <select name="charge_id" class="rounded py-1 w-full border-gray-400">
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
                        <input type="text" class="rounded py-1 w-full border-gray-400" class="rounded py-1 w-full border-gray-400" name="motive">
                        
                        <label class="text-s font-semibold">Lugar de Salida:</label>
                        <input type="text" class="rounded py-1 w-full border-gray-400" name="place">
                    </div>
                    <div class="opacity-80 h-px mt-4 md:mb-4" style="background: linear-gradient(to right, rgba(200, 200, 200, 0) 0%, rgba(200, 200, 200, 1) 30%, rgba(200, 200, 200, 1) 70%, rgba(200, 200, 200, 0) 100%);"></div>
                    <div class="container px-5 gap-5 md:flex md:w-full">
                        <div class="container w-full">
                            <label class="text-s font-semibold">Tiempo Autorizado:</label>
                            <input type="time" class="rounded py-1 w-full border-gray-400" name="time">
                            
                            <label class="text-s font-semibold">Hora de Salida Registrada:</label>
                            <input type="time" class="rounded py-1 w-full border-gray-400 text-gray-500" name="input" value="00:00">
                            
                            <label class="text-s font-semibold">Hora de ingreso registros:</label>
                            <input type="time" class="rounded py-1 w-full border-gray-400 text-gray-500" name="output" value="00:00">
                        </div>                        
                        <div class="container">
                            <label class="text-s font-semibold">Observaciones:</label>
                            <textarea name="observation" class="rounded py-1 w-full border-gray-400" id="" cols="20" rows="6" type="text" ></textarea>       
                        </div>
                                         
                    </div>
                    <div class="opacity-80 h-px mt-4 md:mb-4" style="background: linear-gradient(to right, rgba(200, 200, 200, 0) 0%, rgba(200, 200, 200, 1) 30%, rgba(200, 200, 200, 1) 70%, rgba(200, 200, 200, 0) 100%);"></div>
                    <div class="flex px-5 justify-between items-center pb-5">
                        <div class="w-1/2">
                            <label class="text-s font-semibold">Fecha</label>
                            <input type="date" class="md:rounded py-1 w-1/2 border-gray-400" name="date">
                        </div>                        
                        <div class="justify-end">
                            <input type="submit" placeholder="Guardar" class="bg-gray-800 text-white rounded px-4 py-1">
                        </div>
                    </div>
                    
                    

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
