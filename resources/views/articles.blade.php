<x-main-layout>

    <div class="container mx-auto px-5 md:px-12 py-5 min-h-screen">
        <div class="py-8">
            @isset($topic)
            <h6 class="text-gray-700 text-lg">Topik</h6>
            <h1 class="text-3xl font-semibold">{{ $topic->name }}</h1>
            @elseif (isset($query))
            <h6 class="text-gray-700 text-lg">Menampilkan hasil untuk : </h6>
            <h1 class="text-3xl font-semibold">"{{ $query }}"</h1>
            @else
            <h1 class="text-3xl font-semibold">Artikel Terbaru</h1>
            <p class="text-gray-600 mt-1">Apa aja sih yang baru di ZieCoding?</p>
            @endisset
        </div>
        @if(!$articles->isEmpty())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($articles as $article)
            <x-article-card :article="$article" />
            @endforeach
        </div>
        <div class="py-5">
            {{$articles->links()}}
        </div>
        @else
        No Post
        @endif
    </div>
</x-main-layout>
