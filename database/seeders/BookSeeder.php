<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Book::factory()->count(10)->create([
            'user_id' => $user->id,
        ]);

        $this->call([
        BookSeeder::class,
    ]);
    }
    
}