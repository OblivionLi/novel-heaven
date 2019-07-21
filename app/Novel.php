<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Novel extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 'author', 'translator', 'status', 'description', 'cover', 'date_release',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_novel');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class, 'novel_id');
    }

    public static function findBySlug(string $slug, array $columns = ['*'])
    {
        return static::whereSlug($slug)->first($columns);
    }

    public function scopeSearchName($query, $name)
    {
        if (!empty($name)) {
            $query->where('name', 'like', '%' . $name . '%');
        }
        return $query;
    }

    public function scopeBasicSort($query, $basicSort)
    {
        if ($basicSort == 'recentUpdates') {
            $query->orderBy('updated_at', 'desc');
        } elseif ($basicSort == 'recentAdditions') {
            $query->orderBy('created_at', 'asc');
        }
        return $query;
    }

    public function scopeFilterStatus($query, $status)
    {
        if (!empty($status)) {
            if ($status == 'All') {
                $query->where('id', '>', 0);
            } else {
                $query->where('status', $status);
            }
        }
        return $query;
    }

    public function scopeFilterOrder($query, $orderBy)
    {
        if (!empty($orderBy)) {
            if ($orderBy == 'name') {
                $query->orderBy('name', 'asc');
            } elseif ($orderBy == 'date_release') {
                $query->orderBy('date_release', 'desc');
            } elseif ($orderBy == 'created_at') {
                $query->orderBy('created_at', 'desc');
            } elseif ($orderBy == 'updated_at') {
                $query->orderBy('updated_at', 'desc');
            }
        }
        return $query;
    }

    public function scopeFilterGenre($query, $genre)
    {
        //return $query->with('genres')->where('genre_name', $genre);
        if (!empty($genre)) {
            if ($genre == 'All') {
                $query->where('id', '>', 0);
            } else {
                $query->whereHas('genres', function ($query) use ($genre) {
                    $query->where('genre_name', '=', $genre);
                });
            }
        }
        return $query;
    }
}
