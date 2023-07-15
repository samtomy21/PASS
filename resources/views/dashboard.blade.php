<x-app-layout>
    <x-slot name="header">
        <div>
            <h2 class="font-semibold text-3xl text-center text-gray-800 ">
                BIENVENIDOS - Sistema de Permisos de Salida - Gore Puno
            </h2>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="text-center text-red-500">USUARIOS REGISTRADOS Y PAPELETAS REGISTRADAS POR MES:</h1>
                <div class="flex row">
                    <div class="w-1/2 m-auto">
                        <canvas id="chart1">
                        </canvas>
                    </div>
                    <div class="w-1/2 m-auto">
                        <canvas id="chart2">
                        </canvas>
                    </div>
                </div>

                <div class="flex justify-center items-center h-screen">
                    <div class="bg-gradient-to-r from-pink-500 to-purple-500 rounded-lg shadow-lg p-6 flex">
                        <img src="{{ asset('images/otic.jpg') }}" alt="Imagen de la tarjeta" class="w-1/3 rounded-lg mr-6">
                        <div class="px-2">
                        <h2 class="text-3xl font-semibold mb-2 font-serif">SOLICITAR PERMISOS</h2>
                        <p class="text-gray-900 mb-4 font-sans w-1/2">Si es la PRIMERA vez que ingresas al sistema, es necesario solicitar ACCESO a la oficina de OTIC.</p>
                        <p class="text-gray-700 mb-4 font-sans w-1/2">Estamos Ubicados en la Cede Central - 2° Piso</p>
                        <p class="text-black-700 mb-4 font-sans w-1/2">OFICINA DE TECNOLOGIAS DE INFORMACIÓN Y COMUNICACIONES</p>
                        <a href="{{ asset('images/otic.jpg') }}" class="py-2 px-4 bg-blue-500 text-white rounded-lg hover:bg-blue-700 transition-colors duration-300 ease-in-out">Enlace</a>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <p></p>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    var ctx1 = document.getElementById('chart1').getContext('2d');
    var userChart1 = new Chart(ctx1,{
        type:'bar',
        data:{
            labels: {!! json_encode($labels) !!},
            datasets: {!! json_encode($datasets) !!}
        },
    });

    var ctx2 = document.getElementById('chart2').getContext('2d');
    var userChart2 = new Chart(ctx2,{
        type:'bar',
        data:{
            labels: {!! json_encode($labels) !!},
            datasets: {!! json_encode($datasets) !!}
        },
    });


</script>
