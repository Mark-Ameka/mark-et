@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto lg:mt-40 mt-9">
    <img src="{{ asset('avatars/' . $seller->avatar) }}" alt="">
    <h1 class="mb-3 text-white font-semibold text-4xl text-center">Full name: {{ $seller->fname }} {{ $seller->lname }}</h1>
    <h1 class="mb-3 text-white font-semibold text-4xl text-center">Email Address: {{ $seller->email }}</h1>
    <h1 class="mb-3 text-white font-semibold text-4xl text-center">Items on Sale: {{ count($items) }}</h1>
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
    <a type="button" href="{{ url('/home') }}" class="w-full mt-4 text-center bg-red-900 hover:bg-red-800 text-white font-bold py-2 px-4 rounded shadow-lg">Return</a>
</div>
@endsection
