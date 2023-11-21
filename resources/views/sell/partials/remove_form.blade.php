<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-neutral-800 shadow-2xl divide-y-2 p-3">
            <div class="modal-body text-white">
                Remove this product?
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