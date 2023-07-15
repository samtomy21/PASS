<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            SEGUIMIENTO DE PAPELETAS
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-3 lg:px-4">
        <div class=" flex justify-between items-center max-w-7xl">

            <p class="mb-4 mx-5 mt-5 rounded text-left m-4">

                <a href="{{ route('passesadmin.reporte') }}" class="bg-blue-500 text-white text-xs font-bold py-2 px-4 rounded">
                    Imprimir
                </a>
            </p>

        </div>
    </div>

    @livewire('passesadmin-index')

</x-app-layout>
