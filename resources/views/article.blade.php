<x-main-layout>
    <x-slot name="css">
        <!-- PrismJS -->
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/themes/prism.min.css" integrity="sha512-tN7Ec6zAFaVSG3TpNAKtk4DOHNpSwKHxxrsiw4GHKESGPs5njn/0sMCUMl2svV4wo4BK/rCP7juYz+zx+l6oeQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/themes/prism-okaidia.min.css"
            integrity="sha512-mIs9kKbaw6JZFfSuo+MovjU+Ntggfoj8RwAmJbVXQ5mkAX5LlgETQEweFPI18humSPHymTb5iikEOKWF7I8ncQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

            <style>
                pre code {
                    width: 100%;
                    overflow-x: auto;
                }

                .post-content h1{
                        font-size: 2.5em;
                        font-weight: 600;
                }
                .post-content h2{
                        font-size: 2em;
                        font-weight: 600;
                }
                .post-content h3{
                        font-size: 1.8em;
                        font-weight: 600;
                }
                .post-content h4{
                        font-size: 1.5em;
                        font-weight: 600;
                }
                .post-content h5{
                        font-size: 1.2em;
                        font-weight: 600;
                }
                .post-content h6{
                        font-size: 1em;
                        font-weight: 600;
                }
                .post-content ul {
                    list-style: initial;
                }
                .post-content ol {
                    list-style: decimal;
                }
            </style>
    </x-slot>

    <div class="container mx-auto md:px-12 md:py-5">
        <div class="lg:grid lg:grid-cols-3 gap-5">
            <div class="lg:col-span-2">
                <x-card>
                    <div class="p-5 md:p-10">
                        <div>
                            <div class="flex gap-3 items-center mb-5 mt-5 md:mt-0">
                                <img src="{{ asset('img/avatar1.svg') }}" width="30" height="30"
                                    class="object-cover object-center" alt="">
                                <div>
                                    <a href="#"
                                        class="text-gray-700 hover:text-gray-900 hover:underline">{{ $article->author->name }}</a>
                                    @if ($article->created_at)
                                    <span class="block md:inline text-sm text-gray-500"><span
                                            class="hidden md:inline">&middot;</span>
                                        {{ $article->created_at->format('d M, Y')}}</span>
                                    @endif
                                </div>
                            </div>
                            <h1 class="text-2xl md:text-4xl font-semibold text-gray-900">{{ $article->title }}</h1>
                            <hr class="my-5">
                            @foreach ($article->topics as $topic)
                            <a href="/topic/{{ $topic->slug }}"
                                class="px-2 py-1 bg-blue-100 hover:bg-blue-200 text-blue-900 font-semibold text-sm rounded">#{{$topic->name}}</a>
                            @endforeach
                        </div>
                        <div class="my-5">
                            <img src="{{$article->imagePath()}}" class="w-full h-52 md:h-96 object-cover object-center"
                                alt="Post Cover">
                        </div>
                        <div class="post-content">
                            {!! $article->content !!}
                        </div>
                    </div>
                </x-card>
            </div>
            <div class="lg:col-span-1 px-5 py-5 md:p-0">
                <div>
                    <x-article-list title="🔥 Artikel Terbaru" :posts="$articles" link="/articles" />
                </div>
                <div class="mt-5">
                    <x-card>
                        <x-slot name="header">
                            Topik Lainnya
                        </x-slot>
                        <div class="bg-white grid grid-cols-2 gap-2 p-5">
                            @foreach ($topics->take(20) as $topic)
                            <a href="/topic/{{$topic->slug }}"
                                class="bg-blue-100 hover:bg-blue-200 text-sm md:text-md text-blue-900 font-medium px-3 py-2 rounded transition duration-100"
                                title="{{ $topic->name }}">{{$topic->name}}</a>
                            @endforeach
                        </div>
                        <x-slot name="footer">
                            <a href="/articles" class="text-teal-700 hover:text-teal-900">Lihat lainnya &rarr;</a>
                        </x-slot>
                    </x-card>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="js">
        <!-- PrismJS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/components/prism-core.min.js"
            integrity="sha512-hM0R3pW9UdoNG9T+oIW5pG9ndvy3OKChFfVTKzjyxNW9xrt6vAbD3OeFWdSLQ8mjKSgd9dSO3RXn3tojQtiA8Q=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/plugins/autoloader/prism-autoloader.min.js"
            integrity="sha512-xCfKr8zIONbip3Q1XG/u5x40hoJ0/DtP1bxyMEi0GWzUFoUffE+Dfw1Br8j55RRt9qG7bGKsh+4tSb1CvFHPSA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </x-slot>
</x-main-layout>
