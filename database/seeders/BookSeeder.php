<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recupera alcuni autori e categorie esistenti
        $author1 = Author::where('name', 'J.K. Rowling')->first();
        $author2 = Author::where('name', 'George R.R. Martin')->first();
        $category1 = Category::where('name', 'Fantasy')->first();
        $category2 = Category::where('name', 'Science Fiction')->first();

        // Aggiungi alcuni libri
        Book::create([
            'title' => 'Harry Potter and the Sorcerer\'s Stone',
            'description' => 'A young boy discovers he is a wizard and attends a magical school.',
            'pages' => 309,
            'author_id' => $author1->id,
            'category_id' => $category1->id,
        ]);

        Book::create([
            'title' => 'A Game of Thrones',
            'description' => 'A political drama set in a medieval fantasy world.',
            'pages' => 694,
            'author_id' => $author2->id,
            'category_id' => $category1->id,
        ]);
    }
}
