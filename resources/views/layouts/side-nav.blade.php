<div class="flex min-h-screen max-w-fit flex-col bg-neutral-800 text-white shadow-lg">
    <nav class="flex-1">
        <a href="{{ url('/home') }}" class="flex justify-center items-center py-3">
            <img class="object-contain h-20 w-20" src="/images/market-logo.png" alt="">
        </a>
        <ul class="gap-y-2 flex flex-col">
            <li class="px-2">
                <a href="{{ route('user.index') }}">
                    <div class="flex cursor-pointer items-center gap-2 py-2 px-3 hover:bg-neutral-700 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-circle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                            <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                            <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path>
                        </svg>
                        {{ Auth::user()->fname }}
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
    <nav class="flex text-sm">
        <ul class="gap-y-2 flex flex-col">
            <li class="px-2 pb-2">
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
            </li>
        </ul>
    </nav>
</div>