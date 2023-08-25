<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'content',
        'lead'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function has_tag($tag_id) {
        return $this->tags()->where('tag_id', $tag_id)->exists();
    }
}
