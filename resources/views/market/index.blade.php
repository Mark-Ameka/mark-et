@extends('layouts.app')

@section('content')
<div>
    <div class="pt-3">
        <form action="{{ route('item.search') }}" method="GET">
            <div class="relative pb-4 flex gap-2">
                <input name="search" type="text" class="truncate pr-2 w-100 py-2 pl-11 shadow-lg bg-neutral-800 text-white rounded-xl focus:outline-none" placeholder="Search by item name ..." value="{{ isset($search) ? $search : '' }}" autocomplete="off">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-basket-search absolute top-1.5 left-3 text-white" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M17 10l-2 -6"></path>
                    <path d="M7 10l2 -6"></path>
                    <path d="M11 20h-3.756a3 3 0 0 1 -2.965 -2.544l-1.255 -7.152a2 2 0 0 1 1.977 -2.304h13.999a2 2 0 0 1 1.977 2.304l-.215 1.227"></path>
                    <path d="M13.483 12.658a2 2 0 1 0 -2.162 3.224"></path>
                    <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                    <path d="M20.2 20.2l1.8 1.8"></path>
                </svg>
                <div class="flex justify-start items-center">
                    <button type="submit" class="py-2 px-3 text-neutral-300 font-semibold rounded-xl shadow-lg">
                        <div class="flex items-center">
                            <p> Search </p>
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if ($empty)
        <div class="max-w-4xl mx-auto">
            @include('partials.alert')
        </div>
        <div class="flex flex-col justify-center pt-10 items-center">
            <p class="text-2xl font-semibold text-white">Public Market is empty</p>
            <img class="w-64 h-64 object-contain" src="images/no_data.png" alt="">
            <div class="py-4 mb-3 block lg:hidden">
                <a href="{{ route('item.create') }}" class="flex items-center gap-2 text-white font-medium px-3 py-2 shadow-xl rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-store" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M3 21l18 0"></path>
                        <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4"></path>
                        <path d="M5 21l0 -10.15"></path>
                        <path d="M19 21l0 -10.15"></path>
                        <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path>
                    </svg>
                    Sell an Item
                </a>
            </div>
        </div>
    @elseif($items->isEmpty())
        <div class="flex flex-col justify-center pt-10 items-center">
            <p class="text-2xl font-semibold text-white">No data has found</p>
            <img class="w-64 h-64 object-contain" src="images/no_data.png" alt="">
        </div>
    @else
        <div class="max-w-5xl mx-auto">
            <div class="flex justify-end">
                {{ $items->onEachSide(1)->links('vendor.pagination.custom') }}
            </div>
            @include('partials.alert')
            @if (count($items) == 2)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 my-4">
            @elseif(count($items) >= 3)
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 my-4">
            @else
                <div class="grid grid-cols-1 gap-4 my-4">
            @endif
                @foreach ($items as $item)
                    @if ($item->seller['id'] == Auth::id())
                        <div class="text-white p-3 shadow-lg rounded-xl min-w-min border-2 border-yellow-300">
                    @else
                        <div class="text-white p-3 shadow-lg rounded-xl min-w-min">
                    @endif
                        <div class="md:flex md:flex-row md:justify-between">
                            <div class="flex md:flex-col justify-center items-baseline">
                                <h2 class="break-all line-clamp-1 text-xl font-bold mr-4">{{ $item->item_name }}</h2>
                                <p class="line-clamp-1 mr-4">{{ $item->item_description }}</p>
                                <div class="flex gap-2 mt-2">
                                    <p class="line-clamp-1">Seller: {{ $item->seller['fname'] }}</p>
                                    {{-- Button for view profile --}}
                                    @if ($item->seller['id'] == Auth::id())
                        
                                    @else
                                        <div class="hidden md:block">
                                            <a href="{{ route('user.show', $item->seller['id']) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-hexagon text-sky-500 transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-110" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 13a3 3 0 1 0 0 -6a3 3 0 0 0 0 6z"></path>
                                                    <path d="M6.201 18.744a4 4 0 0 1 3.799 -2.744h4a4 4 0 0 1 3.798 2.741"></path>
                                                    <path d="M19.875 6.27c.7 .398 1.13 1.143 1.125 1.948v7.284c0 .809 -.443 1.555 -1.158 1.948l-6.75 4.27a2.269 2.269 0 0 1 -2.184 0l-6.75 -4.27a2.225 2.225 0 0 1 -1.158 -1.948v-7.285c0 -.809 .443 -1.554 1.158 -1.947l6.75 -3.98a2.33 2.33 0 0 1 2.25 0l6.75 3.98h-.033z"></path>
                                                </svg>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                                
                            </div>
                            <div class="grid grid-cols-2 gap-3 items-center justify-center mt-3">
                                <div class="md:hidden block">
                                    <a href="{{ route('user.show', $item->seller['id']) }}" class="flex justify-center text-white bg-sky-900 rounded-md py-2">
                                        Check Profile
                                    </a>
                                </div>
                                <div class="md:hidden block">
                                    <a href="{{ route('item.show', $item->id) }}" class="flex justify-center text-white bg-green-900 rounded-md py-2">
                                        Check Item
                                    </a>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                {{-- View item --}}
                                @if ($item->seller['id'] == Auth::id())
                                    <div class="hidden md:block text-yellow-300 font-bold px-2 py-2 md:py-0 rounded-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-license" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M15 21h-9a3 3 0 0 1 -3 -3v-1h10v2a2 2 0 0 0 4 0v-14a2 2 0 1 1 2 2h-2m2 -4h-11a3 3 0 0 0 -3 3v11"></path>
                                            <path d="M9 7l4 0"></path>
                                            <path d="M9 11l4 0"></path>
                                        </svg>
                                    </div>
                                @else
                                    <a href="{{ route('item.show', $item->id) }}" class="hidden md:block text-green-600 font-bold px-2 py-2 md:py-0 rounded-md transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eyeglass" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M8 4h-2l-3 10"></path>
                                            <path d="M16 4h2l3 10"></path>
                                            <path d="M10 16l4 0"></path>
                                            <path d="M21 16.5a3.5 3.5 0 0 1 -7 0v-2.5h7v2.5"></path>
                                            <path d="M10 16.5a3.5 3.5 0 0 1 -7 0v-2.5h7v2.5"></path>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="md:hidden flex justify-end">
                    {{ $items->onEachSide(1)->links('vendor.pagination.custom') }}
                </div>
                <div class="py-4 flex justify-center lg:hidden">
                    <a href="{{ route('item.create') }}" class="flex items-center justify-center h-24 gap-2 w-full text-neutral-600 font-medium px-3 py-2 shadow-xl rounded-lg border-2 border-dashed border-neutral-600 hover:text-neutral-500 hover:border-neutral-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-store" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 21l18 0"></path>
                            <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4"></path>
                            <path d="M5 21l0 -10.15"></path>
                            <path d="M19 21l0 -10.15"></path>
                            <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4"></path>
                        </svg>
                        Sell an Item
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
