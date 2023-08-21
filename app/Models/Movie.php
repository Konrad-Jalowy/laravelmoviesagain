<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function director()
    {
        return $this->belongsTo(Movie::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}
