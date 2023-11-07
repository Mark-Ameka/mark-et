<div class="flex min-h-screen w-[190px] flex-col bg-neutral-800 text-white shadow-lg">
    <nav class="flex-1">
        <div class="flex justify-center items-center py-3">
            <img class="object-contain h-20 w-20" src="/images/market-logo.png" alt="">
        </div>
        <ul class="gap-y-2 flex flex-col">
            
            <li class="px-2">
                <a href="{{ route('user.index') }}">
                    <div class="flex cursor-pointer items-start gap-2 py-2 px-3 hover:bg-neutral-700 rounded-lg">
                        @if (isset(Auth::user()->avatar))
                            <img class="rounded-full object-cover h-12 w-12 border-2" src="{{ asset('avatars/' . Auth::user()->avatar) }}" alt="Profile Picture">
                        @endif
                        <div class="flex flex-col gap-1">
                            <p>{{ Auth::user()->fname }}</p>
                            <div class="flex gap-1 items-center">
                                <div class="h-4 w-1 rounded-full bg-white"></div>
                                <p class="text-xs line-clamp-1"> Selling: 
                                    {{ count(\App\Models\MarketItems::where('seller_id', Auth::id())->get()) }}
                                </p>
                            </div>
                        </div>
                    </div>
                </a>
            </li>

            <li class="px-2">
                <a href="{{ url('/home') }}">
                    <div class="flex cursor-pointer items-center gap-2 py-2 px-3 hover:bg-neutral-700 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-dashboard" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 4h6v8h-6z"></path>
                            <path d="M4 16h6v4h-6z"></path>
                            <path d="M14 12h6v8h-6z"></path>
                            <path d="M14 4h6v4h-6z"></path>
                         </svg>
                        Public Market
                    </div>
                </a>
            </li>

            <li class="px-2">
                <a href="{{ route('item.mymarket_index') }}">
                    <div class="flex cursor-pointer items-center gap-2 py-2 px-3 hover:bg-neutral-700 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                            <path d="M17 17h-11v-14h-2"></path>
                            <path d="M6 5l14 1l-1 7h-13"></path>
                         </svg>
                        My Market
                    </div>
                </a>
            </li>

            <li class="px-2">
                <a href="{{ route('item.create') }}">
                    <div class="flex cursor-pointer items-center gap-2 py-2 px-3 hover:bg-neutral-700 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-store" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 21l18 0"></path>
                            <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4"></path>
                            <path d="M5 21l0 -10.15"></path>
                            <path d="M19 21l0 -10.15"></path>
                            <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path>
                         </svg>
                        Sell
                    </div>
                </a>
            </li>

        </ul>
    </nav>
    <nav class="px-2 pb-2 text-sm">
        <a href="{{ route('logout') }}" 
        onclick="event.preventDefault(); 
        document.getElementById('logout-form').submit();">
            <div class="flex cursor-pointer items-center gap-2 py-2 px-3 hover:bg-neutral-700 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-logout" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                    <path d="M9 12h12l-3 -3"></path>
                    <path d="M18 15l3 -3"></path>
                </svg>
                Logout
            </div>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </nav>
</div>