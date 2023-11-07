<form method="POST" action="{{ route('user.update_pass', $user->id) }}" class="mt-3">
    @csrf
    @method('PATCH')
    <h1 class="font-bold text-center pb-10 text-xl text-white">Password Settings</h1>

    <label class="text-white pb-2 font-light">Current Password</label>
    <div class="relative">
        <input type="password" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg @error('password') is-invalid @enderror" name="curr_pass" placeholder="Current Password" required>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock-cog absolute left-3 top-2.5 text-neutral-300" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M12 21h-5a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2h10c.564 0 1.074 .234 1.437 .61"></path>
            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
            <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
            <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
            <path d="M19.001 15.5v1.5"></path>
            <path d="M19.001 21v1.5"></path>
            <path d="M22.032 17.25l-1.299 .75"></path>
            <path d="M17.27 20l-1.3 .75"></path>
            <path d="M15.97 17.25l1.3 .75"></path>
            <path d="M20.733 20l1.3 .75"></path>
         </svg>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label class="text-white pb-2 font-light">New Password </label>
    <div class="relative">
        <input type="password" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg @error('password') is-invalid @enderror" name="password" placeholder="New Password" required>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock-check absolute left-3 top-2.5 text-neutral-300" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v.5"></path>
            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
            <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
            <path d="M15 19l2 2l4 -4"></path>
        </svg>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>

    <label class="text-white pb-2 font-light">Confirm Password </label>
    <div class="relative">
        <input type="password" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg" name="password_confirmation" placeholder="Confirm Password" required>
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock-check absolute left-3 top-2.5 text-neutral-300" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M11.5 21h-4.5a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v.5"></path>
            <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path>
            <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path>
            <path d="M15 19l2 2l4 -4"></path>
        </svg>
    </div>
    <button type="submit" class="w-full shadow-lg bg-emerald-900 hover:bg-emerald-800 text-white font-bold py-2 px-4 rounded">Change Password</button>
</form>
