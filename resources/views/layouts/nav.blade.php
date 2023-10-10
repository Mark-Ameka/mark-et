<nav class="bg-neutral-800 text-white py-2 items-center justify-between flex">
    <div>
        <a href="{{ url('/home') }}" class="font-bold text-xl">Mark-et</a>
    </div>
    <div>
        <div x-data="{ isActive: false }" class="relative">
            <div class="inline-flex items-end overflow-hidden rounded-md">
                <button x-on:click="isActive = !isActive" class="h-full p-2 hover:text-gray-100">
                    <span class="">{{ Auth::user()->name }}</span>
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