@extends('layouts.app')

@section('content')
<div class="flex flex-col justify-center items-center">
    <h1 class="mt-20 mb-10 text-neutral-300 font-semibold text-4xl">View Item</h1>
    <div class="border-2 p-3 rounded-2xl w-[700px] border-neutral-300">
        <table class="w-full text-neutral-300">
            <thead>
                <th>Item Name</th>
                <th>Item Description</th>
                <th>Item Quantity</th>
                <th>Item Price</th>
            </thead>
            <tr class="mb-4">
                <td>{{ $item->item_name }}</td>
                <td>{{ $item->item_description }}</td>
                <td>{{ $item->item_qty }}</td>
                <td>{{ $item->item_price }}</td>
            </tr>
        </table>
        <a type="button" href="{{ url('/home') }}" class="w-full mt-4 text-center bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Return</a>
    </div>
</div>
@endsection
