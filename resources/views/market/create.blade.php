@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto pt-3">
    <div class="rounded-md p-6">
        <h1 class="font-bold text-center pb-4 text-xl text-white">Sell something!</h1>
        <form method="POST" action="{{ route('item.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="md:grid md:grid-cols-4 md:space-x-10">
                <div class="mb-4 flex flex-col items-center md:items-start">
                    <label class="text-white pb-2 font-light">Select an image</label>
                    <label for="upload-image" class="
                        rounded-lg
                        cursor-pointer
                        h-40
                        w-40 
                        shadow-xl
                        flex
                        hover:outline-2
                        hover:outline-collapse
                        hover:outline-dashed
                        hover:outline-neutral-300
                        hover:brightness-50
                    ">
                        <img class="rounded-lg h-40 w-40 object-cover outline-neutral-800" src="{{ asset('items/default.png') }}" id="chosen-image">
                    </label>
                    <input class="hidden" type="file" accept=".jpg, .jpeg, .png" name="item_image" id="upload-image">
                </div>
                <div class="md:col-span-3">
                    <label class="text-white pb-2 font-light">Item Name</label>
                    <div class="relative">
                        <input name="item_name" type="text" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg" autocomplete="off" autofocus placeholder="e.g., 'Fish'" required>
                         <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list absolute left-3 top-2.5 text-neutral-300" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                            <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                            <path d="M9 12l.01 0"></path>
                            <path d="M13 12l2 0"></path>
                            <path d="M9 16l.01 0"></path>
                            <path d="M13 16l2 0"></path>
                        </svg>
                    </div>
        
                    <label class="text-white pb-2 font-light">Item Description</label>
                    <div class="relative">
                        <textarea name="item_description" rows="5" class="resize-none w-full mb-2 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg" autocomplete="off" placeholder="e.g., 'Fresh from south korea'" required></textarea>
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil absolute left-3 top-2.5 text-neutral-300" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4"></path>
                            <path d="M13.5 6.5l4 4"></path>
                        </svg>
                    </div>
                    
                    <div class="grid md:grid-cols-2 md:gap-4">
                        <div>
                            <label class="text-white pb-2 font-light">Quantity</label>
                            <div class="relative">
                                <input name="item_qty" type="number" min="1" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg" autocomplete="off" placeholder="e.g., '499'" required>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-dice-3-filled absolute left-3 top-2.5 text-neutral-300" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M18.333 2c1.96 0 3.56 1.537 3.662 3.472l.005 .195v12.666c0 1.96 -1.537 3.56 -3.472 3.662l-.195 .005h-12.666a3.667 3.667 0 0 1 -3.662 -3.472l-.005 -.195v-12.666c0 -1.96 1.537 -3.56 3.472 -3.662l.195 -.005h12.666zm-2.833 12a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0 -3zm-3.5 -3.5a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0 -3zm-3.5 -3.5a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0 -3z" stroke-width="0" fill="currentColor"></path>
                                </svg>
                            </div>
                        </div>
            
                        <div>
                            <label class="text-white pb-2 font-light">Price</label>
                            <div class="relative">
                                <input name="item_price" type="number" min="1" step="any" step="0.01" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg" autocomplete="off" placeholder="e.g., '120.35'" required>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-moneybag absolute left-3 top-2.5 text-neutral-300" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9.5 3h5a1.5 1.5 0 0 1 1.5 1.5a3.5 3.5 0 0 1 -3.5 3.5h-1a3.5 3.5 0 0 1 -3.5 -3.5a1.5 1.5 0 0 1 1.5 -1.5z"></path>
                                    <path d="M4 17v-1a8 8 0 1 1 16 0v1a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="w-full mt-4 bg-neutral-800 hover:bg-neutral-700 shadow-lg text-white font-bold py-2 px-4 rounded">I'm selling it!</button>
        </form>
        <a type="button" href="{{ url('/home') }}" class="w-full mt-2 text-center bg-red-900 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">Return</a>
    </div>
    
    @include('partials.alert')
</div>

@endsection
