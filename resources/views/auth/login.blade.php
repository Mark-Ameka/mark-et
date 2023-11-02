@extends('layouts.app')

@section('content')
<div class="items-center justify-center flex min-h-screen">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="rounded-xl px-6 py-6 md:w-[600px]">
            <h1 class="text-2xl font-semibold text-center pb-4 truncate text-white">Login to Mark-et!</h1>
            <div class="grid md:grid-cols-2 md:divide-x-2 md:divide-gray-300/50">
                <div class="flex items-center justify-center">
                    <img class="object-contain h-52 w-52" src="/images/market-logo.png" alt="">
                </div>
                <div class="md:pl-6 my-auto">
                    <div>
                        <div class="relative">
                            <input id="email" type="email" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus placeholder="Enter Email">
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
                            <input id="password" type="password" class="truncate w-full mb-2 py-2 pr-2 pl-10 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Password">
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
                    </div>
            
                    <div>
                        <button type="submit" class="w-full mt-2 bg-zinc-800 shadow-xl hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded-lg">
                            {{ __('Login') }}
                        </button>
                    </div>
        
                </div>
            </div>
            <div class="text-center mt-3 text-white">
                @if (Route::has('register'))
                    Create an <a class="text-yellow-300" href="{{ route('register') }}">{{ __('account!') }}</a>
                @endif
            </div>
        </div>
    </form>
</div>
@endsection
