@extends('layouts.app')

@section('content')
<div class="items-center justify-center flex min-h-screen select-none">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="rounded-xl px-6 py-6 md:w-[600px]">
            <h1 class="text-2xl font-semibold text-center pb-11 truncate text-white">Sign up to Mark-et!</h1>
            <div class="grid md:grid-cols-3 md:divide-x-2 md:divide-gray-300/50">
                <div class="flex items-center justify-center md:pr-5">
                    <img class="object-contain h-52 w-52" src="/images/market-logo.png" alt="">
                </div>
                <div class="md:pl-6 my-auto md:col-span-2">
                    <div class="md:grid md:grid-cols-2 md:gap-3">
                        <div>
                            <div class="relative">
                                <input id="fname" type="text" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" placeholder="First name" required autocomplete="off" autofocus>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-filled absolute left-3 top-2.5 text-neutral-200" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" stroke-width="0" fill="currentColor"></path>
                                    <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" stroke-width="0" fill="currentColor"></path>
                                 </svg>
                                @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <div class="relative">
                                <input id="lname" type="text" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" placeholder="Last name" required autocomplete="off" autofocus>
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-filled absolute left-3 top-2.5 text-neutral-200" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" stroke-width="0" fill="currentColor"></path>
                                    <path d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" stroke-width="0" fill="currentColor"></path>
                                 </svg>
                                @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
            
                    <div>
                        <div class="relative">
                            <input id="email" type="email" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" placeholder="Email">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-at absolute left-3 top-2.5 text-neutral-300" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0"></path>
                                <path d="M16 12v1.5a2.5 2.5 0 0 0 5 0v-1.5a9 9 0 1 0 -5.5 8.28"></path>
                             </svg>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
            
                    <div>
                        <div class="relative">
                            <input id="password" type="password" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
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
                            <label for="toggle_pass" id="append-svg" class="cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye absolute right-2 top-2 text-neutral-300" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                    <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                    <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                </svg>
                             </label>
                             <input class="hidden" type="checkbox" name="toggle_pass" id="toggle_pass">
                        </div>
                    </div>
            
                    <div>
                        <div class="relative">
                            <input id="password-confirm" type="password" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg" name="password_confirmation" required autocomplete="new-password" placeholder="Re-enter Password">
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
                        </div>
                    </div>
            
                    <div>
                        <button type="submit" class="w-full mt-2 bg-zinc-800 shadow-xl hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded-lg">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </div>
            <div class="text-center mt-14 text-white">
                @if (Route::has('login'))
                    Already have an <a class="text-yellow-300" href="{{ route('login') }}">{{ __('account?') }}</a>
                @endif
            </div>
    </form>
</div>
@endsection
