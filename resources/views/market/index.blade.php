@extends('layouts.app')

@section('content')
<div>
    <div class="max-w-4xl mx-auto mt-3">
        <form action="{{ route('item.search') }}" method="GET">
            <div class="mb-4 flex gap-2">
                <input name="search" type="text" class="w-100 p-2 border-2 bg-neutral-800 text-white border-neutral-500 rounded-xl focus:outline-none" placeholder="Search by item name ..." value="{{ isset($search) ? $search : '' }}">
                <div class="flex justify-start items-center">
                    <button type="submit" class="py-2 px-3 text-neutral-300 font-semibold rounded-xl border-2 border-neutral-500">
                        <div class="flex items-center">
                            <p>
                                Search
                            </p>
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
            <p class="text-2xl font-semibold text-white">No Data</p>
            <img class="w-64 h-64 object-contain" src="images/no_data.png" alt="">
        </div>
        <div class="flex justify-center items-center pt-5">
            <a href="{{ route('item.create') }}" class="py-2 px-3 text-neutral-300 font-semibold rounded-lg border-2 border-neutral-500">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 text-neutral-300 icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 5l0 14"></path>
                        <path d="M5 12l14 0"></path>
                     </svg>
                    <p>
                        Sell an Item
                    </p>
                </div>
            </a>
        </div>
    @elseif($items->isEmpty())
    <div class="max-w-4xl mx-auto">
        <div class="flex flex-col justify-center pt-2 items-center">
            <p class="text-xl text-white">No data has found </p>
        </div>
        <div class="my-9">
            <div class="flex justify-start items-center">
                <a href="{{ route('item.create') }}" class="py-2 px-3 text-neutral-300 font-semibold rounded-lg border-2 border-neutral-500">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 text-neutral-300 icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                         </svg>
                        <p>
                            Sell an Item
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    @else
        <div class="max-w-4xl mx-auto">
            @include('partials.alert')
            @if (count($items) >= 2)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 my-4">
            @else
                <div class="grid grid-cols-1 gap-4 my-4">
            @endif
                    @foreach ($items as $item)
                        <div class="text-white p-3 shadow-md border-2 rounded-xl border-neutral-600 min-w-min">
                            <div class="lg:flex lg:flex-row lg:justify-between items-center">
                                <div class="flex lg:flex-col justify-center items-baseline">
                                    <h2 class="text-xl font-bold mr-4">{{ $item->item_name }}</h2>
                                    <p>{{ $item->item_description }}</p>
                                </div>
                                <div class="flex justify-center">
                                    <a class="text-green-600 font-bold px-3 py-1 rounded-md hover:bg-green-700 hover:text-white" href="{{ route('item.show', $item->id) }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eyeglass" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M8 4h-2l-3 10"></path>
                                            <path d="M16 4h2l3 10"></path>
                                            <path d="M10 16l4 0"></path>
                                            <path d="M21 16.5a3.5 3.5 0 0 1 -7 0v-2.5h7v2.5"></path>
                                            <path d="M10 16.5a3.5 3.5 0 0 1 -7 0v-2.5h7v2.5"></path>
                                        </svg>
                                    </a>
                                    <a class="text-blue-600 font-bold px-3 py-1 rounded-md hover:bg-blue-700 hover:text-white" href="{{ route('item.edit', $item->id) }}">
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
                                        <button type="submit" class="flex items-center text-red-600 font-bold px-3 py-1 rounded-md hover:bg-red-700 hover:text-white">
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
                </div>
            <div class="my-9">
                <div class="flex justify-start items-center">
                    <a href="{{ route('item.create') }}" class="py-2 px-3 text-neutral-300 font-semibold rounded-lg border-2 border-neutral-500">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 text-neutral-300 icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                             </svg>
                            <p>
                                Sell an Item
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
