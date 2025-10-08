@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Books Management</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">ID</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Title</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Author</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Category</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Price</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Status</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Release Date</th>
                    <th class="py-3 px-4 uppercase font-semibold text-sm">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach ($books as $book)
                <tr>
                    <td class="py-3 px-4">{{ $book->id }}</td>
                    <td class="py-3 px-4">{{ $book->title }}</td>
                    <td class="py-3 px-4">{{ $book->author }}</td>
                    <td class="py-3 px-4">{{ $book->category }}</td>
                    <td class="py-3 px-4">{{ $book->price }}</td>
                    <td class="py-3 px-4">{{ $book->status }}</td>
                    <td class="py-3 px-4">{{ $book->release_date->format('Y-m-d') }}</td>
                    <td class="py-3 px-4">
                        <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                        <a href="#" class="text-red-600 hover:text-red-900 ml-2">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
