<?php

namespace App\Http\Controllers\Admin;

use App\Enums\BookStatus;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(10);
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create', [
            'statuses' => BookStatus::cases(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => ['required', new Enum(BookStatus::class)],
            'release_date' => 'required|date',
            'cover_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('cover_image_path')) {
            $path = $request->file('cover_image_path')->store('covers', 'public');
            $data['cover_image_path'] = $path;
        }

        Book::create($data);

        return redirect()->route('admin.books.index')->with('success', 'Book created successfully.');
    }

    public function edit(Book $book)
    {
        return view('admin.books.edit', [
            'book' => $book,
            'statuses' => BookStatus::cases(),
        ]);
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => ['required', new Enum(BookStatus::class)],
            'release_date' => 'required|date',
            'cover_image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('cover_image_path')) {
            $path = $request->file('cover_image_path')->store('covers', 'public');
            $data['cover_image_path'] = $path;
        }

        $book->update($data);

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully.');
    }
}
