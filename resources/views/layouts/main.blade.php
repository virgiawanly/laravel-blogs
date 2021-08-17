<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'ZieCoding' }}</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    {{$css ?? null}}
</head>

<body>
    <x-navbar>
        <x-slot name="links">
            <a href="/articles" class="block md:inline-block md:mt-0 hover:text-white md:px-2 py-3">
                Artikel
            </a>
            <a href="/#topics" class="block md:inline-block md:mt-0 hover:text-white md:px-2 py-3">
                Topik
            </a>
            <a href="/about" class="block md:inline-block md:mt-0 hover:text-white md:px-2 py-3">
                Tentang Kami
            </a>
        </x-slot>
    </x-navbar>

    <main class="bg-gray-100">
        {{$slot}}
    </main>

    <x-footer/>

    <script>
        const toggleNavbar = () => {
            document.getElementById('navbar-menu').classList.toggle('hidden');
        }
    </script>

    {{$js ?? null}}
</body>

</html>
