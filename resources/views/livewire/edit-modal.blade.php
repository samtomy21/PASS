<div>
    <!-- <x-buttonR wire:click="$set('open', true)"> -->
        <a href="#" class="bg-blue-800 text-white rounded px-2 py-1" wire:click="$set('open', true)">Editar</a>
    <!-- </x-buttonR> -->
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Papeleta {{ $pass->id }}
        </x-slot>
        <x-slot name="content">
            <div class="max-w-7xl mx-auto py-5">
                <div class="mx-auto md:flex md:justify-between p-5 bg-white shadow-xl sm:rounded-lg">                
                    <div class="pl-2 w-72 text-gray-800">
                    <label class="block text-s font-semibold w-full">Nombre: </label>{{ $pass->user->name }}
                    <label class="block text-s font-semibold w-full">Codigo: </label>{{ $pass->user->ncard }}
                    <label class="block text-s font-semibold w-full">Cargo: </label>{{ $pass->charge->name_charge }}
                    <label class="block text-s font-semibold w-full">Dependencia: </label>{{ $pass->dependence->name_dependence }}
                        <label class="block text-s font-semibold w-full">Motivo de salida: </label>{{ $pass->motive }}
                    </div>
                    <div class="pl-2 w-72 text-gray-800">
                        <label class="block text-s font-semibold w-full">Lugar: </label>{{ $pass->place }}
                        <label class="block text-s font-semibold w-full">Tiempo autorizado: </label>{{ $pass->time }}
                        <label class="block text-s font-semibold w-full">Hora de Salida Registrada: </label>{{ $pass->input }}
                        <label class="block text-s font-semibold w-full">Hora de ingreso registros: </label>{{ $pass->output }}
                        <label class="block text-s font-semibold w-full">Fecha: </label>{{ $pass->date }}
                    </div>
                    <div class="pl-2 w-80 text-gray-800 border rounded-lg border-gray-900">
                        <label class="block text-s font-semibold w-full">Observaciones: </label>{{ $pass->observation }}
                    </div>                
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
        <a href="{{ route('passes.print', $pass) }}" class="bg-yellow-500 text-white rounded px-2 py-1 mx-1">Imprimir</a>
        </x-slot>
    </x-dialog-modal>

</div>