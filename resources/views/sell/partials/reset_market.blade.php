<!-- Modal -->
<div class="modal fade" id="factoryReset" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-neutral-800 shadow-2xl">
            <div class="modal-header text-white mb-2">
                <h1 class="modal-title text-2xl" id="staticBackdropLabel">Factory Reset</h1>
            </div>
            <div class="modal-body text-white flex flex-col gap-3">
                <div class="flex items-center gap-2 text-red-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-skull" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 4c4.418 0 8 3.358 8 7.5c0 1.901 -.755 3.637 -2 4.96l0 2.54a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1v-2.54c-1.245 -1.322 -2 -3.058 -2 -4.96c0 -4.142 3.582 -7.5 8 -7.5z" /><path d="M10 17v3" /><path d="M14 17v3" /><path d="M9 11m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /><path d="M15 11m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0" /></svg>
                    <p class="font-normal">Be careful! This will wipe all your products in just one click!</p>
                </div>
                <p class="text-sm italic">
                    Please type your email 
                        <span id="get_email" class="font-medium underline decoration-sky-500 not-italic underline-offset-2">{{ Auth::user()->email }}</span>
                    in order to perform factory reset.
                </p>
                <div>
                    <div class="relative">
                        <input id="confirm_reset" type="email" class="truncate w-full mb-3 pl-10 pr-1 py-2 border-2 border-red-900 outline-none bg-transparent placeholder-neutral-300 text-white rounded-lg" required autocomplete="off" autofocus placeholder="Here ...">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-at absolute left-3 top-2.5 text-neutral-300" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                            <path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28"></path>
                         </svg>
                    </div>
                </div>
            </div>
            <div class="modal-footer flex items-center justify-end pt-3 gap-3">
                <button type="button" class="text-sky-500 font-medium" data-bs-dismiss="modal">I'll think about it</button>
                <form action="{{ route('item.factory_reset') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-neutral-500 enabled:text-red-500 font-medium" disabled id="reset_button">
                        Reset
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>