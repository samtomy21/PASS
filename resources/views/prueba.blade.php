<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Papeletas</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- para el css/ en esta version de laravel con el archivo vite.config,js -->

</head>

<body>
    <div class="container px-1 mx-1">
        <div class="flex justify-center items-center py-4">
            <div class="flex items-center">
                <a href="">
                    <img src="{{ asset('images/LOGO-GORE2.png') }}" class="h-16">
                </a>
            </div>
            <div class="flex items-center gap-1 px-10">
                <label class="text-xs">Papeleta de Salida</label>
                <input type="text" name="" class="rounded border-gray-200 my-0" value="N° ####">
                <label class="text-xs">Tarjeta N° </label>
                <input type="text" name="" class="rounded border-gray-200 my-0" value="N° ####">
            </div>
        </div>

        <div class="opacity-80 h-px mb-8" style="background: linear-gradient(to right, rgba(200, 200, 200, 0) 0%, rgba(200, 200, 200, 1) 30%, rgba(200, 200, 200, 1) 70%, rgba(200, 200, 200, 0) 100%);"></div>
        <div class="container px-20 w-full">
            <div class="container px-auto">
                <label class="block text-xs">Nombre: </label>
                <input type="text" name="" class="rounded border-gray-500 w-full mb-4" placeholder="Juanito Perez">

                <label class="block text-xs">Cargo: </label>
                <input type="text" name="" class="rounded border-gray-500 w-full mb-4" placeholder="Presidente">

                <button class="relative flex justify-center items-center bg-white border focus:outline-none text-gray-600 rounded ring-gray-500 group" id="menu-dep">
                    <p class="px-5">Dropdown</p>
                    <span class="border-l p-2 bg-gray-100">
                    <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd" />
                    </svg>
                    </span>
                    <div class="absolute hidden group-focus:block top-full min-w-full w-max bg-white mt-1 rounded">
                        <ul class="text-left border rounded">
                            <li class="px-4 py-1 hover:bg-gray-100 border-b">Depd 1</li>
                            <li class="px-4 py-1 hover:bg-gray-100 border-b">Depd 2</li>
                            <li class="px-4 py-1 hover:bg-gray-100 border-b">Depd 3</li>
                            <li class="px-4 py-1 hover:bg-gray-100 border-b">Depd 4</li>
                            <li class="px-4 py-1 hover:bg-gray-100 border-b">Depd 5</li>
                        </ul>
                    </div>
                </button>

                <label class="block text-xs">Dependencia: </label>
                <input type="text" name="" class="rounded border-gray-500 w-full mb-4" placeholder="Otic">

                <label class="block text-xs">Motivo: </label>
                <input type="text" name="" class="rounded border-gray-500 w-full mb-4" placeholder="Salud">

                <label class="block text-xs">Lugar: </label>
                <input type="text" name="" class="rounded border-gray-500 w-full mb-4" placeholder="Aqui ps donde mas">

            </div>
            <div class="opacity-80 h-px mb-8" style="background: linear-gradient(to right, rgba(200, 200, 200, 0) 0%, rgba(200, 200, 200, 1) 30%, rgba(200, 200, 200, 1) 70%, rgba(200, 200, 200, 0) 100%);"></div>
            <div class="flex justify-center px-auto w-full">
                <div class="container items-center w-auto py-2">
                    <label class="block text-xs px-1">Tiempo autorizado por su superior: </label>
                    <input type="text" name="" class="rounded border-gray-500 w-full my-4" placeholder="no vuelvas">

                    <label class="block text-xs px-1">Hora de salida: </label>
                    <input type="time" name="" class="rounded border-gray-500 w-full my-4">

                    <label class="block text-xs px-1">Hora de retorno: </label>
                    <input type="time" name="" class="rounded border-gray-500 w-full my-4">
                </div>
                <div class="container items-center w-full py-2 pl-10">
                    <label class="block text-xs px-1">Observaciones: </label>
                    <textarea name="" rows="5" class="rounded border-gray-500 w-full my-4">aqui vemos como enviamos la informacion :v</textarea>
                </div>

            </div>
            <label class="block text-s px-1">Puno, 2023</label>

            <div class="flex justify-end px-auto mb-10">
                <input type="submit" value="Enviar" class="bg-gray-800 text-white rounded px-4 py-1">
            </div>
        </div>
    </div>
</body>

</html>