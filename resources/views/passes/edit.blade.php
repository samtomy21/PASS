<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Papeletas
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
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
                
                <label>Codigo de Personal *</label>
                <input type="text" name="ncard" value="{{ $pass->ncard }}">

                <label>Nombre del Interesado *</label>
                <input type="text" name="name" value="{{ $pass->name }}">


                <label for="">Cargo *</label>
                <select name="charge_id">
                    @foreach ($charges as $charge)
                        <option value="{{ $charge->id }}">{{ $charge->name_charge }}</option>
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
                <input type="text" name="motive" value="{{ $pass->motive }}">
                
                <label>Lugar de Salida *</label>
                <input type="text" name="place" value="{{ $pass->place }}">
                
                <label>OBservacion</label>
                <textarea name="Observation" id="" cols="30" rows="10" type="text" value="observation">
                    {{ $pass->observation }}
                </textarea>

                <label>Tiempo Autorizado *</label>
                <input type="time" name="time" value="{{ $pass->time }}">
                
                <label>Hora de Salida Registrada *</label>
                <input type="time" name="input" value="{{ $pass->input }}">
                
                <label>Hora de ingreso registrod *</label>
                <input type="time" name="output" value="{{ $pass->output }}">
                
                <label>Fecha *</label>
                <input type="date" name="date" value="{{ $pass->date }}">
                
                <hr>

                <input type="submit" value="Editar">

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
