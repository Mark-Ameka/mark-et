<!-- Modal -->
<div class="modal fade" id="factoryReset" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-neutral-800 shadow-2xl divide-y-2 p-3">
            <div class="text-white mb-2">
                <h1 class="modal-title text-2xl" id="staticBackdropLabel">Factory Reset</h1>
            </div>
            <div class="text-white flex items-center gap-2 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-skull" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 4c4.418 0 8 3.358 8 7.5c0 1.901 -.755 3.637 -2 4.96l0 2.54a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-2.54c-1.245 -1.322 -2 -3.058 -2 -4.96c0 -4.142 3.582 -7.5 8 -7.5z" /><path d="M10 17v3" /><path d="M14 17v3" /><path d="M9 11m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M15 11m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                <p class="text-sm">Be careful! This will wipe all your products in just one click!</p>
            </div>
            <div class="flex items-center justify-end pt-3 gap-3">
                <button type="button" class="text-sky-500 font-medium" data-bs-dismiss="modal">I'll think about it</button>
                <form action="{{ route('item.factory_reset') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-red-500 font-medium">
                        Reset
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>