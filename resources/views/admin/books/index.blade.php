@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Управление книгами</h1>
        <a href="{{ route('admin.books.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
            Добавить книгу
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">ID</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Обложка</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Название</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Автор</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Категория</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Стоимость</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Статус</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Дата релиза</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Действия</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($books as $book)
                <tr>
                    <td class="py-3 px-4">{{ $book->id }}</td>
                    <td class="py-3 px-4">
                        @if ($book->cover_image_path)
                            <img src="{{ asset('storage/' . $book->cover_image_path) }}" alt="{{ $book->title }}" class="h-16 w-16 object-cover">
                        @endif
                    </td>
                    <td class="py-3 px-4">{{ $book->title }}</td>
                    <td class="py-3 px-4">{{ $book->author }}</td>
                    <td class="py-3 px-4">{{ $book->category }}</td>
                    <td class="py-3 px-4">{{ $book->price }}</td>
                    <td class="py-3 px-4">{{ $book->status }}</td>
                    <td class="py-3 px-4">{{ $book->release_date->format('Y-m-d') }}</td>
                    <td class="py-3 px-4">
                        <a href="{{ route('admin.books.edit', $book) }}" class="text-blue-600 hover:text-blue-900 rounded border py-2 px-6 block">Редактировать</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $books->links() }}
        </div>
    </div>
</div>
@endsection
