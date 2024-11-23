<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalIssue extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'journal_issue';
    protected $fillable = ['title', 'date', 'file', 'slug'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
