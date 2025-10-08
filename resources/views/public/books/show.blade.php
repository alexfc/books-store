@extends('layouts.public')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                @if ($book->cover_image_path)
                    <img src="{{ asset('storage/' . $book->cover_image_path) }}" alt="{{ $book->title }}" class="w-full h-auto object-cover rounded-lg">
                @endif
            </div>
            <div>
                <h1 class="text-3xl font-bold mb-2">{{ $book->title }}</h1>
                <p class="text-lg text-gray-700 mb-4">Автор: {{ $book->author }}</p>
                <p class="text-gray-600 mb-4"><span class="font-bold">Категория:</span> {{ $book->category }}</p>
                <p class="text-gray-600 mb-4"><span class="font-bold">Дата релиза:</span> {{ $book->release_date->format('F j, Y') }}</p>
                <p class="text-2xl font-bold text-gray-800 mb-4">Стоимость: {{ $book->price }} руб</p>
                <p class="text-gray-600 mb-4"><span class="font-bold">Статус:</span> {{ $book->status->value }}</p>

                @if ($book->status === App\Enums\BookStatus::IN_STOCK)
                    @auth('buyer')
                        <form action="{{ route('public.books.rent', $book) }}" method="POST">
                            @csrf
                            <div class="mt-4">
                                <label for="rent_duration" class="block text-sm font-medium text-gray-700">Срок аренды</label>
                                <select name="rent_duration" id="rent_duration" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                                    <option value="2 weeks">2 недели</option>
                                    <option value="1 month">1 месяц</option>
                                    <option value="3 months">3 месяца</option>
                                </select>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Взять в аренду
                                </button>
                            </div>
                        </form>

                        <form action="{{ route('public.books.buy', $book) }}" method="POST" class="mt-4">
                            @csrf
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Купить книгу
                            </button>
                        </form>
                    @else
                        <p class="mt-4 text-gray-600">Пожалуйста, <a href="{{ route('public.login') }}" class="text-blue-600 hover:text-blue-900">войдите на сайт</a> для покупки или аренды книги.</p>
                    @endauth
                @elseif ($book->status === App\Enums\BookStatus::IN_RENT)
                    <p class="mt-4 text-gray-600"><span class="font-bold">В аренде до:</span> {{ $book->rent_end_date?->format('F j, Y') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
