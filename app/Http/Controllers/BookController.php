<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // <-- TAMBAHKAN INI

class BookController extends Controller
{
    use AuthorizesRequests; // <-- DAN TAMBAHKAN INI

    // Menampilkan daftar semua buku milik pengguna yang login
    public function index(Request $request)
    {
        $query = Auth::user()->books();

        if ($request->filled('search')) {
            $searchTerm = $request->input('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('author', 'like', '%' . $searchTerm . '%');
            });
        }

        $books = $query->latest()->paginate(5)->withQueryString();

        return view('books.index', compact('books'));
    }

    // Menampilkan formulir untuk membuat buku baru
    public function create()
    {
        return view('books.create');
    }

    // Menyimpan buku baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_year' => 'required|integer|min:1000|max:' . date('Y'),
            'publisher' => 'required|string|max:255',
        ]);

        Auth::user()->books()->create($request->all());

        return redirect()->route('books.index')
                         ->with('success', 'Book created successfully.');
    }

    // Menampilkan detail satu buku
    public function show(Book $book)
    {
        $this->authorize('view', $book); // Kita bisa tambahkan policy untuk view juga jika perlu
        return view('books.show', compact('book'));
    }

    // Menampilkan formulir untuk mengedit buku
    public function edit(Book $book)
    {
        $this->authorize('update', $book);
        return view('books.edit', compact('book'));
    }

    // Memperbarui data buku di database
    public function update(Request $request, Book $book)
    {
        $this->authorize('update', $book); // Ini sekarang akan berfungsi

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publication_year' => 'required|integer|min:1000|max:' . date('Y'),
            'publisher' => 'required|string|max:255',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')
                         ->with('success', 'Book updated successfully');
    }

    // Menghapus buku dari database
    public function destroy(Book $book)
    {
        $this->authorize('delete', $book); // Ini juga akan berfungsi

        $book->delete();

        return redirect()->route('books.index')
                         ->with('success', 'Book deleted successfully');
    }
}
