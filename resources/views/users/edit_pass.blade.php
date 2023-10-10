@extends('layouts.app')

@section('content')
<div class="container mx-auto p-4">
    <div class="max-w-lg mx-auto bg-white rounded-md p-6">
        <form method="POST" action="{{ route('user.update_pass', $user->id) }}">
            @csrf
            @method('PATCH')
            @include('partials.alert')
            <h1 class="font-bold text-center my-2 text-xl">Update Password</h1>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Current Password:</label>
                <input name="curr_pass" type="password" class="w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">New Password:</label>
                <input name="password" type="password" class="w-full p-2 border border-gray-300 rounded" required>
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Confirm Password:</label>
                <input name="password_confirmation" type="password" class="w-full p-2 border border-gray-300 rounded" required>
            </div>
            <button type="submit" class="w-full bg-neutral-800 hover:bg-neutral-700 text-white font-bold py-2 px-4 rounded">Update</button>
        </form>
        <a type="button" href="{{ route('user.index') }}" class="w-full mt-2 text-center bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Return</a>
    </div>
</div>

@endsection
