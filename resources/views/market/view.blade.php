@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto lg:mt-40 mt-9">
    @include('partials.alert')
    <h1 class="mb-3 text-white font-semibold text-4xl text-center">Check Product</h1>
    <div class="flex md:hidden justify-center">
        <table class="overflow-x-auto text-white table-auto">
            <tbody>
                <tr>
                    <th class="whitespace-nowrap py-2 pr-8">Seller</th>
                    <td class="whitespace-nowrap py-2">{{ $item->seller['fname'] }} {{ $item->seller['lname'] }}</td>
                </tr>
                <tr>
                    <th class="whitespace-nowrap py-2 pr-8">Item Name</th>
                    <td class="whitespace-nowrap py-2">{{ $item->item_name }}</td>
                </tr>
                <tr>
                    <th class="whitespace-nowrap py-2 pr-8">Item Description</th>
                    <td class="whitespace-nowrap py-2">{{ $item->item_description }}</td>
                </tr>
                <tr>
                    <th class="whitespace-nowrap py-2 pr-8">Item Quantity</th>
                    <td class="whitespace-nowrap py-2">{{ $item->item_qty }}</td>
                </tr>
                <tr>
                    <th class="whitespace-nowrap py-2 pr-8">Item Price</th>
                    <td class="whitespace-nowrap py-2">{{ $item->item_price }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="hidden md:block">
        <table class="w-full overflow-x-auto text-white divide-y divide-neutral-100/80">
            <thead>
                <th class="whitespace-nowrap py-2">Seller</th>
                <th class="whitespace-nowrap py-2">Item Name</th>
                <th class="whitespace-nowrap py-2">Item Description</th>
                <th class="whitespace-nowrap py-2">Item Quantity</th>
                <th class="whitespace-nowrap py-2">Item Price</th>
            </thead>
            <tbody>
                <tr>
                    <td class="whitespace-nowrap py-2">{{ $item->seller['fname'] }} {{ $item->seller['lname'] }}</td>
                    <td class="whitespace-nowrap py-2">{{ $item->item_name }}</td>
                    <td class="whitespace-nowrap py-2">{{ $item->item_description }}</td>
                    <td class="whitespace-nowrap py-2">{{ $item->item_qty }}</td>
                    <td class="whitespace-nowrap py-2">{{ $item->item_price }}</td>
                </tr>
            </tbody>
        </table>
    </div>  
    @if(url()->previous() != url('/my_market'))
        <form action="{{ route('order.add_order', $item->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="relative">
                <input name="total_quantity" type="text" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg" autocomplete="off" autofocus placeholder="e.g., '499'" required>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dice-3-filled absolute left-3 top-2.5 text-neutral-300" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M18.333 2c1.96 0 3.56 1.537 3.662 3.472l.005 .195v12.666c0 1.96 -1.537 3.56 -3.472 3.662l-.195 .005h-12.666a3.667 3.667 0 0 1 -3.662 -3.472l-.005 -.195v-12.666c0 -1.96 1.537 -3.56 3.472 -3.662l.195 -.005h12.666zm-2.833 12a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0 -3zm-3.5 -3.5a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0 -3zm-3.5 -3.5a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0 -3z" stroke-width="0" fill="currentColor"></path>
                </svg>
            </div>
                <button type="submit" class="w-full text-white px-3 py-2 rounded-md shadow-lg bg-emerald-900 hover:bg-emerald-800">Order</button>
        </form>
    @endif
    <a type="button" href="{{ url()->previous() }}" class="w-full mt-4 text-center bg-red-900 hover:bg-red-800 text-white font-bold py-2 px-4 rounded shadow-lg">Return</a>
</div>
@endsection
