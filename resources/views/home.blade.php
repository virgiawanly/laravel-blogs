<x-main-layout>
    <header class="w-full bg-gray-900">
        <div class="container mx-auto px-5 md:px-12">
            <div class="grid md:grid-cols-2 items-center overflow-y-hidden" style="height: 500px;">
                <div>
                    <h1 class="text-white text-5xl mb-5 font-semibold">ZieCoding</h1>
                    <p class="text-gray-300 leading-loose text-lg">Tempat <b class="text-white">belajar dan berbagi</b> pengetahuan seputar <b class="text-white">Teknologi Informasi</b>.</p>
                    <div class="mt-10">
                        <a href="/articles" class="px-5 py-3 rounded-lg shadow bg-teal-700 text-white">Mulai Belajar</a>
                    </div>
                </div>
                <div class="overflow-y-hidden h-full">
                    <img src="{{ asset('img/robot.png') }}" class="w-full" alt="">
                </div>
            </div>
        </div>
    </header>
</x-main-layout>
