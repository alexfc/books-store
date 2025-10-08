@extends('layouts.public')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Книги</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Обложка</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Название</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">
                        <a href="{{ route('public.books.index', ['sort_by' => 'author', 'sort_direction' => $sortBy == 'author' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                            Автор
                            @if ($sortBy == 'author')
                                <span>{{ $sortDirection == 'asc' ? '▲' : '▼' }}</span>
                            @endif
                        </a>
                    </th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">
                        <a href="{{ route('public.books.index', ['sort_by' => 'category', 'sort_direction' => $sortBy == 'category' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                            Категория
                            @if ($sortBy == 'category')
                                <span>{{ $sortDirection == 'asc' ? '▲' : '▼' }}</span>
                            @endif
                        </a>
                    </th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Стоимость</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Статус</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">
                        <a href="{{ route('public.books.index', ['sort_by' => 'release_date', 'sort_direction' => $sortBy == 'release_date' && $sortDirection == 'asc' ? 'desc' : 'asc']) }}">
                            Дата релиза
                            @if ($sortBy == 'release_date')
                                <span>{{ $sortDirection == 'asc' ? '▲' : '▼' }}</span>
                            @endif
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($books as $book)
                <tr class="p-3">
                    <td class="py-3 px-4">
                        @if ($book->cover_image_path)
                            <img src="{{ asset('storage/' . $book->cover_image_path) }}" alt="{{ $book->title }}" class="h-16 w-16 object-cover">
                        @endif
                    </td>
                    <td class="py-3 px-4">
                        <a href="{{ route('public.books.show', $book) }}" class="text-blue-600 hover:text-blue-900">{{ $book->title }}</a>
                    </td>
                    <td class="py-3 px-4">{{ $book->author }}</td>
                    <td class="py-3 px-4">{{ $book->category }}</td>
                    <td class="py-3 px-4">{{ $book->price }}</td>
                    <td class="py-3 px-4">{{ $book->status->value }}</td>
                    <td class="py-3 px-4">{{ $book->release_date->format('Y-m-d') }}</td>
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
