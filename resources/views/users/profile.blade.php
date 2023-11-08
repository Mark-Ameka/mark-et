@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="relative">
        <div class="absolute left-1/2 -translate-x-1/2 mx-auto max-w-lg">
            @include('partials.alert')
        </div>
        {{-- Cover --}}
        <div class="h-60 w-full rounded-bl-xl rounded-br-xl bg-gradient-to-r from-purple-500 to-pink-500"></div>

        {{-- Include "enctype="multipart/form-data" for handling files --}}
        <div class="absolute -bottom-32 left-7">
            <form method="POST" action="{{ route('user.update_profile_pic', $user->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <div class="flex gap-4 items-center flex-grow">
                    <div class="rounded-full">
                        <label for="upload-image" class="rounded-full
                            cursor-pointer
                            h-40
                            w-40 
                            shadow-xl
                            flex
                            hover:outline-2
                            hover:outline-collapse
                            hover:outline-dashed
                            hover:outline-neutral-300
                            hover:brightness-50
                        ">
                            <img class="rounded-full h-40 w-40 object-cover outline-8 outline outline-neutral-800" src="{{ asset('avatars/'. $user->avatar) }}" id="chosen-image">
                        </label>
                        <input class="hidden" type="file" accept=".jpg, .jpeg, .png" name="avatar" id="upload-image">
                    </div>
                    <div class="flex flex-col mt-11 gap-3">
                        <div>
                            <h1 class="text-white sm:text-4xl text-2xl font-bold line-clamp-1">{{ $user->fname }} {{ $user->lname }}</h1>
                            <h1 class="text-white line-clamp-1">{{ $user->email }}</h1>
                        </div>
                        <div class="flex gap-2">
                            <button id="show-button" type="submit" disabled class="bg-neutral-700 enabled:bg-pink-900 shadow-lg enabled:hover:bg-pink-800  text-white font-bold md:rounded-lg rounded-full">
                                <p class="md:block hidden w-full py-2 px-4">Update Profile Picture</p>
                                <div class="md:hidden block py-2 px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-camera-selfie" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2"></path>
                                        <path d="M9.5 15a3.5 3.5 0 0 0 5 0"></path>
                                        <path d="M15 11l.01 0"></path>
                                        <path d="M9 11l.01 0"></path>
                                    </svg>
                                </div>
                            </button>
                        {{-- END FORM FOR UPDATE PROFILE --}}
                        </form>

                        {{-- REMOVE PROFILE --}}
                            @if ($is_default == false)
                                <form method="POST" action="{{ route('user.remove_profile_pic', $user->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-red-900 shadow-lg hover:bg-red-800 py-2 px-2 text-white font-bold md:rounded-lg rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-camera-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M13.5 20h-8.5a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v4"></path>
                                            <path d="M9 13a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                            <path d="M22 22l-5 -5"></path>
                                            <path d="M17 22l5 -5"></path>
                                        </svg>
                                    </button>
                                </form>                                
                            @else
                                
                            @endif

                        </div>
                    </div>
                </div>

        </div>

    </div>
    <div class="md:grid md:grid-cols-2 md:divide-x mt-48">
        <div class="px-6">
            <form method="POST" action="{{ route('user.update', $user->id) }}">
                @csrf
                @method('PUT')
                
                <div class="flex items-center gap-2 justify-center text-white pb-10">
                    <h1 class="font-bold text-xl">Basic Settings</h1>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="enable-change-account">
                    </div>
                </div>

                <label class="text-white pb-2 font-light">First Name</label>
                <div class="relative">
                    <input id="fname" disabled type="text" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-neutral-500 enabled:text-white border-neutral-500 enabled:border-neutral-200 rounded-lg @error('fname') is-invalid @enderror" name="fname" value="{{ $user->fname }}" placeholder="First name" required autocomplete="off" autofocus>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-filled absolute left-3 top-2.5 text-neutral-300" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                    <input id="lname" disabled type="text" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-neutral-500 enabled:text-white border-gray-300 rounded-lg @error('lname') is-invalid @enderror" name="lname" value="{{ $user->lname }}" placeholder="Last name" required autocomplete="off" autofocus>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-filled absolute left-3 top-2.5 text-neutral-300" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                    <input id="email" disabled type="email" class="truncate w-full mb-3 pl-10 pr-1 py-2 border outline-none bg-transparent placeholder-neutral-300 text-neutral-500 enabled:text-white border-gray-300 rounded-lg @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="off" placeholder="Email">
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
                <button type="submit" id="change-account" disabled class="w-full bg-fuchsia-900 shadow-lg enabled:hover:bg-fuchsia-800 text-white font-bold py-2 px-4 rounded">Change Account</button>
            </form>
        </div>
        <div class="px-6 mt-11 md:mt-0">
            @include('users.edit_pass')
        </div>
    </div>
    <div class="p-6 mx-auto pt-3 mb-5 mt-2 md:mb-0">
        <a type="button" href="{{ url('/home') }}" class="w-full mt-2 text-center shadow-lg bg-red-900 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">Return</a>
    </div>
</div>

@endsection
