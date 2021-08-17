<x-card>
    <x-slot name="header">
        {{$title}}
    </x-slot>
    @foreach ($posts->take(5) as $post)
    <a href="{{route('articles.read', $post->slug)}}"
        class="flex justify-between gap-3 p-5 border-b hover:bg-gray-100 transition duration-100">
        <div>
            <h5 class="font-semibold text-gray-800" title="{{ $post->title }}">{{Str::limit($post->title, 60)}}
            </h5>
            <div>
                <span class="mt-2 text-sm text-gray-500">{{ $post->created_at->format('d M Y') }}</span>
            </div>
        </div>
        <img src="{{$post->imagePath()}}" class="w-16 h-16 rounded-lg" alt="">
    </a>
    @endforeach
    @isset($link)
    <x-slot name="footer">
        <a href="{{$link}}" class="text-teal-700 hover:text-teal-900">Lihat lainnya &rarr;</a>
    </x-slot>
    @endisset
</x-card>
