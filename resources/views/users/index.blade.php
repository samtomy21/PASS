<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Lista de Usuarios
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="w-full mx-auto lg:w-1/2">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                @livewire('users-index')


            </div>
        </div>
    </div>
</x-app-layout>
