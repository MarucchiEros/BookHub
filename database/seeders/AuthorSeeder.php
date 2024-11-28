<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Author::create([
            'name' => 'J.K. Rowling',
            'birthday' => '1965-07-31',
        ]);

        Author::create([
            'name' => 'George R.R. Martin',
            'birthday' => '1948-09-20',
        ]);

        Author::create([
            'name' => 'J.R.R. Tolkien',
            'birthday' => '1892-01-03',
        ]);
    }
}
