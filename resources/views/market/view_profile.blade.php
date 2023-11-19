@extends('layouts.app')

@section('content')
<div>
    <div class="relative">
        <div class="absolute left-1/2 -translate-x-1/2 mx-auto max-w-lg">
            @include('partials.alert')
        </div>
        
        {{-- <div class="h-60 w-full rounded-bl-xl rounded-br-xl bg-gradient-to-r from-red-500"></div> --}}
        <div id="container-cover" class="h-60 w-full rounded-bl-xl rounded-br-xl bg-gradient-to-l from-neutral-800"></div>
    
        <div class="absolute -bottom-32 left-7">
            <div class="flex gap-4 items-center flex-grow">
                <div class="rounded-full">
                    <img class="rounded-full h-40 w-40 object-cover outline-8 outline outline-neutral-800" src="{{ asset('avatars/' . $seller->avatar) }}" id="chosen-image">
                    <input class="hidden" type="file" accept=".jpg, .jpeg, .png" name="avatar" id="upload-image">
                </div>
                <div class="flex flex-col mt-11 gap-3">
                    <div>
                        <h1 class="text-white sm:text-4xl text-2xl font-bold line-clamp-1">{{ $seller->fname }} {{ $seller->lname }}</h1>
                        <h1 class="text-white line-clamp-1 mt-1">{{ $seller->email }}</h1>
                        <h1 class="text-white font-medium text-base line-clamp-1 mt-1">Items on Sale: {{ count($count_sell) }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-4xl mx-auto">
        <div class="lg:mt-40 mt-9">
            <div class="flex md:flex-row flex-col items-center gap-3 my-4">
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
            <table class="w-full overflow-x-auto text-white divide-y divide-neutral-100/80">
                <thead>
                    <th class="whitespace-nowrap py-2">Item Name</th>
                    <th class="whitespace-nowrap py-2">Item Description</th>
                    <th class="whitespace-nowrap py-2">Item Quantity</th>
                    <th class="whitespace-nowrap py-2">Item Price</th>
                </thead>
                <tbody>
                    @foreach ($items as $item)
                        <tr>
                            <td class="whitespace-nowrap py-2">{{ $item->item_name }}</td>
                            <td class="whitespace-nowrap py-2">{{ $item->item_description }}</td>
                            <td class="whitespace-nowrap py-2">{{ $item->item_qty }}</td>
                            <td class="whitespace-nowrap py-2">{{ $item->item_price }}</td>
                            <td class="whitespace-nowrap py-2">
                                <a href="{{ route('item.show', $item->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eyeglass" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M8 4h-2l-3 10"></path>
                                        <path d="M16 4h2l3 10"></path>
                                        <path d="M10 16l4 0"></path>
                                        <path d="M21 16.5a3.5 3.5 0 0 1 -7 0v-2.5h7v2.5"></path>
                                        <path d="M10 16.5a3.5 3.5 0 0 1 -7 0v-2.5h7v2.5"></path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a type="button" href="{{ url()->previous() }}" class="w-full my-4 text-center bg-red-900 hover:bg-red-800 text-white font-bold py-2 px-4 rounded shadow-lg">Return</a>
        </div>
    </div>
</div>
@endsection
