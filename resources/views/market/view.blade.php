@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10">    
    <h1 class="mb-3 text-white font-semibold text-4xl text-center">Check Product</h1>
    @include('partials.alert')
    <div class="md:grid md:grid-cols-2 md:space-x-4 text-white">
        <div class="mb-2 overflow-hidden rounded-2xl">
            <img class="h-80 w-full transition ease-in-out duration-500 hover:scale-105 object-cover rounded-2xl" src="{{ asset('items/'.$item->item_image) }}" alt="">
        </div>
        <div>
            <span class="font-bold text-lg">Seller</span>
            <h1 class="mb-3 flex items-center gap-2">
                <span>
                    <img class="h-10 w-10 rounded-full outline-1 outline outline-yellow-300" src="{{ asset('avatars/'.$item->seller['avatar']) }}" alt="">
                </span> 
                {{ $item->seller['fname'] }} {{ $item->seller['lname'] }}
            </h1>

            <span class="font-bold text-lg">Item Name</span>
            <h1 class="mb-3"> {{ $item->item_name }}</h1>
            
            <span class="font-bold text-lg">Item Description</span>
            <p class="mb-3 break-all">{{ $item->item_description }}</p>
            
            <span class="font-bold text-lg">Item Quantity</span>
            <h1 class="mb-3" id="quantity_value"> {{ $item->item_qty }}</h1>
            
            <span class="font-bold text-lg">Item Price</span>
            <h1 class="mb-3"> {{ $item->item_price }}</h1>
        </div>
    </div>

    @if($item->seller['id'] != Auth::id())
        <form action="{{ route('order.add_order', $item->id) }}" method="POST" class="mt-2">
            @csrf
            @method('PATCH')
            
            <label class="text-white pb-2 font-light">Item Quantity</label>
            <div class="grid grid-cols-2 items-center space-x-3">
                <div>
                    <div class="relative">
                        <input name="total_quantity" id="total_quantity" type="text" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg" autocomplete="off" autofocus placeholder="e.g., '499'" required>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dice-3-filled absolute left-3 top-2.5 text-neutral-300" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M18.333 2c1.96 0 3.56 1.537 3.662 3.472l.005 .195v12.666c0 1.96 -1.537 3.56 -3.472 3.662l-.195 .005h-12.666a3.667 3.667 0 0 1 -3.662 -3.472l-.005 -.195v-12.666c0 -1.96 1.537 -3.56 3.472 -3.662l.195 -.005h12.666zm-2.833 12a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0 -3zm-3.5 -3.5a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0 -3zm-3.5 -3.5a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0 -3z" stroke-width="0" fill="currentColor"></path>
                        </svg>
                    </div>
                </div>
                <div class="text-white pb-3 text-lg">
                    <p class="font-light">Total Amount: <span class="font-semibold text-emerald-200" id="total_amount"></span></p>
                </div>
            </div>
            <button type="submit" class="w-full text-white px-3 py-2 rounded-md shadow-lg bg-emerald-900 hover:bg-emerald-800">Order</button>
        </form>
    @endif
    <a type="button" href="{{ url()->previous() }}" class="w-full my-3 text-center bg-red-900 hover:bg-red-800 text-white font-bold py-2 px-4 rounded shadow-lg">Return</a>
</div>
@endsection
