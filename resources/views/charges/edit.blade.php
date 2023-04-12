<x-app-layout>
    <x-slot name="header">
        <h2">
            Editar Cargo
        </h2>
    </x-slot>

    <form action="{{ route('charges.update', $charge) }}" method="POST" class="max-w-md">
    @csrf 
    @method('PUT')
    <label for="" >Modifique el Cargo *</label>
    <input type="text" name="name_charge" value="{{ $charge->name_charge }}">
    <hr>
    <input type="submit" value="Editar">
    </form>  
</x-app-layout>