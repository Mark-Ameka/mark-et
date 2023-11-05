<nav class="bg-neutral-800 text-white py-2 items-center justify-between flex">
    <div class="flex items-center">
        <img class="object-contain h-12 w-12" src="/images/market-logo.png" alt="">
        <ul class="flex md:gap-2 ml-2">
            <li>
                <a href="{{ url('/home') }}">
                    <div class="flex cursor-pointer items-center gap-2 py-2 px-3 hover:border-neutral-300 hover:border-b-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 4h6v8h-6z"></path>
                            <path d="M4 16h6v4h-6z"></path>
                            <path d="M14 12h6v8h-6z"></path>
                            <path d="M14 4h6v4h-6z"></path>
                         </svg>
                        <p class="hidden md:block">
                            Public Market
                        </p>
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('item.mymarket_index') }}">
                    <div class="flex cursor-pointer items-center gap-2 py-2 px-3 hover:border-neutral-300 hover:border-b-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 17h-11v-14h-2"></path>
                            <path d="M6 5l14 1l-1 7h-13"></path>
                        </svg>
                        <p class="hidden md:block">
                            My Market
                        </p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div>
        <div x-data="{ isActive: false }" class="relative">
            <div class="inline-flex items-end overflow-hidden rounded-md">
                <button x-on:click="isActive = !isActive" class="h-full p-2 hover:text-gray-100">
                    <span class="">{{ Auth::user()->fname }}</span>
                </button>
            </div>
            

            <div class="absolute end-0 z-10 mt-3 w-40 divide-y divide-gray-100 rounded-md border border-gray-100 bg-white shadow-sm" role="menu" x-cloak x-transition x-show="isActive" x-on:click.away="isActive = false" x-on:keydown.escape.window="isActive = false">
                <div class="p-1">
                    <a href="{{ route('user.index') }}" class="block rounded-lg px-4 py-2 text-sm text-gray-500 hover:bg-gray-50 hover:text-gray-700" role="menuitem"> My Account </a>
                </div>

                <div class="p-1">
                    <a class="flex w-full items-center gap-2 rounded-lg px-4 py-2 text-sm text-red-700 hover:bg-red-50" 
                        href="{{ route('logout') }}" 
                        onclick="event.preventDefault(); 
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</nav>