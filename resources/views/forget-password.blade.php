@extends('layouts.app')
@section('title', 'Forget Password')
@section('content')
    <div class="container">
        <div class="bg-white font-[sans-serif]">
            <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
                <div class="max-w-md w-full bg-slate-400 p-8 rounded-2xl">
                    <div class="text-center text-lg font-bold">Reset Password</div>
                    <div class="card-body">
                        <form action="{{ route('forgetPassword') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="checkpassword" class="block text-sm font-medium text-gray-700">New
                                    Password</label>
                                <input type="password" id="checkpassword" name="checkpassword"
                                    value="{{ old('checkpassword') }}">
                                @error('checkpassword')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="password" class="block text-sm font-medium text-gray-700">Confirm
                                    Password</label>
                                <input type="password" id="password" name="password" value="{{ old('password') }}">
                                @error('password')
                                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="flex items-center justify-between">
                                <button type="submit"
                                    class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                    Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
