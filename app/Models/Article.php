<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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

    public function has_tag_by_name($tagname) {
        $tag = Tag::where('name', '=', $tagname)->first();
        return $this->has_tag($tag->id);
    }

    public function incrementViewsCount(){
        $this->viewsCount++;
        return $this->save();
    }

    public function scopeNeverSeen(Builder $query)
    {
        $query->where('viewsCount', 0);
    }
    
    public function scopeSeen(Builder $query)
    {
        $query->where('viewsCount', ">", 0);
    }
}
