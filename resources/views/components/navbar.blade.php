<nav class="sticky top-0 inset-x-0 z-50 bg-teal-700 shadow">
    <div class="container mx-auto px-5 md:px-12 flex items-center justify-between flex-wrap">
        <div class="flex justify-between md:w-auto w-full md:px-0 py-5 md:py-3">
            <div class="flex items-center flex-shrink-0">
                <a href="/" class="font-semibold mr-5 flex items-center gap-3">
                    <img src="{{ asset('img/logo.svg') }}" width="35" alt="">
                    <span class="text-lg font-semibold text-white">ZieCoding</span>
                </a>
            </div>
            <div class="block md:hidden">
                <button id="nav"
                    class="flex items-center px-3 py-2 border-2 rounded text-gray-200 border-gray-200 hover:border-white hover:text-white"
                    onclick="toggleNavbar()">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
        </div>

        <div id="navbar-menu" class="hidden w-full flex-grow md:flex md:items-center md:w-auto pb-5 lg:pb-0">
            <div class="text-md text-gray-300 md:flex-grow">
                {{$links}}
            </div>

            <div class="mx-auto md:px-0 mt-3 md:mt-0">
                <form action="/search/" class="flex mx-auto text-gray-600">
                    <input class="bg-white h-10 px-3 flex-grow rounded-l-lg text-sm focus:outline-none" type="search"
                        name="q" placeholder="Cari sesuatu...">
                    <button type="submit"
                        class="flex items-center justify-center h-10 w-10 bg-gray-100 hover:bg-gray-200 rounded-r-lg">
                        <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" version="1.1"
                            id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966"
                            style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px"
                            height="512px">
                            <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
