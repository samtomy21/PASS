<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js']) <!-- para el css/ en esta version de laravel con el archivo vite.config,js -->
    <title>Papeletas</title>
</head>
<body class="bg-slate-600 w-full h-full">
    <div class="bg-blue-200 w-full">
        <div class="flex">
            <div class="py-1 mx-auto">
                <img src="{{ asset('images/LOGO-GORE2.png') }}" class="h-20" alt="logo">
            </div>
        </div>
    </div>
        <main>
            <div class="w-full h-3/4">
                <div class="w-full h-full flex flex-col absolute mt-12 space-y-10 py-4 items-center">
                    <a href="{{ route('login') }}" class="w-32 rounded-full text-xl text-blue-800 shadow-sm font-semibold pl-6 py-4 bg-white">Login</a>
                    <a href="{{ route('register') }}" class="w-32 rounded-full text-xl text-blue-800 shadow-sm font-semibold pl-6 py-4 bg-white">Register</a>
                </div>
                <div>
                    <!-- <img src="{{ asset('images/mont.jpg') }}" class=""> -->
                </div>
                
            </div>
        </main>
</body>
</html>