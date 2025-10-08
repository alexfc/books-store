<?php

namespace App\Http\Controllers\Public;

use App\Enums\BookStatus;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $sortBy = $request->get('sort_by', 'release_date');
        $sortDirection = $request->get('sort_direction', 'desc');

        $sortable = ['category', 'author', 'release_date'];

        if (!in_array($sortBy, $sortable)) {
            $sortBy = 'release_date';
        }

        if (!in_array($sortDirection, ['asc', 'desc'])) {
            $sortDirection = 'desc';
        }

        $books = Book::where('status', '!=', BookStatus::IS_SALED)
            ->orderBy($sortBy, $sortDirection)
            ->paginate(10);

        return view('public.books.index', compact('books', 'sortBy', 'sortDirection'));
    }

    public function show(Book $book)
    {
        return view('public.books.show', [
            'book' => $book,
            'statuses' => BookStatus::cases(),
        ]);
    }

    public function rent(Request $request, Book $book)
    {
        $request->validate([
            'rent_duration' => 'required|string|in:2 weeks,1 month,3 months',
        ]);

        if ($book->status !== BookStatus::IN_STOCK) {
            return back()->with('error', 'This book is not available for rent.');
        }

        $rentEndDate = match ($request->rent_duration) {
            '2 weeks' => Carbon::now()->addWeeks(2),
            '1 month' => Carbon::now()->addMonth(),
            '3 months' => Carbon::now()->addMonths(3),
        };

        $book->update([
            'status' => BookStatus::IN_RENT,
            'buyer_id' => auth('buyer')->id(),
            'rent_end_date' => $rentEndDate,
        ]);

        return back()->with('success', 'You have successfully rented this book.');
    }

    public function buy(Request $request, Book $book)
    {
        if ($book->status !== BookStatus::IN_STOCK) {
            return back()->with('error', 'This book is not available for sale.');
        }

        $book->update([
            'status' => BookStatus::IS_SALED,
            'buyer_id' => auth('buyer')->id(),
        ]);

        return redirect()->route('public.books.index')->with('success', 'You have successfully purchased this book.');
    }
}
