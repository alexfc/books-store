@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Добавить книгу</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Упс!</strong>
            <span class="block sm:inline">Есть некоторые проблемы с введенными данными:</span>
            <ul class="mt-3 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Название</label>
                    <input type="text" name="title" id="title" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('title') }}">
                </div>
                <div>
                    <label for="author" class="block text-sm font-medium text-gray-700">Автор</label>
                    <input type="text" name="author" id="author" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('author') }}">
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Категория</label>
                    <input type="text" name="category" id="category" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('category') }}">
                </div>
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Стоимость</label>
                    <input type="number" name="price" id="price" step="0.01" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('price') }}">
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Статус</label>
                    <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        @foreach ($statuses as $status)
                            <option value="{{ $status->value }}" {{ old('status') == $status->value ? 'selected' : '' }}>{{ $status->value }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="release_date" class="block text-sm font-medium text-gray-700">Дата релиза</label>
                    <input type="date" name="release_date" id="release_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ old('release_date') }}">
                </div>
                <div>
                    <label for="cover_image_path" class="block text-sm font-medium text-gray-700">Обложка</label>
                    <input type="file" name="cover_image_path" id="cover_image_path" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                    Создать книгу
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
