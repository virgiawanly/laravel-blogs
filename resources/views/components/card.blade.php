<div>
    <div class="shadow rounded-lg bg-white overflow-hidden">
        @isset($header)
        <div class="bg-gray-50 p-5 border-b border-gray-300 text-xl font-semibold">
            {{$header}}
        </div>
        @endisset
        <div class="bg-white">
            {{ $slot }}
        </div>
        @isset($footer)
        <div class="bg-gray-50 py-3 px-5 border-t border-gray-300">
           {{ $footer }}
        </div>
        @endisset
    </div>
</div>
