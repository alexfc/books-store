<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административный раздел</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-gray-800 p-4 text-white flex justify-between items-center">
            <div class="text-lg font-semibold">Административный раздел</div>
            <div>
                <a href="{{ route('admin.books.index') }}" class="px-3 py-2 rounded hover:bg-gray-700">Книги</a>
                <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="px-3 py-2 rounded hover:bg-gray-700">Выход</button>
                </form>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
