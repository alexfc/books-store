<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="flex-shrink-0 flex items-center">
                            <a href="{{ route('public.books.index') }}">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        @guest('buyer')
                            <a href="{{ route('public.login') }}" class="text-sm text-gray-700 underline">Вход</a>
                            <a href="{{ route('public.register') }}" class="ml-4 text-sm text-gray-700 underline">Регистрация</a>
                        @else
                            <span class="mr-4 text-sm text-gray-700">Welcome, {{ Auth::guard('buyer')->user()->name }}</span>
                            <form method="POST" action="{{ route('public.logout') }}">
                                @csrf
                                <button type="submit" class="text-sm text-gray-700 underline">Log out</button>
                            </form>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
