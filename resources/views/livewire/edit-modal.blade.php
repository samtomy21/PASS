<div>
    <x-buttonR wire:click="$set('open', true)">
        ver
    </x-buttonR>
    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Papeleta 
        </x-slot>
        <x-slot name="content">
            <div class="max-w-7xl mx-auto py-5">
                <div class="mx-auto md:flex md:justify-between p-5 bg-white shadow-xl sm:rounded-lg">                
                    <div class="pl-2 w-72 text-gray-800">
                        <label class="block text-s font-semibold w-full">Nombre: </label>
                        <label class="block text-s font-semibold w-full">Codigo: </label>
                        <label class="block text-s font-semibold w-full">Cargo: </label>
                        <label class="block text-s font-semibold w-full">Dependencia: </label>
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
            
        </x-slot>
    </x-dialog-modal>

</div>