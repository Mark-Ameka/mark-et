@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto md:mt-3">
    <div class="max-w-lg mx-auto">
        @include('partials.alert')
    </div>
    {{-- <div class="md:grid md:grid-cols-2 md:divide-x"> --}}
    <div class="md:divide-y">
        <div class="p-6">
            {{-- Include "enctype="multipart/form-data" for handling files --}}
            <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <h1 class="font-bold text-center pb-10 text-xl text-white">Basic Settings</h1>
                
                <div class="flex justify-center">
                    <label for="upload-image" class="
                            relative
                            top-0
                            cursor-pointer
                            h-[164px]
                            w-40 
                            shadow-xl
                            rounded-full
                            flex
                            justify-center
                            items-center
                            hover:border-2
                            border-collapse
                            border-dashed
                            border-white
                            hover:brightness-50
                            mb-2
                            hover:text-teal-400
                        ">
                        <img class="absolute rounded-full h-40 w-40 object-cover" src="{{ asset('avatars/'. $user->avatar) }}" id="chosen-image">
                    </label>
                    <input class="hidden" type="file" accept=".jpg, .jpeg, .png" name="avatar" id="upload-image">
                </div>

                <label class="text-white pb-2 font-light">First Name</label>
                <div class="relative">
                    <input id="fname" type="text" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg @error('fname') is-invalid @enderror" name="fname" value="{{ $user->fname }}" placeholder="First name" required autocomplete="off" autofocus>
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

                <label class="text-white pb-2 font-light">Last Name</label>
                <div class="relative">
                    <input id="lname" type="text" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg @error('lname') is-invalid @enderror" name="lname" value="{{ $user->lname }}" placeholder="Last name" required autocomplete="off" autofocus>
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

                <label class="text-white pb-2 font-light">Email Address</label>
                <div class="relative">
                    <input id="email" type="email" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-white border-gray-300 rounded-lg @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="off" placeholder="Email">
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
                <button type="submit" class="w-full bg-fuchsia-900 shadow-lg hover:bg-fuchsia-800 text-white font-bold py-2 px-4 rounded">Change Account</button>
            </form>
        </div>
        <div class="p-6 mt-4">
            @include('users.edit_pass')
        </div>
    </div>
    {{-- </div> --}}
    <div class="p-6 mx-auto pt-3 mb-5 md:mb-0">
        <a type="button" href="{{ url()->previous() }}" class="w-full mt-2 text-center shadow-lg bg-red-900 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">Return</a>
    </div>
</div>

@endsection
