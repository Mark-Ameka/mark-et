@extends('layouts.app')

@section('content')
<div>
    @include('partials.alert')
    @if ($empty)
        <p class="text-white">no orders yet</p>
    @else
        @foreach ($orders as $order)
            @if ($order->pending == 1)
                <p class="text-white">
                    {{ $order->item_id }}
                    {{ $order->items['item_name'] }}
                    {{ $order->total_quantity }}
                    {{ $order->total_amount }}
                </p>
                <form action="{{ route('order.completed', $order->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="text-white">Received</button>
                </form>
                <form action="{{ route('order.cancel_order', $order->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-white">Cancel</button>
                </form>
            @endif
        @endforeach
    @endif
</div>
@endsection
