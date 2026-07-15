<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'is_active',
        'priority',
        'published_at'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'datetime'
    ];

    // Scope untuk pengumuman yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk pengumuman yang sudah dipublish
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now());
    }

    // Scope untuk pengumuman publik (aktif dan sudah dipublish)
    public function scopePublic($query)
    {
        return $query->active()->published();
    }
}