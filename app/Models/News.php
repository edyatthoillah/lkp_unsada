<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    use HasUlids;

    protected $table = 'news';

    protected $fillable = [
        'thumbnail',
        'news_title',
        'slug',
        'news_content',
        'author',
        'status',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    /**
     * Boot method untuk auto generate slug & published_at
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($news) {
            // Generate slug otomatis jika kosong
            if (empty($news->slug)) {
                $news->slug = Str::slug($news->news_title);
            }

            // Set published_at jika status publish
            if ($news->status === 'publish' && empty($news->published_at)) {
                $news->published_at = now();
            }
        });
    }

    /**
     * Scope untuk berita yang sudah publish
     */
    public function scopePublished($query)
    {
        return $query->where('status', 'publish')
            ->whereNotNull('published_at')
            ->latest('published_at');
    }
}
