@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="max-w-lg mx-auto bg-white rounded-md p-6">
        <form method="POST" action="{{ route('user.update', $user->id) }}">
            @csrf
            @method('PUT')
            @include('partials.alert')
            <h1 class="font-bold text-center my-2 text-xl">Update Profile</h1>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">First Name:</label>
                <input name="name" type="text" class="w-full p-2 border border-gray-300 rounded" value="{{ $user->fname }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Last Name:</label>
                <input name="name" type="text" class="w-full p-2 border border-gray-300 rounded" value="{{ $user->lname }}" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email Address:</label>
                <input name="email" type="text" class="w-full p-2 border border-gray-300 rounded" value="{{ $user->email }}" required>
            </div>
            <button type="submit" class="w-full bg-neutral-800 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded">Update</button>
        </form>
        <a type="button" href="{{ url('/home') }}" class="w-full mt-2 text-center bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Return</a>
        <a type="button" href="{{ route('user.update_pass_index', $user->id) }}" class="w-full mt-2 text-center bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Password</a>
    </div>
</div>

@endsection
