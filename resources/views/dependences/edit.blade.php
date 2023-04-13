<x-app-layout>
    <x-slot name="header">
        <h2">
            Editar Cargo
        </h2>
    </x-slot>

    <form action="{{ route('dependences.update', $dependence) }}" method="POST" class="max-w-md">
    @csrf 
    @method('PUT')
    <label for="" >Modifique la Dependencis *</label>
    <input type="text" name="name_dependence" value="{{ $dependence->name_dependence }}">
    <hr>
    <input type="submit" value="Editar">
    </form>  
</x-app-layout>