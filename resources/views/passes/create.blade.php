<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Papeletas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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

                    <label>Codigo de Personal *</label>
                    <input type="text" name="ncard">

                    <label>Nombre del Interesado *</label>
                    <input type="text" name="name">


                    <label for="">Cargo *</label>
                    <select name="charge_id">
                        @foreach ($charges as $charge)
                            <option value="{{ $charge->id }}">
                                {{ $charge->name_charge }}
                            </option>
                        @endforeach
                    </select>

                    <label for="">Dependencia * *</label>
                    <select name="dependence_id">
                        @foreach ($dependences as $dependence)
                            <option value="{{ $dependence->id }}">
                                {{ $dependence->name_dependence }}
                            </option>
                        @endforeach
                    </select>

                    <label>Motivo de Salida *</label>
                    <input type="text" name="motive">
                    
                    <label>Lugar de Salida *</label>
                    <input type="text" name="place">
                    
                    <label>Observacion</label>
                    <textarea name="observation" id="" cols="20" rows="5" type="text" >
                        
                    </textarea>

                    <label>Tiempo Autorizado *</label>
                    <input type="time" name="time">
                    
                    <label>Hora de Salida Registrada *</label>
                    <input type="time" name="input">
                    
                    <label>Hora de ingreso registros *</label>
                    <input type="time" name="output">
                    
                    <label>Fecha *</label>
                    <input type="date" name="date">
                    
                    <hr>

                    <input type="submit" value="Guardar">

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
