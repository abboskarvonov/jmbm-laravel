<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'article';
    protected $fillable = ['title', 'author', 'pages', 'date', 'issue_id', 'keywords', 'annotations', 'file', 'slug'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function journalissue()
    {
        return $this->belongsTo(JournalIssue::class);
    }
}
