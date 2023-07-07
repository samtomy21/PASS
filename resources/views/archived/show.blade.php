<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            PAPELETA DE SALIDA N°{{$pass->id}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-24 lg:px-24">
            <div class="mx-auto md:flex md:justify-between p-5 bg-white shadow-xl sm:rounded-lg">
                <div class="pl-2 w-full text-gray-800">
                <label class="block text-s font-semibold w-full">TARJETA N°: </label>
                <label class="block text-s text-gray-400 font-semibold w-full">{{ $pass->user->ncard }}</label>
                <label class="block text-s font-semibold w-full">CARGO: </label>
                <label class="block text-s text-gray-400 font-semibold w-full">{{ $pass->user->charge->name_charge }}</label>
                <label class="block text-s font-semibold w-full">DEPENDENCIA/OFICINA: </label>
                <label class="block text-s text-gray-400 font-semibold w-full">{{ $pass->user->dependence->name_dependence }}</label>
                <label class="block text-s font-semibold w-full">MOTIVO DE SALIDA: </label>
                <label class="block text-s text-gray-400 font-semibold w-full">{{ $pass->motive }}</label>
                <label class="block text-s font-semibold w-full">LUGAR DE SALIDA: </label>
                <label class="block text-s text-gray-400 font-semibold w-full">{{ $pass->place }}</label>
                <label class="block text-s font-semibold w-full">TIEMPO AUTORIZADO POR SU SUPERIOR: </label>
                <label class="block text-s text-gray-400 font-semibold w-full">{{ $pass->time->time_permision }}</label>
                <label class="block text-s font-semibold w-full">HORA DE SALIDA: </label>
                <label class="block text-s text-gray-400 font-semibold w-full">{{ $pass->departure_time->hour_departure }}</label>
                <label class="block text-s font-semibold w-full">HORA DE RETORNO: </label>
                <label class="block text-s text-gray-400 font-semibold w-full">{{ $pass->return_time->hour_return }}</label>
                <label class="block text-s font-semibold w-full">OBSERVACIONES: </label>
                <label class="block text-s text-gray-400 font-semibold w-full">{{ $pass->return_time->observation }}</label>
                <label class="block text-s font-semibold w-full">FECHA: </label>
                <label class="block text-s text-gray-400 font-semibold w-full">Puno, {{ \Carbon\Carbon::parse($pass->date)->locale('es')->format('j \d\e F \d\e Y') }}</label>

                <label class="block text-s font-semibold w-full">INTERESADO: </label>
                <label class="block text-s text-gray-400 font-semibold w-full">{{ $pass->user->name }}</label>
                <label class="block text-s font-semibold w-full">JEFE INMEDIATO: </label>
                <label class="block text-s text-gray-400 font-semibold w-full">Verificado por el jefe de {{ $pass->user->dependence->name_dependence }}</label>
                <label class="block text-s font-semibold w-full">VISTO BUENO DE ORRHH: </label>
                <label class="block text-s text-gray-400 font-semibold w-full"> Verificado por el JEFE DE LA OFICINA DE RECURSOS HUMANOS</label>
                <div class=" flex justify-end">
                    <a href="{{ route('archived.index') }}" class="bg-sky-900 text-white rounded px-2 py-1 mx-1 my-auto md:mt-3 mb-3">Atras</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
