<!DOCTYPE html>
<html lang="en" class="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>KaryaKita</title>
</head>

<body class="bg-slate-100">
    <x-guest-layout>
        <div class="max-w-screen-lg mx-auto px-6 lg:px-8">
            <div class="min-h-screen flex justify-center items-center">
                <x-clientPage.homepage />
            </div>
        </div>
    </x-guest-layout>
</body>

</html>
