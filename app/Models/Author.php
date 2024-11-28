<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;


    protected $fillable = ['name', 'birthday'];

    /**
     * Un autore può avere molti libri.
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
