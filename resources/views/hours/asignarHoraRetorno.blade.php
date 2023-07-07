<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Asignar hora
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-24 lg:px-24">
            <div class="bg-white pt-5 px-4 overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('hours.store') }}" method="POST">
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


                    <label class="text-s font-semibold">Hora de Retorno:</label>
                    <input type="time" class="rounded py-1 w-full border-gray-400" value="{{ $currentHour }}" name="hour_return">

                    <label class="text-s font-semibold">N° de pase de salida:</label>
                    <input type="integer" class="rounded py-1 w-full border-gray-400" value="{{ $pase->id }}" name="pass_id">

                    <div class="container">
                        <label class="text-s font-semibold">Observaciones:</label>
                        <textarea name="observation" class="rounded py-1 w-full border-gray-400" id=""cols="20" rows="6" type="text">Ninguna</textarea>
                    </div>

                    <div class="opacity-80 h-px mt-4 md:mb-4" style="background: linear-gradient(to right, rgba(200, 200, 200, 0) 0%, rgba(200, 200, 200, 1) 30%, rgba(200, 200, 200, 1) 70%, rgba(200, 200, 200, 0) 100%);"></div>
                    <div class="flex px-5 justify-between items-center pb-5">
                        <div class="justify-end">
                            <input type="submit" class="bg-green-600 text-white rounded px-4 py-1" value="Guardar">
                        </div>
                    </div>
                </form>
            </div>
</div>
    </div>
</x-app-layout>
