@extends('layouts.public')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
        <div>
            <h2 class="text-2xl font-bold text-center text-gray-900">Регистрация</h2>
        </div>

        @if ($errors->any())
            <div class="text-red-500 text-sm">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="space-y-6" action="{{ route('public.register.submit') }}" method="POST">
            @csrf
            <div>
                <label for="name" class="text-sm font-medium text-gray-700">Имя</label>
                <input id="name" name="name" type="text" autocomplete="name" required
                       class="block w-full px-3 py-2 mt-1 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                       placeholder="Имя" value="{{ old('name') }}">
            </div>

            <div>
                <label for="email" class="text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" autocomplete="email" required
                       class="block w-full px-3 py-2 mt-1 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                       placeholder="you@example.com" value="{{ old('email') }}">
            </div>

            <div>
                <label for="password" class="text-sm font-medium text-gray-700">Пароль</label>
                <input id="password" name="password" type="password" autocomplete="new-password" required
                       class="block w-full px-3 py-2 mt-1 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                       placeholder="Пароль">
            </div>

            <div>
                <label for="password_confirmation" class="text-sm font-medium text-gray-700">Подтверждение пароля</label>
                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="new-password" required
                       class="block w-full px-3 py-2 mt-1 text-gray-900 placeholder-gray-500 border border-gray-300 rounded-md shadow-sm appearance-none focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                       placeholder="Подтверждение пароля">
            </div>

            <div>
                <button type="submit"
                        class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Зарегистрироваться
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
