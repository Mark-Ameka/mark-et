@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-10 p-4">
    <div class="max-w-lg mx-auto bg-white rounded-md p-6">
        <form method="POST" action="{{ route('item.store') }}">
            @csrf
            @include('partials.alert')
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Item Name:</label>
                <input name="item_name" type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="e.g., 'Fish'" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Item Description:</label>
                <input name="item_description" type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="e.g., 'Fresh from south korea'" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Item Quantity:</label>
                <input name="item_qty" type="number" class="w-full p-2 border border-gray-300 rounded" placeholder="e.g., '499'" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Item Price:</label>
                <input name="item_price" type="text" class="w-full p-2 border border-gray-300 rounded" placeholder="e.g., '120.35'" required>
            </div>
            <button type="submit" class="w-full bg-neutral-800 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded">Submit</button>
        </form>
        <a type="button" href="{{ url('/home') }}" class="w-full mt-2 text-center bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Return</a>
    </div>
</div>

@endsection
