<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $categories = Category::all();
        return view('auth.dashboard', compact('books', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'idBook' => 'required|unique:books|max:255',
            'titleBook' => 'required',
            'idCategory' => 'required|exists:categories,id',
            'priceBook' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'authorBook' => 'required',
            'publisherBook' => 'required',
            'publishedBook' => 'required|date',
            'descriptionBook' => 'nullable',
            'coverBook' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,avif|max:2048',
            'stockBook' => 'required|integer',
        ]);

        $book = new Book();
        $book->idBook = $request->idBook;
        $book->titleBook = $request->titleBook;
        $book->idCategory = $request->idCategory;
        $book->priceBook = $request->priceBook;
        $book->authorBook = $request->authorBook;
        $book->publisherBook = $request->publisherBook;
        $book->publishedBook = $request->publishedBook;
        $book->descriptionBook = $request->descriptionBook;
        $book->stockBook = $request->stockBook;

        if ($request->hasFile('coverBook')) {
            $coverBook = $request->file('coverBook');
            $coverBookName = time() . '.' . $coverBook->getClientOriginalExtension();
            $coverBook->move(public_path('covers'), $coverBookName);
            $book->coverBook = $coverBookName;
        }

        $book->save();

        return redirect()->route('admin.books.index')->with('success', 'Book created successfully.');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('admin.books.edit', compact('book', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'idBook' => 'required|max:255|unique:books,idBook,' . $id . ',idBook',
            'titleBook' => 'required',
            'idCategory' => 'required|exists:categories,id',
            'priceBook' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'authorBook' => 'required',
            'publisherBook' => 'required',
            'publishedBook' => 'required|date',
            'descriptionBook' => 'nullable',
            'coverBook' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,avif|max:2048',
            'stockBook' => 'required|integer',
        ]);

        $book = Book::findOrFail($id);
        $book->idBook = $request->idBook;
        $book->titleBook = $request->titleBook;
        $book->idCategory = $request->idCategory;
        $book->priceBook = $request->priceBook;
        $book->authorBook = $request->authorBook;
        $book->publisherBook = $request->publisherBook;
        $book->publishedBook = $request->publishedBook;
        $book->descriptionBook = $request->descriptionBook;
        $book->stockBook = $request->stockBook;

        if ($request->hasFile('coverBook')) {
            $coverBook = $request->file('coverBook');
            $coverBookName = time() . '.' . $coverBook->getClientOriginalExtension();
            $coverBook->move(public_path('covers'), $coverBookName);
            $book->coverBook = $coverBookName;
        }

        $book->save();

        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully.');
    }
}