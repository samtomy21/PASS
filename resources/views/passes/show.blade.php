<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hola
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>{{ $pass->name }}</div>
                <div>{{ $pass->charge->name_charge }}</div>
                <div>{{ $pass->dependence->name_dependence }}</div>
                <div>{{ $pass->ncard }}</div>
                <div>{{ $pass->motive }}</div>
                <div>{{ $pass->place }}</div>
                <div>{{ $pass->observation }}</div>
                <div>{{ $pass->time }}</div>
                <div>{{ $pass->input }}</div>
                <div>{{ $pass->output }}</div>
                <div>{{ $pass->date }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
