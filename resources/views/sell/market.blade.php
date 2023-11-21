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
        <div class="max-w-6xl mx-auto">
            <div class="flex md:flex-row flex-col items-center gap-3">
                @if ($items->hasPages())
                    <form action="{{ route('set_pagination') }}" method="POST">
                        @csrf
                            <select class="cursor-pointer text-white outline-none shadow-md rounded-lg bg-neutral-800 px-3 py-[5px] border-none" name="pagination" id="pagination" onchange="this.form.submit()">
                            <option value="10" {{ $pagination == 10 ? 'selected' : '' }}>10</option>
                            <option value="20" {{ $pagination == 20 ? 'selected' : '' }}>20</option>
                            <option value="30" {{ $pagination == 30 ? 'selected' : '' }}>30</option>
                        </select>
                    </form>
                @endif
                {{ $items->onEachSide(1)->links('vendor.pagination.custom') }}
            </div>
            
            <!-- Button trigger modal -->
            <div class="flex justify-center md:justify-start mt-4">
                <button type="button" class="px-3 py-1 text-sm text-white bg-red-800 hover:bg-red-700 font-light rounded-md" data-bs-toggle="modal" data-bs-target="#factoryReset">
                    Factory reset
                </button>
            </div>

            @include('sell.partials.reset_market')

            @include('partials.alert')

            <div class="overflow-x-auto my-6 grid">
                <table class="divide-y-2 divide-neutral-600">
                    <thead class="text-neutral-100">
                        <th class="whitespace-nowrap px-4 py-2 font-medium">Item Name</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">Item Description</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">Item Quantity</th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">Item Price</th>
                        <th class="whitespace-nowrap px-2 py-2 font-medium">Actions</th>
                    </thead>
                    <tbody class="divide-y divide-neutral-600">
                        @foreach ($items as $item)
                            <tr class="text-neutral-300">
                                <td class="whitespace-nowrap px-4 py-2">{{ $item->item_name }}</td>
                                <td class="whitespace-nowrap px-4 py-2">{{ $item->item_description }}</td>
                                <td class="whitespace-nowrap px-4 py-2">{{ $item->item_qty }}</td>
                                <td class="whitespace-nowrap px-4 py-2">{{ $item->item_price }}</td>
                                <td class="whitespace-nowrap px-2 py-2">
                                    <a class="text-green-600 font-medium" href="{{ route('item.show', $item->id) }}">View</a>
                                </td>
                                <td class="whitespace-nowrap px-2 py-2">
                                    <a class="text-blue-600 font-medium" href="{{ route('item.edit', $item->id) }}">Edit</a>
                                </td>
                                <td class="whitespace-nowrap px-2 py-2">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="flex items-center text-red-600 font-medium" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Remove
                                    </button>

                                    <!-- Modal -->
                                    @include('sell.partials.remove_form')
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Template --}}
            
            {{-- <div class="overflow-x-auto my-8 grid">
                <table class="divide-y-2 divide-neutral-600">
                    <thead class="text-neutral-100">
                        <th class="whitespace-nowrap px-4 py-2 font-medium">Item Name</th>
                    </thead>
                    <tbody class="divide-y divide-neutral-600">
                        @foreach ($items as $item)
                            <tr class="text-neutral-300">
                                <td class="whitespace-nowrap px-4 py-2">{{ $item->item_name }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> --}}

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
    @endif
</div>
@endsection
