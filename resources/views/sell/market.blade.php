@extends('layouts.app')

@section('content')
<div>
    <div class="pt-3">
        <form action="{{ route('item.mymarket_search') }}" method="GET">
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
            <p class="text-1xl md:text-2xl font-semibold text-white">You don't have any selling items yet</p>
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
            @if (count($items) >= 2)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 my-4">
            @else
                <div class="grid grid-cols-1 gap-4 my-4">
            @endif
                @foreach ($items as $item)
                    <div class="text-white p-3 shadow-lg rounded-xl min-w-min">
                        <div class="md:flex md:flex-row md:justify-between items-center">
                            <div class="flex md:flex-col justify-center items-baseline">
                                <h2 class="break-all line-clamp-1 text-xl font-bold mr-4">{{ $item->item_name }}</h2>
                                <p class="line-clamp-1 mr-4">{{ $item->item_description }}</p>
                            </div>
                            <div class="flex justify-center">
                                <a class="text-green-600 font-bold px-2 py-2 md:py-0 rounded-md transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-110" href="{{ route('item.show', $item->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eyeglass" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M8 4h-2l-3 10"></path>
                                        <path d="M16 4h2l3 10"></path>
                                        <path d="M10 16l4 0"></path>
                                        <path d="M21 16.5a3.5 3.5 0 0 1 -7 0v-2.5h7v2.5"></path>
                                        <path d="M10 16.5a3.5 3.5 0 0 1 -7 0v-2.5h7v2.5"></path>
                                    </svg>
                                </a>
                                <a class="text-blue-600 font-bold px-2 py-2 md:py-0 rounded-md transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-110" href="{{ route('item.edit', $item->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                        <path d="M16 5l3 3"></path>
                                    </svg>
                                </a>
                                <form action="{{ route('item.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="flex items-center text-red-600 font-bold px-2 py-2 md:py-0 rounded-md transition duration-300 ease-in-out hover:-translate-y-1 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M20 6a1 1 0 0 1 .117 1.993l-.117 .007h-.081l-.919 11a3 3 0 0 1 -2.824 2.995l-.176 .005h-8c-1.598 0 -2.904 -1.249 -2.992 -2.75l-.005 -.167l-.923 -11.083h-.08a1 1 0 0 1 -.117 -1.993l.117 -.007h16zm-9.489 5.14a1 1 0 0 0 -1.218 1.567l1.292 1.293l-1.292 1.293l-.083 .094a1 1 0 0 0 1.497 1.32l1.293 -1.292l1.293 1.292l.094 .083a1 1 0 0 0 1.32 -1.497l-1.292 -1.293l1.292 -1.293l.083 -.094a1 1 0 0 0 -1.497 -1.32l-1.293 1.292l-1.293 -1.292l-.094 -.083z" stroke-width="0" fill="currentColor"></path>
                                            <path d="M14 2a2 2 0 0 1 2 2a1 1 0 0 1 -1.993 .117l-.007 -.117h-4l-.007 .117a1 1 0 0 1 -1.993 -.117a2 2 0 0 1 1.85 -1.995l.15 -.005h4z" stroke-width="0" fill="currentColor"></path>
                                        </svg>
                                    </button>
                                </form>
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
