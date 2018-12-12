<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use GrahamCampbell\Markdown\Facades\Markdown;

class Post extends Model
{
    public function author()
    {
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($queries, $filter)
    {
        if (isset($filter['q']) && $q = strtolower($filter['q'])) {
            $queries->where(function($query) use ($q) {
                $query->whereHas('author', function ($qr) use ($q) {
                    $qr->where('name', 'LIKE', "%{$q}%");
                });
                $query->orWhereHas('category', function ($qr) use ($q) {
                    $qr->where('title', 'LIKE', "%{$q}%");
                });
                $query->orWhere(function ($qr) use ($q) {
                    $qr->where('title', 'LIKE', "%{$q}%");
                });
            });
        }
    }

    public function getBodyHtmlAttribute()
    {
        return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }
}
