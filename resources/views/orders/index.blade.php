@extends('layouts.app')

@section('content')
<div class="my-4">
    <div class="max-w-4xl mx-auto">
        @include('partials.alert')
    </div>
    <h1 class="text-white text-2xl font-semibold">Pending Orders</h1>
    @if ($is_pending)
        <div class="overflow-x-auto flex justify-center">
            <table class="min-w-full divide-y-2 divide-gray-200 text-sm text-white">
                <thead class="ltr:text-left rtl:text-right">
                    <tr>
                        <th class="whitespace-nowrap py-2 font-medium">Item Name</th>
                        <th class="whitespace-nowrap py-2 font-medium">Total Quantity</th>
                        <th class="whitespace-nowrap py-2 font-medium">Total Amount</th>
                        <th class="whitespace-nowrap py-2 font-medium">Seller</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($orders as $order)
                        @if ($order->pending == 1)
                            <tr>
                                <td class="whitespace-nowrap py-2">{{ $order->items['item_name'] }}</td>
                                <td class="whitespace-nowrap py-2">{{ $order->total_quantity }}</td>
                                <td class="whitespace-nowrap py-2">{{ $order->total_amount }}</td>
                                <td class="whitespace-nowrap py-2">
                                    {{ $order->seller['fname'] }}
                                    <a href="{{ route('user.show', $order->seller['id']) }}" class="underline text-blue-300">
                                        Visit Profile
                                    </a>
                                </td>
                                <td class="whitespace-nowrap py-2 flex gap-2">
                                    <form action="{{ route('order.completed', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="text-white px-3 py-2 bg-teal-900 hover:bg-teal-800 rounded-lg shadow-md">Received</button>
                                    </form>
                                    <form action="{{ route('order.cancel_order', $order->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white px-3 py-2 bg-red-900 hover:bg-red-800 rounded-lg shadow-md">Cancel</button>
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

    <div class="flex gap-2 items-center">
        <h1 class="text-white text-2xl font-semibold">Recieved Orders</h1>
        @if ($is_notpending)
            <form action="{{ route('order.clear_all') }}" method="POST">
                @csrf
                <button class="text-white px-3 py2 rounded-md bg-red-800 hover:bg-red-900" type="submit">Clear all</button>
            </form>
        @endif
    </div>
    @if ($is_notpending)
        <div class="overflow-x-auto flex justify-center">
            <table class="min-w-full divide-y-2 divide-gray-200 text-sm text-white">
                <thead class="ltr:text-left rtl:text-right">
                    <tr>
                        <th class="whitespace-nowrap py-2 font-medium">Item Name</th>
                        <th class="whitespace-nowrap py-2 font-medium">Total Quantity</th>
                        <th class="whitespace-nowrap py-2 font-medium">Total Amount</th>
                        <th class="whitespace-nowrap py-2 font-medium">Seller</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($orders as $order)
                        @if($order->pending == 0)
                            <tr>
                                <td class="whitespace-nowrap py-2">{{ $order->items['item_name'] }}</td>
                                <td class="whitespace-nowrap py-2">{{ $order->total_quantity }}</td>
                                <td class="whitespace-nowrap py-2">{{ $order->total_amount }}</td>
                                <td class="whitespace-nowrap py-2">
                                    {{ $order->seller['fname'] }}
                                    <a href="{{ route('user.show', $order->seller['id']) }}" class="underline text-blue-300">
                                        Visit Profile
                                    </a>
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
