@extends('layouts.app')

@section('content')
<div class="my-4">
    <div class="max-w-4xl mx-auto">
        @include('partials.alert')
    </div>

    {{-- Pending Orders --}}
    <h1 class="text-white text-2xl font-semibold">Pending Orders</h1>
    @if ($is_pending)
        <div class="overflow-x-auto my-3 grid">
            <table class="divide-y-2 divide-neutral-600">
                <thead class="text-neutral-100">
                    <th class="whitespace-nowrap py-2 font-medium">Item Name</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium">Item Description</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium">Item Price</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium">Total Quantity</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium">Total Amount</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium">Seller</th>
                    <th class="whitespace-nowrap py-2 font-medium">Action</th>
                </thead>
                <tbody class="divide-y divide-neutral-600">
                    @foreach ($orders as $order)
                        @if ($order->pending == 1)
                            <tr class="text-neutral-300">
                                <td class="whitespace-nowrap py-2">{{ $order->items['item_name'] }}</td>
                                <td class="whitespace-nowrap px-4 py-2">{{ $order->items['item_description'] }}</td>
                                <td class="whitespace-nowrap px-4 py-2">{{ $order->items['item_price'] }}</td>
                                <td class="whitespace-nowrap px-4 py-2">{{ $order->total_quantity }}</td>
                                <td class="whitespace-nowrap px-4 py-2">{{ $order->total_amount }}</td>
                                <td class="whitespace-nowrap px-4 py-2">
                                    <a href="{{ route('user.show', $order->seller['id']) }}" class="underline text-blue-300">
                                        {{ $order->seller['fname'] }}
                                    </a>
                                </td>
                                <td class="whitespace-nowrap py-2">
                                    <form action="{{ route('order.completed', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-white text-xs px-3 py-2 bg-sky-900 hover:bg-sky-800 rounded-lg">Received</button>
                                    </form>
                                </td>
                                <td class="whitespace-nowrap py-2">
                                    <form action="{{ route('order.cancel_order', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white text-xs px-3 py-2 bg-red-900 hover:bg-red-800 rounded-lg">Cancel</button>
                                    </form>
                                </td>
                            </tr>
                        @endif    
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="flex flex-col justify-center py-10 items-center">
            <p class="text-2xl font-light text-white">No Pending Orders yet</p>
            <img class="w-40 h-4w-40 object-contain" src="images/no_data.png" alt="">
        </div>
    @endif

    {{-- Received Orders --}}
    <div class="flex gap-2 items-center">
        <h1 class="text-white text-2xl font-semibold">Recieved Orders</h1>
        @if ($is_notpending)
            <form action="{{ route('order.clear_all') }}" method="POST">
                @csrf
                <button class="text-white text-xs px-3 py-2 rounded-md bg-red-800 hover:bg-red-900" type="submit">Clear all</button>
            </form>
        @endif
    </div>
    @if ($is_notpending)
        <div class="overflow-x-auto my-3 grid">
            <table class="divide-y-2 divide-neutral-600">
                <thead class="text-neutral-100">
                    <th class="whitespace-nowrap px-4 py-2 font-medium">Avatar</th>
                    <th class="whitespace-nowrap py-2 font-medium">Item Name</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium">Item Description</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium">Item Price</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium">Total Quantity</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium">Total Amount</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium">Seller</th>
                    <th class="whitespace-nowrap px-4 py-2 font-medium">Action</th>
                </thead>
                <tbody class="divide-y divide-neutral-600">
                    @foreach ($orders as $order)
                        @if ($order->pending == 0)
                            <tr class="text-neutral-300">
                                <td class="whitespace-nowrap px-4 py-2">
                                    <img class="h-8 w-8" src="{{ asset('avatars/' . $order->seller['avatar']) }}" alt="">
                                </td>
                                <td class="whitespace-nowrap py-2">{{ $order->items['item_name'] }}</td>
                                <td class="whitespace-nowrap px-4 py-2">{{ $order->items['item_description'] }}</td>
                                <td class="whitespace-nowrap px-4 py-2">{{ $order->items['item_price'] }}</td>
                                <td class="whitespace-nowrap px-4 py-2">{{ $order->total_quantity }}</td>
                                <td class="whitespace-nowrap px-4 py-2">{{ $order->total_amount }}</td>
                                <td class="whitespace-nowrap px-4 py-2">
                                    <a href="{{ route('user.show', $order->seller['id']) }}" class="underline text-blue-300">
                                        {{ $order->seller['fname'] }}
                                    </a>
                                </td>
                                <td class="whitespace-nowrap px-4 py-3">
                                    <a href="{{ route('item.show', $order->items['id']) }}" class="text-white text-xs px-3 py-2 bg-emerald-900 hover:bg-emerald-800 rounded-lg">Order again</a>
                                </td>
                            </tr>
                        @endif    
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="flex flex-col justify-center py-10 items-center">
            <p class="text-2xl font-light text-white">No Received Orders yet</p>
            <img class="w-40 h-4w-40 object-contain" src="images/no_data.png" alt="">
        </div>  
    @endif
</div>
@endsection
