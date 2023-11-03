@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto lg:mt-40 mt-9">
    <h1 class="mb-3 text-white font-semibold text-4xl text-center">Check Product</h1>
    <div class="flex md:hidden justify-center">
        <table class="overflow-x-auto text-white table-auto">
            <tbody>
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
                <th class="whitespace-nowrap py-2">Item Name</th>
                <th class="whitespace-nowrap py-2">Item Description</th>
                <th class="whitespace-nowrap py-2">Item Quantity</th>
                <th class="whitespace-nowrap py-2">Item Price</th>
            </thead>
            <tbody>
                <tr>
                    <td class="whitespace-nowrap py-2">{{ $item->item_name }}</td>
                    <td class="whitespace-nowrap py-2">{{ $item->item_description }}</td>
                    <td class="whitespace-nowrap py-2">{{ $item->item_qty }}</td>
                    <td class="whitespace-nowrap py-2">{{ $item->item_price }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <a type="button" href="{{ url('/home') }}" class="w-full mt-4 text-center bg-red-900 hover:bg-red-800 text-white font-bold py-2 px-4 rounded shadow-lg">Return</a>
</div>
@endsection
