<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Specifica i campi che possono essere mass-assigned
    protected $fillable = ['name'];

    /**
     * Una categoria può avere molti libri.
     */
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
