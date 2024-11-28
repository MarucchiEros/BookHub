<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // Specifica i campi che possono essere mass-assigned
    protected $fillable = ['title', 'description', 'pages', 'author_id', 'category_id', 'image_path'];

    /**
     * Un libro appartiene a un autore.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Un libro appartiene a una categoria.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
