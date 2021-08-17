<div class="shadow rounded-lg bg-white p-5">
    <a href="{{route('articles.read', $article->slug)}}">
        <img src="{{$article->imagePath()}}" loading="lazy" class="w-full h-36 md:h-48 rounded-lg object-cover object-center hover:opacity-80 transition duration-200" alt="{{$article->title}}">
    </a>
    <div class="mt-3">
        <a href="{{route('articles.read', $article->slug)}}">
            <h3 class="text-lg font-semibold text-gray-900 leading-6 hover:underline" title="{{$article->title}}">{{Str::limit($article->title,70)}}</h3>
        </a>
        <p class="text-sm text-gray-600 mt-2">{{Str::limit($article->excerpt, 100)}}</p>
    </div>
</div>
