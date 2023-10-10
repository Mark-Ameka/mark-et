@extends('layouts.app')

@section('content')
<div class="container mx-auto items-center justify-center flex min-h-screen">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="rounded-xl shadow-md px-6 pb-9 w-[350px] bg-white">
            <h1 class="text-2xl font-bold py-6">Welcome to Mark-et</h1>
            <div>
                <input id="email" type="email" class="w-full mb-3 p-2 border outline-none border-gray-300 rounded-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div>
                <input id="password" type="password" class="w-full mb-2 p-2 border outline-none border-gray-300 rounded-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div>
                <button type="submit" class="w-full mt-2 bg-zinc-800 hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded-lg">
                    {{ __('Login') }}
                </button>
            </div>

            <div class="text-center underline mt-3">
                @if (Route::has('register'))
                    <a class="" href="{{ route('register') }}">{{ __('Register') }}</a>
                @endif
            </div>
        </div>
    </form>
</div>
@endsection
