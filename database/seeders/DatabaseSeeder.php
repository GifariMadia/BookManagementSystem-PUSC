<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('books')->delete();
        DB::table('users')->delete();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $books = [
            ['title' => 'Laskar Pelangi', 'author' => 'Andrea Hirata', 'publication_year' => 2005, 'publisher' => 'Bentang Pustaka'],
            ['title' => 'Bumi Manusia', 'author' => 'Pramoedya Ananta Toer', 'publication_year' => 1980, 'publisher' => 'Hasta Mitra'],
            ['title' => 'Cantik Itu Luka', 'author' => 'Eka Kurniawan', 'publication_year' => 2002, 'publisher' => 'Gramedia Pustaka Utama'],
            ['title' => 'Negeri 5 Menara', 'author' => 'Ahmad Fuadi', 'publication_year' => 2009, 'publisher' => 'Gramedia Pustaka Utama'],
            ['title' => 'Ronggeng Dukuh Paruk', 'author' => 'Ahmad Tohari', 'publication_year' => 1982, 'publisher' => 'Gramedia Pustaka Utama'],
            ['title' => 'The Lord of the Rings', 'author' => 'J.R.R. Tolkien', 'publication_year' => 1954, 'publisher' => 'Allen & Unwin'],
            ['title' => 'Harry Potter and the Sorcerer\'s Stone', 'author' => 'J.K. Rowling', 'publication_year' => 1997, 'publisher' => 'Bloomsbury'],
            ['title' => 'To Kill a Mockingbird', 'author' => 'Harper Lee', 'publication_year' => 1960, 'publisher' => 'J. B. Lippincott & Co.'],
            ['title' => '1984', 'author' => 'George Orwell', 'publication_year' => 1949, 'publisher' => 'Secker & Warburg'],
            ['title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald', 'publication_year' => 1925, 'publisher' => 'Charles Scribner\'s Sons'],
            ['title' => 'Atomic Habits', 'author' => 'James Clear', 'publication_year' => 2018, 'publisher' => 'Avery'],
            ['title' => 'Sapiens: A Brief History of Humankind', 'author' => 'Yuval Noah Harari', 'publication_year' => 2011, 'publisher' => 'Dvir Publishing House'],
            ['title' => 'Filosofi Teras', 'author' => 'Henry Manampiring', 'publication_year' => 2018, 'publisher' => 'Kompas'],
            ['title' => 'Sebuah Seni untuk Bersikap Bodo Amat', 'author' => 'Mark Manson', 'publication_year' => 2016, 'publisher' => 'HarperOne'],
            ['title' => 'The Catcher in the Rye', 'author' => 'J. D. Salinger', 'publication_year' => 1951, 'publisher' => 'Little, Brown and Company'],
            ['title' => 'Pulang', 'author' => 'Tere Liye', 'publication_year' => 2015, 'publisher' => 'Republika Penerbit'],
            ['title' => 'Laut Bercerita', 'author' => 'Leila S. Chudori', 'publication_year' => 2017, 'publisher' => 'KPG'],
            ['title' => 'The Hobbit', 'author' => 'J.R.R. Tolkien', 'publication_year' => 1937, 'publisher' => 'George Allen & Unwin'],
            ['title' => 'Pride and Prejudice', 'author' => 'Jane Austen', 'publication_year' => 1813, 'publisher' => 'T. Egerton, Whitehall'],
            ['title' => 'The Alchemist', 'author' => 'Paulo Coelho', 'publication_year' => 1988, 'publisher' => 'HarperTorch'],
        ];

        foreach ($books as $bookData) {
            Book::create([
                'user_id' => $user->id,
                'title' => $bookData['title'],
                'author' => $bookData['author'],
                'publication_year' => $bookData['publication_year'],
                'publisher' => $bookData['publisher'],
            ]);
        }
    }
}
