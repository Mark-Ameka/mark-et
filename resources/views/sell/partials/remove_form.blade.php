<!-- Modal -->
<div class="modal fade" id="staticBackdrop{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-neutral-800 shadow-2xl divide-y-2 p-3">
            <div class="modal-body text-white">
                <h1 class="mb-3">Remove this product?</h1>
                <div class="md:grid md:grid-cols-2 md:space-x-4 text-white">
                    <div class="overflow-hidden rounded-2xl">
                        <img class="h-60 w-full transition ease-in-out duration-500 hover:scale-105 object-cover rounded-2xl" src="{{ asset('items/'.$item->item_image) }}" alt="">
                    </div>
                    <div>
                        <span class="font-bold text-lg">Item Name</span>
                        <h1 class="mb-3"> {{ $item->item_name }}</h1>
                        
                        <span class="font-bold text-lg">Item Description</span>
                        <p class="mb-3 break-all">{{ $item->item_description }}</p>
                        
                        <span class="font-bold text-lg">Item Quantity</span>
                        <h1 class="mb-3" id="quantity_value"> {{ $item->item_qty }}</h1>
                        
                        <span class="font-bold text-lg">Item Price</span>
                        <h1 class="mb-3"> ₱ <span id="price_value">{{ $item->item_price }}</span></h1>
                    </div>
                </div>
            </div>
            <div class="flex items-center justify-end pt-3 gap-3">
                <button type="button" class="text-sky-500 font-medium" data-bs-dismiss="modal">I'll think about it</button>
                <form action="{{ route('item.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 font-medium">
                        Remove
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>