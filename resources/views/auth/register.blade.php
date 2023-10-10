@extends('layouts.app')

@section('content')
<div class="container mx-auto items-center justify-center flex min-h-screen">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="rounded-xl shadow-md px-6 pb-9 w-[400px] bg-white">
            <h1 class="text-2xl font-bold py-6">Register to Mark-et</h1>
            <div>
                <input id="name" type="text" class="w-full mb-3 p-2 border outline-none border-gray-300 rounded-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Name" required autocomplete="name" autofocus>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div>
                <input id="email" type="email" class="w-full mb-3 p-2 border outline-none border-gray-300 rounded-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter Email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div>
                <input id="password" type="password" class="w-full mb-3 p-2 border outline-none border-gray-300 rounded-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
    
            <div>
                <input id="password-confirm" type="password" class="w-full mb-3 p-2 border outline-none border-gray-300 rounded-lg" name="password_confirmation" required autocomplete="new-password" placeholder="Re-enter Password">
            </div>
    
            <div>
                <button type="submit" class="w-full mt-2 bg-zinc-800 hover:bg-zinc-700 text-white font-bold py-2 px-4 rounded-lg">
                    {{ __('Register') }}
                </button>
            </div>

            <div class="text-center underline mt-3">
                @if (Route::has('login'))
                    <a class="" href="{{ route('login') }}">{{ __('Already have an account.') }}</a>
                @endif
            </div>
        </div>
    </form>
</div>
@endsection
