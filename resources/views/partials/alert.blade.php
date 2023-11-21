@if (Session::has('success'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="successToast" class="toast flex items-center w-auto px-3 my-2 bg-green-200 text-green-700 shadow-xl" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm-minus-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M16 6.072a8 8 0 1 1 -11.995 7.213l-.005 -.285l.005 -.285a8 8 0 0 1 11.995 -6.643zm-2 5.928h-4l-.117 .007a1 1 0 0 0 .117 1.993h4l.117 -.007a1 1 0 0 0 -.117 -1.993z" stroke-width="0" fill="currentColor"></path>
                <path d="M6.412 3.191a1 1 0 0 1 1.273 1.539l-.097 .08l-2.75 2a1 1 0 0 1 -1.273 -1.54l.097 -.08l2.75 -2z" stroke-width="0" fill="currentColor"></path>
                <path d="M16.191 3.412a1 1 0 0 1 1.291 -.288l.106 .067l2.75 2a1 1 0 0 1 -1.07 1.685l-.106 -.067l-2.75 -2a1 1 0 0 1 -.22 -1.397z" stroke-width="0" fill="currentColor"></path>
            </svg>
            <div class="toast-body">
                {{ session()->get('success') }}
            </div>
        </div>
    </div>
@endif

@if (Session::has('errors'))
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        @foreach ($errors->all() as $key => $error)
            <div id="errorToast{{ $key }}" class="toast flex items-center w-auto px-3 my-2 bg-red-200 text-red-700 shadow-xl" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bug" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M9 9v-1a3 3 0 0 1 6 0v1" />
                    <path d="M8 9h8a6 6 0 0 1 1 3v3a5 5 0 0 1 -10 0v-3a6 6 0 0 1 1 -3" />
                    <path d="M3 13l4 0" />
                    <path d="M17 13l4 0" />
                    <path d="M12 20l0 -6" />
                    <path d="M4 19l3.35 -2" />
                    <path d="M20 19l-3.35 -2" />
                    <path d="M4 7l3.75 2.4" />
                    <path d="M20 7l-3.75 2.4" />
                </svg>
                <div class="toast-body">
                    {{ $error }}
                </div>
            </div>
        @endforeach
    </div>
@endif