<div>
    <!-- <x-buttonR wire:click="$set('open', true)"> -->
    <a href="#" class="bg-blue-800 text-white rounded px-2 py-1 flex items-center justify-center" wire:click="$set('open', true)">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
        <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
    </svg>
    </a>
    <!-- </x-buttonR> -->
    <x-dialog-modal wire:model="open" class="w-auto">
        <x-slot name="title">
            Papeleta {{ $pass->id }}
        </x-slot>
        <x-slot name="content">
            <div class="w-full">
                <div class="flex max-w-7xl mx-auto">
                    <div class="bg-white px-4 overflow-hidden shadow-xl sm:rounded-lg">
                        <form action="{{ route('passes.update', $pass) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <label class="text-s font-semibold">Motivo de Salida:</label>
                            <input type="text" class="rounded py-1 w-full border-gray-400" name="motive" value="{{ $pass->motive }}">

                            <label class="text-s font-semibold">Lugar de Salida:</label>
                            <input type="text" class="rounded py-1 w-full border-gray-400" name="place" value="{{ $pass->place }}">

                            <div class="opacity-80 h-px mt-4 md:mb-4" style="background: linear-gradient(to right, rgba(200, 200, 200, 0) 0%, rgba(200, 200, 200, 1) 30%, rgba(200, 200, 200, 1) 70%, rgba(200, 200, 200, 0) 100%);"></div>
                            <div class="container px-5 gap-5 md:flex md:w-full">
                                <div class="container w-full">
                                    <label class="text-s font-semibold">Tiempo Autorizado:</label>
                                    <select name="time_id" class="rounded py-1 w-full border-gray-400" >
                                        @foreach ($times as $time)
                                            <option value="{{ $time->id }}">{{ $time->time_permision }}</option>
                                        @endforeach
                                    </select>

                                    <label class="text-s font-semibold">Estado:</label>
                                    <div class=" flex justify-center items-center">
                                        @if ($pass->estado === 3)
                                            <span class="inline-block h-4 w-4 rounded-full bg-green-500"></span>
                                        @elseif ($pass->estado === 2)
                                            <span class="inline-block h-4 w-4 rounded-full bg-blue-500"></span>
                                        @elseif ($pass->estado === 1)
                                            <span class="inline-block h-4 w-4 rounded-full bg-yellow-500"></span>
                                        @elseif ($pass->estado === 0)
                                            <span class="inline-block h-4 w-4 rounded-full bg-red-500"></span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="opacity-80 h-px mt-4 md:mb-4" style="background: linear-gradient(to right, rgba(200, 200, 200, 0) 0%, rgba(200, 200, 200, 1) 30%, rgba(200, 200, 200, 1) 70%, rgba(200, 200, 200, 0) 100%);"></div>
                            <div class="flex px-5 justify-between items-center pb-5">
                                <div class="w-full">
                                    <label class="text-s font-semibold">Fecha</label>
                                    <input type="date" class="md:rounded py-1 w-1/2 border-gray-400" value="{{ $currentDate }}" name="date">
                                </div>
                            </div>
                            <div class="justify-end">
                                    <input type="submit" class="bg-green-600 text-white rounded px-4 py-1" value="Guardar">
                            </div>
                        </form>
                    </div>
                    <div class="flex w-1/2">
                        <iframe src="" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <a href="{{ route('passes.print', $pass) }}" class="bg-yellow-500 text-white rounded px-2 py-1">Imprimir</a>
        </x-slot>
    </x-dialog-modal>

</div>
